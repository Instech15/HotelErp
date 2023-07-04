<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'tax_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('tax_management','read')->redirect();
        $data['title']    = display('tax'); 
        $data["tax_details"] = $this->tax_model->read();
		if(!empty($id)) {
		$data['title'] = display('tax_management_edit');
		$data['intinfo']   = $this->tax_model->findById($id);
	   }
        $data['module'] = "tax_management";
        $data['page']   = "tax_list";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('tax_management_add');
	  $this->form_validation->set_rules('tax',display('tax'),'required|xss_clean');
	  $saveid=$this->session->userdata('id');
	  $data['intinfo']="";
	  if($this->input->post('isactive',TRUE)==NULL | $this->input->post('isactive',TRUE)==0){
		$tax = 0;
	  }else{
		  $tax=1;
	  }
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('tax_id', TRUE))) {
		 $data['tax_management']   = (Object) $postData = array(
		   'tax_id'     	 => $this->input->post('tax_id', TRUE),
		   'taxname' 	     => $this->input->post('tax',TRUE),
		   'rate' 	     => $this->input->post('rate',TRUE),
		   'reg_no' 	     => $this->input->post('reg_no',TRUE),
		   'isactive' 	     => $tax,
		  );
		$this->permission->method('tax_management','create')->redirect();
		if ($this->tax_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('tax_management/tax-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax_management/tax-list"); 
	
	   } else {
		$this->permission->method('tax_management','update')->redirect();
		$data['tax_management']   = (Object) $postData = array(
		   'tax_id'     	 => $this->input->post('tax_id', TRUE),
		   'taxname' 	     => $this->input->post('tax',TRUE),
		   'rate' 	     => $this->input->post('rate',TRUE),
		   'reg_no' 	     => $this->input->post('reg_no',TRUE),
		   'isactive' 	     => $tax,
		  );
	 
		if ($this->tax_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax_management/tax-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('tax_management_edit');
		$data['intinfo']   = $this->tax_model->findById($id);
	   }
	   
	   $data['module'] = "tax_management";
	   $data['page']   = "tax_list";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('tax_management','update')->redirect();
		$data['title'] = display('tax_management_edit');
		$data['intinfo']   = $this->tax_model->findById($id);
        $data['module'] = "tax_management";  
        $data['page']   = "taxedit";
		$this->load->view('tax_management/taxedit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('tax_management','delete')->redirect();
		
		if ($this->tax_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('tax_management/tax-list');
    }

	public function btype_details($id = null)
    {
        
		$this->permission->method('tax_management','read')->redirect();
        $data['title']    = display('b_ty_details'); 
        $data["tax_details"] = $this->tax_model->booking_details();
        $data["tax_list"] = $this->tax_model->tax_data();
		if(!empty($id)) {
			$data['title'] = display('b_ty_details_edit');
			$data['tydinfo']   = $this->tax_model->bdetailsById($id);
	   	}
          
        $data['module'] = "tax_management";
        $data['page']   = "tax_details";   
        echo Modules::run('template/layout', $data); 
    }

	
    public function b_type_create($id = null)
    {
	  $data['title'] = display('tax_management_add');
	  $this->form_validation->set_rules('tax',display('tax'),'required|xss_clean');
	  $this->form_validation->set_rules('booking_sourse',display('booking_sourse'),'required|xss_clean');
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('btypeinfoid', TRUE))) {
		 $data['tax_management']   = (Object) $postData = array(
		   'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
		   'tax' 	     => $this->input->post('tax',TRUE),
		   'booking_sourse' 	 => $this->input->post('booking_sourse',TRUE),
		   'commissionrate' 	 => $this->input->post('commissionrate',TRUE),
		  );
		$this->permission->method('tax_management','create')->redirect();
		if ($this->tax_model->create_ty_d($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('tax_management/booking-type-details');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax/tax-details"); 
	
	   } else {
		$this->permission->method('tax_management','update')->redirect();
		$data['tax_management']   = (Object) $postData = array(
			'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
			'tax' 	     => $this->input->post('tax',TRUE),
			'booking_sourse' 	 => $this->input->post('booking_sourse',TRUE),
			'commissionrate' 	 => $this->input->post('commissionrate',TRUE),
		  );
		
	 
		if ($this->tax_model->update_ty_d($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax/tax-details");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('b_ty_details_edit');
		$data['btyinfo']   = $this->tax_model->bdetailsById($id);
	   }
	   $data["tax_details"] = $this->tax_model->booking_details();
       $data["tax_list"] = $this->tax_model->tax_data();
	   $data['module'] = "tax_management";
	   $data['page']   = "tax_details";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }

	public function tydupdateintfrm($id){
	  
		$this->permission->method('tax_management','update')->redirect();
		$data['title'] = display('b_ty_details_edit');
		$data['btyinfo']   = $this->tax_model->bdetailsById($id);
		$data["tax_list2"] = $this->tax_model->tax_data2();
        $data['module'] = "tax_management";  
        $data['page']   = "tax_details_edit";
		$this->load->view('tax_management/tax_details_edit', $data);   
	}
	public function payfrm($id){
	  
		$this->permission->method('tax_management','update')->redirect();
		$data['title'] = "Payment Form";
		$data['btyinfo']   = $this->tax_model->bdetailsById($id);
        $data['module'] = "tax_management";  
        $data['page']   = "tax_details_payment";
		$this->load->view('tax_management/tax_details_payment', $data);   
	}
	public function commissionpayment(){
	  $this->form_validation->set_rules('btypeinfoid',"Commission Name",'required|xss_clean');
	  $this->form_validation->set_rules('paid_amount',display('amount'),'required|xss_clean');
	  if ($this->form_validation->run()) { 
		$this->permission->method('tax_management','update')->redirect();
		$totalamount = $this->db->select("balance,paid_amount,due_amount")->from("tbl_tax_info")->where("btypeinfoid",$this->input->post('btypeinfoid', TRUE))->get()->row();
		$paid_amount = $totalamount->paid_amount + $this->input->post('paid_amount',TRUE);
		$due_amount = $totalamount->balance - $paid_amount;
		$balance = $totalamount->balance - $this->input->post('paid_amount',TRUE);
		if($balance<0){
			$this->session->set_flashdata('exception', "Please pay less or equal to due amount");
			redirect('tax_management/booking-type-details');
		}
		$data['tax_management']   = (Object) $postData = array(
			'btypeinfoid'     	 => $this->input->post('btypeinfoid', TRUE),
			'balance' 	     =>$balance,
			'paid_amount' 	     =>$paid_amount,
			'due_amount' 	     =>$due_amount,
		  );
		  if ($this->tax_model->update_ty_d($postData)) { 
			$this->session->set_flashdata('message', "Payment Successful");
			redirect('tax_management/booking-type-details');
		   } else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		   }
	  }else{
		$data["tax_details"] = $this->tax_model->booking_details();
		$data["tax_list"] = $this->tax_model->tax_data();
		$data['module'] = "tax_management";
		$data['page']   = "tax_details";   
		echo Modules::run('template/layout', $data);
	  }
	}
	public function deletetyd($id = null)
    {
        $this->permission->module('tax_management','delete')->redirect();
		
		if ($this->tax_model->delete2($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('tax_management/booking-type-details');
    }

	public function complementary($id = null)
    {
		$this->permission->method('tax_management','read')->redirect();
        $data['title']    = display('complementary_list'); 
        $data["complist"] = $this->tax_model->read_complementary();	
        $data["roomtype"] = $this->tax_model->roomtype();	
		if(!empty($id)) {
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->tax_model->complementaryById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "tax_management";
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
		 $data['tax_management']   = (Object) $postData = array(
		   'complementaryname' 	        => $this->input->post('complementaryname',TRUE),
		   'roomtype' 	         		=> $this->input->post('roomtype',TRUE),
		   'rate' 	         			=> $this->input->post('rate',TRUE),
		   'status'						=>1
		  );
		$this->permission->method('tax_management','create')->redirect();
		if ($this->tax_model->complementary_create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('tax_management/complementary-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax/tax"); 
	
	   } else {
		$this->permission->method('tax_management','update')->redirect();
		$data['tax_management']   = (Object) $postData = array(
			'complementary_id'     	     	=> $this->input->post('complementary_id', TRUE),
			'complementaryname' 	        => $this->input->post('complementaryname',TRUE),
			'roomtype' 	         			=> $this->input->post('roomtype',TRUE),
			'rate' 	         				=> $this->input->post('rate',TRUE),
		  );
	 
		if ($this->tax_model->complementary_update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("tax/tax");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->tax_model->complementaryById($id);
		$data["roomtype"] = $this->tax_model->roomtype();	

	   }
	   
	   $data['module'] = "tax_management";
	   $data['page']   = "complementarylist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function comupdateintfrm($id){
	  
		$this->permission->method('tax_management','update')->redirect();
		$data['title'] = display('complementary_edit');
		$data['intinfo']   = $this->tax_model->complementaryById($id);
		$data["roomtype"] = $this->tax_model->roomtype();
        $data['module'] = "tax_management";  
        $data['page']   = "complementaryedit";
		$this->load->view('tax_management/complementaryedit', $data);   
	   }
 
    public function comdelete($id = null)
    {
        $this->permission->module('tax_management','delete')->redirect();
		
		if ($this->tax_model->compdelete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('tax_management/complementary-list');
    }
 
}
