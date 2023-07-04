<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_details extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'roomdetails_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('room_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/room_details/index');
        $config["total_rows"]  = $this->roomdetails_model->countlist();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
        /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["rateplanlist"] = $this->roomdetails_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('bed_edit');
		$data['intinfo']   = $this->roomdetails_model->findById($id);
	   }
		$data["allbeds"] = $this->roomdetails_model->allbeds();
		$data["allsizes"] = $this->roomdetails_model->allsizes();
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "roomlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('bed_add');
	  $this->form_validation->set_rules('roomtype',display('room_name'),'required|xss_clean');
	  $this->form_validation->set_rules('capacity',display('capacity'),'required|xss_clean');
	  $this->form_validation->set_rules('defaultrate',display('defaultrate'),'required|xss_clean');
	  $this->form_validation->set_rules('bedcharge',"Bed Charge",'required|xss_clean');
	  $this->form_validation->set_rules('personcharge',"Person Charge",'required|xss_clean');
	  $this->form_validation->set_rules('roomsize',display('roomsize'),'required|xss_clean');
	  $this->form_validation->set_rules('size_unit',display('size_unit'),'required|xss_clean');
	  $this->form_validation->set_rules('bedsno',display('bedsno'),'required|xss_clean');
	  $this->form_validation->set_rules('bedstype',display('bedstype'),'required|xss_clean');
	  $this->form_validation->set_rules('number_of_star',display('number_of_star'),'xss_clean');
	  $this->form_validation->set_rules('roomdescription',display('roomdescription'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $this->input->post('discount',true);
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('roomid', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'roomid'     	     	 => $this->input->post('roomid', TRUE),
		   'roomtype' 	             => $this->input->post('roomtype',TRUE),
		   'roomactive' 	         => "1",
		   'capacity' 	             => $this->input->post('capacity',TRUE),
		   'exbedcapability' 	     => $this->input->post('exbedcapability',TRUE),
		   'child_limit' 	         => $this->input->post('child_limit',TRUE),
		   'rate' 	             	 => $this->input->post('defaultrate',TRUE),
		   'bedcharge' 	             => $this->input->post('bedcharge',TRUE),
		   'personcharge' 	         => $this->input->post('personcharge',TRUE),
		   'roomsize' 	             => $this->input->post('roomsize',TRUE),
		   'roomsizemesurement' 	 => $this->input->post('size_unit',TRUE),
		   'bedsno' 	         	 => $this->input->post('bedsno',TRUE),
		   'bedstype' 	             => $this->input->post('bedstype',TRUE),
		   'number_of_star'          => $this->input->post('number_of_star',TRUE),
		   'roomdescription' 	     => $this->input->post('roomdescription',TRUE),
		   'reservecondition'        => $this->input->post('reservecondition',TRUE),
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->roomdetails_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/room-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/room-list"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
		    'roomid'     	     	 => $this->input->post('roomid', TRUE),
		   'roomtype' 	             => $this->input->post('roomtype',TRUE),
		   'roomactive' 	         => "1",
		   'capacity' 	             => $this->input->post('capacity',TRUE),
		   'exbedcapability' 	     => $this->input->post('exbedcapability',TRUE),
		   'child_limit' 	         => $this->input->post('child_limit',TRUE),
		   'rate' 	             	 => $this->input->post('defaultrate',TRUE),
		   'bedcharge' 	             => $this->input->post('bedcharge',TRUE),
		   'personcharge' 	         => $this->input->post('personcharge',TRUE),
		   'roomsize' 	             => $this->input->post('roomsize',TRUE),
		   'roomsizemesurement' 	 => $this->input->post('size_unit',TRUE),
		   'bedsno' 	         	 => $this->input->post('bedsno',TRUE),
		   'bedstype' 	             => $this->input->post('bedstype',TRUE),
		   'number_of_star'         => $this->input->post('number_of_star',TRUE),
		   'roomdescription' 	     => $this->input->post('roomdescription',TRUE),
		   'reservecondition'        => $this->input->post('reservecondition',TRUE),
		  );
	 
		if ($this->roomdetails_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/room-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('bed_edit');
		$data['intinfo']   = $this->roomdetails_model->findById($id);
	   }
	    #
        #pagination starts
        #
        $config["base_url"] = base_url('room_setting/room_details/index');
        $config["total_rows"]  = $this->roomdetails_model->countlist();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
        /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["rateplanlist"] = $this->roomdetails_model->read();
        $data["links"] = $this->pagination->create_links();
		
		$data["allbeds"] = $this->roomdetails_model->allbeds();
		$data["allsizes"] = $this->roomdetails_model->allsizes();
        #
        #pagination ends
        #   
	   $data['module'] = "room_setting";
	   $data['page']   = "roomlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('bed_edit');
		$data["allbeds"] = $this->roomdetails_model->allbeds();
		$data["allsizes"] = $this->roomdetails_model->allsizes();
		$data['intinfo']   = $this->roomdetails_model->findById($id);
        $data['module'] = "room_setting";  
        $data['page']   = "roomedit";
		$this->load->view('room_setting/roomedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->roomdetails_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/room-list');
    }
	
	public function roomassign(){
		 $data['title'] = display('assign_room');
		 $data["allroom"] = $this->roomdetails_model->allrooms();
		 $data['module'] = "room_setting";
	     $data['page']   = "roomassign";   
	     echo Modules::run('template/layout', $data); 
		}
	public function getfloorwithroom($id){
		 $data["allfloorwiseroom"] = $this->roomdetails_model->allfloor();
		 $data['crroomid'] = $id;
		 $data['module'] = "room_setting";
	     $data['page']   = "checkroomassign";   
	     $this->load->view('room_setting/checkroomassign', $data); 
		}
	public function roomassigninsert(){
		$roomid=$this->input->post('roomid', TRUE);
		$exitsroom=$this->db->select("roomid")->from('tbl_roomnofloorassign')->where('roomid',$roomid)->get()->row();
		if(!empty($exitsroom)){
		$this->db->where('roomid',$roomid)->delete('tbl_roomnofloorassign');
		}
		$floor="floorid_".$roomid;
		$allfloor=$this->input->post($floor, true);
		$totalfloor=count($allfloor);
		for($i=0;$i<$totalfloor;$i++){
			    $floorid=$allfloor[$i];
				$roomno="roomno".$allfloor[$i].$roomid;
				$allroomno=$this->input->post($roomno, true);
				$totalroom=count($allroomno);
				for($j=0;$j<$totalroom;$j++){
					$roomnoid=$allroomno[$j];					
						
						$postData = array(
					   'roomid'     	     	 => $roomid,
					   'floorid' 	             => $allfloor[$i],
					   'roomno' 	     		 => $roomnoid,
					  );
					  $this->db->insert('tbl_roomnofloorassign',$postData);
					}
				
			}
		$this->session->set_flashdata('message', display('save_successfully'));
		redirect('room_setting/assign-room');	
		}
	
	public function roomofferassign(){
		 $data['title'] = display('assign_roomoffer');
		 $data["allroom"] = $this->roomdetails_model->allrooms();
		 $data["allmonthyear"] = $this->roomdetails_model->allmonthyear();
		 $data['module'] = "room_setting";
	     $data['page']   = "roomofferassign";   
	     echo Modules::run('template/layout', $data); 
		}
	public function checkroomoffer(){
		 $data["allfloorwiseroom"] = $this->roomdetails_model->allfloor();
		 $id=$this->input->post('id', TRUE);
		 $data['crroomid']  =$id;
		 $data["roominfo"]=$this->roomdetails_model->findById($id);
		 $data['yearmonth'] =$this->input->post('yearmonth', TRUE);
		 $data['module'] = "room_setting";
	     $data['page']   = "checkroomoffer";   
	     $this->load->view('room_setting/checkroomoffer', $data); 
		}
	public function roomofferinsert(){
		$roomid=$this->input->post('roomid', TRUE);
		$days=$this->input->post('days', TRUE);
		$price=$this->input->post('price', TRUE);
		$offertitle=$this->input->post('offertitle', TRUE);
		$offertext=$this->input->post('offertext', TRUE);
		$exitsroom=$this->db->select("roomid")->from('tbl_room_offer')->where('roomid',$roomid)->get()->row();
		if(!empty($exitsroom)){
		$month=date("m", strtotime($days[0]));
		$year=date("Y", strtotime($days[0]));
					  $wherecondition="MONTH(offer_date)='".$month."' AND Year(offer_date)='".$year."'";
		$this->db->where('roomid',$roomid)->where($wherecondition)->delete('tbl_room_offer');
		}
		
		$totalpr=count($price);
		for($i=0;$i<$totalpr;$i++){
			if(!empty($price[$i])){
			$postData = array(
					   'roomid'     	     	 => $roomid,
					   'offer' 	                 => $price[$i],
					   'offertitle' 	         => $offertitle[$i],
					   'offertext' 	             => $offertext[$i],
					   'offer_date' 	     	 => $days[$i],
					  );
					  $this->db->insert('tbl_room_offer',$postData);
				}
			}
			$this->session->set_flashdata('message', display('save_successfully'));
			redirect('room_setting/assign-room-offer');	
		}
		
	public function facilitiesassign(){
		 $data['title'] = display('assign_facilities');
		 $data["allroom"] = $this->roomdetails_model->allrooms();
		 $data['module'] = "room_setting";
	     $data['page']   = "roomfacilitiassign";   
	     echo Modules::run('template/layout', $data); 
		}
	public function getfacilities($id){
		 $data["allfacilities"] = $this->roomdetails_model->allfacility();
		 $data['crroomid'] = $id;
		 $data['module'] = "room_setting";
	     $data['page']   = "checkroomfacility";   
	     $this->load->view('room_setting/checkroomfacility', $data); 
		}
	public function roomfacilitiassigninsert(){
		$roomid=$this->input->post('roomid', TRUE);
		$exitsroom=$this->db->select("room_id")->from('roomfaility_ref_accomodation')->where('room_id',$roomid)->get()->row();
		if(!empty($exitsroom)){
		$this->db->where('room_id',$roomid)->delete('roomfaility_ref_accomodation');
		}
		$service="services_".$roomid;
		$allservice=$this->input->post($service);
		$totalservice=count($allservice);
		for($i=0;$i<$totalservice;$i++){
			    $serviceid=$allservice[$i];
				$facility="facilities".$allservice[$i].$roomid;
				$allfacility=$this->input->post($facility);
				$totalfacility=count($allfacility);
				for($j=0;$j<$totalfacility;$j++){
					$getfacility=$allfacility[$j];
					
						$postData = array(
					   'room_id'     	     	 => $roomid,
					   'facilititypeid' 	     => $allservice[$i],
					   'facilityid' 	     	 => $getfacility,
					  );
					  $this->db->insert('roomfaility_ref_accomodation',$postData);
					}
				
			}
		$this->session->set_flashdata('message', display('save_successfully'));
		redirect('room_setting/assign-room-facilities');	
		}
 
}
