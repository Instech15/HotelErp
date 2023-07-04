<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_setting extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'websetting_model',
			'currency_model'
		));

		if (!$this->session->userdata('isAdmin')) 
		redirect('login'); 
	}
	// Common Setting
		public function index()
	{
		$data['title'] = display('web_setting');
		//check setting table row if not exists then insert a row
		$data['websetting'] = $this->websetting_model->read(); 

		$data['module'] = "dashboard";  
		$this->load->view("web/web_setting", $data);  
	} 

	public function common_create()
	{
		$data['title'] = display('web_setting');
		$this->form_validation->set_rules('email',display('email'),'max_length[100]|valid_email|xss_clean');
		$this->form_validation->set_rules('phone',display('phone'),'max_length[20]|xss_clean');
		$this->form_validation->set_rules('footer_text',display('footer_text'),'max_length[255]|xss_clean'); 
		//logo upload
		$logo = $this->fileupload->do_upload(
			'assets/img/',
			'logo'
		);
		// if logo is uploaded then resize the logo
		if ($logo !== false && $logo != null) {
			$this->fileupload->do_resize(
				$logo, 
				168,
				65
			);
		}
		//if logo is not uploaded
		if ($logo === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		$login_logo = $this->fileupload->do_upload(
			'assets/img/',
			'login_logo'
		);
		// if logo is uploaded then resize the logo
		if ($login_logo !== false && $login_logo != null) {
			$this->fileupload->do_resize(
				$login_logo, 
				168,
				65
			);
		}
		//if logo is not uploaded
		if ($login_logo === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		$footer_logo = $this->fileupload->do_upload(
			'assets/img/',
			'footer_logo'
		);
		// if logo is uploaded then resize the logo
		if ($footer_logo !== false && $footer_logo != null) {
			$this->fileupload->do_resize(
				$footer_logo, 
				168,
				65
			);
		}
		//if logo is not uploaded
		if ($footer_logo === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		$invoice_logo = $this->fileupload->do_upload(
			'assets/img/',
			'invoice_logo'
		);
		// if logo is uploaded then resize the logo
		if ($invoice_logo !== false && $invoice_logo != null) {
			$this->fileupload->do_resize(
				$invoice_logo, 
				168,
				65
			);
		}
		//if logo is not uploaded
		if ($invoice_logo === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}


		$data['setting'] = (object)$postData = array(
			'id'          => $this->input->post('id', TRUE),
			'email' 	  => $this->input->post('email',TRUE),
			'phone' 	  => $this->input->post('phone',TRUE),
			'logo' 	      => (!empty($logo)?$logo:$this->input->post('old_logo',TRUE)),
			'login_logo'  => (!empty($login_logo)?$login_logo:$this->input->post('old_login_logo',TRUE)),
			'footer_logo'  => (!empty($footer_logo)?$footer_logo:$this->input->post('old_footer_logo',TRUE)),
			'invoice_logo'  => (!empty($invoice_logo)?$invoice_logo:$this->input->post('old_invoice_logo',TRUE)),
			'powerbytxt' => $this->input->post('power_text', TRUE)
		); 
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->websetting_model->create_setting($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			} else {
				if ($this->websetting_model->update_setting($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
			}
 
			redirect('settings/17');

		} else { 
			$data['module'] = "dashboard";  
			$data['websetting'] = $this->websetting_model->read();  
			$this->load->view("web/web_setting", $data);
		} 
	}
	//Banner setting
	
 

	public function bannersetting()
	{
		$data['title'] = display('banner_setting');
		$data['module'] 	= "dashboard";  
		$data['baller_list'] = $this->db->select('*')->from('tbl_slider')->order_by('slid','desc')->get()->result(); 
		$data['type']   =  $this->websetting_model->type_dropdown();
		$data['page']   = "web/banner_list";  
		echo Modules::run('template/layout', $data); 
	} 
	public function bannertype()
	{
		$data['title'] = display('bannertype');
		$data['module'] 	= "dashboard";  
		$data['ballertype_list'] = $this->db->select('*')->from('tbl_slider_type')->get()->result(); 
		$data['page']   = "web/bannertype_list";  
		echo Modules::run('template/layout', $data); 
	} 
	public function createtype(){
		$data['title'] = display('bannertype');
		$this->form_validation->set_rules('bannertype',display('bannertype'),'required|xss_clean');
		$postData = array(
			'STypeName' 	  => $this->input->post('bannertype',TRUE)
		); 
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->createtype($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
				redirect('dashboard/web_setting/bannertype');
	
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
				redirect('dashboard/web_setting/bannertype');
			}
		}
	public function edittype($id){
		$this->form_validation->set_rules('bannertype',display('bannertype'),'required|xss_clean');
		$postData = array(
		    'stype_id' 	      => $id,
			'STypeName' 	  => $this->input->post('bannertype',TRUE)
		); 
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->updatetype($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('update_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
				redirect('dashboard/web_setting/bannertype');
	
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
				redirect('dashboard/web_setting/bannertype');
			}
		}
	public function create()
	{
		$data['title'] = display('banner_setting');
		$this->form_validation->set_rules('banner_type',display('banner_type'),'required|xss_clean');
		$this->form_validation->set_rules('width', display('width') ,'required|xss_clean');
		$this->form_validation->set_rules('height', display('height') ,'required|xss_clean');
		$this->form_validation->set_rules('title', display('title') ,'required|xss_clean');
		$this->form_validation->set_rules('subtitle', 'Subtitle' ,'xss_clean');
		$this->form_validation->set_rules('status',display('status'),'required|xss_clean');
		$this->form_validation->set_rules('url','link','xss_clean');
		$this->form_validation->set_rules('picture',display('image'),'required|xss_clean');
		 $width=$this->input->post('width', TRUE);
		 $height=$this->input->post('height', TRUE);
		   //Banner upload
		$banner = $this->fileupload->do_upload(
			'assets/img/banner/',
			'picture'
		);

		// if Banner is uploaded then resize the Banner
		if ($banner !== false && $banner != null) {
			$this->fileupload->do_resize(
				$banner, 
				$width,
				$height
			);
		}
		//if Banner is not uploaded
		if ($banner === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		 
		$postData = array(
	   'Sltypeid'           => $this->input->post('banner_type', TRUE),
	   'title'     		    => $this->input->post('title',TRUE), 
	   'subtitle'           => $this->input->post('subtitle',TRUE),
	   'image'              => $banner,
	   'width'              => $width,
	   'height'             => $height,
	   'slink'     		    => $this->input->post('url',TRUE), 
	   'status'     		=> $this->input->post('status',TRUE)
	  );
		if ($this->form_validation->run() === true) {
				if ($this->websetting_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			redirect('banner-setting');

		} else { 
		$data['title'] = display('banner_setting');
		$data['module'] 	= "dashboard";  
		$data['baller_list'] = $this->db->select('*')->from('tbl_slider')->order_by('slid','desc')->get()->result(); 
		$data['type']   =  $this->websetting_model->type_dropdown();
		$data['page']   = "web/banner_list";  
		echo Modules::run('template/layout', $data);
		} 
	}
	
	public function updatebanner()
	{
		$data['title'] = display('banner_setting');
		$this->form_validation->set_rules('banner_type',display('banner_type'),'required|xss_clean');
		$this->form_validation->set_rules('width', display('width') ,'required|xss_clean');
		$this->form_validation->set_rules('height', display('height') ,'required|xss_clean');
		$this->form_validation->set_rules('title', display('title') ,'required|xss_clean');
		$this->form_validation->set_rules('subtitle', 'Subtitle' ,'xss_clean');
		$this->form_validation->set_rules('status',display('status'),'required|xss_clean');
		$this->form_validation->set_rules('url','link','xss_clean');
		$width=$this->input->post('width', TRUE);
		$height=$this->input->post('height', TRUE);

		   //logo upload
		$banner = $this->fileupload->do_upload(
			'assets/img/banner/',
			'picture'
		);
		// if logo is uploaded then resize the logo
		if ($banner !== false && $banner != null) {
			$this->fileupload->do_resize(
				$banner, 
				$width,
				$height
			);
		}
		//if logo is not uploaded
		if ($banner === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		$sliderinfo=$this->db->select('*')->from('tbl_slider')->where('slid',$this->input->post('slid', TRUE))->get()->row();
		if(!empty($banner)){
			 unlink($sliderinfo->image);
			} 
		$postData = array(
	   'slid'               => $this->input->post('slid', TRUE),
	   'Sltypeid'           => $this->input->post('banner_type', TRUE),
	   'title'     		    => $this->input->post('title',TRUE), 
	   'subtitle'           => $this->input->post('subtitle',TRUE),
	   'image'              => (!empty($banner)?$banner:$this->input->post('sliderimage',TRUE)),
	   'width'              => $width,
	   'height'             => $height,
	   'link1'     		    => $this->input->post('link1',TRUE), 
	   'link2'     		    => $this->input->post('link2',TRUE), 
	   'link3'     		    => $this->input->post('link3',TRUE), 
	   'slink'     		    => $this->input->post('url',TRUE), 
	   'status'     		=> $this->input->post('status', TRUE)
	  );
		if ($this->form_validation->run() === true) {
				if ($this->websetting_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			redirect('banner-setting');

		} else { 
			$data['title'] = display('banner_setting');
			$data['module'] 	= "dashboard";  
			$data['baller_list'] = $this->db->select('*')->from('tbl_slider')->order_by('slid','desc')->get()->result(); 
			$data['type']   =  $this->websetting_model->type_dropdown();
			$data['page']   = "web/banner_list";  
			echo Modules::run('template/layout', $data);
		} 
	}

	 public function updateintfrm($id){
		$data['title'] = display('banner_edit');
		$data['intinfo']    = $this->websetting_model->findById($id);
		$data['type']   =  $this->websetting_model->type_dropdown();
        $data['module'] 	= "dashboard";    
        $data['page']   = "web/banneredit";
		$this->load->view('dashboard/web/banneredit', $data);   
	   }
public function delete($bannerid = null)
    {
		$sliderinfo=$this->db->select('*')->from('tbl_slider')->where('slid',$bannerid)->get()->row();
		unlink($sliderinfo->image);
		if ($this->websetting_model->delete($bannerid)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('banner-setting');
    }
	
	
//****************Menu Section***************/
public function menusetting()
	{
		$data['title'] = display('menu_setting');
		$data['module'] 	= "dashboard";  
		$data['menu_list'] = $this->db->select('*')->from('top_menu')->get()->result(); 
		$data['allmenu']   =  $this->websetting_model->allmenu_dropdown();
		$this->load->view("web/menu_list", $data);  
	}
 
	public function createmenu(){
		$data['title'] = display('add_menu');
		$this->form_validation->set_rules('menuname',display('menu_name'),'required|xss_clean');
		$this->form_validation->set_rules('Menuurl',display('menu_url'),'required|xss_clean');
		$this->form_validation->set_rules('status',display('status'),'required|xss_clean');
		if(empty($this->input->post('menuid', TRUE))){
			$parent=0;
			}
		else{
			$parent=$this->input->post('menuid', TRUE);
			}
		$postData = array(
			'menu_name' 	  => $this->input->post('menuname',TRUE),
			'menu_slug' 	  => $this->input->post('Menuurl',TRUE),
			'parentid' 	      => $parent,
			'entrydate' 	  => date('Y-m-d'),
			'isactive' 	      => $this->input->post('status',TRUE)
		);
		
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->createmenu($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
				redirect('menu-setting');
	
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
				redirect('menu-setting');
			}
		}
	public function editmenu($id){
		$data['title'] = display('add_menu');
		$this->form_validation->set_rules('menuname',display('menu_name'),'required|xss_clean');
		$this->form_validation->set_rules('Menuurl',display('menu_url'),'required|xss_clean');
		$this->form_validation->set_rules('status',display('status'),'required|xss_clean');
		if(empty($this->input->post('menuid', TRUE))){
			$parent=0;
			}
		else{
			$parent=$this->input->post('menuid', TRUE);
			}
		$postData = array(
		    'menuid' 	      => $id,
			'menu_name' 	  => $this->input->post('menuname',TRUE),
			'menu_slug' 	  => $this->input->post('Menuurl',TRUE),
			'parentid' 	      => $parent,
			'entrydate' 	  => date('Y-m-d'),
			'isactive' 	      => $this->input->post('status', TRUE)
		);
		
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->updatemenu($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('update_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
			}
			redirect('settings/13');
		}
		
	public function deletemenu($menuid = null)
    {
		if ($this->websetting_model->deletemenu($menuid)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('menu-setting');
    }
	
	//widget setting
	public function widgetsetting()
	{
		$data['title'] = display('widget_setting');
		$data['module'] 	= "dashboard";  
		$data['widget_list'] = $this->db->select('*')->from('tbl_widget')->order_by('widgetid','desc')->get()->result(); 
		$data['page']   = "web/widget_list";  
		echo Modules::run('template/layout', $data); 
	}
 
	public function createwidget(){
		$data['title'] = display('add_widget');
		$this->form_validation->set_rules('widgetname',display('widget_name'),'required|xss_clean');
		$this->form_validation->set_rules('widgettitle',display('widgettitle'),'xss_clean');
		$this->form_validation->set_rules('widgetdesc',display('widgetdesc'),'xss_clean');
		$postData = array(
			'widget_name' 	  => $this->input->post('widgetname',TRUE),
			'widget_title' 	  => $this->input->post('widgettitle',TRUE),
			'widget_desc' 	  => $this->input->post('widgetdesc',TRUE)
		);
		
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->createwidget($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
				redirect('widget-setting');
	
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
				redirect('widget-setting');
			}
		}
	public function updatewidget($id){
		$data['widget_info'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$id)->get()->row();
		$data['module'] 	= "dashboard"; 
		$data['page']   = "web/widget_list"; 
		$this->load->view('dashboard/web/widget', $data);  
		}
	public function editwidget($id){
		$data['title'] = display('add_widget');
		$this->form_validation->set_rules('widgetname',display('widget_name'),'required|xss_clean');
		$this->form_validation->set_rules('widgettitle',display('widgettitle'),'xss_clean');
		$this->form_validation->set_rules('widgetdesc',display('widgetdesc'),'xss_clean');
		$postData = array(
		    'widgetid' 	      => $id,
			'widget_name' 	  => $this->input->post('widgetname',TRUE),
			'widget_title' 	  => $this->input->post('widgettitle',TRUE),
			'widget_desc' 	  => $this->input->post('widgetdesc',TRUE)
		);
		
			if ($this->form_validation->run() === true) {
					if ($this->websetting_model->updatewidget($postData)) {
						#set success message
						$this->session->set_flashdata('message',display('update_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
	 
				redirect('widget-setting');
	
			} else { 
				$this->session->set_flashdata('exception',display('please_try_again'));
				redirect('widget-setting');
			}
		}
		
	public function deletewidget($menuid = null)
    {
		if ($this->websetting_model->deletewidget($menuid)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('widget-setting');
    }
	
	public function email_config_setup(){
		$data['title'] = display('email_setting');
		$data['module'] 	= "dashboard";  
		$data['config'] = $this->db->select('*')->from('email_config')->where('email_config_id',1)->get()->row(); 
		$this->load->view("web/email_setting", $data);  
	}
	public function email_config_save(){
		$this->form_validation->set_rules('protocol','','xss_clean');
		$this->form_validation->set_rules('mailpath','','xss_clean');
		$this->form_validation->set_rules('mailtype','','xss_clean');
		$this->form_validation->set_rules('smtp_host','','xss_clean');
		$this->form_validation->set_rules('smtp_port','','xss_clean');
		$this->form_validation->set_rules('sender','','xss_clean');
		$this->form_validation->set_rules('smtp_password','','xss_clean');

		$secure_image = $this->fileupload->do_upload(
			'assets/img/',
			'secure_image'
		);
		// if logo is uploaded then resize the logo
		if ($secure_image !== false && $secure_image != null) {
			$this->fileupload->do_resize(
				$secure_image, 
				400,
				200
			);
		}
		//if logo is not uploaded
		if ($secure_image === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}

		if ($this->form_validation->run() === true) {
		$data = array(
			'smtp_port' => $this->input->post('smtp_port',TRUE),
			'smtp_host' => $this->input->post('smtp_host',TRUE),
			'secure_image'  => (!empty($secure_image)?$secure_image:$this->input->post('old_secure_image',TRUE)),
			'smtp_password' => $this->input->post('smtp_password',TRUE),
			'protocol' => $this->input->post('protocol',TRUE),
			'mailpath' => $this->input->post('mailpath',TRUE),
			'mailtype' => $this->input->post('mailtype',TRUE),
			'sender' => $this->input->post('sender',TRUE)
		);

		$check = $this->db->select('*')
		->from('email_config')
		->where('email_config_id',1)
		->get()->row();
		
		if($check){
			$this->db->where('email_config_id',1)->update('email_config',$data);
		}else{
			$this->db->insert('email_config',$data);
		}

		$this->session->set_flashdata('message',display('update_successfully'));
		redirect('settings/7');
	}
		else{
			$this->session->set_flashdata('exception',display('please_try_again'));
			redirect('settings/8');
			}
	}
	public function subscribeList(){
        $data['title']    = display('subscribelist'); 
        #
        #pagination starts
        #
        $config["base_url"] = base_url('dashboard/web_setting/subscribeList');
        $config["total_rows"]  = $this->websetting_model->countlist();
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
        $data["subscribe"] = $this->websetting_model->emailread();
        $data["links"] = $this->pagination->create_links();
		
        #
        #pagination ends
        #   
        $data['module'] = "dashboard";
        $this->load->view("web/subscribeList", $data);   
		}
	
	    public function currency($id = null)
		{
			
			$this->permission->method('dashboard','read')->redirect();
			$data['title']    = display('currency_list'); 
			#
			#pagination starts
			#
			$config["base_url"] = base_url('dashboard/web_setting/index');
			$config["total_rows"]  = $this->currency_model->countlist();
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
			$data["currencylist"] = $this->currency_model->read($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
			if(!empty($id)) {
			$data['title'] = display('currency_edit');
			$data['intinfo']   = $this->currency_model->findById($id);
		   }
			#
			#pagination ends
			#   
			$data['module'] = "dashboard";
			$this->load->view("currency/currencylist", $data);   
		}
		
		
		public function currencycreate($id = null)
		{
		  $data['title'] = display('currency_add');
			$this->form_validation->set_rules('currencyname',display('currency_name'),'required|max_length[50]|xss_clean');
			$this->form_validation->set_rules('icon',display('currency_icon'),'required|xss_clean');
			$this->form_validation->set_rules('rate',display('currency_rate'),'required|xss_clean');
			$this->form_validation->set_rules('position',display('position'),'required|xss_clean');
		   $saveid=$this->session->userdata('id');
		   $data['type']   = (Object) $postData = array(
			   'currencyid'  		    => $this->input->post('currencyid', true),
			   'currencyname' 			=> $this->input->post('currencyname',true),
			   'curr_icon' 			    => $this->input->post('icon',true),
			   'position' 			    => $this->input->post('position',true),
			   'curr_rate' 			    => $this->input->post('rate',true),
			  ); 
		  $data['intinfo']="";
		  if ($this->form_validation->run()) { 
		   if(empty($this->input->post('currencyid', TRUE))) {
			$this->permission->method('dashboard','create')->redirect();
		 
			if ($this->currency_model->create($postData)) { 
			 $this->session->set_flashdata('message', display('save_successfully'));
			 redirect('settings/16');
			} else {
			 $this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("settings/16"); 
		
		   } else {
			$this->permission->method('dashboard','update')->redirect();
		
			if ($this->currency_model->update($postData)) { 
			 $this->session->set_flashdata('message', display('update_successfully'));
			} else {
			$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("settings/15");  
		   }
		  } else { 
		   if(!empty($id)) {
			$data['title'] = display('currency_edit');
			$data['intinfo']   = $this->currency_model->findById($id);
		   }
		   
		   $data['module'] = "dashboard";
		   redirect("settings/18");  
		}   
	 
		}
	   public function updateintfrmcr($id){
		  
			$this->permission->method('dashboard','update')->redirect();
			$data['title'] = display('currency_edit');
			$data['intinfo']   = $this->currency_model->findById($id);
			$data['module'] = "dashboard";  
			$data['page']   = "currency/currencyedit";
			$this->load->view('dashboard/currency/currencyedit', $data);   
		   }
	 
		public function deletecurrency($id = null)
		{
			$this->permission->module('dashboard','delete')->redirect();
			
			if ($this->currency_model->delete($id)) {
				#set success message
				$this->session->set_flashdata('message',display('delete_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception',display('please_try_again'));
			}
			redirect('settings/14');
		}



}
