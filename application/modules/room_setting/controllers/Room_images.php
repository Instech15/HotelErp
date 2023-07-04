<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_images extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'roomimage_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('room_image'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/room_images/index');
        $config["total_rows"]  = $this->roomimage_model->countlist();
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
        $data["roomimage"] = $this->roomimage_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('bed_edit');
		$data['intinfo']   = $this->roomimage_model->findById($id);
	   }
	    $data["allrooms"] = $this->roomimage_model->allrooms();
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "roomimages";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('bed_add');
	  $this->form_validation->set_rules('room_name',display('room_name'),'required');
	$img = $this->fileupload->do_upload(
			'application/modules/room_setting/assets/images/','picture'
		);
	// if favicon is uploaded then resize the favicon
	if ($img !== false && $img != null) {
		$this->fileupload->do_resize(
			$img, 
			320,
			320
		);
	}
	//if favicon is not uploaded
	if ($img === false) {
		$this->session->set_flashdata('exception', "Please Upload a Valid Image");
	}
	   
	  $saveid=$this->session->userdata('id');
	  $id=$this->input->post('room_img_id', TRUE);
	  $this->input->post('discount',TRUE);
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('room_img_id', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'room_img_id'     	     	 => $this->input->post('room_img_id', TRUE),
		   'room_id' 	             => $this->input->post('room_name',TRUE),
		   'room_imagename' 	             => $img,
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->roomimage_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/room-images');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/room-images"); 
	
	   } else {
		   
		$this->permission->method('room_setting','update')->redirect();
		if(!empty($id)) {
		   $imageinfo=$this->db->select('*')->from('room_image')->where('room_img_id',$id)->get()->row();
	      if(!empty($img)){
			 unlink($imageinfo->room_imagename);
			}
			else{
				$img=$imageinfo->room_imagename;
				} 
	   }
		$data['room_setting']   = (Object) $postData = array(
		  'room_img_id'     	     	 => $this->input->post('room_img_id', TRUE),
		   'room_id' 	             => $this->input->post('room_name',TRUE),
		   'room_imagename' 	             => $img,
		  );
	   
		if ($this->roomimage_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/room-images");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('bed_edit');
		$data['intinfo']   = $this->roomimage_model->findById($id);
	   }
	   if($this->form_validation->run()==false){
		$this->session->set_flashdata('exception',  display('please_try_again'));
		redirect("room_setting/room-images");  
	   }
	   $data["allrooms"] = $this->roomimage_model->allrooms();
	   $data['module'] = "room_setting";
	   $data['page']   = "rateplainlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('bed_edit');
		$data["allrooms"] = $this->roomimage_model->allrooms();
		$data['intinfo']   = $this->roomimage_model->findById($id);
        $data['module'] = "room_setting";  
        $data['page']   = "roomimagedit";
		$this->load->view('room_setting/roomimagedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		$imageinfo=$this->db->select('*')->from('room_image')->where('room_img_id',$id)->get()->row();
		$myimage=$imageinfo->room_imagename;
		if ($this->roomimage_model->delete($id)) {
			unlink($myimage);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/room-images');
    }
 
}
