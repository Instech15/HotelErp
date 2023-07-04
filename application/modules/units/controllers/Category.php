<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'product_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('units','read')->redirect();
        $data['title']    = display('category_list'); 
        $data["roomsizelist"] = $this->product_model->read();		
		if(!empty($id)) {
		$data['title'] = display('category_edit');
		$data['intinfo']   = $this->product_model->findId($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "units";
        $data['page']   = "categorylist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('category_add');
	  $this->form_validation->set_rules('category_name',display('category_name'),'required|xss_clean');
	  $saveid=$this->input->post('category_id', TRUE);
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('category_id', TRUE))) {
		 $data['units']   = (Object) $postData = array(
		   'categoryname' 	         => $this->input->post('category_name',TRUE),
		   'status'				=>1,
		  );
		$this->permission->method('units','create')->redirect();
		if ($this->db->insert('tbl_category',$postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('units/category');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/category"); 
	
	   } else {
		$this->permission->method('units','update')->redirect();
		$data['units']   = (Object) $postData = array(
		     'category_id'     	        => $this->input->post('category_id', TRUE),
		     'categoryname' 	         => $this->input->post('category_name',TRUE),
		     'status' 	         => $this->input->post('status',TRUE),
		  );
	 
		if ($this->db->where('category_id',$postData['category_id'])->update('tbl_category', $postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/category");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('category_edit');
		$data['intinfo']   = $this->product_model->findId($id);
		$data['module'] = "units";
		$data['page']   = "category_edit";   
		echo Modules::run('template/layout', $data);
	   }else{	   
	   $data['module'] = "units";
	   $data['page']   = "category";   
	   echo Modules::run('template/layout', $data); 
	   }
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('category_edit');
		$data['intinfo']   = $this->product_model->findId($id);
        $data['module'] = "units";  
        $data['page']   = "categoryedit";
		$this->load->view('units/categoryedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('units','delete')->redirect();
		
		if ($this->product_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('units/category');
    }
 
}
