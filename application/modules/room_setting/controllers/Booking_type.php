<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_type extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'bookingtype_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('bookingtype'); 
        $data["booking_type"] = $this->bookingtype_model->read();
		if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->bookingtype_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "bookingtype_list";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('room_setting_add');
	  $this->form_validation->set_rules('booking_type',display('booking_type'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('booktypeid', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'booktypeid'     	 => $this->input->post('booktypeid', TRUE),
		   'booktypetitle' 	     => $this->input->post('booking_type',TRUE),
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->bookingtype_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/booking-type-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/booking-type-list"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
		   'booktypeid'     	 => $this->input->post('booktypeid', TRUE),
		   'booktypetitle' 	     => $this->input->post('booking_type',TRUE),
		  );
	 
		if ($this->bookingtype_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/booking-type-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->bookingtype_model->findById($id);
	   }
	   
	   $data['module'] = "room_setting";
	   $data['page']   = "bookingtype_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('room_setting_edit');
		$data['intinfo']   = $this->bookingtype_model->findById($id);
        $data['module'] = "room_setting";  
        $data['page']   = "bookingtypeedit";
		$this->load->view('room_setting/bookingtypeedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->bookingtype_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/booking-type-list');
    }

	public function btype_details($id = null)
    {
        
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('b_ty_details'); 
        $data["booking_type_details"] = $this->bookingtype_model->booking_details();
        $data["booking_type_list"] = $this->bookingtype_model->booking_type_data();
		if(!empty($id)) {
			$data['title'] = display('b_ty_details_edit');
			$data['tydinfo']   = $this->bookingtype_model->bdetailsById($id);
	   	}
          
        $data['module'] = "room_setting";
        $data['page']   = "bookingtype_details";   
        echo Modules::run('template/layout', $data); 
    }

	
    public function b_type_create($id = null)
    {
	  $data['title'] = display('room_setting_add');
	  $this->form_validation->set_rules('booking_type',display('booking_type'),'required|xss_clean');
	  $this->form_validation->set_rules('booking_sourse',display('booking_sourse'),'required|xss_clean');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('btypeinfoid', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
		   'booking_type' 	     => $this->input->post('booking_type',TRUE),
		   'booking_sourse' 	 => $this->input->post('booking_sourse',TRUE),
		   'commissionrate' 	 => $this->input->post('commissionrate',TRUE),
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->bookingtype_model->create_ty_d($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/booking-type-details');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/booking-type-details"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
			'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
			'booking_type' 	     => $this->input->post('booking_type',TRUE),
			'booking_sourse' 	 => $this->input->post('booking_sourse',TRUE),
			'commissionrate' 	 => $this->input->post('commissionrate',TRUE),
		  );
		
	 
		if ($this->bookingtype_model->update_ty_d($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/booking-type-details");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('b_ty_details_edit');
		$data['btyinfo']   = $this->bookingtype_model->bdetailsById($id);
	   }
	   $data["booking_type_details"] = $this->bookingtype_model->booking_details();
       $data["booking_type_list"] = $this->bookingtype_model->booking_type_data();
	   $data['module'] = "room_setting";
	   $data['page']   = "bookingtype_details";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }

	public function tydupdateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('b_ty_details_edit');
		$data['btyinfo']   = $this->bookingtype_model->bdetailsById($id);
		$data["booking_type_list2"] = $this->bookingtype_model->booking_type_data2();
        $data['module'] = "room_setting";  
        $data['page']   = "bookingtype_details_edit";
		$this->load->view('room_setting/bookingtype_details_edit', $data);   
	}
	public function payfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = "Payment Form";
		$data['btyinfo']   = $this->bookingtype_model->bdetailsById($id);
        $data['module'] = "room_setting";  
        $data['page']   = "bookingtype_details_payment";
		$this->load->view('room_setting/bookingtype_details_payment', $data);   
	}
	public function commissionpayment(){
	  $this->form_validation->set_rules('btypeinfoid',"Commission Name",'required|xss_clean');
	  $this->form_validation->set_rules('paid_amount',display('amount'),'required|xss_clean');
	  if ($this->form_validation->run()) { 
		$this->permission->method('room_setting','update')->redirect();
		$totalamount = $this->db->select("paid_amount,due_amount")->from("tbl_booking_type_info")->where("btypeinfoid",$this->input->post('btypeinfoid', TRUE))->get()->row();
		$paid_amount = $totalamount->paid_amount + $this->input->post('paid_amount',TRUE);
		$due_amount = $totalamount->due_amount - $this->input->post('paid_amount',TRUE);
		$acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode","1020101")->get()->row();
		if(empty($acc_cash)){
			$this->session->set_flashdata('exception', "You does not have any balance on account cash.");
			redirect('room_setting/booking-type-details');
		}else{
			$amount = $this->input->post('paid_amount', TRUE);
			if(($acc_cash->current_balance-$amount)<0){
				$this->session->set_flashdata('exception', "You does not have ".$amount." amount on account cash.");
				redirect('room_setting/booking-type-details');
			}
		}
		if($due_amount<0){
			$this->session->set_flashdata('exception', "Please pay less or equal to due amount");
			redirect('room_setting/booking-type-details');
		}
		$data['room_setting']   = (Object) $postData = array(
			'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
			'paid_amount' 	     =>$paid_amount,
			'due_amount' 	     =>$due_amount,
		  );
		  if ($this->bookingtype_model->update_ty_d($postData)) { 
			  	//cash credited for commission payment
				$invoice_no = date("YmdHis");
				$newdate = date("Y-m-d H:i");
				$saveid = $this->session->userdata('id');
				$narration = 'Cash in Hand Credited For payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Comission', $newdate, 1020101, $narration, 0, $this->input->post('paid_amount',TRUE), 0, 1, $saveid, $newdate, 1);
				//comission debited for paid amount
				$narration = 'Comission debited For payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Comission', $newdate, 4020601, $narration, $this->input->post('paid_amount',TRUE), 0, 0, 1, $saveid, $newdate, 1);
				$this->session->set_flashdata('message', "Payment Successful");
				redirect('room_setting/booking-type-details');
		   } else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		   }
	  }else{
		$data["booking_type_details"] = $this->bookingtype_model->booking_details();
		$data["booking_type_list"] = $this->bookingtype_model->booking_type_data();
		$data['module'] = "room_setting";
		$data['page']   = "bookingtype_details";   
		echo Modules::run('template/layout', $data);
	  }
	}
	public function deletetyd($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->bookingtype_model->delete2($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/booking-type-details');
    }

	public function complementary($id = null)
    {
		$this->permission->method('room_setting','read')->redirect();
        $data['title']    = display('complementary_list'); 
        $data["complist"] = $this->bookingtype_model->read_complementary();	
        $data["roomtype"] = $this->bookingtype_model->roomtype();	
		if(!empty($id)) {
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->bookingtype_model->complementaryById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "room_setting";
        $data['page']   = "complementarylist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function complementary_create($id = null)
    {
	  $data['title'] = display('complementary_add');
	  $this->form_validation->set_rules('complementaryname','Complementary Name','required|xss_clean');
	  $this->form_validation->set_rules('roomtype','Room Type','required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('complementary_id', TRUE))) {
		 $data['room_setting']   = (Object) $postData = array(
		   'complementaryname' 	        => $this->input->post('complementaryname',TRUE),
		   'roomtype' 	         		=> $this->input->post('roomtype',TRUE),
		   'rate' 	         			=> $this->input->post('rate',TRUE),
		   'status'						=>1
		  );
		$this->permission->method('room_setting','create')->redirect();
		if ($this->bookingtype_model->complementary_create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('room_setting/complementary-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/complementary-list"); 
	
	   } else {
		$this->permission->method('room_setting','update')->redirect();
		$data['room_setting']   = (Object) $postData = array(
			'complementary_id'     	     	=> $this->input->post('complementary_id', TRUE),
			'complementaryname' 	        => $this->input->post('complementaryname',TRUE),
			'roomtype' 	         			=> $this->input->post('roomtype',TRUE),
			'rate' 	         				=> $this->input->post('rate',TRUE),
		  );
	 
		if ($this->bookingtype_model->complementary_update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("room_setting/complementary-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->bookingtype_model->complementaryById($id);
		$data["roomtype"] = $this->bookingtype_model->roomtype();	

	   }
	   
	   $data['module'] = "room_setting";
	   $data['page']   = "complementarylist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function comupdateintfrm($id){
	  
		$this->permission->method('room_setting','update')->redirect();
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->bookingtype_model->complementaryById($id);
		$data["roomtype"] = $this->bookingtype_model->roomtype();
        $data['module'] = "room_setting";  
        $data['page']   = "complementaryedit";
		$this->load->view('room_setting/complementaryedit', $data);   
	   }
 
    public function comdelete($id = null)
    {
        $this->permission->module('room_setting','delete')->redirect();
		
		if ($this->bookingtype_model->compdelete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('room_setting/complementary-list');
    }
 
}
