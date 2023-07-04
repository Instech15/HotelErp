<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couponlist extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
		$this->load->library('lsoft_setting');
 		$this->load->model(array(
 			'couponlist_model',
			'logs_model'  
 		));
 		
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 
	public function index()
    {
        
		$this->permission->method('dashboard','read')->redirect();
        $data['title']    = display('couponlist'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('dashboard/couponlist/index');
        $config["total_rows"]  = $this->couponlist_model->count_token();
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
        $data["couponlist"] = $this->couponlist_model->read_token();
		$data['pagenum']=$page;
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $data['module'] = "dashboard";
        $data['page']   = "coupon/couponlist";   
        echo Modules::run('template/layout', $data); 
    }
	public function create($id = null)
    {
	  $data['title'] = display('add_token');
	  $this->form_validation->set_rules('tokencode', display('tokencode')  ,'required|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('tokenrate', display('tokenrate')  ,'required|xss_clean');
	  $this->form_validation->set_rules('offerstartdate', display('offerstartdate')  ,'required|xss_clean');
	  $this->form_validation->set_rules('offerendate', display('offerendate')  ,'required|xss_clean');
	  $this->form_validation->set_rules('status', display('status')  ,'required|xss_clean');
	   $savedid=$this->session->userdata('id');
	   $offerstartdate = str_replace('/','-',$this->input->post('offerstartdate',TRUE));
	   $offerendate = str_replace('/','-',$this->input->post('offerendate',TRUE));
	   
	   $convertstartdate= date('Y-m-d' , strtotime($offerstartdate));
	   $convertenddate= date('Y-m-d' , strtotime($offerendate));

	
	  if ($this->form_validation->run()) { 
	  $data['foodlist']   = (Object) $postData = array(
	   'tokenid'     			=> $this->input->post('tokenid',TRUE),
	   'tokencode'     			=> $this->input->post('tokencode',TRUE),
	   'tokenrate'     			=> $this->input->post('tokenrate',TRUE), 
	   'tokenstartdate'         => $convertstartdate,
	   'tokenendate'            => $convertenddate,
	   'tokenstatus'   			=> $this->input->post('status',TRUE)
	  );
	   if (empty($this->input->post('tokenid',TRUE))) {
		$this->permission->method('dashboard','create')->redirect();
	  $logData = array(
	   'action_page'         => "Add Token",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "New Token Added",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->couponlist_model->token_create($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('dashboard/couponlist/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("dashboard/couponlist/index"); 
	
	   } else {
		$this->permission->method('couponlist','update')->redirect();
		
	  $logData =array(
	   'action_page'         => "Token List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Token Updated",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->couponlist_model->update_token($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("dashboard/couponlist/index/");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('token_edit');
		$data['tokeninfoinfo']   = $this->couponlist_model->findById($id);
	   }
	   $data['module'] = "dashboard";
	   $data['page']   = "coupon/couponlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	 public function updateintfrm($id){
	  
		$this->permission->method('dashboard','update')->redirect();
		$data['title'] = display('token_edit');
		$data['intinfo']   = $this->couponlist_model->findById($id);
        $data['module'] = "dashboard";  
        $data['page']   = "coupon/couponedit";
		$this->load->view('dashboard/coupon/couponedit', $data);   
	   }
 
    public function delete($tokenid = null)
    {
        $this->permission->module('couponlist','delete')->redirect();
		$logData =array(
	   'action_page'         => "Token List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Token Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->couponlist_model->token_delete($tokenid)) {
			$this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('dashboard/couponlist/index');
    }
}
