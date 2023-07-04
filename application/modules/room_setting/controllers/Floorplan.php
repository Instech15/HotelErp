<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floorplan extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'floorplan_model',
			'flooradd_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('floorplan_list'); 

        $data["floorplan"] = $this->floorplan_model->read();
        $data["links"] = $this->pagination->create_links();
		if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->floorplan_model->findById($id);
	   }
	   $data['allfloor']=$this->flooradd_model->allfloorlist();
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "floorplanlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('room_setting_add');
	  if(empty($this->input->post('floorplanid', TRUE))) {
	  $this->form_validation->set_rules('floor_name',display('floor_name'),'required|is_unique[tbl_floorplan.floorName]|xss_clean');
	  }else{
		$this->form_validation->set_rules('floor_name',display('floor_name'),'required|xss_clean');
	  }
	  $this->form_validation->set_rules('num_of_room',display('num_of_room'),'required|xss_clean');
	  $this->form_validation->set_rules('startno',display('start_roomno'),'required|xss_clean');
	  $this->form_validation->set_rules('room_no[]',display('room_no'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	       $floorname=$this->input->post('floor_name',TRUE);
		   $totalroom=$this->input->post('num_of_room',TRUE);
		   $startno=$this->input->post('startno',TRUE);
		   $roomcount=count($this->input->post('room_no',TRUE));
		   $roomno=$this->input->post('room_no',TRUE);
		   $allroom = $this->db->select("roomno")->from("tbl_floorplan")->where("floorname!=",$floorname)->get()->result();
		   $allroom = array_column($allroom, "roomno");
		   $checkRoom = array_intersect($roomno,$allroom);
		   if($checkRoom){
			   $list = "";
			   for($i=0; $i<count($checkRoom); $i++){
				   $list .= $checkRoom[$i].",";
			   }
			 $this->session->set_flashdata('exception', "Room no ".trim($list,",")." already assigned to a Floor");
			 redirect('room_setting/floor-plan-list');
		   }
	   if(empty($this->input->post('floorplanid', TRUE))) {
		   for($i=0;$i<$totalroom;$i++){
			 $existsroom=$this->db->select("*")->from('tbl_floorplan')->where('floorName',$floorname)->where('roomno',$roomno[$i])->get()->row();
			 if(empty($existsroom)){
				 $this->permission->method('room_setting','create')->redirect();
				 $postData = array(
				   'floorplanid'     	 => $this->input->post('floorplanid', TRUE),
				   'floorName' 	         => $floorname,
				   'noofroom' 	     	 => $totalroom,
				   'startno'             => $startno,
				   'roomno' 	     	 => $roomno[$i]
				  );
				 $this->floorplan_model->create($postData); 
				 }
			  }
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/floor-plan-list');
	   } else {
		   $preroomid=$this->input->post('floorplanid', TRUE);
		   $this->db->where('floorName',$preroomid)->delete('tbl_floorplan');
		 for($i=0;$i<$totalroom;$i++){
				 $this->permission->method('room_setting','update')->redirect(); 
				 $postData = array(
				   'floorName' 	         => $floorname,
				   'noofroom' 	     	 => $totalroom,
				   'startno'             => $startno,
				   'roomno' 	     	 => $roomno[$i]
				  );
				 $this->floorplan_model->create($postData); 
			  }
		 $this->session->set_flashdata('message', display('update_successfully'));
		 redirect('room_setting/floor-plan-list');
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->floorplan_model->findById($id);
	   }
	    #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/floorplan/index');
        $config["total_rows"]  = $this->floorplan_model->countlist();
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
        $data["floorplan"] = $this->floorplan_model->read();
        $data["links"] = $this->pagination->create_links();
	   $data['allfloor']=$this->flooradd_model->allfloorlist();
	   $data['module'] = "room_setting";
	   $data['page']   = "floorplanlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->floorplan_model->findById($id);
		$data['allfloor']=$this->flooradd_model->allfloorlist();
        $data['module'] = "room_setting";  
        $data['page']   = "floorplanedit";
		$this->load->view('room_setting/floorplanedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->floorplan_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/floor-plan-list');
    }
	
	
	
	//**************** floor Add***************//
	public function floorlist($id = null)
    {
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('floorplan_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/floorplan/floorlist');
        $config["total_rows"]  = $this->flooradd_model->countlist();
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
        $data["floorlist"] = $this->flooradd_model->read();
        $data["links"] = $this->pagination->create_links();
		if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->flooradd_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "floorlist";   
        echo Modules::run('template/layout', $data); 
    }
	public function addfloor($id = null)
    {
	  $data['title'] = display('room_setting_add');
	  $this->form_validation->set_rules('floor_name',display('floor_name'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('floorid',TRUE))) {
		   $data['room_setting']   = (Object) $postData = array(
		   'floorid'     	 	 => $this->input->post('floorid', TRUE),
		   'floorname' 	         => $this->input->post('floor_name',TRUE)
		  );
		  $floorname=$this->input->post('floor_name',TRUE);
		 $existsfloor=$this->db->select("*")->from('tbl_floor')->where('floorname',$floorname)->get()->row();
		 if(empty($existsfloor)){
		$this->permission->method('room_setting','create')->redirect();
		if ($this->flooradd_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/floor-plan-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		 }
		 else{
			  $this->session->set_flashdata('exception',  display('already_exists'));
			 }
		
		redirect("room_setting/floor-plan-list"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
		   'floorid'     	 	 => $this->input->post('floorid', TRUE),
		   'floorname' 	     => $this->input->post('floor_name',TRUE),
		  );
	 
		if ($this->flooradd_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/floor-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->flooradd_model->findById($id);
	   }
	    #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/floorplan/index');
        $config["total_rows"]  = $this->floorplan_model->countlist();
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
        $data["floorplan"] = $this->floorplan_model->read();
        $data["links"] = $this->pagination->create_links();
	   $data['allfloor']=$this->flooradd_model->allfloorlist();
	   $data['module'] = "room_setting";
	   $data['page']   = "floorplanlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
	public function updatefloor($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->flooradd_model->findById($id);
        $data['module'] = "room_setting";  
        $data['page']   = "flooredit";
		$this->load->view('room_setting/flooredit', $data);   
	   }
	public function deletefloor($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->flooradd_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/floor-list');
    }
	public function checkRoom(){
		$floor=$this->input->post('floor',TRUE);
		$roomno=$this->input->post('roomno',TRUE);
		$checkRoom = $this->db->select("roomno")->from("tbl_floorplan")->where("roomno", $roomno)->where("floorname!=",$floor)->get()->row();
		echo json_encode($checkRoom?$checkRoom->roomno:"");
	}
}
