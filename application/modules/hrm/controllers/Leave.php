<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends MX_Controller {

public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'Leave_model'
		));		 
	}

public function weekly_leave_view()
	{   
        $this->permission->method('hrm','read')->redirect();

		$data['title']    = display('selection');  ;
		$data['weeklev']  = $this->Leave_model->viewWeekly();
		$data['module']   = "hrm";
		$data['page']     = "weeklyleave_view";   
		echo Modules::run('template/layout', $data); 
	} 

public function create_weekleave()
	{ 
		$data['title'] = display('selectionlist');
		$this->form_validation->set_rules('dayname[]',display('dayname[]'),'max_length[30]|xss_clean');
		if ($this->form_validation->run() === true) {


			 $Specilized_category = $this->input->post('dayname', TRUE);
$data=array('dayname'=>implode(",", $Specilized_category),
  );  
			if ($this->Leave_model->weekleave_create($data)) { 
				$this->session->set_flashdata('exception',  display('please_try_again'));
				
				
			} else {
				
				$this->session->set_flashdata('message', display('save_successfully'));
			}
			redirect("hrm/weekly-holiday");
		} 
		else {
			$data['title']    = display('add_weekly_leave');
			$data['module']   = "hrm";
			$data['page']     = "weeklyform"; 
			$data['weeklev']  = $this->Leave_model->viewWeekly();
			echo Modules::run('template/layout', $data);   
			
		}   
	}
public function delete_weekleave($id = null) 
	{ 
        $this->permission->method('hrm','delete')->redirect();

		if ($this->Leave_model->weekleave_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));

		}
		redirect("hrm/Leave/weekly_leave_view");
	}

public function update_weekleave_form($id = null){
 		$this->form_validation->set_rules('wk_id');
 		$this->form_validation->set_rules('dayname[]',display('dayname'),'xss_clean');
		
		if ($this->form_validation->run() === true) {

			 $Specilized_category = $this->input->post('dayname', TRUE);
  $dataf=array(
	  'wk_id'=>$this->input->post('wk_id', TRUE),
      'dayname'=>implode(",", $Specilized_category),
  
  );  		
			if ($this->Leave_model->update_weeklev($dataf)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/weekly-holiday");

		} else {
			$data['title']     = display('update');
		    $data['data']      =$this->Leave_model->weekleave_updateForm($id);
			$data['module']    = "hrm";	
			$data['page']      = "update_wkleave_form";  
			echo Modules::run('template/layout', $data); 
		}
 
	}

	public function holiday_view()
	{   
   

        $this->permission->method('hrm','read')->redirect();

		$data['title']    = display('holiday');  ;
		$data['holiday']  = $this->Leave_model->viewholiday();
		$data['module']   = "hrm";
		$data['page']     = "holiday_form";   
		echo Modules::run('template/layout', $data); 
	} 

public function manage_holiday(){   
        $this->permission->method('hrm','read')->redirect();

		$data['title']    = display('holiday');  ;
		$data['holiday']  = $this->Leave_model->viewholiday();
		$data['module']   = "hrm";
		$data['page']     = "holiday_view";   
		echo Modules::run('template/layout', $data); 
	} 


public function create_holiday(){ 
		$data['title'] = display('ab');
		$this->form_validation->set_rules('holiday_name',display('holiday_name'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('start_date',display('start_date'),'xss_clean');
		$this->form_validation->set_rules('end_date',display('end_date'),'xss_clean');
		$this->form_validation->set_rules('no_of_days',display('no_of_days'),'xss_clean|integer');
		
		if ($this->form_validation->run() === true) {

			$postData = array(
				'holiday_name'       => $this->input->post('holiday_name',TRUE),
				'start_date' 	     => $this->input->post('start_date',TRUE),
				'end_date' 	         => $this->input->post('end_date',TRUE),
				'no_of_days' 	     => $this->input->post('no_of_days',TRUE),
			);   

			if ($this->Leave_model->holiday_create($postData)) { 
				$this->session->set_flashdata('message', display('successfully_saved'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/holiday");



		} else {
			if ($this->form_validation->run() === false) {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				redirect("hrm/holiday");
			}
			$data['title']  = display('create');
			$data['module'] = "hrm";
			$data['page']   = ""; 
			echo Modules::run('template/layout', $data);   
			
		}   
	}


public function delete_holiday($id = null){ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Leave_model->holiday_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/holiday");
	}

	public function update_holiday_form($id = null){
 		$this->form_validation->set_rules('payrl_holi_id',null,'required|max_length[11]|xss_clean');
 		$this->form_validation->set_rules('holiday_name',display('holiday_name'),'max_length[30]|xss_clean');
 		$this->form_validation->set_rules('start_date',display('start_date'),'max_length[30]|xss_clean');
 		$this->form_validation->set_rules('end_date',display('end_date'),'max_length[30]|xss_clean');
 		$this->form_validation->set_rules('no_of_days',display('no_of_days'),'max_length[30]|xss_clean|integer');
		
		if ($this->form_validation->run() === true) {

			$postData = array(
			    'payrl_holi_id'  => $this->input->post('payrl_holi_id',TRUE),
				'holiday_name'   => $this->input->post("holiday_name",TRUE),
				'start_date'     => $this->input->post("start_date",TRUE),
                'end_date'       => $this->input->post("end_date",TRUE),
                'no_of_days'     => $this->input->post("no_of_days",TRUE),
				); 
			
			if ($this->Leave_model->update_holiday($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/holiday");

		} else {
			$data['title']     = display('update');
		    $data['data']      =$this->Leave_model->holiday_updateForm($id);
		   
			$data['module']    = "hrm";	
			$data['page']      = "update_holiday_form"; 
			echo Modules::run('template/layout', $data); 
		}
 
	}

public function application(){ 
        $data['title'] = display('application');//agent_picture
         $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
		$this->form_validation->set_rules('apply_strt_date',display('apply_strt_date'),'required|xss_clean');
		$this->form_validation->set_rules('apply_end_date',display('apply_end_date'),'required|xss_clean');
		$this->form_validation->set_rules('leave_aprv_strt_date',display('leave_aprv_strt_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('leave_aprv_end_date',display('leave_aprv_end_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('num_aprv_day',display('num_aprv_day')  ,'required|xss_clean');
	
		    $this->load->library('Fileupload');
          $img = $this->fileupload->do_upload(
            './application/modules/hrm/assets/images/', 
            'apply_hard_copy'); 
		$this->form_validation->set_rules('apply_date',display('apply_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('approve_date',display('approve_date')  ,'required|xss_clean');
	
        
      
        if ($this->form_validation->run() === true) {
				$postData = array(
			'employee_id'           => $this->input->post('employee_id',TRUE),
			'apply_strt_date' 	    => $this->input->post('apply_strt_date',TRUE),
			'apply_end_date' 	    => $this->input->post('apply_end_date',TRUE),
			'leave_aprv_strt_date' 	=> $this->input->post('leave_aprv_strt_date',TRUE),
			'leave_aprv_end_date' 	=> $this->input->post('leave_aprv_end_date',TRUE),
			'num_aprv_day' 	        => $this->input->post('num_aprv_day',TRUE),
			'reason' 	            => $this->input->post('reason',TRUE),
			'apply_date' 	        => $this->input->post('apply_date',TRUE),
			'approve_date' 	        => $this->input->post('approve_date',TRUE),
			'approved_by' 	        => $this->input->post('approved_by',TRUE),
			'leave_type' 	        => $this->input->post('leave_type',TRUE),
            'apply_hard_copy'       => $img,
            );   

            if ($this->Leave_model->application_create($postData)) { 
                $this->session->set_flashdata('message', display('successfully_created'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/Leave/application");



        } else {
            $data['title']   = display('leave');
            $data['module']  = "hrm";
            $data['dropdown']= $this->Leave_model->dropdown();
            $data['mang']    = $this->Leave_model->manageleave();
            $data['page']    = "application_form";    
          echo Modules::run('template/layout', $data); 
        }   
    }

    // others leave info
  public function others_leave(){ 
        $data['title'] = display('application');//agent_picture
        $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
		$this->form_validation->set_rules('apply_strt_date',display('apply_strt_date'),'required|xss_clean');
		$this->form_validation->set_rules('apply_end_date',display('apply_end_date'),'required|xss_clean');
		$this->form_validation->set_rules('leave_type_id',display('leave_type'),'required|xss_clean');
		    $this->load->library('Fileupload');
          $img = $this->fileupload->do_upload(
            './application/modules/hrm/assets/images/', 
            'apply_hard_copy'); 
		$this->form_validation->set_rules('apply_date',display('apply_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('approve_date',display('approve_date')  ,'required|xss_clean');
      
        if ($this->form_validation->run() === true) {
				$postData = array(
			'employee_id'           => $this->input->post('employee_id',TRUE),
			'leave_type_id'         => $this->input->post('leave_type_id',TRUE),
			'apply_strt_date' 	    => $this->input->post('apply_strt_date',TRUE),
			'apply_end_date' 	    => $this->input->post('apply_end_date',TRUE),
			'leave_aprv_strt_date' 	=> (!empty($this->input->post('leave_aprv_strt_date',TRUE))?$this->input->post('leave_aprv_strt_date',TRUE):'0000-00-00'),
			'leave_aprv_end_date' 	=> (!empty($this->input->post('leave_aprv_end_date',TRUE))?$this->input->post('leave_aprv_end_date',TRUE):'0000-00-00'),
			'num_aprv_day' 	        => (!empty($this->input->post('num_aprv_day',TRUE))?$this->input->post('num_aprv_day',TRUE):0),
			'reason' 	            => $this->input->post('reason',TRUE),
			'apply_date' 	        => $this->input->post('apply_date',TRUE),
			'approve_date' 	        => (!empty($this->input->post('approve_date',TRUE))?$this->input->post('approve_date',TRUE):'0000-00-00'),
			'apply_day'             => $this->input->post('apply_day',TRUE),
			'approved_by' 	        => (!empty($this->input->post('approved_by',TRUE))?$this->input->post('approved_by',TRUE):0),
            'apply_hard_copy'       => (!empty($img)?$img:null),
            );   

            if ($this->Leave_model->application_create($postData)) { 
                $this->session->set_flashdata('message', display('successfully_created'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect("hrm/leave-application");

        } else {
            $data['title']   = display('leave');
            $data['module']  = "hrm";
            $data['type']    = $this->Leave_model->get_leave_type();
            $data['dropdown']= $this->Leave_model->dropdown();
            $data['mang']    = $this->Leave_model->manageleave();
            $data['supr']    = $this->Leave_model->supervisorList();
            $data['weekend'] = $this->db->select('dayname')->from('weekly_holiday')->get()->row()->dayname;
            $data['page']    = "other_leave_application_form";    
          echo Modules::run('template/layout', $data); 
        }   
    }

    // add others leave type form
	public function add_leave_type()
	 {
	  $data['title'] = display('leave_type');
	  $this->form_validation->set_rules('leave_type', display('leave_type')  ,'required|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('leave_days',display('leave_days'),'max_length[30]|xss_clean');
	  if ($this->form_validation->run() === true) {
		   $postData = array(
		   'leave_type'    => $this->input->post('leave_type', TRUE),
		   'leave_days'    => $this->input->post('leave_days', TRUE) ,
		  );
	 
	  if ($this->Leave_model->save_leave_type($postData)) { 
				$this->session->set_flashdata('message', display('successfully_created'));
	        } else {
	            $this->session->set_flashdata('exception',  display('please_try_again'));
	        }
	        redirect("hrm/leave-type");
	    }
	   else { 
	    $data['title'] = display('leave_type');
	    $data['module'] = "hrm";
	    $data['type']= $this->Leave_model->get_all_leave_type();
	    $data['page']   = "leave_type_form";   
	    echo Modules::run('template/layout', $data); 
	   }   
	 }

 // update leave type 
  public function update_leave_type($id = null){
  		$data['title'] = display('update');
	  $this->form_validation->set_rules('leave_type', display('leave_type_name')  ,'required|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('leave_days',display('number_of_leave_days'),'max_length[30]|xss_clean');
	  if ($this->form_validation->run() === true) {
		   $postData = array(
		   	'leave_type_id'    => $this->input->post('leave_type_id', TRUE),
		   'leave_type'    => $this->input->post('leave_type', TRUE),
		   'leave_days'    => $this->input->post('leave_days', TRUE), 
		  );
	  if ($this->Leave_model->save_update_leave_type($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
	        } else {
	            $this->session->set_flashdata('exception',  display('please_try_again'));
	        }
	        redirect("hrm/leave-type");
	    }
	   else { 
	    $data['title'] = display('update');
	    $data['module'] = "hrm";
	    $data['data']= $this->Leave_model->get_leave_type_by_id($id);
	    $data['page']   = "update_leave_type_form";   
	    echo Modules::run('template/layout', $data); 
	   }   
  }

 // delete leave type
  public function delete_leave_type($id = null){ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Leave_model->delete_leave_type($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/leave-type");
	}

  public function delete_application($id = null){ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Leave_model->application_delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect("hrm/manage-leave-application");
	}
	public function application_view(){   
        $this->permission->method('leave','read')->redirect();

		$data['title']  = display('leave_application');  ;
		$data['mang']   = $this->Leave_model->manageleave();
		$data['module'] = "hrm";
		$data['page']   = "application_view";   
		echo Modules::run('template/layout', $data); 
	} 
	public function update_application_form($id = null){
	    $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
 		$this->form_validation->set_rules('leave_appl_id',null,'required');
 		$this->form_validation->set_rules('apply_strt_date',display('apply_strt_date'),'required|xss_clean');
		$this->form_validation->set_rules('apply_end_date',display('apply_end_date'),'required|xss_clean');
		$this->form_validation->set_rules('leave_aprv_strt_date',display('leave_aprv_strt_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('leave_aprv_end_date',display('leave_aprv_end_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('num_aprv_day',display('num_aprv_day')  ,'required|xss_clean');
			$this->load->library('Fileupload');
        $img = $this->fileupload->do_upload(
            './application/modules/hrm/assets/images/', 
            'apply_hard_copy');    
		$this->form_validation->set_rules('apply_date',display('apply_date')  ,'required|xss_clean');
		$this->form_validation->set_rules('approve_date',display('approve_date')  ,'required|xss_clean');
		
		
		if ($this->form_validation->run() === true) {

			$postData = array(
			'leave_appl_id' 	    => $this->input->post('leave_appl_id',TRUE),
		    'employee_id'           => $this->input->post('employee_id',TRUE),
			'apply_strt_date' 	    => $this->input->post('apply_strt_date',TRUE),
			'apply_end_date' 	    => $this->input->post('apply_end_date',TRUE),
			'leave_aprv_strt_date' 	=> (!empty($this->input->post('leave_aprv_strt_date',TRUE))?$this->input->post('leave_aprv_strt_date',TRUE):'0000-00-00'),
			'leave_aprv_end_date'   => (!empty($this->input->post('leave_aprv_end_date',TRUE))?$this->input->post('leave_aprv_end_date',TRUE):'0000-00-00'),
			'num_aprv_day' 	        => (!empty($this->input->post('num_aprv_day',true))?$this->input->post('num_aprv_day',TRUE):0),
			'reason' 	            => $this->input->post('reason',TRUE),
			'apply_date' 	        => $this->input->post('apply_date',TRUE),
			'approve_date' 	        => (!empty($this->input->post('approve_date',TRUE))?$this->input->post('approve_date',TRUE):'0000-00-00'),
			'approved_by' 	        => $this->input->post('approved_by',TRUE),
			'apply_day'             => $this->input->post('apply_day',TRUE),
			'leave_type' 	        => $this->input->post('leave_type',TRUE),
            'apply_hard_copy'       => (!empty($img) ? $img : $this->input->post('old_apply_hard_copy',TRUE)),
            'leave_type_id'           => $this->input->post('leave_type_id',TRUE),
); 
			
			if ($this->Leave_model->update_application($postData)) { 
				$this->session->set_flashdata('message', display('successfully_updated'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("hrm/manage-leave-application");

		}else{
			$data['title']     = display('update');
		    $data['data']      = $this->Leave_model->application_updateForm($id);
		    $data['dropdown']  = $this->Leave_model->dropdown();
		    $data['bb']        = $this->Leave_model->get_id($id);
		    $data['type']      = $this->Leave_model->get_leave_type();
		    $data['supr']      = $this->Leave_model->supervisorList();
		    $data['weekend'] = $this->db->select('dayname')->from('weekly_holiday')->get()->row()->dayname;
			$data['module']    = "hrm";	
			$data['page']      = "update_application_form"; 
			echo Modules::run('template/layout', $data); 
		}
 
	}
	// Leave free for employee
	public function free_leave(){
		$employee_id    = $this->input->post('employee_id', TRUE);
		$type           = $this->input->post('leave_type', TRUE);
		$employee_leave = $this->db->select('SUM(num_aprv_day) as lv')->from('leave_apply')->where('employee_id',$employee_id)->where('leave_type_id',$type)->get()->row();
		$totalleave = $this->db->select('leave_days')->from('leave_type')->where('leave_type_id',$type)->get()->row();
		$data = array(
			'enjoy' => (!empty($employee_leave->lv)?$employee_leave->lv:0),
			'due'   => (!empty($totalleave->leave_days)?$totalleave->leave_days:0),
		);
		echo json_encode($data);
	}

}
