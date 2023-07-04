<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'Candidate_model'
		));		 
	}
	public function candidateinfo_view()
	{   
        $this->permission->module('hrm','read')->redirect();

		$data['title']    = display('can_basicinfo_list');  ;
		$data['caninfo'] = $this->Candidate_model->viewcanInfo();
		$data['edu'] = $this->Candidate_model->viewEduinfo();
		$data['exp'] = $this->Candidate_model->viewExperience();
		$data['module'] = "hrm";
		$data['page']   = "canInfoview";   
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
	
 	public function caninfo_create()
	{ 
		$this->load->library(array('my_form_validation'));
		$this->form_validation->set_rules('first_name',display('first_name'),'max_length[50]|xss_clean');
		$this->form_validation->set_rules('last_name',display('last_name')  ,'max_length[100]|xss_clean');
		$this->form_validation->set_rules('email',display('email')  ,'max_length[32]|xss_clean|valid_email');
		$this->form_validation->set_rules('phone',display('phone')  ,'max_length[100]|xss_clean|is_natural');
		$this->form_validation->set_rules('alter_phone',display('alter_phone')  ,'max_length[100]|xss_clean|is_natural');
        if(!empty($this->input->post('present_address'))){
		$this->form_validation->set_rules('present_address',display('present_address')  ,'max_length[100]|xss_clean');
		}	
		if(!empty($this->input->post('parmanent_address', TRUE))){   
		$this->form_validation->set_rules('parmanent_address',display('parmanent_address')  ,'max_length[100]|xss_clean');
		}
		$this->load->library('fileupload');
		$img =  $this->fileupload->do_upload('./application/modules/hrm/assets/images/', 'picture');
		$this->form_validation->set_rules('can_id',display('can_id'));
		$this->form_validation->set_rules('degree_name[]',display('degree_name'),'xss_clean');
		$this->form_validation->set_rules('university_name[]',display('university_name'),'xss_clean');
		$this->form_validation->set_rules('cgp[]',display('cgp'),'xss_clean|numeric');
		$this->form_validation->set_rules('comments',display('comments'),'xss_clean');	
	    $unis = $this->input->post('university_name', TRUE);
	    $degs = $this->input->post('degree_name', TRUE);
	    $cgps = $this->input->post('cgp', TRUE);
		$this->form_validation->set_rules('company_name[]',display('company_name'),'xss_clean');
		$this->form_validation->set_rules('working_period[]',display('working_period'),'xss_clean');
		$this->form_validation->set_rules('duties[]',display('duties'),'xss_clean');
		$this->form_validation->set_rules('supervisor[]',display('supervisor'),'xss_clean');
        $comname = $this->input->post('company_name', TRUE);
	    $wperiod = $this->input->post('working_period', TRUE);
	    $duties = $this->input->post('duties', TRUE);
	    $supe = $this->input->post('supervisor', TRUE);
		$id = $this->generate->id();
		if ($this->form_validation->run($this) === true) {
			

			$postData1= array(
			'can_id' 	               => $id,
			'first_name' 	          => $this->input->post('first_name',TRUE),
			'last_name' 	          => $this->input->post('last_name',TRUE),
			'email' 	              => $this->input->post('email',TRUE),
			'phone' 	              => $this->input->post('phone',TRUE),
			'alter_phone' 	          => $this->input->post('alter_phone',TRUE),
			'present_address' 	      => $this->input->post('present_address',TRUE),
			'parmanent_address' 	  => $this->input->post('parmanent_address',TRUE),
			'picture' 	              => $img,
			'ssn'                     => $this->input->post('ssn',TRUE),
			'state'                   => $this->input->post('state',TRUE),
			'city'                    => $this->input->post('city',TRUE),
			'zip'                     => $this->input->post('zip_code',TRUE),
			);   
			$this->db->insert('candidate_basic_info', $postData1);
		

			for ($i=0; $i < sizeof($unis); $i++) {
				$postData2= array(
					'can_id' 	              =>$id,
					'university_name'         => $unis[$i],
					'degree_name' 	          => $degs[$i],
					'cgp' 	                  => $cgps[$i], 
					'comments' 	              => $this->input->post('comments',TRUE),
					
				);  
				if(!empty($unis[$i])){   
				$this->Candidate_model->caneduinfo_create($postData2);
			}
		    }
			
			for ($i=0; $i < sizeof($comname); $i++) {
			$postData = array(
			'can_id' 	                   => $id,
			'company_name'                 => $comname[$i],
			'working_period' 	           => $wperiod[$i],
			'duties' 	                   => $duties[$i], 
			'supervisor' 	               => $supe[$i], 
			
			);   
			
         if(!empty($comname[$i])){
			 $this->Candidate_model->canworkexp_create($postData);
			}
		    }
			
				$this->session->set_flashdata('message', display('successfully_saved'));
			
			redirect("hrm/new-candidate");



		} else {
			$data['title'] = display('add_canbasic_info');
			$data['module'] = "hrm";
			$data['dropdown_edu'] = $this->Candidate_model->eduinfo_dropdown();
			$data['page']   = "canInfo_form";
			$data['country_list']  =  array(
				'States'=>'States',
                  'Abia'=>'Abia',
                  'Adamawa'=>'Adamawa',
                  'Anambra'=>'Anambra',
                  'Bauchi'=>'Bauchi',
                  'Bayelsa'=>'Bayelsa',
                  'Benue'=>'Benue',
                  'Borno'=>'Borno',
                  'Delta'=>'Delta',
                  'Ebonyi'=>'Ebonyi',
                  'Edo'=>'Edo',
                  'Ekiti'=>'Ekiti',
                  'Enugu'=>'Enugu',
                  'Gombe'=>'Gombe',
                  'Imo'=>'Imo',
                  'Jigawa'=>'Jigawa',
                  'Kaduna'=>'Kaduna',
                  'Kano'=>'Kano',
                  'Katsina'=>'Katsina',
                  'Kebbi'=>'Kebbi',
                  'Kogi'=>'Kogi',
                  'Kwara'=>'Kwara',
                  'Lagos'=>'Lagos',
                  'Nasarawa'=>'Nasarawa',
                  'Niger'=>'Niger',
                  'Ogun'=>'Ogun',
                  'Ondo'=>'Ondo',
                  'Osun'=>'Osun',
                  'Oyo'=>'Oyo',
                  'Plateau'=>'Plateau',
                  'Rivers'=>'Rivers',
                  'Sokoto'=>'Sokoto',
                  'Taraba'=>'Taraba',
                  'Yobe'=>'Yobe',
                  'Zamfara'=>'Zamfara',
                  'Cross River'=>'Cross River',
                  'Federal Capital Territory'=>'Federal Capital Territory',
                  'Akwa Ibom'=>'Akwa Ibom'
						);
			echo Modules::run('template/layout', $data); 
		}   
	}
/*  ########################    details save  #######################################  */

	/* ############# For viewing details  #################### */
	public function candatails_view()
	{   
        $this->permission->module('hrm','read')->redirect();

		$data['title']    = display('view details');  ;
        $data['all_data'] = $this->Candidate_model->retrieve_all_data();
		$data['module']   = "hrm";
		$data['page']     = "can_details";   
		echo Modules::run('template/layout', $data); 
	} 

public function cv()
	{   
        $this->permission->module('hrm','read')->redirect();
   
		$data['title']    = display('view details');  
		 $id = $this->uri->segment(4);
        $data['cv'] = $this->Candidate_model->employee_details($id);
        $data['edu'] = $this->Candidate_model->eduInfo($id);
        $data['wrk'] = $this->Candidate_model->workingexp($id);
		$data['module']   = "hrm";
		$data['page']     = "cv";   
		echo Modules::run('template/layout', $data); 
	} 

	/* ############# For viewing details  #################### */


	public function delete_canInfo($id = null) 
	{ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Candidate_model->delete_cinfo($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('hrm/manage-candidate');
	}
	 
   public function update_canifo_form($id = null){
		
		$this->load->library(array('my_form_validation'));
		$data['title'] = display('write_y_p_info');
		$this->form_validation->set_rules('can_id',null,'required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('first_name',display('first_name'),'max_length[50]|xss_clean');
		$this->form_validation->set_rules('last_name',display('last_name')  ,'max_length[100]|xss_clean');
		$this->form_validation->set_rules('email',display('email')  ,'max_length[32]|xss_clean|valid_email');
		$this->form_validation->set_rules('phone',display('phone')  ,'max_length[100]|xss_clean|is_natural');
		$this->form_validation->set_rules('alter_phone',display('alter_phone')  ,'max_length[100]|xss_clean|is_natural');
		if(!empty($this->input->post('present_address', TRUE))){
		$this->form_validation->set_rules('present_address',display('present_address')  ,'max_length[100]|xss_clean');
		}	
		if(!empty($this->input->post('parmanent_address', TRUE))){   
		$this->form_validation->set_rules('parmanent_address',display('parmanent_address')  ,'max_length[100]|xss_clean');
		}
		$this->load->library('fileupload');
		$img =  $this->fileupload->do_upload('./application/modules/hrm/assets/images/', 'picture');
	
		$this->form_validation->set_rules('degree_name[]',display('degree_name'),'xss_clean');
		$this->form_validation->set_rules('university_name[]',display('university_name'),'xss_clean');
		$this->form_validation->set_rules('cgp[]',display('cgp'),'xss_clean|numeric');
		$this->form_validation->set_rules('comments',display('comments'),'xss_clean');	
	    $unis = $this->input->post('university_name', TRUE);
	    $degs = $this->input->post('degree_name', TRUE);
	    $cgps = $this->input->post('cgp', TRUE);
		$this->form_validation->set_rules('company_name[]',display('company_name'),'xss_clean');
		$this->form_validation->set_rules('working_period[]',display('working_period'),'xss_clean');
		$this->form_validation->set_rules('duties[]',display('duties'),'xss_clean');
		$this->form_validation->set_rules('supervisor[]',display('supervisor'),'xss_clean');
        $comname = $this->input->post('company_name', TRUE);
	    $wperiod = $this->input->post('working_period', TRUE);
	    $duties = $this->input->post('duties', TRUE);
	    $supe = $this->input->post('supervisor', TRUE);
		
		if ($this->form_validation->run($this) === true) {
			
			$postData1= array(
			'can_id' 	               =>$this->input->post('can_id',TRUE),
			'first_name' 	          => $this->input->post('first_name',TRUE),
			'last_name' 	          => $this->input->post('last_name',TRUE),
			'email' 	              => $this->input->post('email',TRUE),
			'phone' 	              => $this->input->post('phone',TRUE),
			'alter_phone' 	          => $this->input->post('alter_phone',TRUE),
			'present_address' 	      => $this->input->post('present_address',TRUE),
			'parmanent_address' 	  => $this->input->post('parmanent_address',TRUE),
			'picture' 	              =>(!empty($img) ? $img : $this->input->post('picture',TRUE)),
			'ssn'                     => $this->input->post('ssn',TRUE),
			'state'                   => $this->input->post('state',TRUE),
			'city'                    => $this->input->post('city',TRUE),
			'zip'                     => $this->input->post('zip_code',TRUE),
			);                 
			$this->Candidate_model->update_canInfo($postData1);
		
$this->db->where('can_id',$this->input->post('can_id', TRUE))
 			->delete('candidate_education_info');
			for ($i=0; $i < sizeof($unis); $i++) {
				$postData2= array(
					'can_id' 	              => $this->input->post('can_id', TRUE),
					'university_name'         => $unis[$i],
					'degree_name' 	          => $degs[$i],
					'cgp' 	                  => $cgps[$i], 
					'comments' 	              => $this->input->post('comments',TRUE),
					
				);    
			$this->db->insert('candidate_education_info', $postData2);
		    }
			
			$this->db->where('can_id',$this->input->post('can_id', TRUE))
 			->delete('candidate_workexperience');

			for ($i=0; $i < sizeof($comname); $i++) {
			$postData = array(
			'can_id' 	                   => $this->input->post('can_id',TRUE),
			'company_name'                 => $comname[$i],
			'working_period' 	           => $wperiod[$i],
			'duties' 	                   => $duties[$i], 
			'supervisor' 	               => $supe[$i], 
			);   
			
		 $this->db->insert('candidate_workexperience', $postData);
		    }
			
				$this->session->set_flashdata('message', display('successfully_updated'));
			
		redirect("hrm/manage-candidate");



		} else {
$id= $this->uri->segment(4);
$data['title'] = display('create_details');
$data['module'] = "hrm";
$data['basinfo']=$this->Candidate_model->canifo_updateForm($id);
$data['edinfo']=$this->Candidate_model->canEdu_updateForm($id);
$data['work']=$this->Candidate_model->work($id);
$data['edu'] = $this->Candidate_model->upcanedu($id);
$data['page']   = "update_canIfo";
$data['country_list']  =  array(

 'Abia'=>'Abia',
                  'Adamawa'=>'Adamawa',
                  'Anambra'=>'Anambra',
                  'Bauchi'=>'Bauchi',
                  'Bayelsa'=>'Bayelsa',
                  'Benue'=>'Benue',
                  'Borno'=>'Borno',
                  'Delta'=>'Delta',
                  'Ebonyi'=>'Ebonyi',
                  'Edo'=>'Edo',
                  'Ekiti'=>'Ekiti',
                  'Enugu'=>'Enugu',
                  'Gombe'=>'Gombe',
                  'Imo'=>'Imo',
                  'Jigawa'=>'Jigawa',
                  'Kaduna'=>'Kaduna',
                  'Kano'=>'Kano',
                  'Katsina'=>'Katsina',
                  'Kebbi'=>'Kebbi',
                  'Kogi'=>'Kogi',
                  'Kwara'=>'Kwara',
                  'Lagos'=>'Lagos',
                  'Nasarawa'=>'Nasarawa',
                  'Niger'=>'Niger',
                  'Ogun'=>'Ogun',
                  'Ondo'=>'Ondo',
                  'Osun'=>'Osun',
                  'Oyo'=>'Oyo',
                  'Plateau'=>'Plateau',
                  'Rivers'=>'Rivers',
                  'Sokoto'=>'Sokoto',
                  'Taraba'=>'Taraba',
                  'Yobe'=>'Yobe',
                  'Zamfara'=>'Zamfara',
                  'Cross River'=>'Cross River',
                  'Federal Capital Territory'=>'Federal Capital Territory',
                  'Akwa Ibom'=>'Akwa Ibom'
		);
echo Modules::run('template/layout', $data); 
			
		}   
	}

/*##################### ---Advertisement part---####################*/  


public function candidate_edu_info_view()
	{   
        $this->permission->module('hrm','read')->redirect();

		$data['title']    = display('educationinfo_list');  ;
		$data['edu']      = $this->Candidate_model->viewEduinfo();
		$data['module']   = "hrm";
		$data['page']     = "canInfoview";   
		echo Modules::run('template/layout', $data); 
	} 

	public function create_can_eduinfo()
	{ 
		/***** file upload code start ***********/ 

		$data['title'] = display('educationinfo_list');

		$this->form_validation->set_rules('can_id',display('can_id'));
		$this->form_validation->set_rules('degree_name[]',display('degree_name'),'xss_clean');
		$this->form_validation->set_rules('university_name[]',display('university_name'),'xss_clean');
		$this->form_validation->set_rules('cgp[]',display('cgp'),'xss_clean');
		$this->form_validation->set_rules('comments',display('comments')  ,'required|xss_clean');	
	    $unis = $this->input->post('university_name', TRUE);
	    $degs = $this->input->post('degree_name', TRUE);
	    $cgps = $this->input->post('cgp', TRUE);
 
		if ($this->form_validation->run() === true) {

			$id = $this->input->post('can_id', TRUE);

		    for ($i=0; $i < sizeof($unis); $i++) {
				$postData = array(
					'can_id' 	              => $this->input->post('can_id', TRUE),
					'university_name'         => $unis[$i],
					'degree_name' 	          => $degs[$i],
					'cgp' 	                  => $cgps[$i], 
					'comments' 	              => $this->input->post('comments',TRUE),
				);     
				$this->Candidate_model->caneduinfo_create($postData);
		    }

		    $this->session->set_flashdata('message', display('save_successfully'));
			redirect("hrm/Candidate/caninfo_create/$id/#tabs-3");



		} else {
			$data['title'] = display('create');
			$data['module'] = "hrm";
			$data['page']   = "can_edu_form"; 
			$data['dropdown_edu'] = $this->Candidate_model->eduinfo_dropdown();
			echo Modules::run('template/layout', $data);   
			
		}   
	}

	public function delete_can_edu_Info($id = null) 
	{ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Candidate_model->delete_canedu_info($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('hrm/manage-candidate');
	}


public function update_can_eduifo_form($id = null){
 		$this->form_validation->set_rules('can_id',display('can_id'));
		$this->form_validation->set_rules('degree_name[]',display('degree_name'),'xss_clean');
		$this->form_validation->set_rules('university_name[]',display('university_name'),'xss_clean');
		$this->form_validation->set_rules('cgp[]',display('cgp'),'xss_clean');
		$this->form_validation->set_rules('comments',display('comments')  ,'required|xss_clean');	
	    $unis = $this->input->post('university_name', TRUE);
	    $degs = $this->input->post('degree_name', TRUE);
	    $cgps = $this->input->post('cgp', TRUE);
		
		if ($this->form_validation->run() === true) {

		$this->db->where('can_id',$this->input->post('can_id', TRUE))
 			->delete('candidate_education_info');
			  

		    for ($i=0; $i < sizeof($unis); $i++) {
				$postData = array(
					'can_id' 	              => $this->input->post('can_id', TRUE),
					'university_name'         => $unis[$i],
					'degree_name' 	          => $degs[$i],
					'cgp' 	                  => $cgps[$i], 
					'comments' 	              => $this->input->post('comments',TRUE),
				);     
				
			
	      $this->db->insert('candidate_education_info', $postData);
		    }
		    
				$this->session->set_flashdata('message', display('successfully_updated'));
			
		
			redirect("hrm/Candidate/candidateinfo_view/". $id);

		} else {
			$data['title'] = display('update');
			$id= $this->uri->segment(4);
		    $data['data']=$this->Candidate_model->canEdu_updateForm($id);
		    $data['edu'] = $this->Candidate_model->upcanedu($id);
		     $data['work']=$this->Candidate_model->work($id);
		     $data['query']= $this->Candidate_model->get_eduinf_dropdown($id);
			$data['module'] = "hrm";
			
			$data['page']   = "update_canedu_form";   
			echo Modules::run('template/layout', $data); 
		}
 
	}

/***** workexperience start ***********/


public function workexperience_view()
	{   
        $this->permission->module('hrm','read')->redirect();

		$data['title']    = display('educationinfo_list');  ;
		$data['exp'] = $this->Candidate_model->viewExperience();
		$data['module'] = "hrm";
		$data['page']   = "workexperienceView";   
		echo Modules::run('template/layout', $data); 
	} 

	public function create_workexperience()
	{ 

		$data['title'] = display('workexperience_list');

		$this->form_validation->set_rules('can_id',display('can_id'),'required|xss_clean');
		$this->form_validation->set_rules('company_name[]',display('company_name'),'xss_clean');
		$this->form_validation->set_rules('working_period[]',display('working_period'),'xss_clean' );
		$this->form_validation->set_rules('duties[]',display('duties'),'xss_clean');
		$this->form_validation->set_rules('supervisor[]',display('supervisor'),'xss_clean');
        $comname = $this->input->post('company_name', TRUE);
	    $wperiod = $this->input->post('working_period', TRUE);
	    $duties = $this->input->post('duties', TRUE);
	    $supe = $this->input->post('supervisor', TRUE);
	  
		
		if ($this->form_validation->run() === true) {
 for ($i=0; $i < sizeof($comname); $i++) {
			$postData = array(
			'can_id' 	                   => $this->input->post('can_id',TRUE),
			'company_name'                 => $comname[$i],
			'working_period' 	           => $wperiod[$i],
			'duties' 	                   => $duties[$i], 
			'supervisor' 	               => $supe[$i]
			);   
			

			 $this->Candidate_model->canworkexp_create($postData);
		    }

		    $this->session->set_flashdata('message', display('save_successfully'));
			redirect("hrm/manage-candidate");



		}  else {
			$data['title'] = display('create');
			$data['module'] = "hrm";
			$data['page']   = "can_workexperience_form"; 
			$data['dropdown_edu'] = $this->Candidate_model->eduinfo_dropdown();
			echo Modules::run('template/layout', $data);   
			
		}   
	}

	public function update_workexperience_form($id = null){
 		$this->form_validation->set_rules('can_id',display('can_id'),'required|xss_clean');
		$this->form_validation->set_rules('company_name[]',display('company_name'),'xss_clean');
		$this->form_validation->set_rules('working_period[]',display('working_period'),'xss_clean' );
		$this->form_validation->set_rules('duties[]',display('duties'),'xss_clean');
		$this->form_validation->set_rules('supervisor[]',display('supervisor'),'xss_clean');
        $comname = $this->input->post('company_name', TRUE);
	    $wperiod = $this->input->post('working_period', TRUE);
	    $duties = $this->input->post('duties', TRUE);
	    $supe = $this->input->post('supervisor', TRUE);
	  	
	   
		if ($this->form_validation->run() === true) {
		    	$this->db->where('can_id',$this->input->post('can_id',TRUE))
 			->delete('candidate_workexperience');
			  

		 for ($i=0; $i < sizeof($comname); $i++) {
			$postData = array(
			'can_id' 	                   => $this->input->post('can_id',TRUE),
			'company_name'                 => $comname[$i],
			'working_period' 	           => $wperiod[$i],
			'duties' 	                   => $duties[$i], 
			'supervisor' 	               => $supe[$i], 
			);   
			
		
		 $this->db->insert('candidate_workexperience', $postData);
		    }
		    
				$this->session->set_flashdata('message', display('successfully_updated'));
			
		
			redirect("hrm/Candidate/candidateinfo_view/". $id);

		} 
		
		else {
			$data['title'] = display('update');
		    $data['data']=$this->Candidate_model->workexperience_updateForm($id);
		   $id= $this->uri->segment(4);
		    $data['work']=$this->Candidate_model->work($id);
			$data['module'] = "hrm";
			
			$data['page']   = "update_workexperience_form";   
			echo Modules::run('template/layout', $data); 
		}
 
	}
	public function delete_workexperience($id = null) 
	{ 
        $this->permission->module('hrm','delete')->redirect();

		if ($this->Candidate_model->delete_workexp($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('hrm/manage-candidate/#menu1');
	}


public function view_details(){
     $data=array();    
     $data['ab']=$this->Candidate_model->employee_details($id);
     $this->load->view('cv',$data);
 }
}
