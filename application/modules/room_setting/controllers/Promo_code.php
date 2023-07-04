<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_code extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'promocode_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('promocode_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/promo_code/index');
        $config["total_rows"]  = $this->promocode_model->countlist();
        $config["per_page"]    = 25;
        $config["uri_segment"] = 4;
        /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["roomsizelist"] = $this->promocode_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('promocode_edit');
		$data['intinfo']   = $this->promocode_model->findById($id);
	   }
        #
        #pagination ends
        #   
		$data["roomlist"] = $this->promocode_model->allrooms();
        $data['module'] = "room_setting";
        $data['page']   = "promocodelist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('promocode_add');
	  if($this->input->post('old_promocode', TRUE)!=$this->input->post('promocode', TRUE))
	  $this->form_validation->set_rules('promocode',display('promocode'),'required|is_unique[promocode.promocode]|xss_clean');
	  $this->form_validation->set_rules('roomid',display('roomtype'),'required|xss_clean');
	  $this->form_validation->set_rules('startdate',display('start_date'),'required|xss_clean');
	  $this->form_validation->set_rules('enddate',display('end_date'),'required|xss_clean');
	  $this->form_validation->set_rules('discount',display('discount'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('promocodeid', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'promocode'     	     => $this->input->post('promocode', TRUE),
		   'roomid'     	     => $this->input->post('roomid', TRUE),
		   'startdate'     	     => $this->input->post('startdate', TRUE),
		   'enddate'     	     => $this->input->post('enddate', TRUE),
		   'discount'     	     => $this->input->post('discount', TRUE),
		   'status'     	     => 0,
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->promocode_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/promo-code');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/promo-code"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
			'promocodeid'     	     => $this->input->post('promocodeid', TRUE),
			'promocode'     	     => $this->input->post('promocode', TRUE),
			'roomid'     	     => $this->input->post('roomid', TRUE),
			'startdate'     	     => $this->input->post('startdate', TRUE),
			'enddate'     	     => $this->input->post('enddate', TRUE),
			'discount'     	     => $this->input->post('discount', TRUE),
			'status'     	     => $this->input->post('status', TRUE),
		  );
		if ($this->promocode_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/promo-code");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('promocode_edit');
		$data['intinfo']   = $this->promocode_model->findById($id);
	   }
	   $data["roomsizelist"] = $this->promocode_model->read();
	   $data["roomlist"] = $this->promocode_model->allrooms();
	   $data['module'] = "room_setting";
	   $data['page']   = "promocodelist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('promocode_edit');
		$data['intinfo']   = $this->promocode_model->findById($id);
		$data["roomlist"] = $this->promocode_model->allrooms();
        $data['module'] = "room_setting";  
        $data['page']   = "promocodeedit";
		$this->load->view('room_setting/promocodeedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->promocode_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/promo-code');
    }
 
}
