<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'report_model'
		));	
		 $this->load->library('cart');
    }
 
    public function index(){
		$data['title'] = display('booking_report');
		$data['module'] = "reports";
		$data['customerlist']   = $this->report_model->customerlist(); 
		$data['page']   = "report_search"; 

		$this->load->library('pagination'); 
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('reports/report/index/'); 
        $config["total_rows"]     = $this->db->count_all('booked_info'); 
        $config["per_page"]       = 15;
        $config["uri_segment"]    = 4; 
        $config["num_links"]      = 5;  
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
        $data["bookings"] = $this->report_model->read(); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        #   
	    echo Modules::run('template/layout', $data); 
		}
	public function getinvoice(){
		$customer=$this->input->post('customer',TRUE);
		$status=$this->input->post('status',TRUE);
		$payment_status=$this->input->post('payment_status',TRUE);
		$startdates=$this->input->post('start_date',TRUE);
		$endate=$this->input->post('to_date',TRUE);
		$data['bookinfo']   = $this->report_model->getlist($customer,$status,$payment_status,$startdates,$endate);
		$data['module'] = "reports";  
        $data['page']   = "getbookingreport";
		$this->load->view('reports/getbookingreport', $data);   
		}
	public function viewdetails($id){
		$details=$this->report_model->details($id);
		$data['bookinfo']   = $details;
		$data['customerinfo']   = $this->report_model->customerinfo($details->cutomerid);
		$data['paymentinfo']   = $this->report_model->paymentinfo($details->bookedid);
		$data['storeinfo']=$this->report_model->storeinfo();
		$data['taxinfo']=$this->report_model->taxinfo();
		$data['btaxinfo']=$this->report_model->btaxinfo($id);
		$data['setting'] = $this->report_model->settinginfo();
		$data['commominfo']=$this->report_model->commoninfo();
		$data['currency']=$this->report_model->currencysetting($data['storeinfo']->currency);
		$data['module'] = "reports";
	    $data['page']   = "bookindetails";   
	    echo Modules::run('template/layout', $data); 
		}
	public function customer_receit($id){
		$details=$this->report_model->details($id);
		$data['bookinfo']   = $details;
		$data['customerinfo']   = $this->report_model->customerinfo($details->cutomerid);
		$data['paymentinfo']   = $this->report_model->paymentinfo($details->bookedid);
		$data['commoninfo']=$this->report_model->commoninfo();
		$data['storeinfo']=$this->report_model->storeinfo();
		$data['module'] = "reports";
	    $data['page']   = "guest_invoice";   
	    echo Modules::run('template/layout', $data); 
		}
	public function productreport($id = null)
    {
		$this->permission->method('reports','read')->redirect();
        $data['title']    = display('purchase_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date',TRUE));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date',TRUE));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->pruchasereport($start_date,$end_date);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "reports";
        $data['page']   = "prechasereport";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function purchasereport()
    {
	    $this->permission->method('reports','read')->redirect();
        $data['title']    = display('purchase_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date',TRUE));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date',TRUE));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->pruchasereport($start_date,$end_date);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "reports";
        $data['page']   = "getpreport";  
		$this->load->view('reports/getpreport', $data);  
 
    }
	public function stockreport()
    {
		$this->permission->method('reports','read')->redirect();
		$data['title']    = display('stock_report'); 
        $data['stockreport']  = $this->report_model->getstocklist();
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "reports";
        $data['page']   = "purchaseview";   
        echo Modules::run('template/layout', $data); 
 
    }
 
}
