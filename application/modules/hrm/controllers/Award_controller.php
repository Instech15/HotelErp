<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Award_controller extends MX_Controller {

public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'Award_model'
		));		 
	}

public function award_view()
	{   
        $this->permission->method('hrm','read')->redirect();

		$data['title']    = display('manage_award');  ;
		$data['mang']   = $this->Award_model->award_view();
		$data['module']   = "hrm";
		$data['page']     = "award_view";   
		echo Modules::run('template/layout', $data); 
	}

function _alpha_dash_space($str_in = '',$fields=''){
		if (! preg_match("/^([-a-z0-9_. ])+$/i", $str_in))
		{
			$this->form_validation->set_message('_alpha_dash_space', 'The '.$fields.' field may only contain alpha-numeric characters,Space,underscores, and dashes.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

public function create_award(){ 
        $this->load->library(array('my_form_validation'));
		$this->form_validation->set_rules('award_name',display('award_name'),'xss_clean');
		$this->form_validation->set_rules('aw_description',display('aw_description'),'xss_clean');
		$this->form_validation->set_rules('awr_gift_item',display('awr_gift_item'),'max_length[50]|xss_clean');
		$this->form_validation->set_rules('date',display('date')  ,'max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id',display('employee_id')  ,'max_length[50]|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('awarded_by',display('awarded_by')  ,'max_length[50]|xss_clean');
      
        if ($this->form_validation->run($this) === true) {

			$postData = array(
			'award_name' 	          => $this->input->post('award_name',TRUE),
			'aw_description'          =>$this->input->post('aw_description',TRUE),
			'awr_gift_item' 	      => $this->input->post('awr_gift_item',TRUE),
			'date' 	                  => $this->input->post('date',TRUE),
            'employee_id'             => $this->input->post('employee_id',TRUE),
            'awarded_by'              => $this->input->post('awarded_by',TRUE),
                
            );   

            if ($this->Award_model->award_create($postData)) { 
                $this->session->set_flashdata('message', display('successfully_created'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/award-list");
        } else {
            $data['title']  = display('new_award');
            $data['module'] = "hrm";
            $data['mang']   = $this->Award_model->award_view();
             $data['dropdown']   = $this->Award_model->dropdown();
            $data['page']   = "award_form";   
          echo Modules::run('template/layout', $data); 
        }   
    }


public function delete_award($id = null) { 
        $this->permission->method('hrm','delete')->redirect();
		if ($this->Award_model->award_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/manage-award");
	}

public function update_award_form($id = null){ 
        $this->load->library(array('my_form_validation'));
		$data['title'] = display('award');
        $this->form_validation->set_rules('award_id',display('award_id'),'xss_clean');
        $this->form_validation->set_rules('award_name',display('award_name'),'xss_clean');
        $this->form_validation->set_rules('aw_description',display('aw_description'),'xss_clean');
        $this->form_validation->set_rules('awr_gift_item',display('awr_gift_item'),'max_length[50]|xss_clean');
        $this->form_validation->set_rules('date',display('date')  ,'max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id',display('employee_id')  ,'max_length[50]|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('awarded_by',display('awarded_by')  ,'max_length[50]|xss_clean');
        
        if ($this->form_validation->run($this) === true) {
            $Data =array('award_id'    =>$this->input->post('award_id',TRUE),
   				'award_name'           => $this->input->post('award_name',TRUE),
                'aw_description'       =>$this->input->post('aw_description',TRUE),
                'awr_gift_item'        => $this->input->post('awr_gift_item',TRUE),
                'date'                 => $this->input->post('date',TRUE),
                'employee_id' => $this->input->post('employee_id',TRUE),
                'awarded_by' => $this->input->post('awarded_by',TRUE),
			);   

            if ($this->Award_model->update_award($Data)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/manage-award");
        } else {
           $data['title']      = display('update');
            $data['data']      =$this->Award_model->award_updateForm($id);
            $data['dropdown']   = $this->Award_model->dropdown();
            $data['bb']        =$this->Award_model->get_id($id);
            $data['module']    = "hrm";    
            $data['page']      = "update_award_form";   
            echo Modules::run('template/layout', $data);  
        }   
    }

     

}
