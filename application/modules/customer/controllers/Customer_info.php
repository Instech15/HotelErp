<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_info extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'customer_model'
		));	
    }
 
    public function index($id = null)
    {
		$this->permission->method('customer','read')->redirect();
        $data['title']    = display('customer_list'); 
        $data["customer_infolist"] = $this->customer_model->read();

		if(!empty($id)) {
		$data['title'] = display('customer');
		$data['intinfo']   = $this->customer_model->findById($id);
	   }
        #pagination ends
        #   
        $data['module'] = "customer";
        $data['page']   = "customerlist";   
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
	
    public function create($id = null)
    {
	  $this->load->library(array('my_form_validation'));
	  $data['title'] = display('customer');
	  $this->form_validation->set_rules('firstname',display('firstname'),'required|xss_clean');
	  $this->form_validation->set_rules('lastname',display('lastname'),'required|xss_clean');
	  if(empty($this->input->post('customerid',TRUE))){
		$custphone = $this->db->select("cust_phone")->from("customerinfo")->where("cust_phone",$this->input->post('phone',TRUE))->get()->row();	  
		if(!empty($custphone)){
		  $this->session->set_flashdata('exception', 'Customer Phone number must be unique value');
		  redirect($_SERVER['HTTP_REFERER']);
		}
	  }else{
		$custphone = $this->db->select("cust_phone")->from("customerinfo")->where("customerid !=",$this->input->post('customerid',TRUE))->where("cust_phone",$this->input->post('phone',TRUE))->get()->row();	  
		if(!empty($custphone)){
			$this->session->set_flashdata('exception',  "Customer Phone number must be unique value");
		  redirect($_SERVER['HTTP_REFERER']);
		}
	  }
	  $this->form_validation->set_rules('email',display('email'),'required|xss_clean|valid_email');
	  if($this->input->post('nationaliti',TRUE)=='foreigner'){
	  $this->form_validation->set_rules('national_id',display('national_id'),'xss_clean|is_natural');
	  $this->form_validation->set_rules('nationalitycon',display('nationality'),'required|xss_clean');
	  $this->form_validation->set_rules('passport_no',display('passport_no'),'required|xss_clean');
	  $this->form_validation->set_rules('visa_reg_no',display('visa_reg_no'),'required|xss_clean');
	  $this->form_validation->set_rules('purpose',display('purpose'),'required|xss_clean');
	  }
	  $this->form_validation->set_rules('address',display('address'),'xss_clean');
	  $saveid=$this->session->userdata('id');
	  $this->input->post('discount',true);
	  
	  $data['intinfo']="";
	  if ($this->form_validation->run($this)) { 
	   if(empty($this->input->post('customerid',TRUE))) {
		$this->permission->method('customer','create')->redirect();
		  $lastid=$this->db->select("*")->from('customerinfo')->order_by('customerid','desc')->get()->row();
		if(!empty($lastid)){
			$sl=$lastid->customerid;
			}
		else{
			$sl = "0001"; 
			}
		$nextno=$sl+1;
		$si_length = strlen((int)$nextno); 
		
		$str = '0000';
		$cutstr = substr($str, $si_length); 
		$sino = $cutstr.$nextno; 
		
		$postData = array(
		   'customerid'     	        => $this->input->post('customerid',TRUE),
		   'firstname'     	    		=> $this->input->post('firstname',TRUE),
		   'customernumber' 	        => $sino,
		   'lastname' 	        		=> $this->input->post('lastname',TRUE),
		   'cust_phone' 	         	=> $this->input->post('phone',TRUE),
		   'email' 	             		=> $this->input->post('email',TRUE),
		   'dob' 	             		=> $this->input->post('dob',TRUE),
		   'profession' 	         	=> $this->input->post('profession',TRUE),
		   'isnationality' 	         	=> $this->input->post('nationaliti',TRUE),
		   'pid' 	         		    => $this->input->post('national_id',TRUE),
		   'nationality' 	         	=> $this->input->post('nationalitycon',TRUE),
		   'passport' 	         		=> $this->input->post('passport_no',TRUE),
		   'visano' 	         		=> $this->input->post('visa_reg_no',TRUE),
		   'purpose' 	         		=> $this->input->post('purpose',TRUE),
		   'address' 	         		=> $this->input->post('address',TRUE),
		   'signupdate'					=> date('Y-m-d')
		  );
		$this->db->insert('customerinfo',$postData);
		$customerid = $this->db->insert_id();
		
		$coa = $this->customer_model->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="102030101";
        }
		//insert Coa for Customer Receivable
		$c_name = $this->input->post('firstname',TRUE)." ".$this->input->post('lastname',TRUE);
        $c_acc=$sino.'-'.$c_name;
		$createdate=date('Y-m-d H:i:s');
		
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('customer/customer-list');
	
	   } else {
		$this->permission->method('customer','update')->redirect();
		$coahead=$this->input->post('coahead',TRUE);
		$newheadname=$this->input->post('customernumber',TRUE).'-'.$this->input->post('firstname',TRUE).' '.$this->input->post('lastname',TRUE);
		$data['customer']   = (Object) $postData3 = array(
		   'customerid'     	        => $this->input->post('customerid',TRUE),
		   'firstname'     	    		=> $this->input->post('firstname',TRUE),
		   'lastname' 	        		=> $this->input->post('lastname',TRUE),
		   'cust_phone' 	         	=> $this->input->post('phone',TRUE),
		   'email' 	             		=> $this->input->post('email',TRUE),
		   'dob' 	             		=> $this->input->post('dob',TRUE),
		   'profession' 	         	=> $this->input->post('profession',TRUE),
		   'isnationality' 	         	=> $this->input->post('nationaliti',TRUE),
		   'pid' 	         		    => $this->input->post('national_id',TRUE),
		   'nationality' 	         	=> $this->input->post('nationalitycon',TRUE),
		   'passport' 	         		=> $this->input->post('passport_no',TRUE),
		   'visano' 	         		=> $this->input->post('visa_reg_no',TRUE),
		   'purpose' 	         		=> $this->input->post('purpose',TRUE),
		   'address' 	         		=> $this->input->post('address',TRUE),
		   'signupdate'					=>	date('Y-m-d')
		  );
	 
		if ($this->customer_model->update($postData3)) { 
		 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("customer/customer-list");  
	   }
	  } else { 
		    if(!empty($id)) {
				$data['title'] = display('update_customer');
				$data['intinfo']   = $this->customer_model->findById($id);
				$data['module'] = "customer";
				$data['page']   = "customeredit";   
				echo Modules::run('template/layout', $data); 
		   }else{
	   
		   $data['module'] = "customer";
		   $data['page']   = "addcustomerlist";   
		   echo Modules::run('template/layout', $data); 
		}
	   }   
 
    }
    public function updateintfrm($id){
		$this->permission->method('customer','update')->redirect();
		$customerinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$id)->get()->row();
		$data['title'] = display('customer_edit');
		$data['intinfo']   = $this->customer_model->findById($id);
        $data['module'] = "customer";  
        $data['page']   = "customeredit";
        echo Modules::run('template/layout', $data); 
	}
	
   public function payfrm($id){
		$this->permission->method('customer','update')->redirect();
		$data['title'] = "Payment Confirmation";
		$data['intinfo']   = $this->customer_model->findById($id);
		$data["invoicelist"] = $this->customer_model->invoicelist(); 
        $data['module'] = "customer";  
        $data['page']   = "payform";
        $this->load->view('customer/payform', $data); 
	   }
    public function paymentconfirm(){
	$this->form_validation->set_rules('customerid',display('customer'),'required|xss_clean');
	if(empty($this->input->post('amount', TRUE))){
		$this->form_validation->set_rules('paid_amount',display('amount'),'required|xss_clean');
	}else{
		$this->form_validation->set_rules('amount',display('amount'),'required|xss_clean');
	}
	$this->form_validation->set_rules('paymenttype',"payment Type",'required|xss_clean');
	if ($this->form_validation->run()) { 
		$customerinfo=$this->db->select("balance")->from('customerinfo')->where('customerid',$this->input->post('customerid',TRUE))->get()->row();
		if($this->input->post('paymenttype',TRUE)=="pay"){
			$acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode","1020101")->get()->row();
			if(empty($acc_cash)){
				$this->session->set_flashdata('exception', "You does not have any balance on account cash.");
				redirect('customer/customer-list');
			}else{
				$amount = $this->input->post('paid_amount', TRUE);
				if(($acc_cash->current_balance-$amount)<0){
					$this->session->set_flashdata('exception', "You does not have ".$amount." amount on account cash.");
					redirect('customer/customer-list');
				}
			}
			$balance = $customerinfo->balance - $amount;
		}
		else if($this->input->post('paymenttype',TRUE)=="refund"){
			$acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode","1020101")->get()->row();
			if(empty($acc_cash)){
				$this->session->set_flashdata('exception', "You does not have any balance on account cash.");
				redirect('customer/customer-list');
			}else{
				$bookedid = $this->input->post('bookedid', TRUE);
				$amount = $this->input->post('amount', TRUE);
				$charge = $this->input->post('charge', TRUE);
				$days = $this->input->post('days', TRUE);
				$bsource = $this->input->post('bsource', TRUE);
				$comission = $this->input->post('comission', TRUE);
				if(($acc_cash->current_balance-$amount)<0){
					$this->session->set_flashdata('exception', "You does not have ".$amount." amount on account cash.");
					redirect('customer/customer-list');
				}
			}
			$balance = $customerinfo->balance;
		}else{
			$bookedid = $this->input->post('bookedid', TRUE);
			$customer = $this->db->select("b.cutomerid,c.balance")->from("booked_info b")->join("customerinfo c","c.customerid=b.cutomerid","left")->where("bookedid",$bookedid)->get()->row();
			$paid_amount = $this->input->post('paid_amount', TRUE);
			$max_amount = $this->input->post('max_amount', TRUE);
			$bookinstatus = $this->input->post('bookingstatus', TRUE);
			if($paid_amount > $max_amount){
				$this->session->set_flashdata('exception', "Customer does not have ".$paid_amount." Due amount.");
				redirect('customer/customer-list');
			}else{
				$balance = $customerinfo->balance + $paid_amount;
				if($bookinstatus==5){
					$oldcredit = $this->db->select("credit")->from("tbl_postedbills")->where("bookedid", $bookedid)->get()->row();
					$newcredit = $oldcredit->credit - $paid_amount;
					$newbalance = $customer->balance + $paid_amount;
					$this->db->where("bookedid", $bookedid)->update("tbl_postedbills", array("credit"=> $newcredit));
					$this->db->where("customerid", $customer->cutomerid)->update("customerinfo", array("balance"=> $newbalance));
				}else{
					//insert into guest paymnet
					$payinfo=$this->db->select("*")->from('tbl_guestpayments')->order_by('payid','desc')->get()->row();
					if(!empty($payinfo)){
						$invoicenum=$payinfo->invoice;
					}else{
						$invoicenum = "000000"; 
					}
					$nextno=$invoicenum+1;
					$bk_length = strlen((int)$nextno); 
					$bkstr = '000000';
					$bknumber = substr($bkstr, $bk_length); 
					$invoice_no = $bknumber.$nextno;
					$newdate = date("Y-m-d H:i:s");
					$saveid = $this->session->userdata('id');
					if($this->input->post('hallroom', TRUE)!="1"){
						$oldpaid_amount = $this->db->select("paid_amount")->from("booked_info")->where("bookedid", $bookedid)->get()->row();
						$newpaid_amount = $oldpaid_amount->paid_amount + $paid_amount;
						$postData = array(
							'bookedid' 	         	 => $bookedid,
							'invoice' 	             => $invoice_no,
							'paydate' 	             => $newdate,
							'paymenttype' 	         => 'Cash Payment',
							'paymentamount' 	     => $newpaid_amount,
							'details' 	     		 => "Advance in Card/Account No:  Bank Name: ",
							'book_type'				 => 0,
							);
					}else{
						$oldpaid_amount = $this->db->select("totalamount,paid_amount,payment_status")->from("tbl_hallroom_booking")->where("hbid", $bookedid)->get()->row();
						$newpaid_amount = $oldpaid_amount->paid_amount + $paid_amount;
						$postData = array(
							'bookedid' 	         	 => $bookedid,
							'invoice' 	             => $invoice_no,
							'paydate' 	             => $newdate,
							'paymenttype' 	         => 'Cash Payment',
							'paymentamount' 	     => $newpaid_amount,
							'details' 	     		 => "Advance in Card/Account No:  Bank Name: ",
							'book_type'				 => 1,
							);
					}
					
					if($this->input->post('hallroom', TRUE)!="1"){
						$paymentcheck = $this->db->select("payid")->from('tbl_guestpayments')->where('bookedid', $bookedid)->where('book_type',0)->get()->row();
					}else{
						$paymentcheck = $this->db->select("payid")->from('tbl_guestpayments')->where('bookedid', $bookedid)->where('book_type',1)->get()->row();
					}
					if(!empty($paymentcheck)){
						$this->db->where('bookedid',$bookedid)->update("tbl_guestpayments",$postData);
					}else{
						$this->db->insert('tbl_guestpayments', $postData);
					}
					//update booking data
					if($this->input->post('hallroom', TRUE)!="1"){
						$this->db->where("bookedid", $bookedid)->update("booked_info", array("paid_amount"=>$newpaid_amount));
						$this->db->where("bookedid", $bookedid)->update("booked_details", array("advance_amount"=> $newpaid_amount));
					}else{
						if($oldpaid_amount->totalamount<=$newpaid_amount){
							$payment_status = 1;
						}else{
							$payment_status = 2;
						}
						$this->db->where("hbid", $bookedid)->update("tbl_hallroom_booking", array("paid_amount"=>$newpaid_amount,"payment_status"=>$payment_status));
					}
				}
			}
		}
		if($this->input->post('hallroom', TRUE)!="1"){
			$data['customer']   = (Object) $postData3 = array(
				'customerid'     	        => $this->input->post('customerid',TRUE),
				'balance'     	    		=> $balance,
			   );
		}
	if ($this->input->post('hallroom', TRUE)=="1" | (!empty($postData3)??$this->customer_model->update($postData3)) ) { 		 
		//Account transcation customer payment
		if($this->input->post('hallroom', TRUE)!="1"){
			$invoice_no = $bookedid;
		}else{
			$invoice_no = "H-".$bookedid;
		}
		$newdate = date("Y-m-d H:i");
		$saveid = $this->session->userdata('id');
		$remarks = $this->input->post('remarks', TRUE);
		if($this->input->post('paymenttype',TRUE)!="pay" & $this->input->post('paymenttype',TRUE)!="refund"){
			$narration = 'Cash in Hand Debited For '.$remarks.' payment Invoice# '.$invoice_no;
			transaction($invoice_no, 'Customer Payment', $newdate, 1020101, $narration, $this->input->post('paid_amount',TRUE), 0, 0, 1, $saveid, $newdate, 1);
			if($this->input->post('hallroom', TRUE)!="1"){
				$narration = 'Hotel Credited For '.$remarks.' payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Customer Payment', $newdate, 30301, $narration, 0, $this->input->post('paid_amount',TRUE), 0, 1, $saveid, $newdate, 1);
			}else{
				$narration = 'Hotel Hall Room Credited For '.$remarks.' payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Customer Payment', $newdate, 30305, $narration, 0, $this->input->post('paid_amount',TRUE), 0, 1, $saveid, $newdate, 1);
			}
			$narration = 'Customer Debited For '.$remarks.' payment Invoice# '.$invoice_no;
			transaction($invoice_no, 'Customer Payment', $newdate, 102030101, $narration, $this->input->post('paid_amount',TRUE), 0, 0, 1, $saveid, $newdate, 1);
			$narration = 'Customer Credited For '.$remarks.' payment Invoice# '.$invoice_no;
			transaction($invoice_no, 'Customer Payment', $newdate, 102030101, $narration, 0, $this->input->post('paid_amount',TRUE), 0, 1, $saveid, $newdate, 1);
		}else{
			if($this->input->post('paymenttype',TRUE)=="refund"){
				if($this->input->post('hallroom', TRUE)!="1"){
					$this->db->where("bookedid", $bookedid)->update("tbl_postedbills", array("days"=>$days,"amount"=>$amount,"charge"=>$charge,"remarks"=>$remarks));
				}else{
					$this->db->where("hbid", $bookedid)->update("tbl_hallroom_booking", array("payment_status"=>3));
					$this->db->where("hrbooking", $bookedid)->update("tbl_hallroom_postbill", array("refund_charge"=>$charge,"remarks"=>$remarks));
				}
				if(!empty($bsource)){
					$oldcomission = $this->db->select("balance,due_amount")->from("tbl_booking_type_info")->where("booking_source", $bsource)->get()->row();
					$balance = $oldcomission->balance - $commission;  
					$due_amount = $oldcomission->due_amount - $commission;  
					$this->db->where("booking_source", $bsource)->update("tbl_booking_type_info", array("balance"=>$balance, "due_amount"=>$due_amount));
				}
			}
			$narration = 'Cash in Hand Credited For '.$remarks.' payment Invoice# '.$invoice_no;
			transaction($invoice_no, 'Customer Payment', $newdate, 1020101, $narration, 0, $amount, 0, 1, $saveid, $newdate, 1);
			if($this->input->post('hallroom', TRUE)!="1"){
				$narration = 'Hotel Debited For '.$remarks.' payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Customer Payment', $newdate, 30301, $narration, $amount, 0, 0, 1, $saveid, $newdate, 1);
			}else{
				$narration = 'Hotel Hall Room Debited For '.$remarks.' payment Invoice# '.$invoice_no;
				transaction($invoice_no, 'Customer Payment', $newdate, 30305, $narration, $amount, 0, 0, 1, $saveid, $newdate, 1);
			}
		}
		 $this->session->set_flashdata('message', "Payment Successful");
		 redirect("customer/customer-list");  
		} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
	}
		$data["customer_infolist"] = $this->customer_model->read();
		$data['module'] = "customer";
		$data['page']   = "customerlist";   
		echo Modules::run('template/layout', $data);
	}
    public function delete($id = null)
    {
        $this->permission->module('customer','delete')->redirect();
		if ($this->customer_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('customer/customer-list');
    }
	public function guestlist($id = null)
    {
		$this->permission->method('customer','read')->redirect();
        $data['title']    = display('guest_list'); 
        $data["guestinfo"] = $this->customer_model->guestread();
        $data['module'] = "customer";
        $data['page']   = "guestlist";   
        echo Modules::run('template/layout', $data); 
    }
	public function guestupdate($id){
	  
		$this->permission->method('customer','update')->redirect();
		$data['title'] = display('customer_edit');
		$data['intinfo']   = $this->customer_model->findByGuestId($id);
        $data['module'] = "customer";  
        $data['page']   = "guestedit";
		$this->load->view('customer/guestedit', $data);   
	   }
	   public function updateguest(){
		$this->form_validation->set_rules('guestname',"Guest Name",'required|xss_clean');
		if ($this->form_validation->run()) { 
			$data['customer']   = (Object) $postData3 = array(
				'otherguest_id'     	        => $this->input->post('guestid',TRUE),
				'guestname'     	        => $this->input->post('guestname',TRUE),
			   );
		if ($this->customer_model->guestupdate($postData3)) { 		 
			 $this->session->set_flashdata('message', display('update_successfully'));
			 redirect("customer/guest-list");  
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
		}
			$data["customer_infolist"] = $this->customer_model->read();
			$data['module'] = "customer";
			$data['page']   = "customerlist";   
			echo Modules::run('template/layout', $data);
		}
    public function guestdelete($id = null)
    {
        $this->permission->module('customer','delete')->redirect();
		
		if ($this->customer_model->guestdelete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('customer/guest-list');
    }

	public function wakeup_call(){
		$data['title']            = display('wakeup_call_list');  ;
        $data['call_list']        = $this->customer_model->getwakeup_call_list();
        $data['employeename']     = $this->customer_model->custelist();
        $data['module']           = "customer";
        $data['page']             = "wakeup_call_list";   
        echo Modules::run('template/layout', $data); 
	}

	public function create_wakeup_call()
    { 
        $data['title'] = display('wakeup_call_list');
        $this->form_validation->set_rules('cust_name',display('cust_name'),'required|xss_clean');
        $this->form_validation->set_rules('wakeupcall_time',display('wakeup_time'),'required|xss_clean');
        $this->form_validation->set_rules('remarks',display('remarks'),'xss_clean');
         
   
        if ($this->form_validation->run() === true) {

            $postData = array(
                'custid'    	 => $this->input->post('cust_name',TRUE),
                'wakeupcall_time'=> date("Y-m-d H:i",strtotime($this->input->post('wakeupcall_time',TRUE))),
                'remarks'        => $this->input->post('remarks',TRUE)
                
             );   

            if ($this->customer_model->wecall_create($postData)) { 
                $this->session->set_flashdata('message', display('save_successfull'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
			redirect('customer/wakeup-call');


        } else {
            $data['title']  	  = display('create');
            $data['module'] 	  = "customer";
            $data['page']         = "wakeup_call_list";
            $data['call_list']    = $this->customer_model->getwakeup_call_list();
        	$data['employeename'] = $this->customer_model->custelist();
            echo Modules::run('template/layout', $data);   
            
        }   
    }

	public function updwacallfrm($id = null){
        $this->permission->method('hrm','delete')->redirect();
		$data['title'] = display('wakeup_call_list');
        $this->form_validation->set_rules('cust_name',display('cust_name'),'required|xss_clean');
        $this->form_validation->set_rules('wakeupcall_time',display('wakeup_time'),'required|xss_clean');
        $this->form_validation->set_rules('remarks',display('remarks'),'xss_clean');
         
        if ($this->form_validation->run() === true) {

            $postData = array(
                'wapupid'        => $this->input->post('wapupid',TRUE),
                'custid'    	 => $this->input->post('cust_name',TRUE),
                'wakeupcall_time'=> date("Y-m-d H:i",strtotime($this->input->post('wakeupcall_time',TRUE))),
                'remarks'        => $this->input->post('remarks',TRUE)
            ); 
            
            if ($this->customer_model->wecall_update($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            redirect('customer/wakeup-call');

        } else {
			$data['wacall_info'] =$this->customer_model->wacall_data($id);
			$data['title']  	  = display('wakeup_call_list');
			$data['module'] 	  = "customer";
			$data['page']         = "wakeup_call_edit";
			$data['call_list']    = $this->customer_model->getwakeup_call_list();
			$data['employeename'] = $this->customer_model->custelist();
			$this->load->view('customer/wakeup_call_edit', $data); 
    	}

 	}

	public function delwacall($id = null)
	{
		$this->permission->module('customer','delete')->redirect();
		if ($this->customer_model->delete_wcl($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('customer/wakeup-call');
	}

	public function checkwaupcall(){
		$recent_time = date('Y-m-d H:i');
		
		$query = $this->db->select("*")->from('tbl_wakeup_call')->where('wakeupcall_time',$recent_time)->get()->row();
		$cust_info = $this->db->select("*")->from('customerinfo')->where('customerid',$query->custid)->get()->row();

		$aldata['cust_name'] = $cust_info->firstname.' '.$cust_info->lastname;
		if($cust_info->cust_phone){

			$aldata['cust_phone'] = $cust_info->cust_phone;
		}else{

			$aldata['cust_phone'] = ' ';
		}
		$aldata['call_time'] = $query->wakeupcall_time;
		if($query->remarks){

			$aldata['remark'] = $query->remarks;
		}else{

			$aldata['remark'] = ' ';
		}
		if($query){

			echo json_encode($aldata);
		}
		
	}
	public function check_invoice(){
		$invoice = $this->input->post("invoice", TRUE);
		$id = $this->input->post("id", TRUE);
		$type = $this->input->post("type", TRUE);
		$is_hall = explode("-", $invoice);
		if($is_hall[0]=="H"){
			//Hall room
			if($type=="receieve"){
				//payment recieve from customer
				$details = $this->db->select("start_date,end_date,totalamount,paid_amount,hbid,status,payment_status")->from("tbl_hallroom_booking")->where("invoice_no", $invoice)->where("customerid", $id)->get()->row();
				if(empty($details)){
					$data = array(
						'status'=> 404,
					);
					echo json_encode($data);
				}
				else if($details->payment_status!=1){
					$totaldatediff = strtotime($details->end_date) - strtotime($details->start_date);
					$totaldays = ceil($totaldatediff / (60 * 60));
					$data = array(
						'status'=> 200,
						'bookedid'=> $details->hbid,
						'amount'=> ($details->totalamount)-$details->paid_amount,
						'hallroom'=> 1,
					);
					echo json_encode($data);
				}else{
					$data = array(
						'status'=> 401,
						'msg'=> "You do not have any due amount to pay",
					);
					echo json_encode($data);
				}
			}else{
				//refund to customer
				$details = $this->db->select("start_date,end_date,totalamount,paid_amount,rent,hbid,status,payment_status")->from("tbl_hallroom_booking")->where("invoice_no", $invoice)->where("customerid", $id)->get()->row();
				if(empty($details)){
					$data = array(
						'status'=> 404,
					);
					echo json_encode($data);
				}
				else if($details->payment_status==3){
					$data = array(
						'status'=> 401,
						'msg'=> "Your amount is refunded already.",
					);
					echo json_encode($data);
				}
				else if($details->payment_status==0){
					$data = array(
						'status'=> 401,
						'msg'=> "You did not pay any amount yet.",
					);
					echo json_encode($data);
				}else{
					//Total days
					$totaldatediff = strtotime($details->end_date) - strtotime($details->start_date);
					$days = ceil($totaldatediff / (60 * 60));
					//end
					$data = array(
						'status'=> 200,
						'amount'=> $details->paid_amount,
						'days'=> $days,
						'bookedid'=> $details->hbid,
						'hallroom'=> 1,
					);
					echo json_encode($data);
				}
			}
			//end
		}else{
			// Hotel Room
			if($type=="receieve"){
				//payment recieved
				$details = $this->db->select("checkindate,checkoutdate,total_price,paid_amount,bookedid,bookingstatus")->from("booked_info")->where("booking_number", $invoice)->where("cutomerid", $id)->get()->row();
				if(empty($details)){
					$data = array(
						'status'=> 404,
					);
					echo json_encode($data);
				}
				else if($details->bookingstatus==5){
					$creditbill = $this->db->select("credit")->from("tbl_postedbills")->where("bookedid", $details->bookedid)->get()->row();
					if((!empty($creditbill->credit)) & $creditbill->credit>0){
						$data = array(
							'status'=> 200,
							'bookingstatus'=> $details->bookingstatus,
							'bookedid'=> $details->bookedid,
							'amount'=> $creditbill->credit,
						);
						echo json_encode($data);
					}else{
						$data = array(
							'status'=> 403,
						);
						echo json_encode($data);
					}
				}else{
					$totaldatediff = strtotime($details->checkoutdate) - strtotime($details->checkindate);
					$totaldays = ceil($totaldatediff / (60 * 60 * 24));
					$data = array(
						'status'=> 200,
						'bookingstatus'=> $details->bookingstatus,
						'bookedid'=> $details->bookedid,
						'amount'=> ($details->total_price*$totaldays)-$details->paid_amount,
					);
					echo json_encode($data);
				}
			}else{
				///payment refund
				$details = $this->db->select("checkindate,checkoutdate,roomrate,offer_discount,total_price,bookedid,bookingstatus")->from("booked_info")->where("booking_number", $invoice)->where("cutomerid", $id)->get()->row();
				if(empty($details)){
					$data = array(
						'status'=> 404,
					);
					echo json_encode($data);
				}
				else if($details->bookingstatus!=5){
					$data = array(
						'status'=> $details->bookingstatus,
					);
					echo json_encode($data);
				}else{
					$isRefunded = $this->db->select("days")->from("tbl_postedbills")->where("bookedid", $details->bookedid)->get()->row();
					if(!empty($isRefunded->days)){
						$data = array(
							'status'=> 201,
						);
						echo json_encode($data);
						exit;
					}
					$postedbills = $this->db->select("checkoutdate,complementary,scharge,rate,extrabpc")->from("tbl_postedbills")->where("bookedid", $details->bookedid)->get()->row();
					$bookeddetails = $this->db->select("extracheckin,extracheckout,booking_source,commissionamount")->from("booked_details")->where("bookedid", $details->bookedid)->get()->row();
					//Total days
					$totaldatediff = strtotime($details->checkoutdate) - strtotime($details->checkindate);
					$totaldays = ceil($totaldatediff / (60 * 60 * 24));
					//end
					//refund days
					$old_date = strtotime($details->checkoutdate);
					$new_date = strtotime($postedbills->checkoutdate);
					$datediff = $old_date - $new_date;
					$days = floor($datediff / (60 * 60 * 24));
					//end
					//extra service days
					$exdatediff = strtotime($details->checkoutdate) - strtotime($bookeddetails->extracheckout);
					$exdays = floor($exdatediff / (60 * 60 * 24));
					$extotaldatediff = strtotime($bookeddetails->extracheckout) - strtotime($bookeddetails->extracheckin);
					$extotaldays = floor($extotaldatediff / (60 * 60 * 24));
					//end
					//extra bed, person, child amount
					$extraamount = 0;
					if($exdays>0){
						if($extotaldays==0){
							$extotaldays=1;
						}
						$extraamount = $exdays * ($postedbills->extrabpc / $extotaldays);
					}
					//end
					$roomrate = explode(",", $details->roomrate);
					$offer_discount = explode(",", $details->offer_discount);
					//reninfo
					$refrent = 0;
					for($i=0; $i<count($roomrate); $i++){
						$refrent += $roomrate[$i] - $offer_discount[$i];
					}
					//end
					$refrent *= $days;
					//taxinfo
					$tax = explode(",", $postedbills->rate);
					$taxamount = 0;
					for($i=0; $i<count($tax); $i++){
						$taxamount += ($tax[$i]*$refrent)/100;
					}
					//end
					$postedamount = (($postedbills->complementary / $totaldays) * $days) + (($postedbills->scharge /$totaldays) * $days) + $extraamount + $taxamount; 
					$total = $refrent+$postedamount;
					$commissionamount = 0;
					if(!empty($bookeddetails->booking_source) & $total>0){
						$commissionamount = $days * ($bookeddetails->commissionamount / $totaldays);
					}
					$data = array(
						'status'=> $details->bookingstatus,
						'amount'=> $total,
						'days'=> $days,
						'bookedid'=> $details->bookedid,
						'bsource'=> $bookeddetails->booking_source,
						'commissionamount'=> $commissionamount,
					);
					echo json_encode($data);
				}
			}
			//end
		}
	}
	public function allTransaction($id = null)
    {
		$this->permission->method('customer','read')->redirect();
        $data['title']    = display('customer_list'); 
        $data["customer_infolist"] = $this->customer_model->transaction($id);   
        $data['module'] = "customer";
        $data['page']   = "customerTransaction";   
        echo Modules::run('template/layout', $data); 
    }
	public function allInformation($id = null)
    {
		$this->permission->method('customer','read')->redirect();
        $data['title']    = display('customer_list'); 
        $data["intinfo"] = $this->customer_model->detailsInformation($id);   
        $data['module'] = "customer";
        $data['page']   = "customerDetails";   
        echo Modules::run('template/layout', $data); 
    }
 
}
