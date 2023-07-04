<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	  public $allmenu='';
	  public $webinfo='';
	  public $widgetinfo='';
	  public $settinginfo='';
	  public $storecurrency='';
	  public function __construct() {
        parent::__construct();
		$this->load->model(array(
			'hotel_model'
		));
		$this->load->helper('captcha');
		$this->allmenu= $this->hotel_model->allmenu_dropdown();
		$this->webinfo= $this->db->select('*')->from('common_setting')->get()->row();
		$this->settinginfo= $this->db->select('*')->from('setting')->get()->row(); 
		$this->storecurrency= $this->db->select('*')->from('currency')->where('currencyid',$this->settinginfo->currency)->get()->row();  
    }
	
	public function index()
	{
		$page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= !empty($page->home) ? $page->home : null;
		$curdate=date('Y-m-d');
		$month = date("Y-m-d", strtotime(" +12 months"));
		$where="offer_date Between '".$curdate."' AND '".$month."'";
		$data['slider_info']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','1');
		$data['banner_homemiddle']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','2');
		$data['banner_topweek']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','3');
		$data['banner_destination']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','4');
		$data['randoffer']=$this->db->select("*")->from('tbl_room_offer')->where($where)->order_by('offer_date','ASC')->get()->result();
		$data['content']=$this->load->view('home',$data,TRUE);
		$this->load->view('index',$data);
	}
	public function roomlist()
	{
	    $page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= $page->roomlist;
		$checkinpost=$this->input->post('checkin',TRUE);
		$checkoutpost=$this->input->post('checkout',TRUE);
		$childrenpost=$this->input->post('children',TRUE); 
		$adultspost=$this->input->post('adults',TRUE);
		$sessiondata = array('checkin' =>$checkinpost,'checkout' =>$checkoutpost,'children'=>$childrenpost,'adults'=>$adultspost);
		$this->session->set_userdata($sessiondata);
		$checkin=$this->session->userdata('checkin');
		$checkout=$this->session->userdata('checkout');
		$children=$this->session->userdata('children');
		$adults=$this->session->userdata('adults');
		if($this->session->userdata('checkin')== FALSE){
			redirect('');
		}else{		
		$status="bookingstatus!=1 AND bookingstatus!=5";
		$exits = $this->db->select("*")->from('booked_info')->where('checkindate<=',$checkin)->where('checkoutdate>',$checkin)->where($status)->get()->result();
		$exit = $this->db->select("*")->from('booked_info')->where('checkindate<',$checkout)->where('checkoutdate>=',$checkout)->where($status)->get()->result();
		$check = $this->db->select("*")->from('booked_info')->where('checkindate>',$checkin)->where('checkoutdate<=',$checkout)->where($status)->get()->result();
		$numberlist=$this->db->select("*")->from('tbl_roomnofloorassign')->get()->result();
		$roomid="";
		foreach($numberlist as $singleid){
			if(!empty($singleid->roomid)){
				$roomid.=$singleid->roomid.',';
			}
		}
		$gtroomid=rtrim($roomid,',');
		$roomview="roomid IN($gtroomid)";
		if(!empty($numberlist)){
			$roomdetails=$this->db->select("roomdetails.*,room_image.room_imagename")->from('roomdetails')->join('room_image','room_image.room_id=roomdetails.roomid','left')->where($roomview)->group_by("roomdetails.roomid")->get()->result();
		}else{
			$roomdetails='';
		}
		$roomlist='';
		foreach($numberlist as $singleno){
				if(!empty($singleno->roomno)){
					$roomlist.=$singleno->roomno.',';
				}
			}
		
		$gtroomno=rtrim($roomlist,',');
		if(empty($exits)&&empty($exit)&&empty($check)){
			$data['roominfo']=$roomdetails;
		}
		else{
			$bookedroom="";
			if(!empty($exits)){
			foreach($exits as $booked){
				$bookedroom.=$booked->room_no.',';
				}
			}
			if(!empty($exit)){
				foreach($exit as $ex){
					$bookedroom.=$ex->room_no.',';
				}
			}
			if(!empty($check)){
				foreach($check as $ch){
					$bookedroom.=$ch->room_no.',';
				}
			}
			$bookedroom=rtrim($bookedroom,',');
			$condition="roomno NOT IN($bookedroom)";
			$allroom=$this->db->select("DISTINCT(roomid)")->from('tbl_roomnofloorassign')->where($condition)->get()->result();
			$sr='';
			foreach($allroom as $singleroom){
				$sr.="'".$singleroom->roomid."',";
				}
			$sr=rtrim($sr,',');
			$roomcondition="roomid IN($sr)";
			if(!empty($sr)){
				$roominfo=$this->db->select("roomdetails.*,room_image.room_imagename")->from('roomdetails')->join('room_image','room_image.room_id=roomdetails.roomid','left')->where($roomcondition)->group_by("roomdetails.roomid")->get()->result();
			}else{
				$roominfo = array();
			}
			$data['roominfo']=$roominfo;
		}
		$data['content']=$this->load->view('roomlist',$data,TRUE);
		$this->load->view('index',$data);
		}
	}
	
	public function roomdetails()
	{
		$page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= $page->roomdetails;

		$roomid2=$this->input->post('roomid',TRUE);
		$sessiondata = array('roomid' =>$roomid2);
		$this->session->set_userdata($sessiondata);
		$roomid=$this->session->userdata('roomid');
		$checkin=$this->session->userdata('checkin');
		$checkout=$this->session->userdata('checkout');
		$adults=$this->session->userdata('adults');
		$children=$this->session->userdata('children');
		if(empty($roomid2)){
			$roomid=$this->input->get('roomid',TRUE);
			$checkin=$this->input->get('checkin',TRUE);
			$checkout=$this->input->get('checkout',TRUE);
			$adults=$this->input->get('adults',TRUE);
			$children=$this->input->get('children',TRUE);
			$sessiondata = array('roomid' =>$roomid,'checkin' =>$checkin,'checkout' =>$checkout,'adults' =>$adults,'children' =>$children);
			$this->session->set_userdata($sessiondata);
		}
		if($this->session->userdata('checkin')== FALSE){
			redirect('');
			}
		else{
		$status="bookingstatus!=1 AND bookingstatus!=5";
		$croom ="FIND_IN_SET(".$roomid.",roomid)";
		$exits = $this->db->select("*")->from('booked_info')->where('checkindate<=',$checkin)->where('checkoutdate>',$checkin)->where($status)->where($croom)->get()->result();
		$exit = $this->db->select("*")->from('booked_info')->where('checkindate<',$checkout)->where('checkoutdate>=',$checkout)->where($status)->where($croom)->get()->result();
		$check = $this->db->select("*")->from('booked_info')->where('checkindate>',$checkin)->where('checkoutdate<=',$checkout)->where($status)->where($croom)->get()->result();
		$totalroom1 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate<=',$checkin)->where('checkoutdate>',$checkin)->where($status)->where($croom)->get()->row();
		$totalroom2 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate<',$checkout)->where('checkoutdate>=',$checkout)->where($status)->where($croom)->get()->row();
		$totalroom3 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate>=',$checkin)->where('checkoutdate<=',$checkout)->where($status)->where($croom)->group_by('checkindate')->get()->result();
		$allbokedroom3 = (!empty($allbokedroom3)?max(array_column($totalroom3, 'allroom')):0);
		$totalroomfound=$this->db->select("count(roomid) as totalroom")->from('tbl_roomnofloorassign')->where('roomid',$roomid)->get()->row();
		$roomdetails=$this->db->select("roomdetails.*,room_image.room_imagename")->from('roomdetails')->join('room_image','room_image.room_id=roomdetails.roomid','left')->where('roomid',$roomid)->get()->row();
		$numberlist=$this->db->select("*")->from('tbl_roomnofloorassign')->where('roomid',$roomid)->get()->result();
		$roomlist='';
		foreach($numberlist as $singleno){
			$roomlist.=$singleno->roomno.',';
			}
		$gtroomno=rtrim($roomlist,',');
		if(empty($exits)&&empty($exit)&&empty($check)){
			$data['freeroom']=$gtroomno;
			$data['isfound']=0;
		}
		else{
			$bookedroom="";
			if(!empty($exits)){
			foreach($exits as $booked){
				$bookedroom.=$booked->room_no.',';
				}
			}
			if(!empty($exit)){
				foreach($exit as $ex){
					$bookedroom.=$ex->room_no.',';
				}
			}
			if(!empty($check)){
				foreach($check as $ch){
					$bookedroom.=$ch->room_no.',';
				}
			}
		$getbookedall=rtrim($bookedroom,',');
		$allbokedroom1=$totalroom1->allroom;
		$allbokedroom2=$totalroom2->allroom;
		$allbokedroom=max((int)$allbokedroom1,(int)$allbokedroom2,(int)$allbokedroom3);
		$allfreeroom=$totalroomfound->totalroom;
				if($allfreeroom>$allbokedroom){
					$output=$this->Differences($getbookedall, $gtroomno);
					if(!empty($output)){
						$data['freeroom']=$output;
						$data['isfound']='1';
							}
					else{
						$data['freeroom']='';
						$data['isfound']='2';
						}
				}
				else{
					$data['freeroom']='';
					$data['isfound']='2';
					}
			}
		if($this->session->userdata('UserID')== FALSE){
			$data['userinfo']='';
			}
		else{
			$userinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$this->session->userdata('UserID'))->get()->row();
			$data['userinfo']=$userinfo;
			}
		$data['roominfo']=$roomdetails;
		$data['condition']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','10');
		$data['content']=$this->load->view('details',$data,TRUE);
		$this->load->view('index',$data);
		}
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
 public function bookedroom(){
	     $this->load->library('form_validation');
         $this->form_validation->set_rules('f_name',display('f_name'),'required|xss_clean|trim');
		 $this->form_validation->set_rules('l_name',display('l_name'),'required|xss_clean|trim');
		 $this->form_validation->set_rules('email',display('email'),'required|xss_clean|trim|valid_email');
		 $this->form_validation->set_rules('phone',display('phone'),'required|xss_clean|trim|is_natural');
		 $this->form_validation->set_rules('guest',display('guest'),'xss_clean|trim');
		 $this->form_validation->set_rules('password',display('password'),'xss_clean|trim');
		 $this->form_validation->set_rules('specialinstruction',display('specialinstruction'),'xss_clean|trim');
		
		if ($this->form_validation->run() === true){ 
		$this->cart->destroy();
		$t_room=$this->input->post('t_room',true);
		$sessiondata = array('t_room' =>$t_room);
		$this->session->set_userdata($sessiondata);
	 	$checkindate=$this->input->post('checkin',true);
		$checkoutdate=$this->input->post('checkout',true);
		$adult=$this->input->post('adult',true);
		$children=$this->input->post('children',true);
		$f_name=$this->input->post('f_name',true);
		$l_name=$this->input->post('l_name',true);
		$email=$this->input->post('email',true);
		$phone=$this->input->post('phone',true);
		$address=$this->input->post('address',true);
		$guestfullname=$this->input->post('guest',true);
		$specialinstruction=$this->input->post('specialinstruction',true);
		$roomid=$this->input->post('roomid',true);
		$roomtype=$this->input->post('roomtype',true);
		$roomrate=$this->input->post('roomrate',true);
		$discount=$this->input->post('discount',true);
		$amount=$this->input->post('amount',true)-$discount;
		$isaccount=$this->input->post('isaccount',true);
		$password='';
		if(!empty($isaccount)){
			$password=$this->input->post('password',true);
			}
		$setting=$this->db->select("rate")->from("tbl_taxmgt")->where("isactive",1)->get()->result();
		$taxamount=0;
		foreach($setting as $st){
			$taxamount+=($st->rate*$amount)/100;
		}
		$servicetharge=$this->settinginfo->servicecharge;

		$serviceamnt=($amount*$servicetharge)/100;
		$grandtyotal=($amount+$taxamount+$serviceamnt) - $this->session->userdata("code_discount");
		if($this->session->userdata('UserID')== FALSE){
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
		
		//insert customer
		$postData = array(
		   'firstname'     	    		=> $f_name,
		   'customernumber' 	        => $sino,
		   'lastname' 	        		=> $l_name,
		   'cust_phone' 	         	=> $phone,
		   'address' 	         		=> $address,
		   'email' 	             		=> $email,
		   'pass' 	             		=> md5($password),
		   'signupdate'					=> date('Y-m-d')
		  );
		$this->db->insert('customerinfo',$postData);
		$customerid = $this->db->insert_id();
		
		$coa = $this->hotel_model->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="102030101";
        }
		//insert Coa for Customer Receivable
		$c_name = $f_name." ".$l_name;
        $c_acc=$sino.'-'.$c_name;
		$createdate=date('Y-m-d H:i:s');
		$postData1['HeadCode']   	=$headcode;
		$postData1['HeadName']   	=$c_acc;
		$postData1['PHeadName']   	='Customer Receivable';
		$postData1['HeadLevel']   	='4';
		$postData1['IsActive']  	='1';
		$postData1['IsTransaction'] ='1';
		$postData1['IsGL']   		='0';
		$postData1['HeadType']  	='A';
		$postData1['IsBudget'] 		='0';
		$postData1['IsDepreciation']='0';
		$postData1['DepreciationRate']='0';
		$postData1['CreateBy'] 		=$customerid;
		$postData1['CreateDate'] 	=$createdate;
		
	 	$sessiondata = array(
			'UserID' =>$customerid,
			'UserEmail' =>$email
			);
		$this->session->set_userdata($sessiondata);
		
		}
		
		$data_items = array(
				   'id'      	=> $roomid,
				   'name'       => $roomtype,
				   'qty'     	=> 1,
				   'roomrate'	=> $roomrate,
				   'price'   	=> $amount,
				   'totalprice' => $grandtyotal,
				   'checkin'    => $checkindate,
				   'checkout'   => $checkoutdate,
				   'adult'      => $adult,
				   'children'   => $children,
				   'tax'        => $tax,
				   'scharge'    => $servicetharge,
				   'discount'   => $discount,
				   'customerid' => $customerid,
				   'fullName' 	=>$guestfullname,
				   'special' 	=>$specialinstruction
				);
    			$this->cart->insert($data_items);
				$this->session->unset_userdata('checkin');
				$this->session->unset_userdata('checkout');
				$this->session->unset_userdata('children');
				$this->session->unset_userdata('adults');
				$this->session->unset_userdata('roomid');
				redirect("checkout");
             }
			 else{
					 $checkindate=$this->input->post('checkin',true);
					 $checkoutdate=$this->input->post('checkout',true);
					 $adult=$this->input->post('adult',true);
					 $roomid=$this->input->post('roomid',true);
					 $this->session->set_flashdata('exception',display('please_try_again'));
					 redirect('roomdetails');
				 }
	 }
	
 public function checkout(){
	 	$cart = $this->cart->contents();
		$userinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$this->session->userdata('UserID'))->get()->row();
		$data['userinfo']=$userinfo;
		$data['paymentmethod']=$this->db->select("*")->from('payment_method')->where('is_active',1)->get()->result();
	    $data['title']="Confirm your Booking";
		$data['content']=$this->load->view('checkout',$data,TRUE);
		$this->load->view('index',$data);
	 }
public function login(){
		$data['title']="Sign in to Book your Hotel";
		$data['content']=$this->load->view('signin',$data,TRUE);
		$this->load->view('index',$data);
	}
public function loginsubmit(){
		 $this->form_validation->set_rules('email',display('email'),'required');
	     $this->form_validation->set_rules('password',display('password'),'required');
		 if ($this->form_validation->run()) {
			
			 $email = $this->input->post('email',TRUE);
             $password = md5($this->input->post('password'));
			 $exist=$this->db->select("*")->from('customerinfo')->where('email',$email)->where('pass',$password)->get()->row();
			 if(!empty($exist)){
				 $sessiondata = array(
			'UserID' =>$exist->customerid,
			'UserName' =>$exist->firstname.' '.$exist->lastname,
			'UserEmail' =>$exist->email
			);
		         $this->session->set_userdata($sessiondata);
				 header("Location: ".$this->config->base_url());
				 }
			 else{
				  $this->session->set_flashdata('exception',display('invalid_credentials'));
				  $data['title']="Confirm your Booking";
				  $data['content']=$this->load->view('signin',$data,TRUE);
				  $this->load->view('index',$data);
				 }
			 }
		 else{
			    $data['title']="Confirm your Booking";
				$data['content']=$this->load->view('signin',$data,TRUE);
				$this->load->view('index',$data);
			 }
	}
public function paymentconfirm(){
		$finyear=$this->input->post('finyear',true);
		if($finyear<=0){
			redirect($_SERVER['HTTP_REFERER']);
		}
		$payment_method=$this->input->post('pmethod',true);
		$check_gateway=$this->db->select('*')->from('payment_method')->where('payment_method_id',$payment_method)->get()->row();
		if($check_gateway->is_active!=0){
	    $bookinginfo=$this->db->select("*")->from('booked_info')->order_by('bookedid','desc')->get()->row();
		if(!empty($bookinginfo)){
		$bookno=$bookinginfo->bookedid;
		}
		else{
			$bookno = "00000000"; 
			}
		
		$nextno=$bookno+1;
		$bk_length = strlen((int)$nextno); 
		
		$bkstr = '00000000';
		$bknumber = substr($bkstr, $bk_length); 
		$bookingnumber = $bknumber.$nextno; 
		$status="bookingstatus!=1 AND bookingstatus!=5";
		$cart = $this->cart->contents();
		foreach($cart as $item){
		$croom ="FIND_IN_SET(".$item['id'].",roomid)";
		//find free room
		$exits = $this->db->select("*")->from('booked_info')->where('checkindate<=',$item['checkin'])->where('checkoutdate>',$item['checkin'])->where($status)->where("$croom !=",0)->get()->result();
		$exit = $this->db->select("*")->from('booked_info')->where('checkindate<',$item['checkout'])->where('checkoutdate>=',$item['checkout'])->where($status)->where("$croom !=",0)->get()->result();
		$check = $this->db->select("*")->from('booked_info')->where('checkindate>',$item['checkin'])->where('checkoutdate<=',$item['checkout'])->where($status)->where("$croom !=",0)->get()->result();
		$totalroom1 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate<=',$item['checkin'])->where('checkoutdate>',$item['checkin'])->where($status)->where("$croom !=",0)->get()->row();
		$totalroom2 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate<',$item['checkout'])->where('checkoutdate>=',$item['checkout'])->where($status)->where("$croom !=",0)->get()->row();
		$totalroom3 = $this->db->select("SUM(total_room) as allroom")->from('booked_info')->where('checkindate>=',$item['checkin'])->where('checkoutdate<=',$item['checkout'])->where($status)->where("$croom !=",0)->group_by('checkindate')->get()->result();
		$allbokedroom3 = (!empty($allbokedroom3)?max(array_column($totalroom3, 'allroom')):0);
		$totalroomfound=$this->db->select("count(roomid) as totalroom")->from('tbl_roomnofloorassign')->where('roomid',$item['id'])->get()->row();
		$roomdetails=$this->db->select("*")->from('roomdetails')->where('roomid',$item['id'])->get()->row();
		$numberlist=$this->db->select("*")->from('tbl_roomnofloorassign')->where('roomid',$item['id'])->get()->result();
		$roomlist='';
		foreach($numberlist as $singleno){
			$roomlist.=$singleno->roomno.',';
			}
		$gtroomno=rtrim($roomlist,',');
		if(empty($exits)&&empty($exit)&&empty($check)){
				$allroom=$gtroomno;
				$data['isfound']=0;
			}
		else{
			$bookedroom="";
			if(!empty($exits)){
			foreach($exits as $booked){
				$bookedroom.=$booked->room_no.',';
				}
			}
			if(!empty($exit)){
				foreach($exit as $ex){
					$bookedroom.=$ex->room_no.',';
				}
			}
			if(!empty($check)){
				foreach($check as $ch){
					$bookedroom.=$ch->room_no.',';
				}
			}
		$getbookedall=rtrim($bookedroom,',');
		$allbokedroom1=$totalroom1->allroom;
		$allbokedroom2=$totalroom2->allroom;
		$allbokedroom=max((int)$allbokedroom1,(int)$allbokedroom2,(int)$allbokedroom3);
		$allfreeroom=$totalroomfound->totalroom;
				if($allfreeroom>$allbokedroom){
					$output=$this->Differences($getbookedall, $gtroomno);
					if(!empty($output)){
					$allroom=$output;
					$data['isfound']='1';
						}
					else{
						$allroom='';
						$data['isfound']='2';
						}
				}
				else{
					$allroom='';
					$data['isfound']='2';
					}
			}
		$availableroom = explode(",",$allroom);
		$room_list = explode(",",$gtroomno);
		$freeroom = array_intersect($room_list, $availableroom);
		$freeroom = array_values($freeroom);
		$i=0;
		$t_room = $this->session->userdata('t_room');
		while($t_room!=0){
			if(empty($freeroom[$i])){
				redirect('hotel/fail/'.$bookingnumber);
			}
			$t_freeroom[$t_room-1]=$freeroom[$i];
			$t_room--;
			$i++;
		}
		$totalFreeroom=implode(',',$t_freeroom);
		if($this->session->userdata('t_room')>0){
			$roomid = "";
			$nuofpeople = "";
			$children = "";
			$roomrate = "";
			$offer_discount = "";
			$excheckin = "";
			$other = "";
			for($r=0; $r<$this->session->userdata('t_room'); $r++){
				$roomid .= $item['id'].",";
				$nuofpeople .= (ceil($item['adult']/$this->session->userdata('t_room'))).",";
				if($item['children']>0){
					$children .= (ceil($item['children']/$this->session->userdata('t_room'))).",";
				}else{
					$children .="0,";
				}
				$roomrate .= $item['roomrate'].",";
				if($item['discount']>0){
					$offer_discount .= ((!empty($item['discount'])?$item['discount']:0)/$this->session->userdata('t_room')).",";
				}else{
					$offer_discount .="0,";
				}
				$excheckin .= $item['checkin'].",";
				$other .= "0".",";
			}
		}
		if($this->session->userdata('promocode')){
			$code_check=$this->db->select("promocode")->from("booked_info")->where("promocode", $this->session->userdata('promocode'))->get()->row();
			if($code_check){
				$this->session->set_userdata('exception', 'Sorry this promo code is already used');
				$this->session->unset_userdata('promocode');
				$this->session->unset_userdata('total_discount');
				$this->session->unset_userdata('total_amount');
				$this->session->unset_userdata('code_discount');
				redirect('orderdelevered/');
			}
		}
		 $postData = array(
		   'booking_number' 	     => $bookingnumber,
		   'date_time' 	             => date('Y-m-d H:i:s'),
		   'roomid' 	             => trim($roomid,","),
		   'nuofpeople'              => trim($nuofpeople,","),
		   'children'              	 => trim($children,","),
		   'total_room'              => $this->session->userdata('t_room'),
		   'room_no'              	 => $totalFreeroom,
		   'roomrate'                => trim($roomrate,","),
		   'total_price'             => $item['totalprice'],
		   'offer_discount'          => trim($offer_discount,","),
		   'promocode'         		 => (!empty($this->session->userdata('promocode'))?$this->session->userdata('promocode'):null),
		   'full_guest_name'         => $item['fullName'],
		   'special_request'         => $item['special'],
		   'checkindate'             => $item['checkin'],
		   'checkoutdate'            => $item['checkout'],
		   'cutomerid' 	             => $this->session->userdata('UserID'),
		   'bookingstatus' 	         => 0
		  );
			$this->db->insert('booked_info',$postData);
			$bookedid = $this->db->insert_id();
			$bdetails_data = array(
				'bookedid'   => $bookedid,
				'booking_type'   => '',
				'booking_source'   => '',
				'booking_source_no'   => '',
				'extracheckin'   => trim($excheckin,","),
				'extracheckout'   => trim($excheckin,","),
				'arival_from'   => '',
				'purpose'   => '',
				'extra_facility_days'   => trim($other,","),
				'extrabed'   => trim($other,","),
				'extraperson'   => trim($other,","),
				'extrachild'   => trim($other,","),
				'complementary'   => "no",
				'complementaryprice'   => trim($other,","),
				'discountreason'   => '',
				'discountamount'   => trim($other,","),
				'commissionpersent'   => trim($other,","),
				'commissionamount'   => trim($other,","),
				'payment_method'   => '',
				'advance_amount'   => trim($other,","),
				'advance_remarks'   => '',
				'remarks'   => '',
				'booked_from'   => 1
			);
			$this->db->insert('booked_details',$bdetails_data);
		     }
			 //endcart
			 $this->cart->destroy();
			 if($this->session->userdata('promocode')){
					$this->db->set('status', 1);
					$this->db->where('promocode', $this->session->userdata('promocode'));
					$this->db->update('promocode');
				}
		       if($payment_method==2){
					redirect('hotel/paymentgateway/'.$bookingnumber.'/'.$payment_method); 
				 }
				 else if($payment_method==3){
					redirect('hotel/paymentgateway/'.$bookingnumber.'/'.$payment_method); 
				 }
				 else if($payment_method==5){
					redirect('hotel/paymentgateway/'.$bookingnumber.'/'.$payment_method); 
				 }
				 else{
					$path = 'application/modules/';
					$map  = directory_map($path);
					$HmvcMenu   = array();
					if (is_array($map) && sizeof($map) > 0)
					foreach ($map as $key => $value) {
						$env = str_replace("\\", '/', $path.$key.'assets/data/env'); 
						$gateway = str_replace("\\", '/', $path.$key.'controllers/gateway.php'); 
						if (file_exists($env)) {
							if (file_exists($gateway)) {
								@include($gateway);
							}
						}
		
					}
					redirect('hotel/successful/'.$bookingnumber.'/'.$payment_method);
				}
		}
		else{
			$this->session->set_userdata('message', 'Sorry this payment gateway is currently inactive');
			redirect('orderdelevered/');
		}
	}
public function insert_payment($orderinfo,$pmethod){
	$paid_amount = $orderinfo->total_price;
	$bookedid =  $orderinfo->bookedid;
	$methodName = $this->hotel_model->read('payment_method', 'payment_method', array('payment_method_id' => $pmethod));
	//update as advance amount
	$this->db->set('paid_amount', 'paid_amount+'.$paid_amount, FALSE);
	$this->db->where('bookedid', $bookedid);
	$this->db->update('booked_info');

	$this->db->where("bookedid",$bookedid);
	$this->db->update("booked_details", array('payment_method'=>$methodName->payment_method,'advance_amount'=>$paid_amount));
	//customer advance balance
	$custbalance = $this->db->select("balance")->from("customerinfo")->where("customerid", $orderinfo->cutomerid)->get()->row();
	$balance = $custbalance->balance+$paid_amount;
	$this->db->where("customerid",$orderinfo->cutomerid);
	$this->db->update("customerinfo", array('balance'=>$balance));
	//end
	$payinfo=$this->db->select("*")->from('tbl_guestpayments')->order_by('payid','desc')->get()->row();
	if(!empty($payinfo)){
	$invoicenum=$payinfo->invoice;
	}
	else{
		$invoicenum = "000000"; 
		}
	$nextno=$invoicenum+1;
	$bk_length = strlen((int)$nextno); 
	$bkstr = '000000';
	$bknumber = substr($bkstr, $bk_length); 
	$invoice = $bknumber.$nextno; 
	
	$paydata = array(
  	'bookedid' 	         	 => $bookedid,
  	'invoice' 	             => $invoice,
  	'paydate' 	             => date('Y-m-d'),
  	'paymenttype' 	         => $methodName->payment_method,
  	'paymentamount' 	         => $paid_amount,
	'book_type' 	     	 => 0,
  	); 
    $this->db->insert('tbl_guestpayments',$paydata);
    $saveid=$this->session->userdata('id');
    $customer_headcode = 102030101;
	//Customer debit for Rent Value
	$newdate = date('Y-m-d');
	$narration = 'Customer debit for webiste advance payment Rent Invoice#'.$invoice;
	transaction($invoice, 'CIV', $newdate, $customer_headcode, $narration, $paid_amount, 0, 0, 1, $saveid, $newdate, 1);
	//Hotel Owner credit for Rent Value
	$narration = 'Hotel Credit for webiste advance payment Rent Invoice#'.$invoice;
	transaction($invoice, 'CIV', $newdate, 30301, $narration, 0, $paid_amount, 0, 1, $saveid, $newdate, 1);	 
	// Customer Credit for paid amount.
	$narration = 'Customer Credit for webiste advance payment Rent Invoice'.$invoice;
	transaction($invoice, 'CIV', $newdate, $customer_headcode, $narration, 0, $paid_amount, 0, 1, $saveid, $newdate, 1);
	//payment method debit
	if($methodName->payment_method=="SSLCommerz"){
	$narration = 'Cash in SSLCOMMERZ Debited For webiste advance payment Invoice#'.$invoice;
	transaction($invoice, 'CIV', $newdate, 102010302, $narration, $paid_amount, 0, 0, 1, $saveid, $newdate, 1);
 }
 else if($methodName->payment_method=="Paypal"){
	$narration = 'Cash in Paypal Debited For webiste advance payment Invoice#'.$invoice;
	transaction($invoice, 'CIV', $newdate, 102010301, $narration, $paid_amount, 0, 0, 1, $saveid, $newdate, 1);
 }
 else if($methodName->payment_method=="Cash Payment"){
	$narration = 'Cash in Hand Debited For webiste advance payment Invoice#'.$invoice;
	transaction($invoice, 'CIV', $newdate, 1020101, $narration, $paid_amount, 0, 0, 1, $saveid, $newdate, 1);	
 }
 else{
	$path = 'application/modules/';
	$map  = directory_map($path);
	$HmvcMenu   = array();
	if (is_array($map) && sizeof($map) > 0)
	foreach ($map as $key => $value) {
		$env = str_replace("\\", '/', $path.$key.'assets/data/env'); 
		$transaction = str_replace("\\", '/', $path.$key.'controllers/transaction.php'); 
		if (file_exists($env)) {
			if (file_exists($transaction)) {
				@include($transaction);
				if($methodName->payment_method==$paymentMethod){
					$narration = 'Cash in '.$paymentMethod.' Debited For webiste advance payment Invoice#'.$invoice;
					transaction($invoice, 'CIV', $newdate, $headCode, $narration, $paid_amount, 0, 0, 1, $saveid, $newdate, 1);
				}				
			}
		}
 }
}
}
public function Differences ($Arg1, $Arg2){
		$Arg1 = explode (',', $Arg1);
		$Arg2 = explode (',', $Arg2);
	
		$Difference_1 = array_diff($Arg1, $Arg2);
		$Difference_2 = array_diff($Arg2, $Arg1);
		$Diff = array_merge($Difference_1, $Difference_2);
		$Difference = implode(',', $Diff);
		return $Difference;
	}
public function paymentgateway($orderid,$paymentid){
		  $data['title']="Payment information";
		  $data['orderinfo']  	       = $this->hotel_model->read('*', 'booked_info', array('booking_number' => $orderid));
		  $bookedInfo = $this->db->select('*')->from('booked_info')->where('booking_number',$orderid)->get()->row();
		  $data['paymentinfo']  	   = $this->hotel_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		  $data['customerinfo']  	   = $this->hotel_model->read('*', 'customerinfo', array('customerid' => $bookedInfo->cutomerid));
		  $customer                    = $this->hotel_model->read('*', 'customerinfo', array('customerid' => $bookedInfo->cutomerid));
		 $commonsetting=$this->hotel_model->read('*', 'common_setting', array('id' => 1));
		  if($paymentid==5){
			$full_name = $customer->firstname.' '.$customer->lastname;
			$email = $customer->email;
			$phone = $customer->cust_phone;
			$amount =  $data['orderinfo']->total_price;
			$transactionid = $orderid;
			$address = $customer->address;
			
			$post_data = array();
			$post_data['store_id'] = SSLCZ_STORE_ID;
			$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
			$post_data['total_amount'] =  $data['orderinfo']->total_price;
			$post_data['currency'] =  $data['paymentinfo']->currency;
			$post_data['tran_id'] = $orderid;
			$post_data['success_url'] =  base_url()."hotel/successful/".$orderid."/".$paymentid;
			$post_data['fail_url'] = base_url()."hotel/fail/".$orderid;
			$post_data['cancel_url'] = base_url()."hotel/cancilorder/".$orderid;

			# CUSTOMER INFORMATION
			$post_data['cus_name'] = $customer->firstname.' '.$customer->lastname;
			$post_data['cus_email'] = $customer->email;
			$post_data['cus_add1'] = $customer->address;
			$post_data['cus_add2'] = "";
			$post_data['cus_city'] = "";
			$post_data['cus_state'] = "";
			$post_data['cus_postcode'] = "";
			$post_data['cus_country'] = "";
			$post_data['cus_phone'] = $customer->cust_phone;
			$post_data['cus_fax'] = "";

			# SHIPMENT INFORMATION
			$post_data['ship_name'] = "";
			$post_data['ship_add1 '] = "";
			$post_data['ship_add2'] = "";
			$post_data['ship_city'] = "";
			$post_data['ship_state'] = "";
			$post_data['ship_postcode'] = "";
			$post_data['ship_country'] = "";

			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "";
			$post_data['value_b '] = "";
			$post_data['value_c'] = "";
			$post_data['value_d'] = "";

			$this->load->library('session');
			$session = array(
				'tran_id' => $post_data['tran_id'],
				'amount' => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set_userdata('tarndata', $session);
			$this->load->library('sslcommerz');
			echo "<h3>Wait...SSLCOMMERZ Payment Processing....</h3>";
			if($this->sslcommerz->RequestToSSLC($post_data, false))
			{
				redirect('hotel/fail/'.$orderid);
			}
			
		  }
		 
		  else if($paymentid==3){
			$item_name = "Room Information";
            //Set variables for paypal form
            $returnURL = base_url()."hotel/successful/".$orderid."/".$paymentid; //payment success url
            $cancelURL = base_url()."hotel/cancilorder/".$orderid; //payment cancel url
            $notifyURL = base_url('hotel/ipn'); //ipn url
             // set form auto fill data
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);

            // item information
            $this->paypal_lib->add_field('item_number',  $orderid);
            $this->paypal_lib->add_field('item_name', $item_name);
            $this->paypal_lib->add_field('amount', $data['orderinfo']->total_price);  
            $this->paypal_lib->add_field('quantity', 1);    
            // additional information 
            $this->paypal_lib->add_field('custom', 'paynow');
            $this->paypal_lib->image(base_url($commonsetting->logo));
            // generates auto form
            $this->paypal_lib->paypal_auto_form();
			}else{
				$path = 'application/modules/';
				$map  = directory_map($path);
				$HmvcMenu   = array();
				if (is_array($map) && sizeof($map) > 0)
				foreach ($map as $key => $value) {
					$env = str_replace("\\", '/', $path.$key.'assets/data/env'); 
					$gateway = str_replace("\\", '/', $path.$key.'controllers/payment.php'); 
					if (file_exists($env)) {
						if (file_exists($gateway)) {
							@include($gateway);
						}
					}
	
				}
			}
		}
	public function ipn()
			{
				//paypal return transaction details array
				$paypalInfo    = $this->input->post(); 
				$data['user_id']        = $paypalInfo['custom'];
				$data['product_id']     = $paypalInfo["item_number"];
				$data['txn_id']         = $paypalInfo["txn_id"];
				$data['payment_gross']  = $paypalInfo["mc_gross"];
				$data['currency_code']  = $paypalInfo["mc_currency"];
				$data['payer_email']    = $paypalInfo["payer_email"];
				$data['payment_status'] = $paypalInfo["payment_status"];
		
				$paypalURL = $this->paypal_lib->paypal_url;     
				$result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
			}
	public function successful($orderid,$paymentid){
		   $orderinfo  	       = $this->hotel_model->read('*', 'booked_info', array('booking_number' => $orderid));
		   $customerid 	   = $orderinfo->cutomerid;
		   $pmethod = $paymentid;
		   if($pmethod!=1 && $pmethod!=4)
		   	$this->insert_payment($orderinfo,$pmethod);

		   $this->session->set_userdata('message', display('order_successfully'));
		   $binfo = $this->db->select("b.booking_number,b.room_no,b.total_price,c.firstname,c.email")->from("booked_info b")->join("customerinfo c","c.customerid=b.cutomerid","left")->where("booking_number",$orderid)->get()->row();
		   if(!empty($binfo)){
				$appName = $this->db->select("title")->from("setting")->where("id",2)->get()->row();
				$subject = "Booking Successfull";
				$htmlContent = nl2br("Dear ".$binfo->firstname.",\n\n"."Your Booking Successfully Completed.\nBooking Number:".$binfo->booking_number."\nRoom No:".$binfo->room_no."\nTotal Rent:".$binfo->total_price."\n\nThank You");
				$this->hotel_model->send_email(strtolower($binfo->email),$subject,$appName->title,$htmlContent,'booking');
			}
		   $WhatsApp = $this->db->where('directory', 'whatsapp')->where('status', 1)->get('module');
		   $whatsapp_count = $WhatsApp->num_rows();
		   if($whatsapp_count  == 1) {
			$wtapp = $this->db->select('*')->from('whatsapp_settings')->get()->row();
			if($wtapp->orderenable==1){
				 if($pmethod==9){
					 $arr = array('text' => 'whatsapp', 'status' => true);
					 echo json_encode($arr);
				 }else{
					 redirect('hotel/orderdelevered/'.$orderid);
				 }
				}
			else{
				 if($pmethod==9){
					 $arr = array('text' => 'success', 'status' => true);
					 echo json_encode($arr);
				 }else{
					 redirect('hotel/orderdelevered');
				 }
				}
		}
		else{
			if($pmethod==9){
				 $arr = array('text' => 'success', 'status' => true);
				echo json_encode($arr);
			}else{
				redirect('hotel/orderdelevered');
			}
		}
		}	
	public function fail($orderid){
		$this->session->set_userdata('exception', display('order_fail'));
		redirect('hotel/orderdelevered/');		
		  
		}	
	public function cancilorder($orderid){
		  $this->session->set_userdata('message', display('order_fail'));
		  redirect('hotel/orderdelevered/');
		}
	public function orderdelevered($num=NULL){
		if(empty($num)){
			redirect('');
		}
		$data['title']="Booking Complete";
		$data['content']=$this->load->view('complete',$data,TRUE);
		$this->load->view('index',$data);
	}
	public function register(){
			$data['title']="Register";
			$captcha = create_captcha(array(
				'img_path'      => './assets/img/captcha/',
				'img_url'       => base_url('assets/img/captcha/'),
				'font_path'     => './assets/fonts/captcha.ttf',
				'img_width'     => '338',
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
			$data['content']=$this->load->view('register',$data,TRUE);
			$this->load->view('index',$data);
		}
	public function signup(){
			 $this->form_validation->set_rules('f_name',display('firstname'),'required|xss_clean|trim');
			 $this->form_validation->set_rules('l_name',display('lastname'),'required|xss_clean|trim');
			 $this->form_validation->set_rules('emial',display('email'),'required|xss_clean|trim|valid_email');
	         $this->form_validation->set_rules('password',display('password'),'required|xss_clean|trim');
	         $this->form_validation->set_rules('phone',display('phone'),'is_unique[customerinfo.cust_phone]|xss_clean|trim');
	         $this->form_validation->set_rules('useragree',display('terms_of_service'),'required|xss_clean|trim');
			 $this->form_validation->set_rules('captcha', display('captcha'),  array('matches[captcha]', function($captcha){ 
				$oldCaptcha = $this->session->userdata('captcha');
				if ($captcha == $oldCaptcha) {
					return true;
				}
			  }
			 )
			);
		     if ($this->form_validation->run()) {
			 $this->session->unset_userdata('captcha');
			 $f_name = $this->input->post('f_name',TRUE);
			 $l_name = $this->input->post('l_name',TRUE);
			 $phone = $this->input->post('phone',TRUE);
			 $emial = $this->input->post('emial',TRUE);
             $password = md5($this->input->post('password'));
			 
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
		
		//insert customer
		$postData = array(
		   'firstname'     	    		=> $f_name,
		   'customernumber' 	        => $sino,
		   'lastname' 	        		=> $l_name,
		   'cust_phone' 	        			=> $phone,
		   'email' 	             		=> $this->input->post('emial',TRUE),
		   'pass' 	             		=> $password,
		   'signupdate'					=> date('Y-m-d')
		  );
		$this->db->insert('customerinfo',$postData);
		$customerid = $this->db->insert_id();
		
		$coa = $this->hotel_model->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="102030101";
        }
		//insert Coa for Customer Receivable
		$c_name = $f_name." ".$l_name;
        $c_acc=$sino.'-'.$c_name;
		$createdate=date('Y-m-d H:i:s');
		$postData1['HeadCode']   	=$headcode;
		$postData1['HeadName']   	=$c_acc;
		$postData1['PHeadName']   	='Customer Receivable';
		$postData1['HeadLevel']   	='4';
		$postData1['IsActive']  	='1';
		$postData1['IsTransaction'] ='1';
		$postData1['IsGL']   		='0';
		$postData1['HeadType']  	='A';
		$postData1['IsBudget'] 		='0';
		$postData1['IsDepreciation']='0';
		$postData1['DepreciationRate']='0';
		$postData1['CreateBy'] 		=$customerid;
		$postData1['CreateDate'] 	=$createdate;
		
	 	$sessiondata = array(
			'UserID' =>$customerid,
			'UserName' =>$guestfullname,
			'UserEmail' =>$email
			);
		$this->session->set_userdata($sessiondata);
		header("Location: ".$this->config->base_url());	
			 }
		 else{
				$data['title']="Register";
				$captcha = create_captcha(array(
					'img_path'      => './assets/img/captcha/',
					'img_url'       => base_url('assets/img/captcha/'),
					'font_path'     => './assets/fonts/captcha.ttf',
					'img_width'     => '350',
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
			    $data['content']=$this->load->view('register',$data,TRUE);
			    $this->load->view('index',$data);
			 }
		}
public function logout(){
	    $this->session->unset_userdata('UserID');
		$this->session->unset_userdata('UserName');
		$this->session->unset_userdata('UserEmail');
		header("Location: ".$this->config->base_url());
	}
public function about()
	{
	    $page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= $page->aboutus;
		$data['team_info']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','5');
		$data['company']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','9');
		$data['about_smallbig']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','6');
		$data['content']=$this->load->view('about',$data,TRUE);
		$this->load->view('index',$data);
	}
public function contact()
	{
	    $page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= $page->contactus;
		$data['team_info']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','5');
		$data['about_smallbig']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','6');
		$captcha = create_captcha(array(
			'img_path'      => './assets/img/captcha/',
			'img_url'       => base_url('assets/img/captcha/'),
			'font_path'     => './assets/fonts/captcha.ttf',
			'img_width'     => '350',
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
		$data['content']=$this->load->view('contact',$data,TRUE);
		$this->load->view('index',$data);
	}
public function sendemail(){
	$this->form_validation->set_rules('captcha', display('captcha'),  array('matches[captcha]', function($captcha){ 
		$oldCaptcha = $this->session->userdata('captcha');
		if ($captcha == $oldCaptcha) {
			return true;
		}
	  }
	 )
	);		
	if ( $this->form_validation->run())
{
	$this->session->unset_userdata('captcha');
	$fullname=$this->input->post('firstname',TRUE);
	$email=$this->input->post('email',TRUE);
	$text=$this->input->post('comments',TRUE);
	$phone=$this->input->post('phone',TRUE);
	$subject="Contact Inquery";
	$body ='Contact Info';
	$emailtext='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$fullname.',</p>
	<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Phone:'.$phone.'</p>
	<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$text.'</p>';
	$this->hotel_model->send_email($email,$subject,$body,$emailtext);
	$this->session->set_flashdata('message', display('contact_send'));
	redirect('contact/');
} else{
	$data['team_info']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','5');
	$data['about_smallbig']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','6');
	$captcha = create_captcha(array(
		'img_path'      => './assets/img/captcha/',
		'img_url'       => base_url('assets/img/captcha/'),
		'font_path'     => './assets/fonts/captcha.ttf',
		'img_width'     => '350',
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
	$data['content']=$this->load->view('contact',$data,TRUE);
	$this->load->view('index',$data);
 }
}
public function subscribe(){
	$fromemail=$this->input->post('email',TRUE);
	$subject="Customer Subscription";
	if(empty($exitsemail)){
		$htmlContent="Thanks for your Subscription";;
		$appName = $this->db->select("title")->from("setting")->where("id",2)->get()->row();
		$this->hotel_model->send_email($fromemail,$subject,$appName->title,$htmlContent);
		$subs['email'] = $fromemail;
		$subs['dateinsert'] = date('Y-m-d H:i:s');
		$this->hotel_model->insert_data('subscribe_emaillist', $subs);
	}else{
		return false;
	}
							
}
	public function gallery()
	{
	    $page= $this->db->select('*')->from('page_title')->where('pageid',1)->get()->row();
	    $data['title']= $page->gallery;
		$data['gallery_type']=$this->db->select("DISTINCT(title)")->from('tbl_slider')->where('Sltypeid',8)->get()->result();
		$data['galleries']=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','8');
		$data['content']=$this->load->view('gallery',$data,TRUE);
		$this->load->view('index',$data);
	}
	public function report()
	{
	    $data['title']="Booking Report";
		$data['title'] = display('booking_report');
		$id=$this->session->userdata('UserID');
		$customerinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$id)->get()->row();
		$customerhead= $customerinfo->customernumber.'-'.$customerinfo->firstname.' '.$customerinfo->lastname;
		$coahead=$this->db->select("HeadCode")->from('acc_coa')->where('HeadName',$customerhead)->get()->row();
		$data['intinfo']   = $this->hotel_model->findById($id);
		$data['customerhead']=(!empty($coahead->HeadCode)?$coahead->HeadCode:null);
		$this->load->library('pagination'); 
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('report'); 
        $config["total_rows"]     = $this->db->count_all('booked_info'); 
        $config["per_page"]       = 30;
        $config["uri_segment"]    = 2; 
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
		$id = $this->session->userdata('UserID');
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["bookings"] = $this->hotel_model->user_report($config["per_page"], $page, $id); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        #   
		$data['content']=$this->load->view('report',$data,TRUE);   
		$this->load->view('index',$data);
	}
	public function details_report($bid)
	{
		if($this->session->userdata('UserID')==false) {
			$this->session->set_flashdata('exception',  "Please Login First");
			redirect('');
		}
	    $data['title']="Booking Details List";
		$id=$this->session->userdata('UserID');
		$userinfo=$this->db->select("*")->from('booked_info')->where('bookedid',$bid)->where("cutomerid", $id)->get()->row();
		if(empty($userinfo)){
			$this->session->set_flashdata('exception',  "You do not have permission to access");
			redirect($_SERVER['HTTP_REFERER']);
		}
		$details=$this->hotel_model->details($userinfo->bookedid);
		$data['bookinfo']   = $details;
		$data['customerinfo']   = $this->hotel_model->customerinfo($id);
		$data['paymentinfo']   = $this->hotel_model->paymentinfo($userinfo->bookedid);
		$data['commoninfo']=$this->hotel_model->commoninfo();
		$data['storeinfo']=$this->hotel_model->storeinfo();
		$data['content']=$this->load->view('user_booking',$data,TRUE);   
		$this->load->view('index',$data);
	}
	public function update_profile()
	{
	    $data['title']="Update Profile";
	  $this->form_validation->set_rules('firstname',display('firstname'),'required|xss_clean');
	  $this->form_validation->set_rules('lastname',display('lastname'),'required|xss_clean');
	  $this->form_validation->set_rules('email',display('email'),'required|xss_clean|valid_email');
	  if($this->input->post('nationaliti',TRUE)=='foreigner'){
	  $this->form_validation->set_rules('national_id',display('national_id'),'required|xss_clean|is_natural');
	  $this->form_validation->set_rules('nationalitycon',display('nationality'),'required|xss_clean');
	  $this->form_validation->set_rules('passport_no',display('passport_no'),'required|xss_clean');
	  $this->form_validation->set_rules('visa_reg_no',display('visa_reg_no'),'required|xss_clean');
	  $this->form_validation->set_rules('purpose',display('purpose'),'required|xss_clean');
	  }
	  $this->form_validation->set_rules('address',display('address'),'xss_clean');
	  $custphone = $this->db->select("cust_phone")->from("customerinfo")->where("customerid !=",$this->input->post('customerid',TRUE))->where("cust_phone",$this->input->post('phone',TRUE))->get()->row();	  
	  if(!empty($custphone)){
		$this->session->set_userdata('exception', 'Customer Phone number must be unique value');
		redirect('hotel/report/1');
	  }
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
		$coahead=$this->input->post('coahead',TRUE);
		$newheadname=$this->input->post('customernumber',TRUE).'-'.$this->input->post('firstname',TRUE).' '.$this->input->post('lastname',TRUE);
		$name=$this->input->post('firstname',TRUE).' '.$this->input->post('lastname',TRUE);
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
		   'signupdate'					=>	date('Y-m-d'),
		  );
		
		if ($this->hotel_model->update($postData3)) { 
			 
		 $this->session->set_userdata('message', 'User Profile Updated Successfully');
		 redirect('hotel/report/1');
		} else {
		$this->session->set_userdata('exception',  display('please_try_again'));
		}
	     } else {
			$data['title']="Booking Report";
			$data['title'] = display('booking_report');
			$id=$this->session->userdata('UserID');
			$customerinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$id)->get()->row();
			$customerhead= $customerinfo->customernumber.'-'.$customerinfo->firstname.' '.$customerinfo->lastname;
			$coahead=$this->db->select("HeadCode")->from('acc_coa')->where('HeadName',$customerhead)->get()->row();
			$data['intinfo']   = $this->hotel_model->findById($id);
			$data['customerhead']=(!empty($coahead->HeadCode)?$coahead->HeadCode:null);
			$this->load->library('pagination'); 
			#
			#pagination starts
			#
			$config["base_url"]       = base_url('report'); 
			$config["total_rows"]     = $this->db->count_all('booked_info'); 
			$config["per_page"]       = 30;
			$config["uri_segment"]    = 2; 
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
			$id = $this->session->userdata('UserID');
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["bookings"] = $this->hotel_model->user_report($config["per_page"], $page, $id); 
			$data["links"] = $this->pagination->create_links(); 

			$data['content']=$this->load->view('report',$data,TRUE);
			$this->load->view('index',$data);
		}	
	}
	public function promocode(){
			$promo_code =$this->input->post('promocode',true);
			$roomid =$this->input->post('roomid',true);
			$currency_possition =$this->input->post('currency_possition',true);
			$currency_icon =$this->input->post('currency_icon',true);
			$pricetext =$this->input->post('pricetext',true);
			$total_discount =$this->input->post('total_discount',true);
			$total_amount =$this->input->post('total_amount',true);
			$exit=$this->db->select("promocode")->from("booked_info")->where("promocode", $promo_code)->get()->row();
			if(empty($exit)){
			$today=date('Y-m-d');
			$promocode=$this->db->select("discount")->from("promocode")->where("promocode", $promo_code)->where("status", 0)->where("roomid", $roomid)->where('startdate<=',$today)->where('enddate>',$today)->get()->row();
			if(empty($promocode)){
				$this->session->unset_userdata('promocode');
				$this->session->unset_userdata('total_discount');
				$this->session->unset_userdata('total_amount');
				$this->session->unset_userdata('code_discount');
				echo "<h6 class='red-color'>Promo Code is not Available</h6>";
			}
			else{
			$total_discount = (!empty($total_discount)?$total_discount:0)+(!empty($promocode)?$promocode->discount:0);
			$total_amount = $total_amount-(!empty($promocode)?$promocode->discount:0);
			$sessiondata = array('promocode' =>$promo_code,'code_discount'=>$promocode->discount, 'total_discount' =>$total_discount,'total_amount'=>$total_amount);
			$this->session->set_userdata($sessiondata);
			}
		}
		else{
			$this->session->unset_userdata('promocode');
			$this->session->unset_userdata('total_discount');
			$this->session->unset_userdata('total_amount');
			$this->session->unset_userdata('code_discount');
			echo "<h6 class='red-color'>Promo Code is Used</h6>";
		}
			$data['currency_possition']=$currency_possition;
			$data['currency_icon']=$currency_icon;
			$data['pricetext']=$pricetext;
			$data['total_discount']=$total_discount;
			$data['total_amount']=$total_amount;
			$this->load->view('promocode', $data);  
	}
	public function privacy()
	{
	    $data['title']="Privacy Policy";
		$data['content']=$this->load->view('privacy',$data,TRUE);
		$this->load->view('index',$data);
	}
	public function terms()
	{
	    $data['title']="Our Terms & Condition";
		$data['content']=$this->load->view('terms',$data,TRUE);
		$this->load->view('index',$data);
	}	
	public function forgot_password()
	{ 
		$data['title']    = display('forgot_password');  
		$data['content']=$this->load->view('forgot_password',$data,TRUE);
		$this->load->view('index',$data);
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
		$checkemail = $this->db->select('email')->from('customerinfo')->where('email',$email)->get()->row();
		$random_key = ("RK" . date('y') . strtoupper($this->randstrGen(2, 4)));
		if($checkemail){
			$data = array(
				'password_reset_token'  => $random_key,
				);
			$this->db->where('email', $email)
				->update("customerinfo", $data);
			//Otp send through Email
			$subject="Password Reset Token";
			$code = $this->db->select('password_reset_token')->from('customerinfo')->where('email',$email)->get()->row();	
			$htmlContent="Your otp code is ".$code->password_reset_token;
			$appName = $this->db->select("title")->from("setting")->where("id",2)->get()->row();
			$this->hotel_model->send_email(strtolower($email),$subject,$appName->title,$htmlContent);
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
		$checkcode = $this->db->select('password_reset_token')->from('customerinfo')->where('password_reset_token',$code)->where('email',$checkemail)->get()->row();
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
			'pass'  => md5($password),
			'password_reset_token'  => '',
			);
		$checkemail = $this->db->select('email')->from('customerinfo')->where('email',$mainemail)->get()->row();
		if($checkemail){
			$this->db->where('email', $mainemail)
			->update("customerinfo", $data);
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
	public function stripe($orderid, $paymentid)
	{
		$data['title'] = "Stripe Payment information";
		$data['seoterm'] = "stripe_payment_information";
		$data['orderinfo']  	       = $this->hotel_model->read('*', 'booked_info', array('booking_number' => $orderid));
		$bookedInfo = $this->db->select('*')->from('booked_info')->where('booking_number',$orderid)->get()->row();
		$data['paymentinfo']  	   = $this->hotel_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		$data['customerinfo']  	   = $this->hotel_model->read('*', 'customerinfo', array('customerid' => $bookedInfo->cutomerid));
		$customer                    = $this->hotel_model->read('*', 'customerinfo', array('customerid' => $bookedInfo->cutomerid));
	    $commonsetting=$this->hotel_model->read('*', 'common_setting', array('id' => 1));
		$data['content'] = $this->load->view('stripe_view', $data, TRUE);
		$this->load->view('index', $data);
	}
    public function stripePost()
	{
		require_once('application/modules/stripe/libraries/stripe-php/init.php');
		$orderid = $this->input->post('orderid', true);
		$amount = $this->input->post('amount', true);
		$currency = $this->input->post('currency', true);

		$data['title']="Payment information";
		$paymentinfo   	          = $this->hotel_model->read('*', 'paymentsetup', array('paymentid' => 8));

		\Stripe\Stripe::setApiKey($paymentinfo->marchantid);

		\Stripe\Charge::create([
			"amount" => $amount,
			"currency" => $currency,
			"source" => $this->input->post('stripeToken'),
			"description" => "Test payment from xainhotel."
		]);

		redirect('hotel/successful/' . $orderid . '/' . 8);
	}
}