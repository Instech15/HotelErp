<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplierlist extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'supplier_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('units','read')->redirect();
        $data['title']    = display('supplier_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('units/supplierlist/index');
        $config["total_rows"]  = $this->supplier_model->countlist();
        $config["per_page"]    = 15;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["supplierlist"] = $this->supplier_model->read();
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('supplier_edit');
		$data['intinfo']   = $this->supplier_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "units";
        $data['page']   = "supplierlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('supplier_add');
	    $coa = $this->supplier_model->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="502020501";
        }
	   $lastid=$this->db->select("*")->from('supplier')
			->order_by('suplier_code','desc')
			->get()
			->row();
		if(!empty($lastid->suplier_code))
		$sl=$lastid->suplier_code;
		if(empty($sl)){
		$sl = "sup_001"; 
		}
		else{
		$sl = $sl;  
		}
		$supno=explode('_',$sl);
		$nextno=$supno[1]+1;
		$si_length = strlen((int)$nextno); 
		
		$str = '000';
		$cutstr = substr($str, $si_length); 
		$sino = $supno[0]."_".$cutstr.$nextno;
		if(!empty($this->input->post('supid',TRUE))) {
			$sino=$this->input->post('supcode',TRUE);
			}
		$this->form_validation->set_rules('suppliername',display('supplier_name'),'required|max_length[50]|xss_clean');
		if(empty($this->input->post('supid', TRUE))) {
		$this->form_validation->set_rules('mobile',display('mobile')  ,'required|is_unique[supplier.supMobile]|xss_clean');
		$this->form_validation->set_rules('email',display('email')  ,'required|is_unique[supplier.supEmail]|xss_clean');
		}
		if(!empty($this->input->post('supid', TRUE))) {
		$this->form_validation->set_rules('mobile',display('mobile')  ,'required|xss_clean');
		$this->form_validation->set_rules('email',display('email')  ,'required|xss_clean');
		}
	   $saveid=$this->session->userdata('id');
	   
       $c_name = $this->input->post('suppliername', TRUE);
       $c_acc=$sino.'-'.$c_name;
		
	   $data['supplier']   = (Object) $postData = array(
		   'supid'  			 => $this->input->post('supid',TRUE),
		   'suplier_code'  		 => $sino,
		   'supName' 			 => $this->input->post('suppliername',TRUE),
		   'supEmail' 	         => $this->input->post('email',TRUE),
		   'supMobile' 	 	     => $this->input->post('mobile',TRUE),
		   'supAddress' 	     => $this->input->post('address',TRUE),
		  ); 
	$data['aco']   = (Object) $postDatacoa = array(
            'HeadCode'         => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Suppliers',
            'HeadLevel'        => '4',
            'IsActive'         => '1',
            'IsTransaction'    => '1',
            'IsGL'             => '0',
            'HeadType'         => 'L',
            'IsBudget'         => '0',
            'IsDepreciation'   => '0',
            'DepreciationRate' => '0',
            'CreateBy'         => $saveid,
            'CreateDate'       => date('Y-m-d H:i:s'),
        );
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('supid', TRUE))) {
		$this->permission->method('units','create')->redirect();
		
	     $this->supplier_model->create_coa($postDatacoa);
		if ($this->supplier_model->create($postData)) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('units/supplier-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/supplier-list"); 
	
	   } else {
		$this->permission->method('units','update')->redirect();
	  $c_accup = $this->input->post('oldname', TRUE);
	  $getheadid=$this->db->select("HeadCode")->from('acc_coa')
	  		->where('HeadName',$c_accup)
			->get()
			->row();
	  if(!empty($getheadid)){
		  $upheadcode=$getheadid->HeadCode;
		  $acc=array(
		   'HeadName'         => $c_acc,
		   'UpdateBy'         => $saveid,
		   'UpdateDate'       => date('Y-m-d H:i:s')
		  );
		    $this->db->where('HeadCode',$upheadcode);
	        $this->db->update('acc_coa',$acc);

		  }
		if ($this->supplier_model->update($postData)) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/supplier-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('supplier_edit');
		$data['intinfo']   = $this->supplier_model->findById($id);
	   }
	    #
        #pagination starts
        #
	   $config["base_url"] = base_url('units/supplierlist/index');
	   $config["total_rows"]  = $this->supplier_model->countlist();
	   $config["per_page"]    = 15;
	   $config["uri_segment"] = 4;
	   $config["last_link"] = "Last"; 
	   $config["first_link"] = "First"; 
	   $config['next_link'] = 'Next';
	   $config['prev_link'] = 'Prev';  
	   $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
	   $config['full_tag_close'] = "</ul>";
	   $config['num_tag_open'] = '<li>';
	   $config['num_tag_close'] = '</li>';
	   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	   $config['next_tag_open'] = "<li>";
	   $config['next_tag_close'] = "</li>";
	   $config['prev_tag_open'] = "<li>";
	   $config['prev_tagl_close'] = "</li>";
	   $config['first_tag_open'] = "<li>";
	   $config['first_tagl_close'] = "</li>";
	   $config['last_tag_open'] = "<li>";
	   $config['last_tagl_close'] = "</li>";
	   /* ends of bootstrap */
	   $this->pagination->initialize($config);
	   $data["supplierlist"] = $this->supplier_model->read();
	   $data["links"] = $this->pagination->create_links();	   
	   $data['module'] = "units";
	   $data['page']   = "supplierlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('supplier_edit');
		$data['intinfo']   = $this->supplier_model->findById($id);
        $data['module'] = "units";  
        $data['page']   = "supplieredit";
		$this->load->view('units/supplieredit', $data);   
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('units','delete')->redirect();
		if ($this->supplier_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('units/supplier-list');
    }
	public function updatepaymentfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('supplier_edit');
		$data['intinfo']   = $this->supplier_model->findById($id);
		$data["invoicelist"] = $this->supplier_model->invoicelist(); 
        $data['module'] = "units";  
        $data['page']   = "supplieredit";
		$this->load->view('units/supplierpay', $data);   
	   }
	public function updatepayment(){
	  $this->form_validation->set_rules('supid',"Supplier Name",'required|xss_clean');
	  $this->form_validation->set_rules('amount',display('amount'),'required|xss_clean');
	  if ($this->form_validation->run()) { 
		$this->permission->method('room_setting','update')->redirect();
		$totalamount = $this->db->select("paid_amount,due_amount")->from("supplier")->where("supid",$this->input->post('supid', TRUE))->get()->row();
		$paid_amount = $totalamount->paid_amount + $this->input->post('amount',TRUE);
		$due_amount = $totalamount->due_amount - $this->input->post('amount',TRUE);
		if($due_amount<0){
			$this->session->set_flashdata('exception', "Please pay less or equal to due amount");
			redirect('units/supplier-list');
		}
		$acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode","1020101")->get()->row();
		if(empty($acc_cash)){
			$this->session->set_flashdata('exception', "You does not have any balance on account cash.");
			redirect('units/supplier-list');
		}else{
			$supinfo =$this->db->select('*')->from('supplier')->where('supid',$this->input->post('supid', TRUE))->get()->row();
			$sup_head = $supinfo->suplier_code.'-'.$supinfo->supName;
			$sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
			$invoice = $this->input->post('invoice', TRUE);
			$amount = $this->db->select("Credit")->from("acc_transaction")->where("COAID",$sup_coa->HeadCode)->where("VNo", $invoice)->get()->row();
			$g_total_price = $amount->Credit;
			if(($acc_cash->current_balance-$g_total_price)<0){
				$this->session->set_flashdata('exception', "You does not have ".$this->input->post('amount',TRUE)." amount on account cash.");
				redirect('units/supplier-list');
			}
		}
		$data['units']   = (Object) $postData = array(
			'supid'     	 => $this->input->post('supid', TRUE),
			'paid_amount' 	     =>$paid_amount,
			'due_amount' 	     =>$due_amount,
		  );
		  if ($this->supplier_model->update($postData)) { 
				$newdate = date("Y-m-d H:i:s");
				$saveid = $this->session->userdata("id");
				$recv_id = date('YmdHis');
				// Supplier Debit for cash Amount
				$narration = 'Paid For PO No.'.$invoice.' Receive No.'.$recv_id;
				transaction($invoice, 'PO', $newdate, $sup_coa->HeadCode, $narration, $g_total_price, 0, 0, 1, $saveid, $newdate, 1); 
				
				//Cash in Hand  Credit.
				$narration = 'Paid For PO No.'.$invoice.' Receive No.'.$recv_id;
				transaction($invoice, 'PO', $newdate, 1020101, $narration, 0, $g_total_price, 0, 1, $saveid, $newdate, 1);
				$this->db->where("invoiceid", $invoice)->where("suplierID",$this->input->post('supid', TRUE))->update("purchaseitem",array("status"=>1));
				$this->session->set_flashdata('message', "Payment Successful");
				redirect('units/supplier-list');
		   } else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
		   }
	  }else{
		$data["supplierlist"] = $this->supplier_model->read();
		$data['module'] = "units";
		$data['page']   = "supplierlist";   
		echo Modules::run('template/layout', $data); 
	  }
	}
	public function check_invoice(){
		$invoice = $this->input->post("invoice", TRUE);
		$id = $this->input->post("id", TRUE);
		$details = $this->db->select("total_price,status")->from("purchaseitem")->where("invoiceid", $invoice)->where("suplierID", $id)->get()->row();
		if(empty($details)){
			echo json_encode("");
		}else{
			$data = array(
				'status'=> $details->status,
				'amount'=> $details->total_price,
			);
			echo json_encode($data);
		}
	}
 
}
