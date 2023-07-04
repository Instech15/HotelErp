<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
		$this->load->library('lsoft_setting');
 		$this->load->model(array(
 			'rating_model',
			'logs_model'  
 		));
 		
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 
	public function index()
    {
        
		$this->permission->method('dashboard','read')->redirect();
        $data['title']    = display('rating'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('dashboard/rating/index');
        $config["total_rows"]  = $this->rating_model->count_rating();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["ratinglist"] = $this->rating_model->read_rating($config["per_page"], $page);
		$data['pagenum']=$page;
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $data['module'] = "dashboard";
        $data['page']   = "rating/ratinglist";   
        echo Modules::run('template/layout', $data); 
    }
	public function create($id = null)
    {
	  $data['title'] = display('add_rating');
	  $this->form_validation->set_rules('title', display('title')  ,'required|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('reviewtxt', display('reviewtxt')  ,'required|xss_clean');
	  $this->form_validation->set_rules('rating', display('rating')  ,'required|xss_clean');
	   $savedid=$this->session->userdata('id');
	  if ($this->form_validation->run()) { 
	  $data['foodlist']   = (Object) $postData = array(
	   'ratingid'     			=> $this->input->post('ratingid',TRUE),
	   'title'     			    => $this->input->post('title',TRUE),
	   'reviewtxt'     			=> $this->input->post('reviewtxt',TRUE),
	   'rating'     			=> $this->input->post('rating',TRUE) 
	  );
	   if (empty($this->input->post('ratingid', TRUE))) {
		$this->permission->method('dashboard','create')->redirect();
	  $logData = array(
	   'action_page'         => "Add rating",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "New Rating Added",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->rating_model->rating_create($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('dashboard/rating/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("dashboard/rating/index"); 
	
	   } else {
		$this->permission->method('rating','update')->redirect();
		
	  $logData =array(
	   'action_page'         => "Rating List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Rating Updated",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->rating_model->update_rating($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("dashboard/rating/index/");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('rating_edit');
		$data['tokeninfoinfo']   = $this->rating_model->findById($id);
	   }
	   $data['module'] = "dashboard";
	   $data['page']   = "rating/ratinglist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	 public function updateintfrm($id){
	  
		$this->permission->method('dashboard','update')->redirect();
		$data['title'] = display('rating_edit');
		$data['intinfo']   = $this->rating_model->findById($id);
        $data['module'] = "dashboard";  
        $data['page']   = "rating/ratingedit";
		$this->load->view('dashboard/rating/ratingedit', $data);   
	   }
 
    public function delete($tokenid = null)
    {
        $this->permission->module('rating','delete')->redirect();
		$logData =array(
	   'action_page'         => "Rating List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Rating Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->rating_model->rating_delete($tokenid)) {
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard/rating/index');
    }
}
