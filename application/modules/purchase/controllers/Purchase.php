<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'purchase_model'
		));	
		 $this->load->library('cart');
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('purchase','read')->redirect();
        $data['title']    = display('purchase_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('purchase/purchase/index');
        $config["total_rows"]  = $this->purchase_model->countlist();
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
        $data["purchaselist"] = $this->purchase_model->read();
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		$data['items']   = $this->purchase_model->ingrediant_dropdown();
		$data['supplier']   = $this->purchase_model->supplier_dropdown();
		$settinginfo=$this->purchase_model->settinginfo();
		$data['currency']=$this->purchase_model->currencysetting($settinginfo->currency);
		
		if(!empty($id)) {
		$data['title'] = display('purchase_edit');
		$data['intinfo']   = $this->purchase_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "purchase";
        $data['page']   = "purchaselist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('purchase_add');
	   $saveid=$this->session->userdata('supid');
	  $data['intinfo']="";
	 
	   $data['supplier']   = $this->purchase_model->supplier_dropdown();
	   $data['product']   = $this->purchase_model->product_dropdown();
	   $data['module'] = "purchase";
	   $data['page']   = "addpurchase";   
	   echo Modules::run('template/layout', $data); 
    }
	public function purchase_entry(){
		$finyear = $this->input->post('finyear',true);
		if($finyear<=0){
			$this->session->set_flashdata('exception',  "Please Create Financial Year First");
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->form_validation->set_rules('invoice_no','Invoice Number','required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('purchase_date','Purchase Date'  ,'required|xss_clean');
	    $saveid=$this->session->userdata('id'); 
		$product_name 	= $this->input->post('product_name',TRUE);
		$invoice 	= $this->input->post('invoice_no',TRUE);
		$product_info 	= $this->purchase_model->checkitem($product_name);
		$invoice_info 	= $this->purchase_model->checkinvoice($invoice);
		if($product_info==false){
		$this->session->set_flashdata('exception',  display('no_product_found'));
		redirect("purchase/purchase-create");
		}
		if($invoice_info!=false){
		$this->session->set_flashdata('exception', "Invoice No Already exist");
		redirect("purchase/purchase-create");
		}
	   if ($this->form_validation->run()) { 
		$this->permission->method('purchase','create')->redirect();
		
		if ($this->purchase_model->create()) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('purchase/purchase-create');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("purchase/purchase-create"); 
	  } else { 
	  redirect("purchase/purchase-create"); 
	   }   
		}
	public function purchaseitem(){
		   $csrf_token=$this->security->get_csrf_hash();
		   $product_name 	= $this->input->post('product_name',TRUE);
		   $product_info 	= $this->purchase_model->finditem($product_name);
		   $list[''] = '';
		foreach ($product_info as $value) {
			$json_product[] = array('label'=>$value['product_name'],'value'=>$value['id']);
		} 
        echo json_encode($json_product);
		}
	public function purchasequantity(){
		$product_id = $this->input->post('product_id', TRUE);
		$product_info =  $this->purchase_model->get_total_product($product_id);
		echo json_encode($product_info);
		}
	
   public function updateintfrm($id){
		$this->permission->method('purchase','update')->redirect();
		$data['title'] = display('purchase_edit');
	    $data['supplier']   = $this->purchase_model->supplier_dropdown();
		$data['purchaseinfo']   = $this->purchase_model->findById($id);
		$data['iteminfo']       = $this->purchase_model->iteminfo($id);
        $data['module'] = "purchase";  
	    $data['page']   = "purchaseedit";   
	    echo Modules::run('template/layout', $data);  
	   }
	public function purchaseinvoice($id){
		$this->permission->method('purchase','update')->redirect();
		$data['title'] = "Invoice Information";
		$settinginfo=$this->purchase_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->purchase_model->currencysetting($settinginfo->currency);
		$data['purchaseinfo']   = $this->purchase_model->findById($id);
		$supid=$data['purchaseinfo']->suplierID;
		$data['supplierinfo']   = $this->purchase_model->suplierinfo($supid);
		$data['iteminfo']       = $this->purchase_model->iteminfo($id);
        $data['module'] = "purchase";  
	    $data['page']   = "purchaseinvoice";   
	    echo Modules::run('template/layout', $data);  
	   }
 	public function update_entry(){
		$finyear = $this->input->post('finyear',true);
		if($finyear<=0){
			$this->session->set_flashdata('exception',  "Please Create Financial Year First");
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->form_validation->set_rules('invoice_no','Invoice Number','required|max_length[50]');
		$this->form_validation->set_rules('purchase_date','Purchase Date'  ,'required');
	    $saveid=$this->session->userdata('id'); 
		if ($this->form_validation->run()) { 
		
		 $this->permission->method('purchase','update')->redirect();
		if ($this->purchase_model->update()) { 
		 $this->session->set_flashdata('message', display('update_successfully'));
		 redirect('purchase/purchase-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("purchase/purchase-list");
	  } else { 
	  redirect("purchase/purchase-list"); 
	   }  
		
	   }
 public function getlist($id){
	 	 $suplierinfo=$this->purchase_model->suplierinfo($id);
		 echo json_encode($suplierinfo);
	 }
    public function delete($id = null)
    {
        $this->permission->module('purchase','delete')->redirect();
		
		if ($this->purchase_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('purchase/purchase-list');
    }
	 public function addproduction($id = null)
    {
	  $data['title'] = display('purchase_add');
	   $saveid=$this->session->userdata('supid');
	  $data['intinfo']="";
	 
	   $data['item']   = $this->purchase_model->item_dropdown();
		
	   $data['module'] = "purchase";
	   $data['page']   = "addproduction";   
	   echo Modules::run('template/layout', $data); 
    }
	
	public function production_entry(){
		$this->form_validation->set_rules('foodid','Food Name','required');
		$this->form_validation->set_rules('purchase_date','Purchase Date'  ,'required');
		$this->form_validation->set_rules('pro_qty','Production Quantity'  ,'required');
	    $saveid=$this->session->userdata('id'); 
		
	   if ($this->form_validation->run()) { 
		$this->permission->method('purchase','create')->redirect();
		
		if ($this->purchase_model->makeproduction()) { 
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('purchase/purchase/addproduction');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("purchase/purchase/addproduction"); 
	  } else { 
	  redirect("purchase/purchase/addproduction"); 
	   }  
		}
	public function return_form(){
		$data['title'] = display('purchase_return');
		$data['supplier']   = $this->purchase_model->supplier_dropdown();
		$data['module'] = "purchase";
	    $data['page']   = "purchasereturn";   
	    echo Modules::run('template/layout', $data); 
		}
	public function getinvoice(){
		 $suplier 	= $this->input->post('id', TRUE);
		 $invoiceinfo=$this->purchase_model->invoicebysupplier($suplier);
		 $option='';
		 if(!empty($invoiceinfo)){
		 foreach($invoiceinfo as $invoice){
		 $option.='<option value="'.$invoice->invoiceid.'">'.$invoice->invoiceid.'</option>';
		 }
		 }
		  echo  '<select name="invoice" id="invoice" class="form-control selectpicker" data-live-search="true">
                                	<option value=""  selected="selected">Select Option</option>
									'.$option.'
									</select>';
		}
	public function returnlist(){
		$data['title'] = display('purchase_return');
		$invoice 	= $this->input->post('invoice', TRUE);
		$invoiceinfo=$this->purchase_model->getinvoice($invoice);
		$purchaseid=$invoiceinfo->purID;
		
		$settinginfo=$this->purchase_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->purchase_model->currencysetting($settinginfo->currency);
		$supid=$invoiceinfo->suplierID;
		$data['supplierinfo']     = $this->purchase_model->suplierinfo($supid);
		$data['returnitem']       = $this->purchase_model->iteminfo($purchaseid);
		$data['module'] = "purchase";
	    $data['page']   = "purchasereturnform";  
		$this->load->view('purchase/purchasereturnform', $data); 
		
		}
	public function purchase_return_entry(){
		$finyear = $this->input->post('finyear',true);
		if($finyear<=0){
			$this->session->set_flashdata('exception',  "Please Create Financial Year First");
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['title'] = display('purchase_return');
		if ($this->purchase_model->pur_return_insert()) { 
			$this->session->set_flashdata('message', display('save_successfully'));
			redirect('purchase/purchase-return/');
		}else{
			$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("purchase/purchase-return");
		}
  public function return_invoice(){
	  	$this->permission->method('purchase','read')->redirect();
        $data['title']    = display('purchase_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('purchase/purchase/return_invoice');
        $config["total_rows"]  = $this->purchase_model->countreturnlist();
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
        $data["invoicelist"] = $this->purchase_model->readinvoice();
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		$settinginfo=$this->purchase_model->settinginfo();
		$data['currency']=$this->purchase_model->currencysetting($settinginfo->currency);
        #
        #pagination ends
        #   
        $data['module'] = "purchase";
        $data['page']   = "invoicelist";   
        echo Modules::run('template/layout', $data); 
	  }
	public function returnview($id){
		$this->permission->method('purchase','read')->redirect();
		$data['title'] = display('invoice_view');
		$data['purchaseinfo']   = $this->purchase_model->findByreturnId($id);
		$data['iteminfo']       = $this->purchase_model->returniteminfo($id);
		$data['cIcon']       = getCurrency();
        $data['module'] = "purchase";  
	    $data['page']   = "purchasereturnview";   
	    echo Modules::run('template/layout', $data);  
	   }
 
}
