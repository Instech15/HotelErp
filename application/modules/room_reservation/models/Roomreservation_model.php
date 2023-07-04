<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomreservation_model extends CI_Model {
	
	private $table = 'booked_info';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('bookedid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('bookedid',$data["bookedid"])
			->update($this->table, $data);
	}

    public function read($limit = null, $start = null)
	{
	    $this->db->select('booked_info.*,roomdetails.roomtype');
        $this->db->from($this->table);
		$this->db->join('roomdetails','roomdetails.roomid=booked_info.roomid','left');
        $this->db->order_by('booked_info.bookedid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	public function headcode($lvl,$code){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='$lvl' And HeadCode LIKE '$code%'");
        return $query->row();
    }
	
	public function findById($id = null)
	{ 
		$this->db->select('*');
        $this->db->from($this->table);
		$this->db->where('bookedid',$id); 
        $this->db->order_by('bookedid', 'desc');
        $query = $this->db->get();
	    return $query->row();
	} 

 
public function countlist()
	{
		$this->db->select('booked_info.*,roomdetails.roomtype');
        $this->db->from($this->table);
		$this->db->join('roomdetails','roomdetails.roomid=booked_info.roomid','left');
        $this->db->order_by('booked_info.bookedid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function allrooms()
	{
		$data = $this->db->select("*")
			->from('roomdetails')
			->get()
			->result();

		$list[''] = 'Select Room';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->roomid] = $value->roomtype;
			return $list;
		} else {
			return false; 
		}
	}
public function customerlist()
	{
		$data = $this->db->select("*")
			->from('customerinfo')
			->get()
			->result();

		$list[''] = 'Select Guest';

		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->customerid] = $value->firstname.' '.$value->lastname;
			return $list;
		} else {
			return $list; 
		}
	}
public function allpayments(){
	return $data = $this->db->select("tbl_guestpayments.*,booked_info.bookedid")
			->from('tbl_guestpayments')
			->join('booked_info','booked_info.booking_number=tbl_guestpayments.bookingnumber','left')
			->get()
			->result();
	}
public function paymentlist()
	{
		$data = $this->db->select("*")
			->from('payment_method')
			->get()
			->result();

		$list[''] = 'Select Payment';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->payment_method_id] = $value->payment_method;
			return $list;
		} else {
			return false; 
		}
	}
public function createpayment($data = array())
	{
		return $this->db->insert('tbl_guestpayments', $data);
	}
public function updatepayment($data = array())
	{
		return $this->db->where('payid',$data["payid"])
			->update('tbl_guestpayments', $data);
	}
public function findBypayId($id = null)
	{ 
		$this->db->select('*');
        $this->db->from('tbl_guestpayments');
        $this->db->join('booked_info','booked_info.bookedid=tbl_guestpayments.bookedid','left');
		$this->db->where('booked_info.booking_number',$id); 
        $this->db->order_by('tbl_guestpayments.payid', 'desc');
        $query = $this->db->get();
	    return $query->row();
	}
	public function chargeinfo(){
		$this->db->select('*');
		$this->db->from('setting');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	} 
	public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function update_date($table, $data, $field_name, $field_value)
    {
        $this->db->where($field_name, $field_value);
        return $this->db->update($table, $data);
    }

	public function get_all($select_items, $table, $orderby,$limit=NULL,$start=NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        $this->db->limit($limit, $start);
        $this->db->order_by($orderby,'DESC');
        return $this->db->get()->result();
    }
   public function read2($select_items, $table, $orderby, $where_array, $or_where=NULL)
    {
        
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
            
        }
        if($or_where!=NULL){
        foreach ($or_where as $field => $value) {
            $this->db->where($field, $value);
            
        }
        }
        $this->db->order_by($orderby,'DESC');
        return $this->db->get()->result();
    }
   public function readall($select_items, $table, $orderby, $where_array)
    {
        
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
            
        }
        $this->db->order_by($orderby,'Asc');
        return $this->db->get()->result();
        
    }
	public function readone($select_items, $table, $where_array, $where_array2=NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        if($where_array2!=NULL){
        foreach ($where_array2 as $field => $value) {
            $this->db->where($field, $value);
        }
        }
        return $this->db->get()->row();
    }
    public function get_all_group($select_items, $table, $order_by_name = NULL, $order_by = NULL, $group_by = NULL)
    {
		$this->db->select($select_items);
        $this->db->from($table);
        if ($order_by_name != NULL && $order_by != NULL)
        {
            $this->db->order_by($order_by_name, $order_by);
        }
		$this->db->group_by($group_by);
        return $this->db->get()->result();
    }
	public function editbooking($id){
		$this->db->select("booked_info.*,booked_details.*");
		$this->db->from("booked_info");
		$this->db->join("booked_details","booked_details.bookedid=booked_info.bookedid","left");
		$this->db->where("booked_info.bookedid",$id);
		return $this->db->get()->row();
	}
	public function detailbooking($id){
		$this->db->select("booked_info.*,booked_details.*,customerinfo.*,GROUP_CONCAT(roomdetails.roomtype ORDER BY booked_info.room_no) as roomtype,roomdetails.bedcharge,roomdetails.personcharge");
		$this->db->from("booked_info");
		$this->db->join("booked_details","booked_details.bookedid=booked_info.bookedid","left");
		$this->db->join("customerinfo","customerinfo.customerid=booked_info.cutomerid","left");
		$this->db->join('tbl_roomnofloorassign','FIND_IN_SET(tbl_roomnofloorassign.roomno,booked_info.room_no)<>0','left');
		$this->db->join('roomdetails','FIND_IN_SET(roomdetails.roomid,tbl_roomnofloorassign.roomid)<>0','left');
		$this->db->where("booked_info.bookedid",$id);
		$row = $this->db->get()->row();
		$singlerate = explode(",", $row->roomrate);
		$total=0;
		for($i=0;$i<count($singlerate); $i++){
			$total += $singlerate[$i]; 
		}
		$rate = round(($row->discountamount*100)/$total,2);
		$row->disrate = $rate;
		return $row;
	}
	public function findBookingDetail($id){
		$this->db->select("bi.*,bd.extrabed as bed,bd.extraperson as person,bd.extrachild as child,bd.extra_facility_days as exday,bd.complementaryprice as comprice,bd.booked_from");
		$this->db->from("booked_info bi");
		$this->db->join("booked_details bd","bd.bookedid=bi.bookedid","left");
		$this->db->where("bi.bookedid", $id);
		$query = $this->db->get();
		$row = $query->row();
		$row->totalExAmount = $this->exRoomBill($row->roomid,$row->bed,$row->person,$row->child,$row->exday);
		$row->totalComplementary = $this->roomComplementary($row->comprice);
		return $row;
	}
	public function exRoomBill($roomid,$bed,$person,$child,$day){
		$singleid = explode(",", $roomid);
		$singlebed = explode(",", $bed);
		$singleperson = explode(",", $person);
		$singlechild = explode(",", $child);
		$singleday = explode(",", $day);
		$total = 0;
		for($i=0;$i<count($singleid); $i++){
			$charge = $this->db->select("bedcharge,personcharge")->from("roomdetails")->where("roomid",$singleid[$i])->get()->row();
			$total += ($charge->bedcharge*$singleday[$i]*$singlebed[$i])+($charge->personcharge*$singleday[$i]*$singleperson[$i])+(($charge->personcharge/2)*$singleday[$i]*$singlechild[$i]);
		}
		return $total;
	}
	public function roomComplementary($price){
		$singleprice = explode(",", $price);
		$total = 0;
		for($i=0; $i<count($singleprice); $i++){
			$total += $singleprice[$i];
		}
		return $total;
	}
	public function poolcastinfodata($poollastins){
		$this->db->select('tbl_pool_booking.*,customerinfo.*');
        $this->db->from('tbl_pool_booking');
		$this->db->join('customerinfo','customerinfo.customerid=tbl_pool_booking.custid','left');
		$this->db->where('pbookingid',$poollastins);
        $query = $this->db->get();
	    return $query->row();

	}
	public function pitemlistdata($poollastins){
		$this->db->select('tbl_pool_bookingitem.*,tbl_pool_package.*');
        $this->db->from('tbl_pool_bookingitem');
		$this->db->join('tbl_pool_package','tbl_pool_package.packageid=tbl_pool_bookingitem.packageid','left');
		$this->db->where('tbl_pool_bookingitem.pbokingid',$poollastins);
        $query = $this->db->get();
	    return $query->result();

	}
	public function pitemdatarow($poollastins){
		$this->db->select('*');
        $this->db->from('tbl_pool_booking');
		$this->db->where('pbookingid',$poollastins);
        $query = $this->db->get();
	    return $query->row();

	}
	public function restaurantCust($id){
		$this->db->select("ci.*");
		$this->db->from("customer_order co");
		$this->db->join("customerinfo ci","ci.customerid=co.customer_id","left");
		$this->db->where("co.order_id", $id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}
	public function ritemlistdata($id){
		$this->db->select('if.ProductName,om.price,om.menuqty');
        $this->db->from('customer_order co');
		$this->db->join('order_menu om','om.order_id=co.order_id','left');
		$this->db->join('item_foods if','if.ProductsID=om.menu_id','left');
		$this->db->where('co.order_id',$id);
        $query = $this->db->get();
	    $result = $query->result();
		foreach($result as $k => $val){
			$result[$k]->subtotal = $val->price*$val->menuqty;
		}
		return $result;
	}
	public function ritemdatasingle($id){
		$this->db->select('co.order_id,co.totalamount');
        $this->db->from('customer_order co');
		$this->db->where('order_id',$id);
        $query = $this->db->get();
	    $row = $query->row();
		$row->details = $this->ritemlistdata($row->order_id);
		return $row;

	}
	public function paymentinfo($bookno){
		$this->db->select('tbl_guestpayments.*,payment_method.payment_method,booked_info.paid_amount');
		$this->db->from('tbl_guestpayments');
		$this->db->join('payment_method','payment_method.payment_method_id=tbl_guestpayments.paymenttype','left');
		$this->db->join('booked_info','booked_info.bookedid=tbl_guestpayments.bookedid','left');
		$this->db->where('tbl_guestpayments.bookedid',$bookno);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	}
	public function details($id)
	{
		
		$this->db->select('booked_info.*,GROUP_CONCAT(roomdetails.roomtype ORDER BY booked_info.roomid,roomdetails.roomtype) as roomtype,roomdetails.rate');
        $this->db->from('booked_info');
		$this->db->join('tbl_roomnofloorassign','FIND_IN_SET(tbl_roomnofloorassign.roomno,booked_info.room_no)<>0','left');
		$this->db->join('roomdetails','FIND_IN_SET(roomdetails.roomid,tbl_roomnofloorassign.roomid)<>0','left');
		$this->db->where('booked_info.bookedid',$id);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
             return $query->row();    
        }
        return false;
	
	}
	public function customerinfo($cid){
		$this->db->select('*');
		$this->db->from('customerinfo');
		$this->db->where('customerid',$cid);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	}
	public function storeinfo(){
		$this->db->select('*');
		$this->db->from('setting');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	}
	public function taxinfo(){
		$this->db->select('*');
		$this->db->from('tbl_taxmgt');
		$this->db->where('isactive',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();    
		}
		return false;
	}
	public function btaxinfo($id){
		$this->db->select('*');
		$this->db->from('tbl_postedbills');
		$this->db->where('bookedid',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	}
	public function commoninfo(){
		$this->db->select('*');
		$this->db->from('common_setting');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();    
		}
		return false;
	}
	public function currencysetting($id = null)
	{ 
		return $this->db->select("*")->from('currency')
			->where('currencyid',$id) 
			->get()
			->row();
	}
	public function hallRoomCust($id){
		$this->db->select("ci.*");
		$this->db->from("tbl_hallroom_booking hb");
		$this->db->join("customerinfo ci","ci.customerid=hb.customerid","left");
		$this->db->where("hb.hbid", $id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}
	public function hallDetailsList($id){
		$this->db->select('hb.*');
        $this->db->from('tbl_hallroom_booking hb');
		$this->db->where('hbid',$id);
        $query = $this->db->get();
	    $row = $query->row();
		return $row;
	}
	public function carParkingCust($id){
		$this->db->select("ci.*");
		$this->db->from("tbl_bookParking bp");
		$this->db->join("booked_info bi","bi.bookedid=bp.bookedid","left");
		$this->db->join("customerinfo ci","ci.customerid=bi.cutomerid","left");
		$this->db->where("bp.bookParking_id", $id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}
	public function parkingDetailsList($id){
		$this->db->select('bp.*');
        $this->db->from('tbl_bookParking bp');
		$this->db->where('bookParking_id',$id);
        $query = $this->db->get();
	    $row = $query->row();
		return $row;
	}
	public function floorwithRoom(){
		$this->db->select("f.floorid, f.floorname");
		$this->db->from("tbl_floorplan fp");
		$this->db->join("tbl_floor f", "f.floorid = fp.floorName", "left");
		$this->db->group_by("f.floorid");
		$get = $this->db->get();
		$result = $get->result();
		return $result;
	}
	public function matchedRooms($search=NULL,$key=NULL,$key1=NULL,$key2=NULL){
		if($search!=null){
			$this->db->select("rfa.*");
			$this->db->from('tbl_roomnofloorassign rfa');
			$this->db->join("roomdetails rd","rd.roomid=rfa.roomid","left");
			$this->db->join("tbl_floor f","f.floorid=rfa.floorid","left");
			$this->db->like("rfa.roomno",$search);
			$this->db->or_like("rd.roomtype",$search);
			$this->db->or_like("rd.rate",$search);
			$this->db->or_like("rd.number_of_star",$search);
			$this->db->or_like("f.floorname",$search);
			$get = $this->db->get();
			$result = $get->result();
			return $result;
		}
		else if($key!="null" & $key!=null){
			$this->db->select("rfa.*");
			$this->db->from('tbl_roomnofloorassign rfa');
			$this->db->order_by("rfa.floorid");
			if($key2!="null"){
				$this->db->where("rfa.floorid",$key2);
			}
			$get1 = $this->db->get();
			$result1 = $get1->result();
			foreach($result1 as $res1){
				$res1->date = $key;
				$res1->status = 1;
			}

			$this->db->select("room_no,bookingstatus, rfa.*");
			$this->db->from("booked_info");
			$this->db->join('tbl_roomnofloorassign rfa','FIND_IN_SET(rfa.roomno,booked_info.room_no)<>0','left');
			$this->db->where("date(checkindate)<=",$key);
			$this->db->where("date(checkoutdate)>=",$key);
			if($key2!="null"){
				$this->db->where("rfa.floorid",$key2);
			}
			if($key1!="null"){
				if($key1==1){
					$this->db->where_in("bookingstatus",array(0,4));
				}else{
					$this->db->where("bookingstatus",$key1);
				}
			}
			if($key1=="null"){
				$this->db->where_in("bookingstatus",array(0,4,5));
			}
			$get2 = $this->db->get();
			$result2 = $get2->result();
			if($result2){
				foreach($result2 as $res2){
					if($res2->bookingstatus==0 | $res2->bookingstatus==4 | $res2->bookingstatus==5){
						if($res2->bookingstatus==0){
							$res2->status = 2;
						}
						if($res2->bookingstatus==4){
							$res2->status = 0;
						}
						$res2->bookingstatus = 2;
					}
					foreach($result1 as $res1){
						$sroom = explode(",", $res2->room_no);
						for($i=0; $i<count($sroom); $i++){
							if($res1->roomno == $sroom[$i]){
								$res1->status = $res2->bookingstatus;
								break;
							}
						}
					}
				}
			}
			if($key1==1){
				foreach($result1 as $k => $res1){
					if($res1->status!= 1){
						unset($result1[$k]);
					}
				}
				return array_values($result1);
			}
			if($key1=="null"){
				return $result1;
			}else{
				return $result2;
			}
		}
		else if($key1!="null" & $key1!=null){
			$this->db->select("rfa.*");
			$this->db->from('tbl_roomnofloorassign rfa');
			$this->db->order_by("rfa.floorid");
			$get1 = $this->db->get();
			$result1 = $get1->result();
			foreach($result1 as $res1){
				$res1->date = date("Y-m-d");
				$res1->status = 1;
			}

			$this->db->select("room_no,bookingstatus, rfa.*");
			$this->db->from("booked_info");
			$this->db->join('tbl_roomnofloorassign rfa','FIND_IN_SET(rfa.roomno,booked_info.room_no)<>0','left');
			$this->db->where("date(date_time)",date("Y-m-d"));
			if($key1==1){
				$this->db->where("bookingstatus!=",$key1);
			}else{
				$this->db->where("bookingstatus",$key1);
			}
			$get2 = $this->db->get();
			$result2 = $get2->result();
			if($result2){
				foreach($result2 as $res2){
					if($res2->bookingstatus==4){
						$res2->bookingstatus = 0;
					}
					if($res2->bookingstatus==0 | $res2->bookingstatus==5){
						$res2->bookingstatus = 2;
					}
					foreach($result1 as $res1){
						$sroom = explode(",", $res2->room_no);
						for($i=0; $i<count($sroom); $i++){
							if($res1->roomno == $sroom[$i]){
								$res1->status = $res2->bookingstatus;
								break;
							}
						}
					}
				}
			}
			if($key1==1){
				return $result1;
			}
			return $result2;
		}
		else if($key2!=null & $key2!="null"){
			$this->db->select("rfa.*");
			$this->db->from('tbl_roomnofloorassign rfa');
			$this->db->order_by("rfa.floorid");
			if($key2!=null){
				$this->db->where("rfa.floorid",$key2);
			}
			$get1 = $this->db->get();
			$result1 = $get1->result();
			foreach($result1 as $res1){
				$res1->date = date("Y-m-d");
				$res1->status = 1;
			}
			$this->db->select("room_no,bookingstatus, rfa.*");
			$this->db->from("booked_info");
			$this->db->join('tbl_roomnofloorassign rfa','FIND_IN_SET(rfa.roomno,booked_info.room_no)<>0','left');
			$this->db->where("checkindate<=",date("Y-m-d"));
			$this->db->where("checkoutdate>=",date("Y-m-d"));
			$get2 = $this->db->get();
			$result2 = $get2->result();
			if($result2){
				foreach($result2 as $res2){
					if($res2->bookingstatus==4){
						$res2->bookingstatus = 0;
					}
					if($res2->bookingstatus==0 | $res2->bookingstatus==5){
						$res2->bookingstatus = 2;
					}
					foreach($result1 as $res1){
						$sroom = explode(",", $res2->room_no);
						for($i=0; $i<count($sroom); $i++){
							if($res1->roomno == $sroom[$i]){
								$res1->status = $res2->bookingstatus;
								break;
							}
						}
					}
				}
			}
			return $result1;
		}
	}
	public function send_email($email, $subject, $body, $emailtext, $path=null){
		$check = explode(" ",$subject);
		$status = $this->db->select("status")->from("tbl_email_permission")->where('permission',lcfirst($check[0]))->get()->row();
		if($status->status==0){
			return false;
		}
		$send_email = $this->readone('*', 'email_config', array('email_config_id' => 1));	
		$config = array(
			'protocol'  => $send_email->protocol,
			'smtp_host' => $send_email->smtp_host,
			'smtp_port' => $send_email->smtp_port,
			'smtp_user' => $send_email->sender,
			'smtp_pass' => $send_email->smtp_password,
			'mailtype'  => $send_email->mailtype,
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
				);


		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($send_email->sender, $body);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($emailtext);
		if(!empty($path)){
			$this->email->attach(base_url().$path);
		}
		$this->email->send();
	}
}