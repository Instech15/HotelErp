<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'template_model'
		));
	}
 
	public function layout($data)
	{  
		if (! $this->session->userdata('isLogIn'))
		redirect('login');
		$id = $this->session->userdata('id');
		$data['notifications'] = $this->template_model->notifications($id);
		$data['quick_messages'] = $this->template_model->messages($id);
		$data['setting'] = $this->template_model->setting();
		$this->load->view('layout', $data);
	}
 
	public function login($data)
	{ 
		
		$data['setting'] = $this->template_model->setting();
		$data['web_setting'] = $this->template_model->read(); 
		$this->load->view('login', $data);
	}
 
}
