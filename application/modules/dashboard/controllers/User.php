<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array(
 			'user_model'  
 		));
 		
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 
	public function index()
	{ 
		$data['title']      = display('user_list');
		$data['module'] 	= "dashboard";  
		$data['page']   	= "user/list";   
		$data['user'] = $this->user_model->read();
		echo Modules::run('template/layout', $data); 
	}
 

    public function email_check($email, $id)
    { 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('id',$id) 
            ->get('user')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} is already registered.');
            return false;
        } else {
            return true;
        }
    } 
    public function get_userlist() {
        $data['user'] = $this->user_model->read();

        $this->load->view('user/user_list', $data);
    }
 
	public function form($id = null)
	{ 
		$data['title']    = display('add_user');
		$this->form_validation->set_rules('firstname', display('firstname'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('lastname', display('lastname'),'required|max_length[50]|xss_clean');
		if (empty($id)) {   
			$data['title']    = "Edit User";
       		$this->form_validation->set_rules('email', display('email'), "required|valid_email|is_unique[user.email]|max_length[100]|xss_clean");
		} else {
			$this->form_validation->set_rules('email', display('email'),'required|valid_email|max_length[100]|xss_clean');
		}		$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5|xss_clean');
		$this->form_validation->set_rules('about', display('about'),'max_length[1000]|xss_clean');
		$this->form_validation->set_rules('status', display('status'),'max_length[1]|xss_clean');
        $config['upload_path']          = './assets/img/user/';
		$config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {  
			$data = $this->upload->data();  
            $image = $config['upload_path'].$data['file_name']; 
			$config['image_library']  = 'gd2';
			$config['source_image']   = $image;
			$config['create_thumb']   = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 115;
			$config['height']         = 90;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->session->set_flashdata('message', display('image_upload_successfully'));
        }
			$data['user'] = (object)$userLevelData = array(
			'id' 		  => $this->input->post('id', TRUE),
			'firstname'   => $this->input->post('firstname',TRUE),
			'lastname' 	  => $this->input->post('lastname',TRUE),
			'email' 	  => $this->input->post('email',TRUE),
			'password' 	  => md5($this->input->post('password')),
			'about' 	  => $this->input->post('about',TRUE),
			'image'   	  => (!empty($image)?$image:$this->input->post('old_image',TRUE)),
			'last_login'  => null,
			'last_logout' => null,
			'ip_address'  => null,
			'status'      => $this->input->post('status',TRUE),
			'usertype'    => 1,
			'is_admin'    => 0
		);


		if ($this->form_validation->run()) {

	        if (empty($userLevelData['image'])) {
				$error= $this->upload->display_errors();
				$error="You did not select any valid image to upload as your profile picture.";
				$this->session->set_flashdata('exception', $error); 
	        }

			if (empty($userLevelData['id'])) {
				if ($this->user_model->create($userLevelData)) {
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect("add-user");

			} else {
				if ($this->user_model->update($userLevelData)) {						
					$empData = array(
					'first_name' 	          => $this->input->post('firstname',TRUE),
					'last_name' 	          	  => $this->input->post('lastname',TRUE),
					'email' 	              => $this->input->post('email',TRUE),
					'picture' 	              => (!empty($image)?$image:$this->input->post('old_image',TRUE)),
					
				);
				$this->db->where('emp_his_id', $userLevelData["id"]);
				$this->db->update('employee_history', $empData);
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				redirect("settings/21");
			}


		} else {
			$data['module'] = "dashboard";  
			$data['page']   = "user/form"; 
			if(!empty($id))
			$data['user']   = $this->user_model->single($id);
			echo Modules::run('template/layout', $data);
		}
	}

	public function delete($id = null)
	{ 
		if ($this->user_model->delete($id)) {
			$this->db->where('employee_id',$id)
			->delete('employee_history');
		if ($this->db->affected_rows()) { 
			$this->db->where('employee_id',$id)
			->delete('custom_table');
			$this->db->where('employee_id',$id)
			->delete('employee_benifit');
		}
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
		}

		redirect("user-list");
	}
}
