<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unitmeasurement extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'unit_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('units','read')->redirect();
        $data['title']    = display('unit_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('units/unitmeasurement/index');
        $config["total_rows"]  = $this->unit_model->count_unit();
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
        $data["unitlist"] = $this->unit_model->read_unit();
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		if(!empty($id)) {
		$data['title'] = display('unit_update');
		$data['unitinfo']   = $this->unit_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "units";
        $data['page']   = "unitlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('unit_add');
		$this->form_validation->set_rules('unitname',display('unit_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('shortname',display('unit_short_name')  ,'max_length[200]|xss_clean');
		$this->form_validation->set_rules('status', display('status')  ,'required|is_natural|xss_clean');
	   
	  $data['unitinfo']="";
	  $data['units']   = (Object) $postData = array(
	   'id'     => $this->input->post('id', TRUE),
	   'uom_name' 			 => $this->input->post('unitname',TRUE),
	   'uom_short_code' 	 => $this->input->post('shortname',TRUE),
	   'is_active' 	 	 => $this->input->post('status',TRUE),
	  );
	  if ($this->form_validation->run()) { 
	   if (empty($this->input->post('id', TRUE))) {
		$this->permission->method('units','create')->redirect();
		if ($this->unit_model->unit_create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('units/unit-measurement-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/unit-measurement-list"); 
	
	   } else {
		$this->permission->method('units','update')->redirect();
		if ($this->unit_model->update_cat($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/unit-measurement-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('unit_update');
		$data['unitinfo']   = $this->unit_model->findById($id);
	   }
	   $data['module'] = "units";
	   $data['page']   = "unitlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateunitfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('unit_update');
		$data['unitinfo']   = $this->unit_model->findById($id);
        $data['module'] = "units";  
        $data['page']   = "unitedit";
		$this->load->view('units/unitedit', $data);   
	   }
 
    public function delete($category = null)
    {
        $this->permission->module('units','delete')->redirect();
		if ($this->unit_model->unit_delete($category)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('units/unit-measurement-list');
    }
 
}
