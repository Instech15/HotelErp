<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_size extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'roomsize_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_facilities','read')->redirect();
        $data['title']    = display('roomsize_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('room_facilities/room_size/index');
        $config["total_rows"]  = $this->roomsize_model->countlist();
        $config["per_page"]    = 15;
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
        $data["roomsizelist"] = $this->roomsize_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('room_facilities_edit');
		$data['intinfo']   = $this->roomsize_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "room_facilities";
        $data['page']   = "roomsizelist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('room_facilities_add');
	  $this->form_validation->set_rules('room_size',display('room_size'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('mesurementid', TRUE))) {
		 $data['room_facilities']   = (Object) $postData = array(
		   'mesurementid'     	     => $this->input->post('mesurementid', TRUE),
		   'roommesurementitle' 	 => $this->input->post('room_size',TRUE),
		  );
		$this->permission->method('room_facilities','create')->redirect();
		if ($this->roomsize_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_facilities/room-size-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_facilities/room-size-list"); 
	
	   } else {
		$this->permission->method('roomfaciliti','update')->redirect();
		$data['room_facilities']   = (Object) $postData = array(
		     'mesurementid'     	     => $this->input->post('mesurementid', TRUE),
		   'roommesurementitle' 	 => $this->input->post('room_size',TRUE),
		  );
	 
		if ($this->roomsize_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_facilities/room-size-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('room_facilities_edit');
		$data['intinfo']   = $this->roomsize_model->findById($id);
	   }
	   
	   $data['module'] = "room_facilities";
	   $data['page']   = "roomsizelist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('room_facilities','update')->redirect();
		$data['title'] = display('room_facilities_edit');
		$data['intinfo']   = $this->roomsize_model->findById($id);
        $data['module'] = "room_facilities";  
        $data['page']   = "roomsizeedit";
		$this->load->view('room_facilities/roomsizeedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_facilities','delete')->redirect();
		
		if ($this->roomsize_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_facilities/room-size-list');
    }
 
}
