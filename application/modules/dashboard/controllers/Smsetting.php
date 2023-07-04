<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smsetting extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
		$this->load->library('lsoft_setting');
 		$this->load->model(array(
 			'sms_model'  
 		));
 		
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 
	//sms Configuration
    public function sms_configuration(){
       $data['gateways']= $this->lsoft_setting->sms_configuration_form();
		$data['module'] = "dashboard";  
		$this->load->view("sms/form", $data); 
    }

        //Update sms configuration
    public function update_sms_configuration(){   
		$id = $this->input->post('id', TRUE);
		$username=$this->input->post('user_name',TRUE);
		$password=$this->input->post('password',TRUE);
		$sms_from=$this->input->post('sms_from',TRUE);
		$userid=$this->input->post('userid',TRUE);
		$isactive=$this->input->post('status',TRUE);
		for($i=0, $n=count($id); $i < $n; $i++) {
			$status=0;
		if($id[$i]==$isactive[0]){
			$status=1;
			}
				 $data=array(
					 'id'         	=> $id[$i],
					 'user_name'    => $username[$i],           
					 'password'     => $password[$i],
					 'sms_from'     => $sms_from[$i],
					 'userid'       => $userid[$i],
					 'status'       => $status,
				 );
				$this->sms_model->update_sms_config($data,$id[$i]);
			}
       $this->session->set_flashdata('message', display('update_successfully'));
	   redirect('settings/9');
    }
	
	    /*sms sms_template*/
    public function sms_template(){
    	$data['template'] = $this->sms_model->template_list();

    	$data['title'] = display('sms_template'); 
		$data['module'] = "dashboard";  
		$this->load->view("sms/sms_template", $data); 
    }


	//save sms template
    public function save_sms_template(){
    	$data=array(			
    		'template_name' => $this->input->post('template_name',TRUE),
    		'type'			=> $this->input->post('type',TRUE),			
    		'message' 	=> $this->input->post('message',TRUE),
    	);

    	$this->sms_model->save_sms_template($data);
		$this->session->set_flashdata('message', display('save_successfully'));
		redirect('settings/10');
    }

//delete template
    public function delete_teamplate($id){
    	$this->db->where('id',$id)->delete('sms_template');
    	$this->session->set_flashdata('message', display('delete_successfully'));
		redirect('settings/12');
    }

    public function template_update(){
    	$data=array(    					
    		'template_name' => $this->input->post('template_name',TRUE),
    		'type'			=> $this->input->post('type',TRUE),			
    		'message' 	=> $this->input->post('message',TRUE),
    	);
    	$this->sms_model->template_update($data);
		$this->session->set_flashdata('message', display('update_successfully'));
		redirect('settings/11');
    }

    public function set_default_template($id=null, $status = null){
    	$this->db->set('default_status', (($status == 1) ? 0 : 1))
    	->where('id', $id)
    	->update('sms_template');
    	$this->session->set_flashdata('message', display('successfully_updated'));
		redirect('settings/12');
    }
}
