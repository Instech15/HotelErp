<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array(
 			'auth_model' 
 		));

		$this->load->helper('captcha');
 	}
 

	public function index()
	{  
		if ($this->session->userdata('isLogIn'))
			redirect('dashboard/home');
		$data['title']    = display('login'); 
		$this->form_validation->set_rules('email', display('email'), 'required|valid_email|max_length[100]|trim|xss_clean');
		$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5|trim|xss_clean');
		$this->form_validation->set_rules('captcha', display('captcha'),  array('matches[captcha]', function($captcha){ 
			$oldCaptcha = $this->session->userdata('captcha');
			if ($captcha == $oldCaptcha) {
				return true;
			}
		}
	)
);
		
		$data['user'] = (object)$userData = array(
			'email' 	 => $this->input->post('email',TRUE),
			'password'   => $this->input->post('password'),
		);
		if ( $this->form_validation->run())
		{
			$this->session->unset_userdata('captcha');
			$user = $this->auth_model->checkUser($userData);
			if($user->num_rows() > 0) {
				
			if($user->row()->status != 0){
		

			$checkPermission = $this->auth_model->userPermission2($user->row()->id);
			if($checkPermission!=NULL){
				$permission = array();
				$permission1 = array();
				if(!empty($checkPermission)){
					foreach ($checkPermission as $value) {
						$permission[$value->module] = array( 
							'create' => $value->create,
							'read'   => $value->read,
							'update' => $value->update,
							'delete' => $value->delete
						);

						$permission1[$value->menu_title] = array( 
							'create' => $value->create,
							'read'   => $value->read,
							'update' => $value->update,
							'delete' => $value->delete
						);
					}

				} 
			}
			if($user->row()->is_admin == 2){
				$row = $this->db->select('client_id,client_email')->where('client_email',$user->row()->email)->get('setup_client_tbl')->row();
			}

				$sData = array(
					'isLogIn' 	  => true,
					'isAdmin' 	  => (($user->row()->is_admin == 1)?true:false),
					'user_type'   => $user->row()->is_admin,
					'id' 		  => $user->row()->id,
					'client_id'   => @$row->client_id,
					'fullname'	  => $user->row()->fullname,
					'user_level'  => $user->row()->user_level,
					'email' 	  => $user->row()->email,
					'image' 	  => $user->row()->image,
					'last_login'  => $user->row()->last_login,
					'last_logout' => $user->row()->last_logout,
					'ip_address'  => $user->row()->ip_address,
					'permission'  => json_encode(@$permission), 
					'label_permission'  => json_encode(@$permission1) 
					);	

					//store date to session 
					$this->session->set_userdata($sData);
					//update database status
					$this->auth_model->last_login();
					//welcome message
					$this->session->set_flashdata('message', display('welcome_back').' '.$user->row()->fullname);
					redirect('dashboard/home');

				} else{
					$this->session->set_flashdata('exception', display('sorry_your_account_is_deactivated'));
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('exception', display('incorrect_email_or_password'));
				redirect('login');
			} 

		} else {
			$captcha = create_captcha(array(
			    'img_path'      => './assets/img/captcha/',
			    'img_url'       => base_url('assets/img/captcha/'),
			    'font_path'     => './assets/fonts/captcha.ttf',
			    'img_width'     => '343',
			    'img_height'    => 64,
			    'expiration'    => 600, //5 min
			    'word_length'   => 4,
			    'font_size'     => 32,
			    'img_id'        => 'Imageid',
			    'pool'          => '23456789abcdefghijkmnpqrstuvwxyz',

			    // White background and border, black text and red grid
			    'colors'        => array(
			            'background' => array(255, 255, 255),
			            'border' => array(228, 229, 231),
			            'text' => array(49, 141, 1),
			            'grid' => array(241, 243, 246)
			    )
			));
			$data['captcha_word'] = $captcha['word'];
			$data['captcha_image'] = $captcha['image'];
			$this->session->set_userdata('captcha', $captcha['word']);
			echo Modules::run('template/login', $data);
		}
	}
	public function forgot_password()
	{ 	if ($this->session->userdata('isLogIn'))
			redirect('dashboard/home');
		$data['title']    = display('forgot_password');  
		$data['web_setting'] = $this->db->select("*")->from('common_setting')->get()->row(); 
		$this->load->view('template/forgot_password',$data);
	}
	function randstrGen($mode = null, $len = null) {
        $result = "";
        if ($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif ($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 4):
            $chars = "0123456789";
        endif;
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }
	public function forgot_check()
	{ 
		$data['title']    = display('forgot_password');  
		$email = $this->input->post('forgot',true);
		$checkemail = $this->db->select('email')->from('user')->where('email',$email)->get()->row();
		$random_key = ("RK" . date('y') . strtoupper($this->randstrGen(2, 4)));
		if($checkemail){
			$data = array(
				'password_reset_token'  => $random_key,
				);
			$this->db->where('email', $email)
                ->update("user", $data);
			//Otp send through Email
			$subject="Password Reset";
			$send_email = $this->db->select('*')->from('email_config')->where('email_config_id',1)->get()->row();	
			$config = array(
					'protocol'  => $send_email->protocol,
					'smtp_host' => $send_email->smtp_host,
					'smtp_port' => $send_email->smtp_port,
					'smtp_user' => $send_email->sender,
					'smtp_pass' => $send_email->smtp_password,
					'mailtype'  => $send_email->mailtype,
					'charset'   => 'utf-8'
				);
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$code = $this->db->select('password_reset_token')->from('user')->where('email',$email)->get()->row();	
			$htmlContent="Your otp code is ".$code->password_reset_token;
			$this->email->from($send_email->sender, 'Password Reset Token');
			$this->email->to(strtolower($email));
			$this->email->subject($subject);
			$this->email->message($htmlContent);
			$this->email->send();

			$found = array(
				'status'  => 'true',
				'msg'  => "OTP Code Sent To Email",
				'email'  => $email,
				);
			print_r(json_encode($found));
		}else{
			$notfound = array(
				'status'  => 'false',
				'msg'  => 'Email Not Found',
				);
			print_r(json_encode($notfound));
		}
	}
	public function check_code(){
		$data['title']    = display('forgot_password');  
		$code = $this->input->post('forgot',true);
		$checkemail = $this->input->post('hemail',true);
		$checkcode = $this->db->select('password_reset_token')->from('user')->where('password_reset_token',$code)->where('email',$checkemail)->get()->row();
		if($checkcode){
			$found = array(
				'status'  => 'true',
				'msg'  => "Please Enter New Password",
				);
			print_r(json_encode($found));
		}else{
		$notfound = array(
			'status'  => 'false',
			'msg'  => 'OTP Code Does Not Match',
			);
		print_r(json_encode($notfound));
		}
	}
	public function new_password(){
		$data['title']    = display('forgot_password');  
		$password = $this->input->post('forgot',true);
		$mainemail = $this->input->post('hemail',true);
		
		$data = array(
			'password'  => md5($password),
			'password_reset_token'  => '',
			);
		$checkemail = $this->db->select('email')->from('user')->where('email',$mainemail)->get()->row();
		if($checkemail){
			$this->db->where('email', $mainemail)
			->update("user", $data);
			$found = array(
				'status'  => 'true',
				'msg'  => "Password Changed Successfully",
				);
			print_r(json_encode($found));
		}else{
		$notfound = array(
			'status'  => 'false',
			'msg'  => 'Please Try Again',
			);
		print_r(json_encode($notfound));
		}
	}
  
	public function logout()
	{ 
		//update database status
		$this->auth_model->last_logout();
		//destroy session
		$this->session->sess_destroy();
		redirect('login');
	}

}
