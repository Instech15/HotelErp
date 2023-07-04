<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'Loan_model'
		));		 
	}
	public function loan_view(){   
		$this->permission->module('hrm','read')->redirect();
		$data['title']    = display('loan_view_list');  ;
		$data['loan']     = $this->Loan_model->LoanList();
		$data['module']   = "hrm";
		$data['page']     = "loan_view";   
		echo Modules::run('template/layout', $data); 
	}  
	public function create_grandloan(){ 
		$data['title'] = display('loan');
		$this->form_validation->set_rules('employee_id',display('employee_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('permission_by',display('permission_by'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('loan_details',display('loan_details'),'xss_clean');
		$this->form_validation->set_rules('amount',display('amount')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('interest_rate',display('interest_rate')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('installment',display('installment')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('installment_period',display('installment_period')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('repayment_amount',display('repayment_amount')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('date_of_approve',display('date_of_approve')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('loan_status',display('loan_status')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('repayment_start_date',display('repayment_start_date')  ,'required|max_length[100]|xss_clean');
		// acc transaction information
		
		
		if ($this->form_validation->run() === true) {
			$finyear = $this->input->post('finyear',true);
			if($finyear<=0){
				$this->session->set_flashdata('exception',  "Please Create Financial Year First");
				redirect($_SERVER['HTTP_REFERER']);
			}
			$emp_id = $this->input->post('employee_id',true);
			$c_name = $this->db->select('first_name,last_name')->from('employee_history')->where('employee_id',$emp_id)->get()->row();
			$c_acc=$emp_id.'-'.$c_name->first_name.$c_name->last_name;
			$coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
			$COAID = $coatransactionInfo->HeadCode;
			$postData = array(
				'employee_id'        => $this->input->post('employee_id',TRUE),
				'permission_by'      => $this->input->post('permission_by',TRUE),
				'loan_details' 	     => $this->input->post('loan_details',TRUE),
				'amount' 	         => $this->input->post('amount',TRUE),
				'interest_rate'      => $this->input->post('interest_rate',TRUE),
				'installment' 	     => $this->input->post('installment',TRUE),
				'installment_period' => $this->input->post('installment_period',TRUE),
				'repayment_amount'   => $this->input->post('repayment_amount',TRUE),
				'date_of_approve' 	 => $this->input->post('date_of_approve',TRUE),
				'loan_status' 	     => $this->input->post('loan_status',TRUE),
				'repayment_start_date' 	 => $this->input->post('repayment_start_date',TRUE),
			); 

				    
  
			if ($this->Loan_model->grndloan_create($postData)) { 
				$voucherNo = $this->db->insert_id();
				//Cash In Hand for Loan 
				$newdate = date('Y-m-d H:i:s');
				$narration = 'Cash in hand Credit For Employee Id'.$this->input->post('employee_id',TRUE);
				$amount = $this->input->post('amount',TRUE);
				$saveid = $this->session->userdata('id');
				transaction($voucherNo, 'GrantLoan', $newdate, 1020101, $narration, 0, $amount, 0, 1, $saveid, $newdate, 1);
				//ACC payable  debit
				$narration = 'Payable For Employee Id'.$this->input->post('employee_id',TRUE);
				transaction($voucherNo, 'Loan Grant', $newdate, $COAID, $narration, $amount, 0, 0, 1, $saveid, $newdate, 1);
				$this->session->set_flashdata('message', display('successfully_inserted'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/grant-loan");
		} else {
			$data['title']   = display('Grant_Loan');
			$data['module']  = "hrm";
			$data['page']    = "grandloan_form"; 
			$data['gndloan'] = $this->Loan_model->grndloandropdown();
			$data['loan']    = $this->Loan_model->LoanList(); 
			
			echo Modules::run('template/layout', $data);   
			
		}   
	}

	public function delete_grndloan($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Loan_model->grndloan_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/manage-grant-loan");
	}

	public function update_grnloan_form($id = null){
		$this->form_validation->set_rules('loan_id',null,'required|max_length[11]|xss_clean');
		$this->form_validation->set_rules('employee_id',display('employee_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('permission_by',display('permission_by'),'required|max_length[50]|xss_clean');
	    $this->form_validation->set_rules('loan_details',display('loan_details'),'xss_clean');
		$this->form_validation->set_rules('amount',display('amount')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('interest_rate',display('interest_rate')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('installment',display('installment')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('installment_period',display('installment_period')  ,'required|max_length[100]|xss_clean|numeric');
		$this->form_validation->set_rules('repayment_amount',display('repayment_amount')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('date_of_approve',display('date_of_approve')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('repayment_start_date',display('repayment_start_date')  ,'required|max_length[100]|xss_clean');
		
		if ($this->form_validation->run() === true) {

			$postData = array(
				'loan_id' 	         => $this->input->post('loan_id',TRUE),
				'employee_id'        => $this->input->post('employee_id',TRUE),
				'permission_by'      => $this->input->post('permission_by',TRUE),
				'loan_details' 	     => $this->input->post('loan_details',TRUE),
				'amount' 	         => $this->input->post('amount',TRUE),
				'interest_rate'      => $this->input->post('interest_rate',TRUE),
				'installment' 	     => $this->input->post('installment',TRUE),
				'installment_period' => $this->input->post('installment_period',TRUE),
				'repayment_amount'   => $this->input->post('repayment_amount',TRUE),
				'date_of_approve' 	 => $this->input->post('date_of_approve',TRUE),
				'repayment_start_date'=> $this->input->post('repayment_start_date',TRUE),
				'loan_status'=> $this->input->post('loan_status',TRUE),
			); 
			
			if ($this->Loan_model->update_grndloan($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/grant-loan-update/". $id);

		} else {
			$data['title']     = display('update');
			$data['data']      =$this->Loan_model->grndloan_updateForm($id);
			$data['employee']  = $this->Loan_model->grndloandropdown(); 
			$data['query']     = $this->Loan_model->get_dropdown_emp_id($id);
			$data['gndloan'] = $this->Loan_model->grndloandropdown();
			$data['module']    = "hrm";	
			$data['page']      = "update_grnloan_form";   
			echo Modules::run('template/layout', $data); 
		}

	}

	/* ################ Employee Salary Setup Start   #######################....*/

	public function installmentView(){   

		$this->permission->module('hrm','read')->redirect();
		$data['title']    = display('selection');  ;
		$data['loanss']   = $this->Loan_model->installment_view();
		$data['module']   = "hrm";
		$data['page']     = "installment_v";   
		echo Modules::run('template/layout', $data); 
	} 

	public function create_installment(){ 
		$data['title'] = display('selectionlist');
		$this->form_validation->set_rules('employee_id',display('employee_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('loan_id',display('loan_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('installment_amount',display('installment_amount'),'xss_clean');
		$this->form_validation->set_rules('payment',display('payment')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('date',display('date')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('received_by',display('received_by')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('installment_no',display('installment_no')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('notes',display('notes')  ,'required|max_length[100]|xss_clean');
		
		$emp_id = $this->input->post('employee_id',true);
		$c_name = $this->db->select('first_name,last_name')->from('employee_history')->where('employee_id',$emp_id)->get()->row();
		$c_acc=$emp_id.'-'.(!empty($c_name->first_name)?$c_name->first_name:null).(!empty($c_name->last_name)?$c_name->last_name:null);
		$coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
		$COAID = (!empty($coatransactionInfo->HeadCode)?$coatransactionInfo->HeadCode:null);
		if ($this->form_validation->run() === true) {
			$finyear = $this->input->post('finyear',true);
			if($finyear<=0){
				$this->session->set_flashdata('exception',  "Please Create Financial Year First");
				redirect($_SERVER['HTTP_REFERER']);
			}
			$postData =array(
				'employee_id'        => $this->input->post('employee_id',TRUE),
				'loan_id' 	         => $this->input->post('loan_id',TRUE),
				'installment_amount' => $this->input->post('installment_amount',TRUE),
				'payment' 	         => $this->input->post('payment',TRUE),
				'date' 	             => $this->input->post('date',TRUE),
				'received_by'        => $this->input->post('received_by',TRUE),
				'installment_no' 	 => $this->input->post('installment_no',TRUE),
				'notes' 	         => $this->input->post('notes',TRUE),
			);   
	   
			$loan_id = $this->input->post('loan_id',TRUE);
			$newdate = date('Y-m-d');
			$amount = $this->input->post('payment',TRUE);
			$saveid = $this->session->userdata('id');

			if ($this->Loan_model->installment_create($postData)) { 
				$narration = 'Cash in hand Debit For Employee Id'.$this->input->post('employee_id',TRUE);
				transaction($loan_id, 'LoanInstall', $newdate, 1020101, $narration, $amount, 0, 0, 1, $saveid, $newdate, 1);
				//ACC payable  Credit
				$narration = 'Payable For Employee Id'.$this->input->post('employee_id',TRUE);
				transaction($loan_id, 'LoanInstall', $newdate, $COAID, $narration, 0, $amount, 0, 1, $saveid, $newdate, 1);
				$this->session->set_flashdata('message', display('successfully_installed'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/loan-installment");

		} else {
			$data['title']   = display('loan_installment');
			$data['module']  = "hrm";
			$data['page']    = "installment_form"; 
			$data['gndloan'] = $this->Loan_model->installdropdown();
			$data['autoincrement'] = $this->Loan_model->autoincrement();
			$data['loanss']  = $this->Loan_model->installment_view();
			echo Modules::run('template/layout', $data);   
			
		}   
	}

	public function select_to_load(){
		$id = $this->input->post('employee_id', TRUE);
		$data = $this->db->select('*')->from('grand_loan')->where('employee_id',$id)->get()->result();
		 $html = "<option value=\'\'>Select One</option>";
         foreach($data as $info){
         	$html.="<option value='$info->loan_id'>$info->loan_id</option>";
         }
         echo json_encode($html);
		
	}

	public function select_to_install($id){
		$data = $this->db->select('*')->from('grand_loan')->where('loan_id',$id)->get()->row();
		echo json_encode($data);
	}
	public function select_to_autoincrement($id){
		$data = $this->db->select_max('installment_no')->from('loan_installment')->where('loan_id',$id)->get()->row();
		$install_num = (!empty($data->installment_no)?$data->installment_no:0);
		echo json_encode($install_num);
	}



	public function delete_install($id = null) 
	{ 
		$this->permission->module('hrm','delete')->redirect();

		if ($this->Loan_model->install_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/manage-loan-installment");
	}


	

// /* ################ Employee Salary Setup End   #######################....*/
// /* <<<<<<<<<<<<<##############^^^^^^@@@@^^^^^###############>>>>>>>
	public function update_install_form($id = null){
		$this->form_validation->set_rules('loan_inst_id',null,'required|max_length[11]|xss_clean');
		$this->form_validation->set_rules('employee_id',display('employee_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('loan_id',display('loan_id'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('installment_amount',display('installment_amount'),'xss_clean');
		$this->form_validation->set_rules('payment',display('payment')  ,'required|max_length[100]','xss_clean');
		$this->form_validation->set_rules('date',display('date')  ,'required|max_length[100]','xss_clean');
		$this->form_validation->set_rules('received_by',display('received_by')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('installment_no',display('installment_no')  ,'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('notes',display('notes')  ,'required|max_length[100]|xss_clean');
		
		if ($this->form_validation->run() === true) {

			$postData = array(
				'loan_inst_id' 	     => $this->input->post('loan_inst_id',TRUE),
				'employee_id'        => $this->input->post('employee_id',TRUE),
				'loan_id' 	         => $this->input->post('loan_id',TRUE),
				'installment_amount' => $this->input->post('installment_amount',TRUE),
				'payment' 	         => $this->input->post('payment',TRUE),
				'date' 	             => $this->input->post('date',TRUE),
				'received_by'        => $this->input->post('received_by',TRUE),
				'installment_no' 	 => $this->input->post('installment_no',TRUE),
				'notes' 	         => $this->input->post('notes',TRUE),
				); 
			
			if ($this->Loan_model->update_loanInstall($postData)) { 
				$this->session->set_flashdata('message', display('successfully_installed'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/loan-installment-update/". $id);

		} else {
			$data['title']     = display('update');
			$data['data']      =$this->Loan_model->installUpdate($id);
			$data['gndloan']   = $this->Loan_model->installdropdown();
			$data['autoincrement'] = $this->Loan_model->autoincrement();
			$data['query']     = $this->Loan_model->get_install_empid($id);
			$data['module']    = "hrm";	
			$data['page']      = "update_install_form";   
			echo Modules::run('template/layout', $data); 
		}

	}

	/* @@@@@  Report Loan @@@@@@@@@@@ */
	public function loan_report(){

		$data['title']            = display('loan_report');
		$data['loan']             = $this->Loan_model->viewLoan();
		$data['gndloan']          = $this->Loan_model->installdropdown();   
		$data['module']           = "hrm";
		$data['page']             = "ln_report";
		echo Modules::run('template/layout', $data); 
    }//

    public function lnreport_view(){
    	$this->permission->module('hrm','read')->redirect();
		$this->form_validation->set_rules('employee_id',display('employee_id'),'required');
		if ($this->form_validation->run() === true) {
		
    	$id             = $this->input->post('employee_id', TRUE);
    	$start_date     = $this->input->post('start_date', TRUE);
    	$end_date       = $this->input->post('end_date', TRUE);
    	$data['ab']     = $this->Loan_model->report_loan($id,$start_date,$end_date);
    	$data['emp']    = $this->Loan_model->emp_info($id);
    	$data['module'] = "hrm";
    	$data['page']   = "loan_report";
		}
		else{
			$data['loan']             = $this->Loan_model->viewLoan();
		    $data['gndloan']          = $this->Loan_model->installdropdown(); 
			$data['module'] = "hrm";
    	    $data['page']   = "ln_report";
			}
    	echo Modules::run('template/layout', $data); 
    }
    // loan view id wise
     public function view_details($id){

    	$this->permission->module('hrm','read')->redirect();
    	$data['ab']     = $this->Loan_model->report_loan_by_id($id);
    	$data['emp']    = $this->Loan_model->emp_info($id);
    	$data['module'] = "hrm";
    	$data['page']   = "loan_report";  
    	echo Modules::run('template/layout', $data); 
    }
    public function details_view(){

    	$this->permission->module('hrm','read')->redirect();
    	$id = $this->uri->segment(4);
    	$data['abc']    = $this->Loan_model->loanViewDetails($id);
    	$data['module'] = "hrm";
    	$data['page']   = "loan_datailsView";  
    	echo Modules::run('template/layout', $data); 
    }
}
