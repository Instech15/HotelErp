<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'setting_model',
			'user_model'  
		));

		if (!$this->session->userdata('isAdmin')) 
		redirect('login'); 
	}
 

	public function index()
	{
		$data['title'] = display('application_setting');
		//check setting table row if not exists then insert a row
		$this->check_setting();
		$data['languageList'] = $this->languageList();
		$data['currencyList'] = $this->setting_model->currencyList(); 
		$data['setting'] = $this->setting_model->read(); 
		$data['timezone'] = $this->setting_model->timezone(); 

		$data['module'] = "dashboard";  
		$this->load->view("home/setting", $data);  
	} 

	public function create()
	{
		$data['title'] = display('application_setting');
		$this->form_validation->set_rules('title',display('application_title'),'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('address', display('address') ,'max_length[255]|xss_clean');
		$this->form_validation->set_rules('email',display('email'),'max_length[100]|valid_email|xss_clean');
		$this->form_validation->set_rules('phone',display('phone'),'max_length[20]|xss_clean');
		$this->form_validation->set_rules('language',display('language'),'max_length[250]|xss_clean'); 
		$this->form_validation->set_rules('footer_text',display('footer_text'),'max_length[255]|xss_clean'); 
		$this->form_validation->set_rules('currency',display('currency'),'required|xss_clean'); 
		$this->form_validation->set_rules('timezone',display('timezone'),'required|xss_clean'); 
		//logo upload
		$logo = $this->fileupload->do_upload(
			'assets/img/icons/',
			'logo'
		);
		// if logo is uploaded then resize the logo
		if ($logo !== false && $logo != null) {
			$this->fileupload->do_resize(
				$logo, 
				210,
				48
			);
		}
		//if logo is not uploaded
		if ($logo === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}
		
		//logo Splash image
		$splashimg = $this->fileupload->do_upload(
			'assets/img/icons/',
			'splash_logo'
		);
		// if Splash image is uploaded then resize the Splash image
		if ($splashimg !== false && $splashimg != null) {
			$this->fileupload->do_resize(
				$splashimg, 
				500,
				500
			);
		}
		//if Splash image is not uploaded
		if ($splashimg === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}


		//favicon upload
		$favicon = $this->fileupload->do_upload(
			'assets/img/icons/',
			'favicon'
		);
		// if favicon is uploaded then resize the favicon
		if ($favicon !== false && $favicon != null) {
			$this->fileupload->do_resize(
				$favicon, 
				32,
				32
			);
		}
		//if favicon is not uploaded
		if ($favicon === false) {
			$this->session->set_flashdata('exception', "Please Upload a Valid Image");
		}		
		$data['setting'] = (object)$postData = array(
			'id'          => $this->input->post('id', TRUE),
			'storename'   => $this->input->post('stname',TRUE),
			'title' 	  => $this->input->post('title',TRUE),
			'address' => $this->input->post('address', TRUE),
			'email' 	  => $this->input->post('email',TRUE),
			'phone' 	  => $this->input->post('phone',TRUE),
			'logo' 	      => (!empty($logo)?$logo:$this->input->post('old_logo', TRUE)),
			'splash_logo' => (!empty($splashimg)?$splashimg:$this->input->post('splash_logo', TRUE)),
			'favicon' 	  => (!empty($favicon)?$favicon:$this->input->post('old_favicon', TRUE)),
			'vat'	      => $this->input->post('storevat',TRUE),
			'servicecharge'=>$this->input->post('scharge',TRUE),
			'country'     =>$this->input->post('country',TRUE),
			'map_key'     =>$this->input->post('map_key',TRUE),
			'latitude'     =>$this->input->post('latitude',TRUE),
			'longitude'     =>$this->input->post('longitude',TRUE),
			'currency'	  => $this->input->post('currency',TRUE),
			'language'    => $this->input->post('language',TRUE),
			'dateformat' => $this->input->post('timeformat',TRUE),
			'timezone' => $this->input->post('timezone',TRUE),
			'checkintime' => $this->input->post('checkintime',TRUE),  
			'checkouttime' => $this->input->post('checkouttime',TRUE),  
			'site_align'  => $this->input->post('site_align',TRUE), 
			'pricetxt' => $this->input->post('pricetxt', TRUE),
			'powerbytxt' => $this->input->post('power_text', TRUE),
			'footer_text' => $this->input->post('footer_text', TRUE) 
		); 
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->setting_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			} else {
				if ($this->setting_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
			}
 
			redirect('settings/2');

		} else { 
			$data['languageList'] = $this->languageList();
			$data['currencyList'] = $this->setting_model->currencyList();
			$data['module'] = "dashboard";  
			$data['page']   = "home/setting";  
			echo Modules::run('template/layout', $data); 
		} 
	}

	//check setting table row if not exists then insert a row
	public function check_setting()
	{
		if ($this->db->count_all('setting') == 0) {
			$this->db->insert('setting',array(
				'title' => 'Dynamic Admin Panel',
				'address' => '123/A, Street, State-12345, Demo',
				'footer_text' => '2016&copy;Copyright',
			));
		}
	}

	
    public function languageList()
    { 
        if ($this->db->table_exists("language")) { 

                $fields = $this->db->field_data("language");

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }
	public function setting($id = null)
	{
		$data['title'] = display('settings');
		//check setting table row if not exists then insert a row
		$this->check_setting();
		$data['languageList'] = $this->languageList();
		$data['currencyList'] = $this->setting_model->currencyList(); 
		$data['setting'] = $this->setting_model->read(); 
		$data['module'] = "dashboard";  
		$data['page']   = "home/allsetting";  
		echo Modules::run('template/layout', $data); 
	}
	public function team_members() {
        $data['title'] = 'Team Members';
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',11)->get()->row();
        $data['teammembers_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',5)->get()->result();

        $this->load->view('team/team_members', $data);
    }
	public function teammember_edit() {
        $data['title'] = 'Team Members';
        $teammember_id = $this->input->post('teammember_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$teammember_id)->get()->row();;

        $this->load->view('team/teammember_edit', $data);
    }
	public function team_edit() {
        $data['title'] = 'Team Members';
        $teammember_id = $this->input->post('teammember_id', true);
        $data['intinfo'] = $this->db->select('*')->from('tbl_slider')->where('slid',$teammember_id)->get()->row();;

        $this->load->view('team/team_edit', $data);
    }
	public function teammember_infoupdate() {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function team_infoupdate() {
        $teammember_id = $this->input->post('teammember_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $link1 = $this->input->post('link1', true);
        $link2 = $this->input->post('link2', true);
        $link3 = $this->input->post('link3', true);
        $url = $this->input->post('url', true);
        $status = $this->input->post('status', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
            'width' => $width,
            'height' => $height,
            'title' => $title,
            'subtitle' => $subtitle,
            'image' => $banner,
            'link1' => $link1,
            'link2' => $link2,
            'link3' => $link3,
            'slink' => $url,
            'status' => $status,
        );
    }else{
        $teammember_data = array(
            'width' => $width,
            'height' => $height,
            'title' => $title,
            'subtitle' => $subtitle,
            'link1' => $link1,
            'link2' => $link2,
            'link3' => $link3,
            'slink' => $url,
            'status' => $status,
        );
    }
        $this->db->where('slid', $teammember_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function companies() {
        $data['title'] = "Companies logo";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',13)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',9)->get()->result();

        $this->load->view('company/companies', $data);
    }
    public function company_edit() {
        $data['title'] = "Companies logo";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('company/company_edit', $data);
    }
    public function company_infoupdate() {
        $company_id = $this->input->post('company_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function company_title_edit() {
        $data['title'] = 'Company title';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('company/company_title_edit', $data);
    }
	public function company_title_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function visitor() {
        $data['title'] = 'Team Members';
		$data['team_title'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',13)->get()->result();

        $this->load->view('visitor/visitors', $data);
    }
	public function visitors_edit($v_id) {
        $data['title'] = 'visitors title';
		$v_id = $this->input->post('v_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$v_id)->get()->row();

        $this->load->view('visitor/visitors_edit', $data);
    }
	public function visitors_infoupdate() {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('name', true);
        $desc = $this->input->post('desc', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'title' => $name,
            'subtitle' => $desc,
            'link1' => $designation,
        );
        $this->db->where('slid', $teammember_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function teamgallery() {
        $data['title'] = 'Team Members';
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',12)->get()->row();
		$data['team_image'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',6)->get()->result();

        $this->load->view('team/team_gallery', $data);
    }
	public function teamgallerytitle_edit() {
        $data['title'] = 'Company title';
        $company_id = $this->input->post('teammember_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('team/teamgallerytitle_edit', $data);
    }
	public function teamgalleryimage_edit() {
        $data['title'] = "Companies logo";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('team/teamgalleryimage_edit', $data);
    }
	public function contactinfo() {
		$data['title'] = 'Team Members';
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',19)->get()->row();
		$data['contact'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',14)->get()->result();
		
        $this->load->view('contact/contactinfo', $data);
    }
	public function contactinfotitle_edit() {
		$data['title'] = 'Company title';
		$company_id = $this->input->post('teammember_id', true);
		$data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

		$this->load->view('contact/contactinfotitle_edit', $data);
	}
	public function contactinfo_edit() {
		$data['title'] = "Companies logo";
		$company_id = $this->input->post('company_id', true);
		$data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
		$this->load->view('contact/contactinfo_edit', $data);
	}
    public function contactinfo_infoupdate() {
        $company_id = $this->input->post('company_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);


        $teammember_data = array(
			'title' => $width,
            'subtitle' => $height,
        );
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function gallery_save() {
        $name = $this->input->post('name', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'sltypeid' => 8,
			'title' => $name,
			'width' => $width,
            'height' => $height,
            'image' => $banner,
        );
    }else{
        $teammember_data = array(
			'sltypeid' => 8,
			'title' => $name,
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->insert('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Save Successfully';
    }
	public function gallery() {
		$data['title'] = 'slider';
		$data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',8)->get()->result();
		
        $this->load->view('gallery/gallery', $data);
    }

	public function gallery_edit() {
		$data['title'] = "slider";
		$company_id = $this->input->post('company_id', true);
		$data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
		$this->load->view('gallery/gallery_edit', $data);
	}
    public function gallery_update() {
        $company_id = $this->input->post('company_id', true);
        $name = $this->input->post('name', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}

        if(!empty($banner)){
        $teammember_data = array(
			'title' => $name,
			'width' => $width,
            'height' => $height,
            'image' => $banner,
        );
    }else{
        $teammember_data = array(
			'title' => $name,
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function delete_gallery($id = null)
	{ 
		$delete = $this->db->where('slid', $id)
			->delete("tbl_slider");
		if ($delete) {
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
	}
	public function slider() {
        $data['title'] = "slider";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',1)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',1)->get()->result();

        $this->load->view('slider/slider', $data);
    }
    public function sliderimage_edit() {
        $data['title'] = "slider";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('slider/sliderimage_edit', $data);
    }
    public function sliderimage_update() {
        $company_id = $this->input->post('company_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function slidertitle_edit() {
        $data['title'] = 'slider';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('slider/slidertitle_edit', $data);
    }
	public function slidertitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_name' => $title,
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function sliderimage_save() {
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'sltypeid' => 1,
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'sltypeid' => 1,
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->insert('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Save Successfully';
    }
	public function delete_slider($id = null)
	{ 
		$delete = $this->db->where('slid', $id)
			->delete("tbl_slider");
		if ($delete) {
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
	}
	public function promise() {
        $data['title'] = "promise";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',7)->get()->row();
		$data['team_title1'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',8)->get()->row();
		$data['team_title2'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',9)->get()->row();
		$data['team_title3'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',10)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',12)->get()->result();

        $this->load->view('promise/promise', $data);
    }
    public function promiseimage_edit() {
        $data['title'] = "promise";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('promise/promiseimage_edit', $data);
    }
    public function promiseimage_update() {
        $company_id = $this->input->post('company_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function promisetitle_edit() {
        $data['title'] = 'promise';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('promise/promisetitle_edit', $data);
    }
	public function promisetitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_name' => $title,
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function homeabout() {
        $data['title'] = "homeabout";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',3)->get()->row();
		$data['team_title1'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',6)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',2)->get()->result();

        $this->load->view('homeabout/homeabout', $data);
    }
    public function homeaboutimage_edit() {
        $data['title'] = "homeabout";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('homeabout/homeaboutimage_edit', $data);
    }
    public function homeaboutimage_update() {
        $company_id = $this->input->post('company_id', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
            $teammember_data = array(
                'width' => $width,
                'height' => $height,
                'image' => $banner,
    
            );
        }else{
            $teammember_data = array(
                'width' => $width,
                'height' => $height,
            );
        }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function homeabouttitle_edit() {
        $data['title'] = 'homeabout';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('homeabout/homeabouttitle_edit', $data);
    }
	public function homeabouttitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_name' => $title,
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function topoffer() {
        $data['title'] = "topoffer";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',4)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',3)->get()->result();

        $this->load->view('topoffer/topoffer', $data);
    }
    public function topofferimage_edit() {
        $data['title'] = "topoffer";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('topoffer/topofferimage_edit', $data);
    }
    public function topofferimage_update() {
        $company_id = $this->input->post('company_id', true);
        $title = $this->input->post('title', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
        $link = $this->input->post('link', true);
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
            echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'title' => $title,
			'width' => $width,
            'height' => $height,
			'slink' => $link,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'title' => $title,
			'width' => $width,
            'slink' => $link,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function topoffertitle_edit() {
        $data['title'] = 'topoffer';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('topoffer/topoffertitle_edit', $data);
    }
	public function topoffertitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function blogoffer() {
        $data['title'] = "blogoffer";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',29)->get()->row();
		$data['team1_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',5)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',4)->get()->result();

        $this->load->view('blogoffer/blogoffer', $data);
    }
    public function blogofferimage_edit() {
        $data['title'] = "blogoffer";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('blogoffer/blogofferimage_edit', $data);
    }
    public function blogofferimage_update() {
        $company_id = $this->input->post('company_id', true);
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
        $link = $this->input->post('link', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'title' => $title,
			'subtitle' => $subtitle,
			'width' => $width,
            'height' => $height,
			'slink' => $link,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'title' => $title,
			'subtitle' => $subtitle,
			'width' => $width,
            'height' => $height,
            'slink' => $link,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function blogoffertitle_edit() {
        $data['title'] = 'blogoffer';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('blogoffer/blogoffertitle_edit', $data);
    }
	public function blogoffertitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_name' => $title,
            'widget_title' => $name,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function roomfeature() {
        $data['title'] = "roomfeature";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',30)->get()->row();
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',11)->get()->result();

        $this->load->view('roomfeature/roomfeature', $data);
    }
    public function roomfeatureimage_edit() {
        $data['title'] = "roomfeature";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('roomfeature/roomfeatureimage_edit', $data);
    }
    public function roomfeatureimage_update() {
        $company_id = $this->input->post('company_id', true);
        $title = $this->input->post('title', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'title' => $title,
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
        $teammember_data = array(
			'title' => $title,
			'width' => $width,
            'height' => $height,
        );
    }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function roomfeaturetitle_edit() {
        $data['title'] = 'roomfeature';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('roomfeature/roomfeaturetitle_edit', $data);
    }
	public function roomfeaturetitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $teammember_data = array(
            'widget_title' => $title,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function checkout() {
        $data['title'] = "checkout";
        $data['company_list'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',10)->get()->result();
        $data['condition'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',35)->get()->row();
        $data['condition1'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',36)->get()->row();
        $data['condition2'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',37)->get()->row();

        $this->load->view('checkout/checkout', $data);
    }
	public function condition_edit() {
        $data['title'] = 'roomfeature';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('checkout/condition_edit', $data);
    }
    public function checkoutimage_edit() {
        $data['title'] = "checkout";
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();
        $this->load->view('checkout/checkoutimage_edit', $data);
    }
    public function checkoutimage_update() {
        $company_id = $this->input->post('company_id', true);
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
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
			echo "<h5>Failed</h5>Invalid Image Format";
            exit;
		}
        if(!empty($banner)){
        $teammember_data = array(
			'title' => $title,
			'subtitle' => $subtitle,
			'width' => $width,
            'height' => $height,
            'image' => $banner,

        );
    }else{
            $teammember_data = array(
                'title' => $title,
                'subtitle' => $subtitle,
                'width' => $width,
                'height' => $height,
            );
        }
        $this->db->where('slid', $company_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function condition_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);
        $teammember_data = array(
            'widget_title' => $title,
            'widget_desc' => $detail,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function footer() {
        $data['title'] = "checkout";
		$data['team_title'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',20)->get()->row();
		$data['team_title1'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',21)->get()->row();
		$data['social'] = $this->db->select('*')->from('tbl_slider')->where('sltypeid',15)->get()->result();
		$data['pagetitle'] = $this->db->select('*')->from('page_title')->get()->result();

        $this->load->view('footer/footer', $data);
    }
	public function footertitle_edit() {
        $data['title'] = 'footer';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_widget')->where('widgetid',$company_id)->get()->row();;

        $this->load->view('footer/footertitle_edit', $data);
    }
	public function footertitle_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('title', true);
        $title = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $teammember_data = array(
            'widget_name' => $name,
            'widget_title' => $title,
            'widget_desc' => $designation,
        );
        $this->db->where('widgetid', $teammember_id)->update('tbl_widget', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function page_title_edit() {
        $data['title'] = 'footer';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('page_title')->where('pageid',$company_id)->get()->row();;

        $this->load->view('footer/page_title_edit', $data);
    }
	public function page_title_update() {
        $teammember_id = $this->input->post('company_id', true);
        $home = $this->input->post('home', true);
        $aboutus = $this->input->post('aboutus', true);
        $contactus = $this->input->post('contactus', true);
        $gallery = $this->input->post('gallery', true);
        $roomlist = $this->input->post('roomlist', true);
        $roomdetails = $this->input->post('roomdetails', true);
        $teammember_data = array(
            'home' => $home,
            'aboutus' => $aboutus,
            'gallery' => $gallery,
            'roomlist' => $roomlist,
            'roomdetails' => $roomdetails,
            'contactus' => $contactus,
        );
        $this->db->where('pageid', $teammember_id)->update('page_title', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
	public function social_edit() {
        $data['title'] = 'footer';
        $company_id = $this->input->post('company_id', true);
        $data['teammember_edit'] = $this->db->select('*')->from('tbl_slider')->where('slid',$company_id)->get()->row();;

        $this->load->view('footer/social_edit', $data);
    }
	public function social_update() {
        $teammember_id = $this->input->post('teammember_id', true);
        $title = $this->input->post('title', true);
        $teammember_data = array(
            'link1' => $title,
        );
        $this->db->where('slid', $teammember_id)->update('tbl_slider', $teammember_data);
        echo '<h5>Success</h5>Updated Successfully';
    }
    public function emailSetting(){
        $label = $this->input->post("label", true);
        $status = $this->input->post("status", true);
        $update = $this->db->where("permission", $label)->update("tbl_email_permission", array("status"=>$status));
        if($update){
            echo '<h5>Success</h5>Updated Successfully';
        }else{
            echo '<h5>Error</h5>Please Try Again';
        }
    }
}
