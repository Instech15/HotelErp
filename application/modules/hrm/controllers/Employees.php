<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'Employees_model',
			'Country_model'
			
		));	
	}

	/* ################ Employee Salary Setup Start   #######################....*/

	public function emp_salary_setup_view()
	{   
		$this->permission->module('hrm','read')->redirect();

		$data['title']    = display('view_salary_setup');  ;
		$data['emp_sl']   = $this->Employees_model->salary_setupView();
		$data['module']   = "hrm";
		$data['page']     = "emp_sal_setupview";   
		echo Modules::run('template/layout', $data); 
	} 


	public function create_salary_setup()
	{ 
		$data['title'] = display('selectionlist');
		$this->form_validation->set_rules('emp_sal_name',display('emp_sal_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('emp_sal_type',display('emp_sal_type'),'xss_clean');
		
		if ($this->form_validation->run() === true) {

			$postData =array(
				'emp_sal_name'           => $this->input->post('emp_sal_name',TRUE),
				'emp_sal_type' 	         => $this->input->post('emp_sal_type',TRUE),	
			);   

			if ($this->Employees_model->emp_salsetup_create($postData)) { 
				$this->session->set_flashdata('message', display('message_sent'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/Employees/create_salary_setup");



		} else {
			$data['title']  = display('create');
			$data['module'] = "hrm";
			$data['page']   = "emp_salarysetup_form"; 
			echo Modules::run('template/layout', $data);   
		}   
	}
	public function delete_emp_salarysetup($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Employees_model->emp_salstup_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/Employees/emp_salary_setup_view");
	}




	public function update_salsetup_form($id = null){
		$this->form_validation->set_rules('emp_sal_set_id',null,'required|max_length[11]|xss_clean');
		$this->form_validation->set_rules('emp_sal_name',display('emp_sal_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('emp_sal_type',display('emp_sal_type')  ,'required|max_length[20]|xss_clean');
		if ($this->form_validation->run() === true) {

			$postData = [
				'emp_sal_set_id' 	         => $this->input->post('emp_sal_set_id',TRUE),
				'emp_sal_name' 	             => $this->input->post('emp_sal_name',TRUE),
				'emp_sal_type' 		         => $this->input->post('emp_sal_type',TRUE),
			]; 
			
			if ($this->Employees_model->update_em_salstup($postData)) { 
				$this->session->set_flashdata('message', display('message_sent'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/Employees/update_salsetup_form/". $id);

		} else {
			$data['title']  = display('update');
			$data['data']   =$this->Employees_model->salarysetup_updateForm($id);
			$data['module'] = "hrm";
			$data['page']   = "update_salarysetup_form";   
			echo Modules::run('template/layout', $data); 
		}

	}

	/* ################ Employee Salary Setup End   #######################....*/

/* ################ Employee Performance Start   #######################....*/

public function emp_performance_view()
{   
	$this->permission->module('hrm','read')->redirect();

	$data['title']         = display('emp_performance');  ;
	$data['emp_perform']   = $this->Employees_model->emp_performanceView();
	$data['module']        = "hrm";
	$data['page']          = "emp_performanceview";   
	echo Modules::run('template/layout', $data); 
} 


public function create_emp_performance()
{ 
	$data['title'] = display('performancelist');
	$this->form_validation->set_rules('employee_id',display('employee_id'),'required|max_length[50]|xss_clean');
	$this->form_validation->set_rules('note',display('note'),'xss_clean');
	$this->form_validation->set_rules('date',display('date'),'xss_clean');
	$this->form_validation->set_rules('number_of_star',display('number_of_star'),'xss_clean');
	$this->form_validation->set_rules('status',display('status'),'xss_clean');
	if ($this->form_validation->run() === true) {
		$postData = array(
			'employee_id'            => $this->input->post('employee_id',TRUE),
			'note' 	                 => $this->input->post('note',TRUE),
			'date'                   => $this->input->post('date',TRUE),
			'note_by' 	             =>  $this->session->userdata('fullname'),
			'number_of_star'         => $this->input->post('number_of_star',TRUE),
			'status' 	             => $this->input->post('status',TRUE),				
			'updated_by' 	         => $this->session->userdata('fullname'),				
		);   

		if ($this->Employees_model->emp_performance_create($postData)) { 
			$this->session->set_flashdata('message', display('successfully_saved'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("hrm/employee-perfomance");
	} else {
		$data['title']  = display('emp_performance');
		$data['module'] = "hrm";
		$data['page']   = "emp_performance_form"; 
		$data['employee'] = $this->Employees_model->employee();
		$data['emp_perform']   = $this->Employees_model->emp_performanceView();
		echo Modules::run('template/layout', $data);   

	}   
}
public function delete_emp_performance($id = null) 
{ 
	$this->permission->module('hrm','delete')->redirect();

	if ($this->Employees_model->emp_performance_delete($id)) {
			#set success message
		$this->session->set_flashdata('message',display('delete_successfully'));
	} else {
			#set exception message
		$this->session->set_flashdata('exception',display('please_try_again'));
	}
	redirect("hrm/manage-employee-perfomance");
}



public function update_emp_performance_form($id = null){
	$this->form_validation->set_rules('emp_per_id',null,'max_length[11]|xss_clean');
	$this->form_validation->set_rules('employee_id',display('employee_id'),'max_length[50]|xss_clean');
	$this->form_validation->set_rules('note',display('note'),'xss_clean');
	$this->form_validation->set_rules('date',display('date'),'xss_clean');
	$this->form_validation->set_rules('note_by',display('note_by'),'xss_clean');
	$this->form_validation->set_rules('number_of_star',display('number_of_star'),'xss_clean');
	$this->form_validation->set_rules('status',display('status'),'xss_clean');

	if ($this->form_validation->run() === true) {

		$postData = array(
			'emp_per_id' 	         => $this->input->post('emp_per_id',TRUE),
			'employee_id'            => $this->input->post('employee_id',TRUE),
			'note' 	                 => $this->input->post('note',TRUE),
			'date'                   => $this->input->post('date',TRUE),
			'note_by' 	             => $this->input->post('note_by',TRUE),
			'number_of_star'         => $this->input->post('number_of_star',TRUE),
			'status' 	             => $this->input->post('status',TRUE),
			'updated_by' 	         => $this->session->userdata('fullname'),
		); 

		if ($this->Employees_model->update_em_performance($postData)) { 
			$this->session->set_flashdata('message', display('successfully_updated'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("hrm/employe-performance-update/". $id);

	} else {
		$data['title']  = display('update');
		$data['data']   =$this->Employees_model->emp_performance_updateForm($id);
		$data['query']   =$this->Employees_model->get_performaceempid($id);
		$data['employee'] = $this->Employees_model->employee();
		$data['module'] = "hrm";
		$data['page']   = "update_performance_form";   
		echo Modules::run('template/layout', $data); 
	}

}

/* ################ Employee Performance End   #######################....*/


/* ################ Employee Payment start   #######################....*/
public function emp_payment_view()
{   
	$this->permission->module('hrm','read')->redirect();
	$data['title']         = display('employee_payment');
	$data['emp_pay']       = $this->Employees_model->emp_paymentView();
	$data['module']        = "hrm";
	$data['page']          = "paymentview";   
	echo Modules::run('template/layout', $data); 
} 
public function create_payment()
{ 
	$data['title'] = display('add_payment');
	$this->form_validation->set_rules('employee_id',display('employee_id'),'max_length[50]|xss_clean');
	$this->form_validation->set_rules('total_salary',display('total_salary'),'xss_clean');
	$this->form_validation->set_rules('total_working_minutes',display('total_working_minutes'),'xss_clean');
	$this->form_validation->set_rules('working_period',display('working_period'),'xss_clean');
	$this->form_validation->set_rules('payment_due',display('payment_due'),'xss_clean');
	$this->form_validation->set_rules('payment_date',display('payment_date'),'xss_clean');
	$this->form_validation->set_rules('paid_by',display('paid_by'),'xss_clean');


	if ($this->form_validation->run() === true) {

		$postData = array(
			'employee_id'                  => $this->input->post('employee_id',TRUE),
			'total_salary' 	               => $this->input->post('total_salary',TRUE),
			'total_working_minutes'        => $this->input->post('total_working_minutes',TRUE),
			'working_period' 	           => $this->input->post('working_period',TRUE),
			'payment_due'                  => $this->input->post('payment_due',TRUE),
			'payment_date' 	               => $this->input->post('payment_date',TRUE),
			'paid_by' 	                   => $this->input->post('paid_by',TRUE),
		);   

		if ($this->Employees_model->create_employee_payment($postData)) { 
			$this->session->set_flashdata('message', display('message_sent'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("hrm/Employees/create_payment");



	} else {
		$data['title']  = display('create');
		$data['module'] = "hrm";
		$data['page']   = "emp_payment_form"; 
		echo Modules::run('template/layout', $data);   

	}   
}



public function delete_payment($id = null) 
{ 
	$this->permission->module('hrm','delete')->redirect();

	if ($this->Employees_model->emp_payment_delete($id)) {
			#set success message
		$this->session->set_flashdata('message',display('delete_successfully'));
	} else {
			#set exception message
		$this->session->set_flashdata('exception',display('please_try_again'));
	}
	redirect("hrm/employee-payment");
}


public function update_payment_form($id = null){
	$this->form_validation->set_rules('emp_sal_pay_id',null,'required|max_length[11]|xss_clean');
	$this->form_validation->set_rules('employee_id',display('employee_id'),'max_length[50]|xss_clean');
	$this->form_validation->set_rules('total_salary',display('total_salary'),'xss_clean');
	$this->form_validation->set_rules('total_working_minutes',display('total_working_minutes'),'xss_clean');
	$this->form_validation->set_rules('working_period',display('working_period'),'xss_clean');
	$this->form_validation->set_rules('payment_due',display('payment_due'),'xss_clean');
	$this->form_validation->set_rules('payment_date',display('payment_date'),'xss_clean');

	if ($this->form_validation->run() === true) {

		$postData = array(
			'emp_sal_pay_id' 	           => $this->input->post('emp_sal_pay_id',TRUE),
			'employee_id'                  => $this->input->post('employee_id',TRUE),
			'total_salary' 	               => $this->input->post('total_salary',TRUE),
			'total_working_minutes'        => $this->input->post('total_working_minutes',TRUE),
			'working_period' 	           => $this->input->post('working_period',TRUE),
			'payment_due'                  => $this->input->post('payment_due',TRUE),
			'payment_date' 	               => $this->input->post('payment_date',TRUE),
			'paid_by' 	                   => $this->session->userdata('fullname'),
		); 

		if ($this->Employees_model->update_payment($postData)) { 
			$this->session->set_flashdata('message', display('successfully_paid'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("hrm/Employees/emp_payment_view/". $id);

	} else {
		$data['title']  = display('update');
		$data['data']   =$this->Employees_model->payment_updateForm($id);
		$data['module'] = "hrm";
		$data['page']   = "update_payment_form";   
		echo Modules::run('template/layout', $data); 
	}

}

/* ################ Employee Payment end   #######################....*/



/* ################ Employee Salary Pay Type Start   #######################....*/


public function emp_sal_payType_view()
{   
	$this->permission->module('hrm','read')->redirect();

	$data['title']         = display('view_employee_payment');  ;
	$data['paytype']       = $this->Employees_model->emp_salPaytypeView();
	$data['module']        = "hrm";
	$data['page']          = "sal_pay_type_tview";   
	echo Modules::run('template/layout', $data); 
} 

public function create_payment_type(){
	$data['title'] = display('add_payment_type');
	$this->form_validation->set_rules('payment_period',display('payment_period'),'required|max_length[50]|xss_clean');
	if ($this->form_validation->run() === true) {

		$postData =array(
			'payment_period'    => $this->input->post('payment_period',TRUE),
		);   

		if ($this->Employees_model->insert_payment_type($postData)) { 
			$this->session->set_flashdata('message', display('message_sent'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("hrm/Employees/create_payment_type");



	} else {
		$data['title']  = display('create');
		$data['module'] = "hrm";
		$data['page']   = "emp_payment_type_form"; 
		echo Modules::run('template/layout', $data);   

	}   
}

public function delete_payment_type($id = null) 
{ 
	$this->permission->module('hrm','delete')->redirect();

	if ($this->Employees_model->emp_payment_type_delete($id)) {
			#set success message
		$this->session->set_flashdata('message',display('delete_successfully'));
	} else {
			#set exception message
		$this->session->set_flashdata('exception',display('please_try_again'));
	}
	redirect("hrm/Employees/emp_sal_payType_view");
}




/* cv    */
public function cv()
{   
	$this->permission->module('hrm','read')->redirect();

	$data['title']    = display('view details');  
	$id              = $this->uri->segment(4);
	$data['row']      = $this->Employees_model->employee_details($id);
	$data['edu']      = $this->Employees_model->updateedu($id);
	$data['benifit']  = $this->Employees_model->benifit($id);
	$data['award']    = $this->Employees_model->award($id);
	$data['perform']  = $this->Employees_model->performance($id);
		$data['module']   = "hrm";
		$data['page']     = "resumepdf";  
		echo Modules::run('template/layout', $data); 
	} 

	/* ########## NEW EMPLOYEE ADD ################*/
	public function viewEmhistory()
	{   
		$this->permission->module('hrm','read')->redirect();

		$data['title']    = display('view_salary_setup');  ;
		$data['emp_history']   = $this->Employees_model->emp_historyview();
		$data['module']   = "hrm";
		$data['designation'] = $this->Employees_model->designation();
		$data['dropdowndept'] = $this->Employees_model->dropdowndept();
		$data['supervisor'] = $this->Employees_model->supervisorlist();
		$data['country_list'] = $this->Country_model->state();
		$data['allcountry'] = $this->Employees_model->allcountry();
		$data['page']     = "employ_form";   
		echo Modules::run('template/layout', $data); 
	} 
	public function statelist(){
		$country=$this->input->post('country', TRUE);
		$data['state_list'] = $this->Employees_model->statelist($country);
		$data['module'] = "hrm";  
		$data['page']   = "statelist";
		$this->load->view('hrm/statelist', $data); 
		}

	public function manageemployee()
	{   
		$this->permission->module('hrm','read')->redirect();

		$data['title']    = display('view_salary_setup');  ;
		$data['emp_history']   = $this->Employees_model->emp_list();
		$data['module']   = "hrm";
		$data['page']     = "employee_view";   
		echo Modules::run('template/layout', $data); 
	} 

	public function create_employee()
	{ 
		/***** file upload code start ***********/ 

		$data['title'] = display('create_employee');


		$this->form_validation->set_rules('first_name',display('first_name'),'max_length[50]|xss_clean');
		$this->form_validation->set_rules('pos_id',display('position_name'),'max_length[50]|xss_clean');
		$this->load->library('fileupload');
		$img =  $this->fileupload->do_upload('./application/modules/hrm/assets/images/', 'picture');
		$this->form_validation->set_rules('c_f_name[]','Custom Field Name','xss_clean');
		$this->form_validation->set_rules('c_f_type[]','Custom Field Type','xss_clean');
		$this->form_validation->set_rules('customvalue[]','Custom Value','xss_clean');
		$employee_id = $this->randID();
		$customr_field = $this->input->post('c_f_name',TRUE);
		$customr_field_type = $this->input->post('c_f_type',TRUE);
		$customr_value = $this->input->post('customvalue',TRUE);
		$benifit_code = $this->input->post('benifit_c_code',TRUE);
		$benifit_code_desc = $this->input->post('benifit_c_code_d',TRUE);
		$benifit_acc_date = $this->input->post('benifit_acc_date',TRUE);
		$benift_status = $this->input->post('benifit_sst',TRUE);
		$getid = $this->db->select("id")->from("user")->order_by("id","desc")->get()->row();
		$ehid = $getid->id+1;
		if ($this->form_validation->run() === true) {
			 $this->load->library('fileupload');
			$postData = array(
				'emp_his_id'             => $ehid,
				'employee_id'             => $employee_id,
				'pos_id' 	              => $this->input->post('pos_id',TRUE),
				'first_name' 	          => $this->input->post('first_name',TRUE),
				'middle_name'             => $this->input->post('middle_name',TRUE),
				'last_name' 	          => $this->input->post('last_name',TRUE),
				'maiden_name'             => $this->input->post('maiden_name',TRUE),
				'email' 	              => $this->input->post('email',TRUE),
				'phone' 	              => $this->input->post('phone',TRUE),
				'alter_phone' 	          => $this->input->post('alter_phone',TRUE),
				'present_address' 	      => $this->input->post('present_address',TRUE),
				'parmanent_address' 	  => $this->input->post('parmanent_address',TRUE),
				'picture' 	              => $img,
				'dept_id'                 => $this->input->post('division',TRUE),
				'country'                 => $this->input->post('country',TRUE),
				'state'                   => $this->input->post('state',TRUE),
				'city'                    => $this->input->post('city',TRUE),
				'zip'                     => $this->input->post('zip_code',TRUE),
				'citizenship'             => $this->input->post('citizenship',TRUE),
				'duty_type'               => $this->input->post('duty_type',TRUE),
				'hire_date'               => date("Y-m-d", strtotime(!empty($this->input->post('hiredate',TRUE))?$this->input->post('hiredate',TRUE):date('Y-m-d'))),
				'original_hire_date'      => date("Y-m-d", strtotime(!empty($this->input->post('ohiredate',TRUE))?$this->input->post('ohiredate',TRUE):date('Y-m-d'))),
				'termination_date'        => date("Y-m-d", strtotime(!empty($this->input->post('terminatedate',TRUE))?$this->input->post('terminatedate',TRUE):date('Y-m-d'))),
				'termination_reason'      => $this->input->post('termreason',TRUE),
				'voluntary_termination'   => $this->input->post('volunt_termination',TRUE),
				'rehire_date'             => date("Y-m-d", strtotime(!empty($this->input->post('rehiredate',TRUE))?$this->input->post('rehiredate',TRUE):date('Y-m-d'))),
				'rate_type'               => $this->input->post('rate_type',TRUE),
				'rate'                    => $this->input->post('rate',TRUE),
				'pay_frequency'           => $this->input->post('pay_frequency',TRUE),
				'pay_frequency_txt'       => $this->input->post('pay_f_text',TRUE),
				'hourly_rate2'            => $this->input->post('h_rate2',TRUE),
				'hourly_rate3'            => $this->input->post('h_rate3',TRUE),
				'home_department'         => $this->input->post('h_department',TRUE),
				'department_text'         => $this->input->post('h_dep_text',TRUE),
				'class_code'              => $this->input->post('c_code',TRUE),
				'class_code_desc'         => $this->input->post('c_code_d',true),
				'class_acc_date'          => date("Y-m-d", strtotime(!empty($this->input->post('class_acc_date',TRUE))?$this->input->post('class_acc_date',TRUE):date('Y-m-d'))),
				'class_status'            =>  $this->input->post('class_sst',TRUE),
				'is_super_visor'          => $this->input->post('supervisorname',TRUE),
				'super_visor_id'          => $this->input->post('is_supervisor',TRUE),
				'supervisor_report'       => $this->input->post('reports',TRUE),
				'dob'                     => date("Y-m-d", strtotime(!empty($this->input->post('dob',TRUE))?$this->input->post('dob',TRUE):date('Y-m-d'))),
				'gender'                  => $this->input->post('gender',TRUE),
				'marital_status'          => $this->input->post('marital_status',TRUE),
				'ethnic_group'            => $this->input->post('ethnic',TRUE),
				'eeo_class_gp'            => $this->input->post('eeo_class',TRUE),
				'ssn'                     => $this->input->post('ssn',TRUE),
				'work_in_state'           => $this->input->post('w_s',TRUE),
				'live_in_state'           => $this->input->post('l_in_s',TRUE),
				'home_email'              => $this->input->post('h_email',TRUE),
				'business_email'          => $this->input->post('b_email',TRUE),
				'home_phone'              => $this->input->post('h_phone',TRUE),
				'business_phone'          => $this->input->post('w_phone',TRUE),
				'cell_phone'              => $this->input->post('c_phone',TRUE),
				'emerg_contct'            => $this->input->post('em_contact',TRUE),
				'emrg_h_phone'            => $this->input->post('e_h_phone',TRUE),
				'emrg_w_phone'            => $this->input->post('e_w_phone',TRUE),
				'emgr_contct_relation'    => $this->input->post('e_c_relation',TRUE),
				'alt_em_contct'           => $this->input->post('alt_em_cont',TRUE),
				'alt_emg_h_phone'         => $this->input->post('a_e_h_phone',TRUE),
				'alt_emg_w_phone'         => $this->input->post('a_e_w_phone',TRUE),
			);    
			$coa = $this->Employees_model->headcode();
			if($coa->HeadCode!=NULL){
				$headcode=$coa->HeadCode+1;
			}else{
				$headcode="502020000001";
			}

			$c_code = $employee_id;
			$c_name = $this->input->post('first_name', TRUE).$this->input->post('last_name',TRUE);
			$c_acc=$c_code.'-'.$c_name;
			$createby = $this->session->userdata('fullname');
			$createdate = date('Y-m-d H:i:s');
			$data['aco']  = (Object) $coaData = array(
				'HeadCode'         => $headcode,
				'HeadName'         => $c_acc,
				'PHeadName'        => 'Account Payable',
				'HeadLevel'        => '2',
				'IsActive'         => '1',
				'IsTransaction'    => '1',
				'IsGL'             => '0',
				'HeadType'         => 'L',
				'IsBudget'         => '0',
				'IsDepreciation'   => '0',
				'DepreciationRate' => '0',
				'CreateBy'         => $createby,
				'CreateDate'       => $createdate,
			);

			if($this->db->insert('employee_history', $postData)){
				$empid = $this->db->insert_id();
					$userData = array(
					'firstname' 	          => $this->input->post('first_name',TRUE),
					'lastname' 	          	  => $this->input->post('last_name',TRUE),
					'email' 	              => $this->input->post('email',TRUE),
					'password' 	              =>  md5($this->input->post('password')),
					'usertype' 	              => 2,
					'image' 	              => $img,
				
			);
			$this->db->insert('user', $userData);
				$this->Employees_model->create_coa($coaData);
				for ($i=0; $i < count($customr_field); $i++) {
					$custom = array(
						'custom_field'            =>  $customr_field[$i],
						'custom_data_type' 	      => $customr_field_type[$i],
						'custom_data' 	          => $customr_value[$i],
						'employee_id' 	          => $employee_id,
					);
					if(!empty($customr_field[$i])){
						$this->db->insert('custom_table', $custom);
					}
				}

				for ($i=0; $i < count($benifit_code); $i++) {

					$benifit = array(
						'bnf_cl_code'           =>  $benifit_code[$i],
						'bnf_cl_code_des' 	    => $benifit_code_desc[$i],
						'bnff_acural_date' 	    => date("Y-m-d", strtotime(!empty($benifit_acc_date[$i])?$benifit_acc_date[$i]:date('Y-m-d'))),
						'bnf_status'            => $benift_status[$i],
						'employee_id' 	        => $employee_id,
					);
					if(!empty($benifit_code[$i])){
						$this->db->insert('employee_benifit', $benifit);
					}
				}


				$this->session->set_flashdata('message', display('save_successfully'));
				redirect("hrm/manage-employee");
			}
		} else {
			$data['title'] = display('create');
			$data['module'] = "hrm";
			$data['dropdowndept'] = $this->Employees_model->dropdowndept();
			$data['dropdown'] = $this->Employees_model->dropdown();
			$data['allcountry'] = $this->Employees_model->allcountry();
			
			$data['page']   = "employ_form"; 


			echo Modules::run('template/layout', $data);   
			
		}   
	}
	public function delete_employhistory($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();
 
		if ($this->Employees_model->emplyee_history_delete($id)) {
			$this->db->where('id', $id)
			->where_not_in('is_admin',1)
			->delete("user");
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/manage-employee");
	}


	public function download($id)
	{
        # load download helper
		$this->load->helper('download');
        # search for filename by id
		$id = $this->uri->segment(4);
		$this->db->select('*');
		$this->db->where('employee_id', $id);
		$q = $this->db->get('employee_history');
        # if exists continue
		if($q->num_rows() > 0)
		{
			$row  = $q->row();
			$file = FCPATH . 'files/'. $row->filename;
			if(file_exists($file))
				force_download($file, NULL);
		}
		else
			show_404();
	}
	public   function DOWNLOAD_pdf(){
		$data=array();
		$data['cv']=$this->Employees_model->employee_details();
		$html=$this->load->view('cv',$data,TRUE);
		pdf_create($html,'User List');
	}

	public function position_view()
	{   
		$this->permission->module('hrm','read')->redirect();

		$data['title']    = display('circularprocess_list');  ;
		$data['position'] = $this->Employees_model->viewPosition();
		$data['module'] = "hrm";
		$data['page']   = "positionview";   
		echo Modules::run('template/layout', $data); 
	} 


	
	public function create_position()
	{ 
		$data['title'] = display('employee');
		$this->form_validation->set_rules('position_name',display('position_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('position_details',display('position_details')  ,'max_length[200]|xss_clean');
		if ($this->form_validation->run() === true) {

			$postData = array(
				'position_name' 	 => $this->input->post('position_name',TRUE),
				'position_details' 	 => $this->input->post('position_details',TRUE),
			);   

			if ($this->Employees_model->position_create($postData)) { 
				$this->session->set_flashdata('message', display('successfully_saved'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/position-list-details");



		} else {
			$data['module'] = "hrm";
			$data['position'] = $this->Employees_model->viewPosition();

			$data['page']   = "position_form"; 
			echo Modules::run('template/layout', $data);   
			
		}   
	}



	public function delete_pos($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Employees_model->delete_p($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('hrm/manage-position');
	}

	public function update_form($id = null){
		$this->form_validation->set_rules('pos_id',null,'required|max_length[11]|xss_clean');
		$this->form_validation->set_rules('position_name',display('position_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('position_details',display('position_details')  ,'max_length[200]|xss_clean');



		if ($this->form_validation->run() === true) {

			$postData =array(
				'pos_id' 	               => $this->input->post('pos_id',TRUE),
				'position_name' 	       => $this->input->post('position_name',TRUE),
				'position_details' 	       => $this->input->post('position_details',TRUE),
			); 
			
			if ($this->Employees_model->update_position($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect('hrm/manage-position');

		} else {
			$data['data']=$this->Employees_model->pos_updateForm($id);
			$data['module'] = "hrm";
			$data['page']   = "update_position";   
			echo Modules::run('template/layout', $data); 
		}

	}
	////************Employee Update Part***********//
	public function update_employee_form($id = null)
	{ 
		/***** file upload code start ***********/ 

		$data['title'] = display('employee_update_form');

		
		$this->form_validation->set_rules('first_name',display('first_name'),'max_length[50]|xss_clean');
		$this->form_validation->set_rules('pos_id',display('position_name'),'max_length[50]|xss_clean');
		$this->load->library('fileupload');
		$img =  $this->fileupload->do_upload('./application/modules/hrm/assets/images/', 'picture');
		$this->form_validation->set_rules('c_f_name[]','Custom Field Name','xss_clean');
		$this->form_validation->set_rules('c_f_type[]','Custom Field Type','xss_clean');
		$this->form_validation->set_rules('customvalue[]','Custom Value','xss_clean');
		$customr_field = $this->input->post('c_f_name',TRUE);
		$customr_field_type = $this->input->post('c_f_type',TRUE);
		$customr_value = $this->input->post('customvalue',TRUE);

		$benifit_code = $this->input->post('benifit_c_code',TRUE);
		$benifit_code_desc = $this->input->post('benifit_c_code_d',TRUE);
		$benifit_acc_date = $this->input->post('benifit_acc_date',TRUE);
		$benift_status = $this->input->post('benifit_sst',TRUE);

		$c_code = $id;
		$c_name = $this->input->post('first_name',TRUE).$this->input->post('last_name',TRUE);
		$c_acc=$c_code.'-'.$c_name;

		$old_accname = $id.'-'.$this->input->post('oldfirstname', TRUE).$this->input->post('oldlastname', TRUE);

		if ($this->form_validation->run() === true) {

			$data['employee']   = (Object) $postData = [
				'employee_id'             => $this->input->post('employee_id',TRUE),
				'pos_id' 	              => $this->input->post('pos_id',TRUE),
				'first_name' 	          => $this->input->post('first_name',TRUE),
				'maiden_name'             => $this->input->post('maiden_name', TRUE),
				'last_name' 	          => $this->input->post('last_name',TRUE),
				'maiden_name'             => $this->input->post('maiden_name',TRUE),
				'email' 	              => $this->input->post('email',TRUE),
				'phone' 	              => $this->input->post('phone',TRUE),
				'alter_phone' 	          => $this->input->post('alter_phone',TRUE),
				'present_address' 	      => $this->input->post('present_address',TRUE),
				'parmanent_address' 	  => $this->input->post('parmanent_address',TRUE),
				'picture' 	              => (!empty($img) ? $img : $this->input->post('old_image', TRUE)),
				'dept_id'                 => $this->input->post('division',TRUE),
				'country'                 => $this->input->post('country',TRUE),
				'state'                   => $this->input->post('state',TRUE),
				'city'                    => $this->input->post('city',TRUE),
				'zip'                     => $this->input->post('zip_code',TRUE),
				'citizenship'             => $this->input->post('citizenship',TRUE),
				'duty_type'               => $this->input->post('duty_type',TRUE),
				'hire_date'               => date("Y-m-d", strtotime(!empty($this->input->post('hiredate',TRUE))?$this->input->post('hiredate',TRUE):date('Y-m-d'))),
				'original_hire_date'      => date("Y-m-d", strtotime(!empty($this->input->post('ohiredate',TRUE))?$this->input->post('ohiredate',TRUE):date('Y-m-d'))),
				'termination_date'        => date("Y-m-d", strtotime(!empty($this->input->post('terminatedate',TRUE))?$this->input->post('terminatedate',TRUE):date('Y-m-d'))),
				'termination_reason'      => $this->input->post('termreason',TRUE),
				'voluntary_termination'   => $this->input->post('volunt_termination',TRUE),
				'rehire_date'             => date("Y-m-d", strtotime(!empty($this->input->post('rehiredate',TRUE))?$this->input->post('rehiredate',TRUE):date('Y-m-d'))),
				'rate_type'               => $this->input->post('rate_type',TRUE),
				'rate'                    => $this->input->post('rate',TRUE),
				'pay_frequency'           => $this->input->post('pay_frequency',TRUE),
				'pay_frequency_txt'       => $this->input->post('pay_f_text',TRUE),
				'hourly_rate2'            => $this->input->post('h_rate2',TRUE),
				'hourly_rate3'            => $this->input->post('h_rate3',TRUE),
				'home_department'         => $this->input->post('h_department',TRUE),
				'department_text'         => $this->input->post('h_dep_text',TRUE),
				'class_code'              => $this->input->post('c_code',TRUE),
				'class_code_desc'         => $this->input->post('c_code_d',true),
				'class_acc_date'          => date("Y-m-d", strtotime(!empty($this->input->post('class_acc_date',TRUE))?$this->input->post('class_acc_date',TRUE):date('Y-m-d'))),
				'class_status'            =>  $this->input->post('class_sst',TRUE),
				'is_super_visor'          => $this->input->post('supervisorname',TRUE),
				'super_visor_id'          => $this->input->post('is_supervisor',TRUE),
				'supervisor_report'       => $this->input->post('reports',TRUE),
				'dob'                     => date("Y-m-d", strtotime(!empty($this->input->post('dob',TRUE))?$this->input->post('dob',TRUE):date('Y-m-d'))),
				'gender'                  => $this->input->post('gender',TRUE),
				'marital_status'          => $this->input->post('marital_status',TRUE),
				'ethnic_group'            => $this->input->post('ethnic',TRUE),
				'eeo_class_gp'            => $this->input->post('eeo_class',TRUE),
				'ssn'                     => $this->input->post('ssn',TRUE),
				'work_in_state'           => $this->input->post('w_s',TRUE),
				'live_in_state'           => $this->input->post('l_in_s',TRUE),
				'home_email'              => $this->input->post('h_email',TRUE),
				'business_email'          => $this->input->post('b_email',TRUE),
				'home_phone'              => $this->input->post('h_phone',TRUE),
				'business_phone'          => $this->input->post('w_phone',TRUE),
				'cell_phone'              => $this->input->post('c_phone',TRUE),
				'emerg_contct'            => $this->input->post('em_contact',TRUE),
				'emrg_h_phone'            => $this->input->post('e_h_phone',TRUE),
				'emrg_w_phone'            => $this->input->post('e_w_phone',TRUE),
				'emgr_contct_relation'    => $this->input->post('e_c_relation',TRUE),
				'alt_em_contct'           => $this->input->post('alt_em_cont',TRUE),
				'alt_emg_h_phone'         => $this->input->post('a_e_h_phone',TRUE),
				'alt_emg_w_phone'         => $this->input->post('a_e_w_phone',TRUE),
			];    
			$accHead = [
				'HeadName'=> $c_acc,
			];

			if ($this->Employees_model->update_employee($postData)) { 

				$this->db->where('HeadName', $old_accname)
				->update("acc_coa", $accHead);

				$this->db->where('employee_id',$this->input->post('employee_id',TRUE))
				->delete('custom_table');
				$this->db->where('employee_id',$this->input->post('employee_id',TRUE))
				->delete('employee_benifit');
				for ($i=0; $i < sizeof($customr_field); $i++) {
					$custom = [
						'custom_field'            =>  $customr_field[$i],
						'custom_data_type' 	      => $customr_field_type[$i],
						'custom_data' 	          => $customr_value[$i],
						'employee_id' 	          => $this->input->post('employee_id',TRUE),
					];
					if(!empty($customr_field[$i])){
						$this->db->insert('custom_table', $custom);
					}
				}

				for ($i=0; $i < count($benifit_code); $i++) {

					$benifit = [
						'bnf_cl_code'           =>  $benifit_code[$i],
						'bnf_cl_code_des' 	    => $benifit_code_desc[$i],
						'bnff_acural_date' 	    => date("Y-m-d", strtotime(!empty($benifit_acc_date[$i])?$benifit_acc_date[$i]:date('Y-m-d'))),
						'bnf_status'            => $benift_status[$i],
						'employee_id' 	        => $this->input->post('employee_id',TRUE),
					];
					if(!empty($benifit_code[$i])){
						$this->db->insert('employee_benifit', $benifit);
					}
				}
				$empid = $this->db->select('*')->from('employee_history')->where('employee_id',$id)->get()->row();
				$userinfo = $this->db->select('*')->from('user')->where('id',$empid->emp_his_id)->get()->row();
				$password=$this->input->post('password');
				if(empty($password)){
					$userpassword=$userinfo->password;
				}
				else{
					$userpassword= md5($this->input->post('password'));
					}
					
					$userData = array(
					'firstname' 	          => $this->input->post('first_name',TRUE),
					'lastname' 	          	  => $this->input->post('last_name',TRUE),
					'email' 	              => $this->input->post('email',TRUE),
					'password' 	              => $userpassword,
					'image' 	              => $img,
				
			);
			$this->db->where('id', $empid->emp_his_id);
			$this->db->update('user', $userData);
				
				
				$this->session->set_flashdata('message', display('update_successfully'));
				redirect("hrm/Employees/cv/". $id);
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}	
		} else {
			$data['data']=$this->Employees_model->employee_updateForm($id);
			$data['module'] = "hrm";
			$data['page']   = "update_employee_form";
			$data['dropdowndept'] = $this->Employees_model->dropdowndept();
			$data['designation']  = $this->Employees_model->designation();
			$data['supervisor']   = $this->Employees_model->supervisorlist();
			$data['custominfo']   = $this->Employees_model->customifo($id);
			$data['benifit']      = $this->Employees_model->benifit($id);
			$data['bb']           = $this->Employees_model->get_pos($id);
			$data['allcountry'] = $this->Employees_model->allcountry();
			$data['country_list'] = $this->Country_model->state();
			echo Modules::run('template/layout', $data); 
			
		}   
	}


	public function randID()
	{
		$result = ""; 
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		$charArray = str_split($chars);
		for($i = 0; $i < 7; $i++) {
			$randItem = array_rand($charArray);
			$result .="".$charArray[$randItem];
		}
		return "E".$result;
	}

    // employee search
	public function employee_search()
	{
		$keyword = $this->input->post('what_you_search', TRUE);
		$search_result = $this->Employees_model->employee_search($keyword);
		$data['emp_history'] = $search_result;
		$data['module']   = "hrm";
		$data['page']     = "employee_view";   
		echo Modules::run('template/layout', $data);
	}


	// Employee Salary Paid info
	public function EmployeePayment(){
		$sal_id = $this->input->post('sal_id', TRUE);
		$employee_id = $this->input->post('employee_id', TRUE);
		$emplyeeinfo = $this->db->select('first_name,last_name')->from('employee_history')->where('employee_id',$employee_id)->get()->row();
		$finyear = financial_year();
		$data = array(
			'employee_id'=> $employee_id,
			'Ename'       => $emplyeeinfo->first_name.$emplyeeinfo->last_name,
			'salP_id'    => $sal_id,
			'finyear'    => $finyear,
		);
		echo json_encode($data);
	}

	// confirm payment 
	
	public function payconfirm($id = null)
	{
		$finyear = $this->input->post('finyear',true);
		if($finyear<=0){
			$this->session->set_flashdata('exception',  "Please Create Financial Year First");
			redirect($_SERVER['HTTP_REFERER']);
		}
		$postData = array(
			'emp_sal_pay_id' 	           => $this->input->post('emp_sal_pay_id',TRUE),
			'payment_due'                  => 'paid',
			'payment_date' 	               => date('Y-m-d'),
			'paid_by' 	                   => $this->session->userdata('fullname'),
		); 

		$emp_id = $this->input->post('employee_id',true);
		$c_name = $this->db->select('first_name,last_name')->from('employee_history')->where('employee_id',$emp_id)->get()->row();
		$c_acc=$emp_id.'-'.$c_name->first_name.$c_name->last_name;
       	$coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
       	$COAID = $coatransactionInfo->HeadCode;
			
		$sal_id = $this->input->post('emp_sal_pay_id',TRUE);
		$cost = $this->input->post('total_salary',TRUE);
		$newdate = date('Y-m-d H:i:s');
		$saveid = $this->session->userdata('id');
		$acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode","1020101")->get()->row();
		if(empty($acc_cash)){
			$this->session->set_flashdata('exception', "You does not have any balance on account cash.");
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			if(($acc_cash->current_balance-$cost)<0){
				$this->session->set_flashdata('exception', "You does not have ".$cost." amount on account cash.");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		
		if ($this->Employees_model->update_payment($postData)) { 
			//cash credited for salary
			$narration = 'Cash in hand Credit For Employee Id'.$this->input->post('employee_id',TRUE);
			transaction($sal_id, 'Salary', $newdate, 1020101, $narration, 0, $cost, 0, 1, $saveid, $newdate, 1);
			//Employee debited for salary
			$narration = 'Salary For Employee Id'.$this->input->post('employee_id',TRUE);
			transaction($sal_id, 'Salary', $newdate, $COAID, $narration, $cost, 0, 0, 1, $saveid, $newdate, 1);
			$this->session->set_flashdata('message', display('successfully_paid'));
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

}
