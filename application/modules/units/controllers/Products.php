<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array(
			'product_model',
			'unit_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('units','read')->redirect();
        $data['title']    = display('ingradient_list'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('units/products/index');
        $config["total_rows"]  = $this->product_model->count_ingredient();
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
        $data["ingredientlist"] = $this->product_model->read_ingredient();
        $data["hkchcek"] = $this->product_model->hkcheck();
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		if(!empty($id)) {
		$data['title'] = display('unit_update');
		$data['intinfo']   = $this->unit_model->findById($id);
	   }
	    $data['categorydropdown']   =  $this->product_model->category_dropdown();
	    $data['unitdropdown']   =  $this->unit_model->ingredient_dropdown();
        #
        #pagination ends
        #   
        $data['module'] = "units";
        $data['page']   = "ingredientlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('add_ingredient');
	  if (empty($this->input->post('id', TRUE))) {
		$this->form_validation->set_rules('ingredientname',display('ingredient_name'),'required|is_unique[products.product_name]|max_length[50]|xss_clean');
	  }
		$this->form_validation->set_rules('unitid',display('unit_name')  ,'required|is_natural|xss_clean');
		$this->form_validation->set_rules('category_id',"Category"  ,'required|is_natural|xss_clean');
		$this->form_validation->set_rules('status', display('status')  ,'required|is_natural|xss_clean');
	   
	  $data['intinfo']="";
	  if($this->input->post('reuseable',TRUE)=="0" | $this->input->post('reuseable',TRUE)==1){
		$data['units']   = (Object) $postData = array(
		'id'     => $this->input->post('id', TRUE),
		'product_name' 	 => $this->input->post('ingredientname',TRUE),
		'category_id' 	 		 => $this->input->post('category_id',TRUE),
		'uom_id' 	 		 => $this->input->post('unitid',TRUE),
		'reuseable' 	 	     => $this->input->post('reuseable',TRUE),
		'is_active' 	 	     => $this->input->post('status',TRUE),
		);
	}else{
		$data['units']   = (Object) $postData = array(
		'id'     => $this->input->post('id', TRUE),
		'product_name' 	 => $this->input->post('ingredientname',TRUE),
		'category_id' 	 		 => $this->input->post('category_id',TRUE),
		'uom_id' 	 		 => $this->input->post('unitid',TRUE),
		'reuseable' 	 		 => 0,
		'is_active' 	 	     => $this->input->post('status',TRUE),
		);
	}
	if ($this->form_validation->run()) {
		if($this->input->post('category_id', TRUE)!=501 & $this->input->post('reuseable',TRUE)==1){
			$this->session->set_flashdata('exception', "You can only add laundry item as reusable product");
			redirect('units/product-list');
		} 
	if (empty($this->input->post('id', TRUE))) {
		$this->permission->method('units','create')->redirect();
		if ($this->product_model->unit_ingredient($postData)) { 
			if($this->input->post('reuseable',TRUE)=="0" | $this->input->post('reuseable',TRUE)==1){
				$this->db->insert("tbl_reuseableproduct",array('product_id'=> $this->db->insert_id()));
			}
		    $this->db->select('*');
			$this->db->from('products');
			$this->db->where('is_active',1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->product_name,'value'=>$row->id,'category'=>$row->category_id,'reuseable'=>$row->reuseable);
			}
			$cache_file = './assets/js/products.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('units/product-list');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/product-list"); 
	
	   } else {
		$this->permission->method('units','update')->redirect();
		if($this->input->post('reuseable',TRUE)=="0" | $this->input->post('reuseable',TRUE)==1){
			$hkcheck = $this->db->select("product_id")->from("tbl_reuseableproduct")->where("product_id", $this->input->post('id', TRUE))->get()->row();
			if(empty($hkcheck->product_id)){
				$this->session->set_flashdata('exception',  "Could not transfer to housekeeping products, Please create new product");
				redirect("units/product-list"); 
			}
		}
		if ($this->product_model->update_ingredient($postData)) { 
		 $this->db->select('*');
			$this->db->from('products');
			$this->db->where('is_active',1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->product_name,'value'=>$row->id,'category'=>$row->category_id,'reuseable'=>$row->reuseable);
			}
			$cache_file = './assets/js/products.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("units/product-list");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('update_ingredient');
		$data['intinfo']   = $this->product_model->findById($id);
	   }
		#
        #pagination starts
        #
	   $config["base_url"] = base_url('units/products/index');
	   $config["total_rows"]  = $this->product_model->count_ingredient();
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
	   $data["ingredientlist"] = $this->product_model->read_ingredient();
	   $data["hkchcek"] = $this->product_model->hkcheck();
	   $data["links"] = $this->pagination->create_links();
	   $data['pagenum']=$page;
	   $data['categorydropdown']   =  $this->product_model->category_dropdown();
	   $data['unitdropdown']   =  $this->unit_model->ingredient_dropdown();
	   $data['module'] = "units";
	   $data['page']   = "ingredientlist";
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('units','update')->redirect();
		$data['title'] = display('update_ingredient');
		$data['intinfo']   = $this->product_model->findById($id);
		$data["hkchcek"] = $this->product_model->hkcheck();
		$data['categorydropdown']   =  $this->product_model->category_dropdown();
		$data['unitdropdown']   =  $this->unit_model->ingredient_dropdown();
        $data['module'] = "units";  
        $data['page']   = "ingredientedit";
		$this->load->view('units/ingredientedit', $data);   
	   }
 
    public function delete($category = null)
    {
        $this->permission->module('units','delete')->redirect();
		
		if ($this->product_model->ingredient_delete($category)) {
			 $this->db->select('*');
			$this->db->from('products');
			$this->db->where('is_active',1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->product_name,'value'=>$row->id,'category'=>$row->category_id);
			}
			$cache_file = './assets/js/products.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('units/product-list');
    }
	public function destroyed_product(){
		$data['categorydropdown']   =  $this->product_model->category_dropdown();
		$data["reuselist"] = $this->product_model->read_destroyediteam();
		$data['title'] = display('destroyed_list');  
        $data['module'] = "units";
        $data['page']   = "destroyedlist";   
        echo Modules::run('template/layout', $data); 
	}
	public function productlist(){
		$category_id = $this->input->post("category_id", true);
		$product["list"] = $this->db->select("id,product_name")->from("products")->where("category_id", $category_id)->get()->result();
		echo json_encode($product);
	}
	public function descreate(){
		$data['title'] = display('add_ingredient');
		$this->form_validation->set_rules('product_id',display('ingredient_name'),'required|xss_clean');
		$this->form_validation->set_rules('quantity', display('quantity')  ,'required|xss_clean');
		$this->form_validation->set_rules('queue', "Product Queue"  ,'required|xss_clean');
		$charge = $this->input->post('charge',TRUE);
		if(empty($charge)){
			$charge = 0;
		}
		if($this->input->post('quantity',TRUE)<=0){
			$this->session->set_flashdata('exception',  "Product quantity can not be ".$this->input->post('quantity',TRUE));
			redirect("units/product-destroyed");
		}
	  	$data['intinfo']="";
	  	$data['units']   = (Object) $postData = array(
	   'product_id' 	 	 => $this->input->post('product_id',TRUE),
	   'quantity' 	 	     => $this->input->post('quantity',TRUE),
	   'comment' 	 	     => $this->input->post('comments',TRUE)." Charge: ".$charge,
	   'rec_date'			 => date("Y-m-d H:i:s")
	  );
	  if ($this->form_validation->run()) { 
			$this->permission->method('units','create')->redirect();
			$queue = $this->input->post("queue", true);
			if($queue == "ready"){
				$oldreusestock = $this->db->select("ready")->from("tbl_reuseableproduct")->where("product_id",$this->input->post('product_id',TRUE))->get()->row();
				$readystock = $oldreusestock->ready - $this->input->post('quantity',TRUE);
				if($readystock>=0){
					$reusestock = $this->db->where("product_id",$this->input->post('product_id',TRUE))->update("tbl_reuseableproduct", array("ready"=>$readystock));
				}else{
					$this->session->set_flashdata('exception',  "Product not available in $queue");
					redirect("units/product-destroyed");
				}
			}
			else if($queue == "laundry"){
				$oldreusestock = $this->db->select("in_laundry")->from("tbl_reuseableproduct")->where("product_id",$this->input->post('product_id',TRUE))->get()->row();
				$laundrystock = $oldreusestock->in_laundry - $this->input->post('quantity',TRUE);
				if($laundrystock>=0){
					$reusestock = $this->db->where("product_id",$this->input->post('product_id',TRUE))->update("tbl_reuseableproduct", array("in_laundry"=>$laundrystock));
				}else{
					$this->session->set_flashdata('exception',  "Product not available in $queue");
					redirect("units/product-destroyed");
				}
			}
			else if($queue == "in_use"){
				$oldreusestock = $this->db->select("in_use")->from("tbl_reuseableproduct")->where("product_id",$this->input->post('product_id',TRUE))->get()->row();
				$usestock = $oldreusestock->in_use - $this->input->post('quantity',TRUE);
				if($usestock>=0){
					$reusestock = $this->db->where("product_id",$this->input->post('product_id',TRUE))->update("tbl_reuseableproduct", array("in_use"=>$usestock));
				}else{
					$this->session->set_flashdata('exception',  "Product not available in use");
					redirect("units/product-destroyed");
				}
			}
			if($reusestock){
				$oldstock = $this->db->select("stock,destroyed")->from("products")->where("id",$this->input->post('product_id',TRUE))->get()->row();
				$stock = $oldstock->stock - $this->input->post('quantity',TRUE);
				$destroyed = $oldstock->destroyed + $this->input->post('quantity',TRUE);
				$this->db->where("id",$this->input->post('product_id',TRUE))->update("products", array("stock"=>$stock,"destroyed"=>$destroyed));
				if($this->db->insert("tbl_destroyedproduct", $postData)) { 
					$insertedId = $this->db->insert_id(); 
					if($charge>0){
						$newdate = date("Y-m-d");
						$saveid = $this->session->userdata("id");
						$productName = $this->db->select("product_name")->from("products")->where("id", $this->input->post('product_id',TRUE))->get()->row();
						//Hotel credit for Inventory destroyed product
						$narration = 'Hotel Credit for Inventory destroyed item product Name# '.$productName->product_name;
						transaction($insertedId, 'DP', $newdate, 10107, $narration, 0, $charge, 0, 1, $saveid, $newdate, 1);
						//Customer debit for destroyed product
						$narration = 'Customer debit for Destroyed item product Name# '.$productName->product_name;
						transaction($insertedId, 'DP', $newdate, 102030101, $narration, $charge, 0, 0, 1, $saveid, $newdate, 1);
						//Customer Credit for destroyed product charge
						$narration = 'Customer Credit for Destroyed item product Name# '.$productName->product_name;
						transaction($insertedId, 'DP', $newdate, 102030101, $narration, 0, $charge, 0, 1, $saveid, $newdate, 1);
						//Cash Debit for destroyed product charge
						$narration = 'Cash in hand Debit for Destroyed item charge product Name# '.$productName->product_name;
						transaction($insertedId, 'DP', $newdate, 1020101, $narration, 0, $charge, 0, 1, $saveid, $newdate, 1);
					}
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('units/product-destroyed');
				}else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
				}
				redirect("units/product-destroyed"); 
			}
	   }else{ 
			$data['categorydropdown']   =  $this->product_model->category_dropdown();
			$data["reuselist"] = $this->product_model->read_destroyediteam();
			$data['title'] = display('destroyed_list');  
			$data['module'] = "units";
			$data['page']   = "destroyedlist";   
			echo Modules::run('template/layout', $data);
	   }   
	}
}
