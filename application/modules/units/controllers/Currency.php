<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'currency_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('units','read')->redirect();
        $data['title']    = display('currency_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('units/currency/index');
        $config["total_rows"]  = $this->currency_model->countlist();
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
        $data["currencylist"] = $this->currency_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('currency_edit');
		$data['intinfo']   = $this->currency_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "units";
        $data['page']   = "currencylist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('currency_add');
		$this->form_validation->set_rules('currencyname',display('currency_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('icon',display('currency_icon'),'required|xss_clean');
		$this->form_validation->set_rules('rate',display('currency_rate'),'required|xss_clean');
		$this->form_validation->set_rules('position',display('position'),'required|is_natural|xss_clean');
	   $saveid=$this->session->userdata('id');
	   $data['type']   = (Object) $postData =array(
		   'currencyid'  		    => $this->input->post('currencyid', TRUE),
		   'currencyname' 			=> $this->input->post('currencyname',TRUE),
		   'curr_icon' 			    => $this->input->post('icon',TRUE),
		   'position' 			    => $this->input->post('position',TRUE),
		   'curr_rate' 			    => $this->input->post('rate',TRUE),
		  ); 
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('currencyid', TRUE))) {
		$this->permission->method('units','create')->redirect();
	 
		if ($this->currency_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('units/currency/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/currency/index"); 
	
	   } else {
		$this->permission->method('units','update')->redirect();
	
		if ($this->currency_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/currency/index");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('currency_edit');
		$data['intinfo']   = $this->currency_model->findById($id);
	   }
	   
	   $data['module'] = "units";
	   $data['page']   = "currencylist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('currency_edit');
		$data['intinfo']   = $this->currency_model->findById($id);
        $data['module'] = "units";  
        $data['page']   = "currencyedit";
		$this->load->view('units/currencyedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('units','delete')->redirect();
		
		if ($this->currency_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('units/currency/index');
    }
 
}
