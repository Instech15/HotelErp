<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {

    protected $FILE_PATH;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_hotel_model');
        $this->load->library('form_validation');
        $this->FILE_PATH = base_url('assets/img/user');
		$timezone = $this->db->select('timezone')->from('setting')->get()->row();
        date_default_timezone_set($timezone->timezone);
        $this->load->library('upload');

    }

       public function sign_in()
    {
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('type', 'User Type', 'required|trim');
            $this->form_validation->set_rules('device_token', 'Device Token', 'required|trim');
            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                return $this->respondWithValidationError($errors);
            }
            else
            {
                $output = array();
                $data['email']      = $this->input->post('email', TRUE);
                $data['password']   = $this->input->post('password', TRUE);
                $data['type']   = $this->input->post('type', TRUE);
                $token   = $this->input->post('device_token', TRUE);

                if($data['type'] == 2){   
                $oldtoken = $this->db->select("device_token")->from("user")->where("email",$data['email'])->get()->row();
                if($oldtoken->device_token!=$token || empty($oldtoken->device_token)){
                    $newtoken = array(
                        'device_token' => $token
                    );
                    $this->db->where('email',$data['email'])->update('user',$newtoken);
                }
                $this->form_validation->set_rules('pos_id', 'Position', 'required|trim');
                if ($this->form_validation->run() == FALSE)
                {
                    $errors = $this->form_validation->error_array();
                    return $this->respondWithValidationError($errors);
                }
                else
                {
                    $data['pos_id']   = $this->input->post('pos_id', TRUE);
                    $IsReg = $this->Api_hotel_model->checkEmailOrPhoneIsRegistered('user', $data);

                if(!$IsReg) {
                    return $this->respondUserNotReg('This email has not been registered yet.');
                }
                $result = $this->Api_hotel_model->authenticate_user('user', $data);

                
                if ($result != FALSE) {
                    return $this->respondWithSuccess('You have successfully logged in.', $result);
                } else {
                    return $this->respondWithError('The email and password you entered don\'t match.',$output);
                }
                }
               } else {
                return $this->respondWithError('Invalid user type.',$output);
                }
          
                $IsReg = $this->Api_hotel_model->checkEmailOrPhoneIsRegistered('user', $data);
            }
    }
    public function userprofile()
    {
           $this->load->library('form_validation');
            $this->form_validation->set_rules('userid', 'User Id', 'required|trim');
            
            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                return $this->respondWithValidationError($errors);
            }
            else
            {
                $output = array();

                $id      = $this->input->post('userid', TRUE);
                $profile = $this->Api_hotel_model->read('*','user', array('id'=>$id));
                
                if ($profile != FALSE) {
					$str = substr($profile->image, 2);
					$profile->{"UserPictureURL"}=base_url().$str;
                    $code =$this->db->select('employee_code')->from('employee_info')->where('emp_id',$id)->get()->row();
                    $profile->{"applicant_code"}=$code->employee_code;
                    return $this->respondWithSuccess('Your Profile Details.', $profile);
                } else {
                    return $this->respondWithError('This User has not been registered yet.',$output);
                }
            }
    }
    public function base64ToImage($imageData){
    $URL = 'assets/img/user/';
    $image_base64 = base64_decode($imageData);
    $file = $URL . uniqid() . '.png';
    file_put_contents($file, $image_base64);
    return $file;
   }
    
    public function profile_update()
    {
        $this->form_validation->set_rules('userid', 'User Id', 'required|trim');
        $id = $this->input->post('userid', TRUE);
        $user = $this->Api_hotel_model->read('*','user', array('id'=>$id));
        $this->form_validation->set_rules('firstname', display('firstname'),'required|max_length[50]|xss_clean');
        if($user->user_type!=2) 
        $this->form_validation->set_rules('lastname', display('lastname'),'required|max_length[50]|xss_clean');
        #------------------------#
        if (!empty($id)) {   
            $this->form_validation->set_rules('email', display('email'), "required|valid_email|max_length[100]|xss_clean");
            
        } else {
            $this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user.email]|max_length[100]|xss_clean');
        }
        #------------------------#
        $this->form_validation->set_rules('password', display('password'),'required|min_length[8]|callback_valid_password|xss_clean');
        $this->form_validation->set_rules('about', display('about'),'max_length[1000]|xss_clean');
        $this->form_validation->set_rules('status', display('status'),'required|max_length[1]|xss_clean');
        
        $last_user = $this->db->select('id')->from('user')->order_by('id', 'desc')->get()->row();
        $last_id = $last_user->id + 1;
        
        $last_emp = $this->db->select('employee_code')->from('employee_info')->order_by('emp_id', 'desc')->get()->row();
        $last_emp->employee_code+1;
        
        $existuser = $this->db->select('*')->from('employee_info')->where('emp_id', $id)->get()->row();
        if(empty($existuser)){
            $last_emp = $this->db->select('MAX(employee_code) as employee_code')->from('employee_info')->order_by('emp_id', 'desc')->get()->row();
            $empcode=$last_emp->employee_code+1;
            }
        else{			
            $empcode=$existuser->employee_code;
            }


            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                return $this->respondWithValidationError($errors);
            }
            else
            {
                $imagedata=$this->input->post('image', TRUE);
                if(!empty($imagedata)){
                $image=$this->base64ToImage($imagedata);
                }else{
                    $image= $user->image;
                }
                $output = array();

                $data['user'] = (object)$userLevelData = array(
                    'id' 		  => $this->input->post('userid'),
                    'firstname'   => $this->input->post('firstname',TRUE),
                    'lastname' 	  => $this->input->post('lastname',TRUE),
                    'email' 	  => $this->input->post('email',TRUE),
                    'userphone'   => $this->input->post('phone',TRUE),
                    'empdivision'   => $this->input->post('empdivision',TRUE),
                    'department'   => $this->input->post('department',TRUE),
                    'region'   => $this->input->post('region',TRUE),
                    'password' 	  => md5($this->input->post('password',TRUE)),
                    'about' 	  => $this->input->post('about',true),
                    'image'   	  => (!empty($image)?$image:$user->image),
                    'last_login'  => null,
                    'user_type'   => $this->input->post('user_type'),
                    'last_logout' => null,
                    'ip_address'  => null,
                    'status'      => $this->input->post('status',TRUE),
                    'is_admin'    => $user->is_admin
                );
                if($user->user_type!=2){
                    $postDataupdate = array(
                    'emp_id'                                 	=> $this->input->post('userid',true),
                    'employee_code'                             => $empcode,
                    'emp_name'                	 				=> $this->input->post('firstname',true).' '.$this->input->post('lastname',true),
                    'emp_email'                	 				=> $this->input->post('email',true),
                    'division'                	 				=> $this->input->post('empdivision',true),
                    'department'                	 			=> $this->input->post('department',true),
                    'region'                 					=> $this->input->post('region',true),
                    'emp_phone'                	 				=> $this->input->post('phone',true),
                    );
                    }
                if($this->input->post('user_type')==2){
                $postData = array(
                    'vendorid'                                 	=> $this->input->post('userid',true),
                    'Vendor_Name'                               => $this->input->post('firstname',true),
                    'email'                	 					=> $this->input->post('email',true),
                    'details'                 					=> $this->input->post('about',true),
                    'status'                	 				=> $this->input->post('status',true),
                );
                }
                if ($this->Api_hotel_model->update_date('user',$userLevelData,'id',$id)) {
                    if($user->user_type!=2){
                        $this->Api_hotel_model->update_date('employee_info',$postDataupdate,'emp_id',$id);
                    }
                    if($user->user_type==2){
                    $this->Api_hotel_model->update_date('tbl_vendor',$postData,'vendorid',$id);
                    }
                    return $this->respondWithSuccess('Profile updated successfully.', $output);
                }else{
                    return $this->respondWithError('Please try again...',$output);
                }
            }
    }
    public function valid_password($password = ''){
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');

            return FALSE;
        }

        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

            return FALSE;
        }

        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

            return FALSE;
        }

        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

            return FALSE;
        }

        if (strlen($password) < 8)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');

            return FALSE;
        }

        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

            return FALSE;
        }

        return TRUE;
    }
    public function hkroomlist(){
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required|trim');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $errors = $this->form_validation->error_array();
            return $this->respondWithValidationError($errors);
        }
        else
        {
            $output = array();
            $emp_id = $this->input->post('employee_id', TRUE);
            $date = $this->input->post('date', TRUE);
            $empcheck = $this->db->select("employee_id")->from("employee_history")->where("employee_id",$emp_id)->get()->row();
            if($empcheck){
            $output = $this->Api_hotel_model->read2('roomno,hkeeper_id,status','tbl_housekeepingrecord','roomno',array('employee_id'=>$emp_id),NULL,NULL,array('Date(createDate)'=>$date));
            if ($output != FALSE) {
                foreach($output as $op){
                $rmcheck = $this->db->select("status")->from("tbl_roomnofloorassign")->where('roomno',$op->roomno)->get()->row();
                if(($op->status==0 ||$op->status==2) && $rmcheck->status==4){
                    $op->status="3";
                }else if($op->status==0){
                    $op->status="2";
                }
              }
                return $this->respondWithSuccess('All room list.', $output);
            } else {
                return $this->respondWithError('No room found.',$output);
            }
          }else {
            return $this->respondWithError('No employee found.',$output);
          }
        }
    }
    public function hkroomlist_details(){
        $this->form_validation->set_rules('hkeeper_id', 'House Keeping Id', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $errors = $this->form_validation->error_array();
            return $this->respondWithValidationError($errors);
        }
        else
        {
            $output = array();
            $hk_id = $this->input->post('hkeeper_id', TRUE);
            $checkrecord = $this->db->select("hkeeper_id")->from("tbl_housekeepingrecord")->where("hkeeper_id",$hk_id)->where("status!=",1)->get()->row();
            if($checkrecord){
            $output['roomcleaningdetails'] = $this->Api_hotel_model->room_cleaningdetails($hk_id);
            if ($output != FALSE) {
                return $this->respondWithSuccess('Room details.', $output);
            } else {
                return $this->respondWithError('No room found.',$output);
            }
          }else {
            return $this->respondWithError('No room found.',$output);
          }
        }
    }
    public function alllist(){
        $this->form_validation->set_rules('listid', 'List Id', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $errors = $this->form_validation->error_array();
            return $this->respondWithValidationError($errors);
        }
        else
        {
            $output = array();
            $emp_id = $this->input->post('employee_id', TRUE);
            $output['productlist'] = $this->Api_hotel_model->read2('*','products','id',array('category_id'=>501));
            $output['checklist'] = $this->Api_hotel_model->read2('*','tbl_checklist','checklist_id',array('type'=>1));
            if ($output != FALSE) {
                return $this->respondWithSuccess('All list.', $output);
            } else {
                return $this->respondWithError('No list found.',$output);
            }
        }
    }
    public function cleaning_update(){
        $this->form_validation->set_rules('employee_id','Employee Id','required|xss_clean');
        $this->form_validation->set_rules('date_start',display('date_start'),'required|xss_clean');
        $this->form_validation->set_rules('date_end',display('date_end'),'required|xss_clean');
        $this->form_validation->set_rules('hkeeper_id','House cleaning id','required|xss_clean');
        $this->form_validation->set_rules('room_no',display('room_no'),'required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $errors = $this->form_validation->error_array();
            return $this->respondWithValidationError($errors);
        }
        else
        {
        $output = array();
        $employee_id=$this->input->post('employee_id', TRUE);
        $date_start=$this->input->post('date_start', TRUE);
		$date_end = $this->input->post('date_end', TRUE);
		$hkeeper_id = $this->input->post('hkeeper_id', TRUE);
		$room_no = $this->input->post('room_no', TRUE);
		$checklist=$this->input->post('checklist', TRUE);
		$product_details=$this->input->post('product_details', TRUE);

		$hkcheck = $this->db->select("employee_id")->from("tbl_housekeepingrecord")->where("roomno",$room_no)->where('status!=',1)->get()->row();
		if($hkcheck && $hkcheck->employee_id==$employee_id){
		$allc_id="";
        $allp_id="";
		$allp_qty="";
		if(!empty($checklist)){
			$totalchecklist = count(json_decode($checklist));
			$allchecklist = json_decode($checklist);
		for($i=0;$i<$totalchecklist;$i++){
		  $check_id = $allchecklist[$i]->id;
		  $allc_id .= $check_id.',';
		}
		}
        if(!empty($product_details)){
			$totalprodictlist = count(json_decode($product_details));
			$allprodictlist = json_decode($product_details);
			for($i=0;$i<$totalprodictlist;$i++){
				if($allprodictlist[$i]->qty>0){
					$product_id = $allprodictlist[$i]->id;
					$product_qty=$allprodictlist[$i]->qty;
					$allp_id .= $product_id.',';
					$allp_qty .= $product_qty.',';
				}
			}
		}
		$data['house_keeping']   = (Object) $updateData = array(
		   'date_start'              => $date_start,
		   'date_end' 	         	 => $date_end,
		   'all_checklist'			=>trim($allc_id,','),
		   'all_productlist'		=>trim($allp_id,','),
		   'allproductqty'			=>trim($allp_qty,','),
		   'status'					=>1,
		  );
		  if(empty($date_start) || empty($date_start)){
              return $this->respondWithError("Start date or End date can not empty",$output);
			}
			else if($date_start<date("Y-m-d H:i:s",strtotime('-30 minutes')) || $date_end<date("Y-m-d H:i:s")){
                return $this->respondWithError("Start or End date can not lower than current date",$output);
            }
            else if($date_start > $date_end){
                return $this->respondWithError("End date can not greater than start date",$output);
            }
			else if((!empty($products_id)?count($products_id):null)!=(!empty($productsqty)?count($productsqty):null)){
                return $this->respondWithError("Products and products quantity not equal",$output);
			} else{
				$this->db->where('hkeeper_id',$hkeeper_id)->update('tbl_housekeepingrecord',$updateData);
				$checrstatus = $this->db->select('status')->from("tbl_roomnofloorassign")->where("roomno",$room_no)->get()->row();
				if($checrstatus->status==3 || $checrstatus->status==9){
					$rmdt = array(
					'status' => 1
					);
				$this->db->where('roomno',$room_no)->update('tbl_roomnofloorassign',$rmdt);
				}
				elseif($checrstatus->status==4){
					$rmdt = array(
						'status' => 2
						);
					$this->db->where('roomno',$room_no)->update('tbl_roomnofloorassign',$rmdt);
				}
                if($product_details){
                    $totalproduct = count(json_decode($product_details));
                    $pdetails =json_decode($product_details);
                    for($i=0;$i<$totalproduct;$i++){
                      $prod_id = $pdetails[$i]->id;
                      $p_qty = $pdetails[$i]->qty;
                      
					  $oldstock = $this->db->select("stock,product_name,used,reuseable")->from("products")->where("id",$prod_id)->get()->row();
                      $olduse = $this->db->select("in_use,ready")->from("tbl_reuseableproduct")->where("product_id",$prod_id)->get()->row();
					  $stock = $oldstock->stock - $p_qty;
					  $used = $oldstock->used + $p_qty;
                      if($stock<0){
                        return $this->respondWithError($oldstock->product_name." is out of stock.",$output);
                      }else{
                        if($oldstock->reuseable==0){
                            $stdata = array(
                              'stock'     	     => $stock,
                              'used'     	     	 => $used
                             );
                                $this->db->where('id', $prod_id)->update('products',$stdata);
                            }else{
                            if($olduse->ready){
					            $ready = $olduse->ready - $p_qty;
                            }else{
                                $ready = 0;
                            }
                            if($olduse->in_use){
					            $inuse = $olduse->in_use + $p_qty;
                            }else{
                                $inuse = 0;
                            }
                             $stdata = array(
                              'in_use'     	     => $inuse,
                              'ready'     	     	 => $ready
                             );
                             if($ready>=0){
                                $this->db->where('product_id', $prod_id)->update('tbl_reuseableproduct',$stdata);
                             }else{
                                $this->session->set_flashdata('exception',  $oldstock->product_name." is not ready in reuse stock");
                            }
                        }
                     }
                    }
                }
                return $this->respondWithSuccess("Cleaning details updated successfully", $output);
		}
        }else{
            return $this->respondWithError("You did not assign to clean this room",$output);
		}
       }
	}
}			