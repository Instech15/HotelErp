<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array(
 			'module_permission_model',
 			'module_model', 
 			'role_model'
 		));
 		
		if (! $this->session->userdata('isAdmin'))
			redirect('login');
 	}
 



	public function create_system_role()
	{
		$data['title']      = display('assign_role');
		$data['module'] 	= "dashboard"; 
		$data['modules'] = $this->db->select('*')->from('sec_menu_item')->group_by('module')->get()->result();
		$data['page']   	= "role/_create_system_role";   
		echo Modules::run('template/layout', $data); 
	}

	public function get_rolepermissionform() {
        $data['title'] = display('add_role');
        $data['modules'] = $this->db->select('*')->from('sec_menu_item')->group_by('module')->get()->result();
        $this->load->view('role/_create_system_role', $data);
    }


 public function save_create(){

/*-----------------------------------*/ 
		$this->form_validation->set_rules('role_name', display('role_name'),'required|max_length[100]|is_unique[sec_role_tbl.role_name]|xss_clean');

		if ($this->form_validation->run()==TRUE) {

			$rolData = array(
				'role_name' 		=> $this->input->post('role_name',TRUE),
				'role_description' 	=> $this->input->post('role_description',TRUE),
				'create_by' 		=> $this->session->userdata('id'),
				'date_time' 		=> date('Y-m-d h:i:s')
			);


		$this->db->insert('sec_role_tbl', $rolData);
		$role_id = $this->db->insert_id();

		$module  	   = $this->input->post('module',TRUE); 
		$menu_id  	   = $this->input->post('menu_id',TRUE); 
		$create  	   = $this->input->post('create',TRUE);
		$read  		   = $this->input->post('read',TRUE);
		$update  	   = $this->input->post('edit',TRUE);
		$delete  	   = $this->input->post('delete',TRUE);
 
 		$new_array = array();
 		for($m=0; $m < sizeof($module); $m++) {

			for($i=0; $i < sizeof($menu_id[$m]); $i++) {

				for($j=0; $j < sizeof($menu_id[$m][$i]); $j++ ) { 
					
					$dataStore = array(
						'role_id'   	=> $role_id,
						'menu_id'   	=> $menu_id[$m][$i][$j], 
						'can_create'   	=> (!empty($create[$m][$i][$j])?$create[$m][$i][$j]:0), 
						'can_edit'     	=> (!empty($update[$m][$i][$j])?$update[$m][$i][$j]:0), 
						'can_access'  	=> (!empty($read[$m][$i][$j])?$read[$m][$i][$j]:0), 
						'can_delete'   	=> (!empty($delete[$m][$i][$j])?$delete[$m][$i][$j]:0),
						'createby'		=> $this->session->userdata('id'),
						'createdate'	=> date('Y-m-d h:i:s'),
					); 

					array_push($new_array, $dataStore);

				}
			}
		}
       
			if ($this->role_model->create($new_array)) {
				$this->session->set_flashdata('message', display('save_successfully'));
			} else {
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			redirect('settings/1');

		} else {
			$data['title']      = display('add_role');
			$data['module'] 	= "dashboard";  
			$data['modules'] = $this->db->select('*')->from('sec_menu_item')->group_by('module')->get()->result();
			$data['page']   	= "role/_create_system_role";   
			echo Modules::run('template/layout', $data); 	
		}


 }

	public function role_list(){

		$data['title']      = display('role_listassign');
		$data['module'] 	= "dashboard";  
		$data['role_list'] = $this->db->select('*')->from('sec_role_tbl')->order_by('role_id','desc')->get()->result();
        $this->load->view('role/_role_list', $data);
	}


public function edit_role($id=null)
{

		$data['title']      = display('edit_role');
		$data['module'] 	= "dashboard";  

		$data['modules'] = $this->db->select('*')->from('sec_menu_item')->group_by('module')->get()->result();

		$data['roleData'] = $this->db->select('*')
		->from('sec_role_tbl')
		->where('role_id',$id)
		->get()->row();

		$data['roleAcc'] = $this->db->select('sec_role_permission.*,sec_menu_item.menu_title')
		->from('sec_role_permission')
		->join('sec_menu_item','sec_menu_item.menu_id=sec_role_permission.menu_id')
		->where('role_id',$id)
		->get()->result();

		$data['page']   	= "role/edit_role";   
		echo Modules::run('template/layout', $data); 


}


	public function save_update()
	{
		$this->form_validation->set_rules('role_name', display('role_name'),'required|max_length[100]|xss_clean');
		$role_id = $this->input->post('role_id', TRUE);

		if ($this->form_validation->run()==TRUE) {

			$rolData = array(
				'role_name' 		=> $this->input->post('role_name',TRUE),
				'role_description' 	=> $this->input->post('role_description',TRUE)
			);
			$this->db->where('role_id',$role_id)->update('sec_role_tbl',$rolData);


		$module  	   = $this->input->post('module',TRUE); 
		$menu_id  	   = $this->input->post('menu_id',TRUE); 
		$create  	   = $this->input->post('create',TRUE);
		$read  		   = $this->input->post('read',TRUE);
		$update  	   = $this->input->post('edit',TRUE);
		$delete  	   = $this->input->post('delete',TRUE);
 
 $new_array = array();
 		for($m=0; $m < sizeof($module); $m++) {

			for($i=0; $i < sizeof($menu_id[$m]); $i++) {

				for($j=0; $j < sizeof($menu_id[$m][$i]); $j++ ) { 
					$dataStore = array(
						'role_id'   => $role_id,
						'menu_id'   => $menu_id[$m][$i][$j], 
						'can_create'   => (!empty($create[$m][$i][$j])?$create[$m][$i][$j]:0), 
						'can_edit'     => (!empty($update[$m][$i][$j])?$update[$m][$i][$j]:0), 
						'can_access'   => (!empty($read[$m][$i][$j])?$read[$m][$i][$j]:0), 
						'can_delete'   => (!empty($delete[$m][$i][$j])?$delete[$m][$i][$j]:0),
						'createby'		=> $this->session->userdata('id'),
						'createdate'	=> date('Y-m-d h:i:s'),
					); 

					array_push($new_array, $dataStore);

				}
			}
		}


			if ($this->role_model->create($new_array)) {
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				$this->session->set_flashdata('exception', display('please_try_again'));
			}

			redirect('settings/31');

		} else{

			$data['title']      = display('edit_role');
			$data['module'] 	= "dashboard";  

			$data['modules'] = $this->db->select('*')->from('sec_menu_item')->group_by('module')->get()->result();

			$data['roleData'] = $this->db->select('*')
			->from('sec_role_tbl')
			->where('role_id',$id)
			->get()->row();

			$data['roleAcc'] = $this->db->select('sec_role_permission.*,sec_menu_item.menu_title')
			->from('sec_role_permission')
			->join('sec_menu_item','sec_menu_item.menu_id=sec_role_permission.menu_id')
			->where('role_id',$id)
			->get()->result();

			$data['page']   	= "role/edit_role";   
			echo Modules::run('template/layout', $data); 

		}

	}


  	public function delete_role($id=null)
	{
		$delete = $this->db->where('role_id',$id)->delete('sec_role_tbl');
		$delete = $this->db->where('role_id',$id)->delete('sec_role_permission');

		if ($delete) {
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect("assign-role-list");

	}




	public function user_access_role(){

		$data['title']      	= "User Access";
		$data['module']     	= "dashboard";  
		$data['user_access_role'] = $this->db->select('sec_user_access_tbl.*,sec_role_tbl.*,user.firstname,user.lastname')
		->from('sec_user_access_tbl')
		->join('user','user.id=sec_user_access_tbl.fk_user_id')
		->join('sec_role_tbl','sec_role_tbl.role_id=sec_user_access_tbl.fk_role_id')
		->order_by('sec_user_access_tbl.fk_user_id','desc')
		->get()->result();
		$this->load->view("role/user_access_role", $data); 
	}



	public function assign_role_to_user(){
		$data['title']      = " Assing Role To User";
		$data['module'] 	= "dashboard";  
		$data['role'] 			= $this->db->select('role_name,role_id')->from('sec_role_tbl')->get()->result();

		$data['user'] 			= $this->db->select('id,firstname,lastname')
								->from('user')
								->where('is_admin!=',1)
								->get()
								->result();
        $this->load->view('role/_assign_role_to_user', $data);
	}




	public function save_role_access()
	{
		$new_array = array();
		$role_id = $this->input->post('role',TRUE);
		$user_id = $this->input->post('user_id',TRUE);
		$emp_id = $this->input->post('emp_id',TRUE);

		for($j=0; $j < sizeof($role_id); $j++ ) { 
			$rolData = array(
				'fk_role_id' 	=> $role_id[$j],
				'fk_user_id' 	=> $user_id
			);
			array_push($new_array, $rolData);
		}
		$this->db->where('fk_user_id', $new_array[0]['fk_user_id'])->delete('sec_user_access_tbl');
		$this->db->insert_batch('sec_user_access_tbl', $new_array);
		$this->session->set_flashdata('message', display('save_successfully'));
        redirect('settings/3');		
	}




  	public function edit_access_role($id=null)
	{
		$data['title']      	= display('edit');
		$data['module']     	= "dashboard";  
		$data['page']       	= "role/edit_role_access"; 
		$data['role'] 			= $this->db->select('role_name,role_id')->from('sec_role_tbl')->get()->result();
		$data['user'] 			= $this->db->select('id,firstname,lastname')
								->from('user')
								->where('is_admin!=',1)
								->get()
								->result();
		$data['info'] = $this->db->select('*')->from('sec_user_access_tbl')->where('role_acc_id',$id)->get()->row();
        $this->load->view('role/edit_role_access', $data);
	}


	public function update_access_role()
	{

		$new_array = array();
		$role_id = $this->input->post('role', TRUE);
		$user_id = $this->input->post('user_id', TRUE);

		for($j=0; $j < sizeof($role_id); $j++ ) { 
			$rolData = array(
				'fk_role_id' 	=> $role_id[$j],
				'fk_user_id' 	=> $user_id
			);
			array_push($new_array, $rolData);
		}
		$this->db->where('fk_user_id', $new_array[0]['fk_user_id'])->delete('sec_user_access_tbl');
		$this->db->insert_batch('sec_user_access_tbl', $new_array);
		$this->session->set_flashdata('message', display('update_successfully'));

		redirect('settings/4');		

	}


	public function delete_access_role($id)
	{
		$this->db->where('role_acc_id',$id)->delete('sec_user_access_tbl');
		$this->session->set_flashdata('message', display('delete_successfully'));
		redirect("user-access");

	}


}
