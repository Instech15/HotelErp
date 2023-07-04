<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model {
	
 
	public function getlist($customer=NULL,$status=NULL,$payment_status=NULL,$fromdate=NULL,$todate=NULL)
	{
		
		$betweenq="booked_info.checkindate >='".$fromdate."' AND booked_info.checkoutdate <='".$todate."'";
		$this->db->select('booked_info.*,booked_details.*,roomdetails.roomtype');
        $this->db->from('booked_info');
		$this->db->join('roomdetails','roomdetails.roomid=booked_info.roomid','left');
		$this->db->join('booked_details','booked_details.bookedid=booked_info.bookedid','left');
		if($fromdate != NULL){
			$this->db->where('booked_info.checkindate>=',$fromdate);
		}
		if($todate != NULL){
			$this->db->where('booked_info.checkoutdate<=',$todate);
		}
		if($status != NULL){
			$this->db->where('booked_info.bookingstatus',$status);
		}
		if($customer != NULL){
			$this->db->where('booked_info.cutomerid',$customer);
		}
        $this->db->order_by('booked_info.bookedid', 'desc');
        $query = $this->db->get();
		$scharge = $this->settinginfo();
		$charge = $scharge->servicecharge;
		$paymentarray = array();
        if ($query->num_rows() > 0) {
            $result = $query->result();    
			foreach($result as $k => $r){
				$start = strtotime($r->checkindate);
				$end = strtotime($r->checkoutdate);
				$datediff = $end - $start;
				$days = ceil($datediff / (60 * 60 * 24));
				$result[$k]->roomtype = $this->room_type($r->roomid);
				if($r->booked_from==1 & $r->bookingstatus==0){
					$result[$k]->total_price = $r->total_price;
					if($result[$k]->total_price>$result[$k]->paid_amount & $payment_status==3){
						$paymentarray[$k] = $result[$k];
					}
					else if($result[$k]->total_price<=$result[$k]->paid_amount & $payment_status==1){
						$paymentarray[$k] = $result[$k];
					}
				}else{
					$roomId = explode(",",$r->roomid);
					$rent = explode(",",$r->roomrate);
					$offer_discount = explode(",",$r->offer_discount);
					$totalrent=0;
					$totaloffer=0;
					for($i=0;$i<count($rent); $i++){
						$totalrent += $rent[$i] - $offer_discount[$i];
						$totaloffer += $offer_discount[$i];
					}
					$promocode = 0;
					if(!empty($r->promocode)){
						$pdiscount = $this->db->select("discount")->from("promocode")->where("promocode", $r->promocode)->get()->row();
						$promocode = $pdiscount->discount;
					}
					if($r->bookingstatus!=5){
						$result[$k]->total_price = $days*$r->total_price + $promocode + ($days * (($totalrent*$charge)/100));
						$result[$k]->paid_amount = $r->paid_amount;
					}
					if($r->bookingstatus==5){
						$creditamt = $this->db->select("rate,credit,complementary,extrabpc,additional_charges,additional_charges,ex_discount,swimming_pool,restaurant,hallroom,car_parking,special_discount,scharge")->from("tbl_postedbills")->where("bookedid",$r->bookedid)->get()->row();
						$result[$k]->creditamt = $creditamt->credit;
						$result[$k]->total_price =$creditamt->complementary + $creditamt->extrabpc + $days*$r->total_price + $promocode + $creditamt->scharge + $creditamt->additional_charges - $creditamt->ex_discount + $creditamt->swimming_pool + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->special_discount;
						$result[$k]->paid_amount = $r->paid_amount + ($days * (($totalrent*$charge)/100)) + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->ex_discount - $creditamt->special_discount;
						if($creditamt->credit>0 & $payment_status==2){
							$paymentarray[$k] = $result[$k];
						}else if($creditamt->credit==0 & $r->bookingstatus==5 & $payment_status==1){
							$paymentarray[$k] = $result[$k];
						}
						if($totaloffer>0){
							$datediff = strtotime($r->checkoutdate) - strtotime($r->checkindate);
							$datediff = ceil($datediff/(60*60*24));
							$singletax = explode(",", $creditamt->rate);
							$total=0;
							for($li = 0; $li < count($rent); $li++){
								for($in = 0; $in < $datediff; $in++){
									$alldays= date("Y-m-d", strtotime($r->checkindate . ' + ' . $in . 'day'));
									$getroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$roomId[$li])->where('offer_date',$alldays)->get()->row();
									if(!empty($getroom)){
										$singleDiscount=$getroom->offer;
										$roomrate=$rent[$li]-$singleDiscount;
										}
									else{
										$roomrate=$rent[$li];
										}
									$price=$roomrate;
									$total=$total+$price;
								}
							}
							$toaltax=0;
							for($j=0; $j<count($singletax); $j++){
								$toaltax += ($total*$singletax[$j])/100;
							}
							$result[$k]->total_price =$creditamt->complementary + $creditamt->extrabpc + $total + $toaltax + $promocode + $creditamt->scharge + $creditamt->additional_charges - $creditamt->ex_discount + $creditamt->swimming_pool + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->special_discount;
						}
					}else{
						if($result[$k]->total_price>$result[$k]->paid_amount & $payment_status==3){
							$paymentarray[$k] = $result[$k];
						}
						else if($result[$k]->total_price<=$result[$k]->paid_amount & $payment_status==1){
							$paymentarray[$k] = $result[$k];
						}
					}
				}
			}
			if(!empty($payment_status)){
				return $paymentarray;
			}
			return $result;
        }
        return false;
	
	}
	public function getstocklist()
	{
		
		$this->db->select("products.product_name,unit_of_measurement.uom_name,unit_of_measurement.uom_short_code,purchase_details.*,SUM(purchase_details.quantity) as qty,SUM(purchase_details.price) as sumprice");
		$this->db->from('purchase_details');
		$this->db->join('products','products.id = purchase_details.proid', 'left');
		$this->db->join('unit_of_measurement','unit_of_measurement.id = products.uom_id', 'Inner');
		$this->db->group_by('purchase_details.proid');
		$this->db->order_by('purchase_details.purchaseid','desc');
		$query = $this->db->get();
		return $query->result();
	
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
		
	public function pruchasereport($start_date,$end_date)
	{
		$dateRange = "a.purchasedate BETWEEN '$start_date%' AND '$end_date%'";
		$this->db->select("a.*,b.supid,b.supName");
		$this->db->from('purchaseitem a');
		$this->db->join('supplier b','b.supid = a.suplierID');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.purchasedate','desc');
		$query = $this->db->get();
		return $query->result();
	} 
	public function settinginfo()
	{ 
		return $this->db->select("*")->from('setting')
			->get()
			->row();
	}
	public function currencysetting($id = null)
	{ 
		return $this->db->select("*")->from('currency')
			->where('currencyid',$id) 
			->get()
			->row();
	}
	
	public function read($limit = null, $start = null)
	{
	    $this->db->select('booked_info.*,booked_details.*');
        $this->db->from('booked_info');
		$this->db->join('booked_details','booked_details.bookedid=booked_info.bookedid','left');
        $this->db->order_by('booked_info.bookedid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
		$scharge = $this->settinginfo();
		$charge = $scharge->servicecharge;
        if ($query->num_rows() > 0) {
            $result = $query->result();    
			foreach($result as $k => $r){
				$start = strtotime($r->checkindate);
				$end = strtotime($r->checkoutdate);
				$datediff = $end - $start;
				$days = ceil($datediff / (60 * 60 * 24));
				$result[$k]->roomtype = $this->room_type($r->roomid);
				if($r->booked_from==1 & $r->bookingstatus==0){
					$result[$k]->total_price = $r->total_price;
				}else{
					$roomId = explode(",",$r->roomid);
					$rent = explode(",",$r->roomrate);
					$offer_discount = explode(",",$r->offer_discount);
					$totalrent=0;
					$totaloffer=0;
					for($i=0;$i<count($rent); $i++){
						$totalrent += $rent[$i] - $offer_discount[$i];
						$totaloffer += $offer_discount[$i];
					}
					$promocode = 0;
					if(!empty($r->promocode)){
						$pdiscount = $this->db->select("discount")->from("promocode")->where("promocode", $r->promocode)->get()->row();
						$promocode = $pdiscount->discount;
					}
					if($r->bookingstatus!=5){
						$result[$k]->total_price = $days*$r->total_price + $promocode + ($days * (($totalrent*$charge)/100));
						$result[$k]->paid_amount = $r->paid_amount;
					}
					if($r->bookingstatus==5){
						$creditamt = $this->db->select("rate,credit,complementary,extrabpc,additional_charges,additional_charges,ex_discount,swimming_pool,restaurant,hallroom,car_parking,special_discount, scharge")->from("tbl_postedbills")->where("bookedid",$r->bookedid)->get()->row();
						$result[$k]->creditamt = $creditamt->credit;
						$result[$k]->total_price =$creditamt->complementary + $creditamt->extrabpc + $days*$r->total_price + $promocode + $creditamt->scharge + $creditamt->additional_charges - $creditamt->ex_discount + $creditamt->swimming_pool + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->special_discount;
						$result[$k]->paid_amount = $r->paid_amount + ($days * (($totalrent*$charge)/100)) + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->ex_discount - $creditamt->special_discount;
						if($totaloffer>0){
							$datediff = strtotime($r->checkoutdate) - strtotime($r->checkindate);
							$datediff = ceil($datediff/(60*60*24));
							$singletax = explode(",", $creditamt->rate);
							$total=0;
							for($li = 0; $li < count($rent); $li++){
								for($in = 0; $in < $datediff; $in++){
									$alldays= date("Y-m-d", strtotime($r->checkindate . ' + ' . $in . 'day'));
									$getroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$roomId[$li])->where('offer_date',$alldays)->get()->row();
									if(!empty($getroom)){
										$singleDiscount=$getroom->offer;
										$roomrate=$rent[$li]-$singleDiscount;
										}
									else{
										$roomrate=$rent[$li];
										}
									$price=$roomrate;
									$total=$total+$price;
								}
							}
							$toaltax=0;
							for($j=0; $j<count($singletax); $j++){
								$toaltax += ($total*$singletax[$j])/100;
							}
							$result[$k]->total_price =$creditamt->complementary + $creditamt->extrabpc + $total + $toaltax + $promocode + $creditamt->scharge + $creditamt->additional_charges - $creditamt->ex_discount + $creditamt->swimming_pool + $creditamt->restaurant + $creditamt->hallroom + $creditamt->car_parking - $creditamt->special_discount;
						}
					}
				}
			}
			return $result;
        }
        return false;
	}
	function room_type($rtype){
		$sroomtype = explode(",", $rtype);
		$type = "";
		for($i=0; $i<count($sroomtype); $i++){
			$row = $this->db->select("roomtype")->from("roomdetails")->where("roomid",$sroomtype[$i])->get()->row();
			$type .= $row->roomtype.",";
		}
		return trim($type,",");
	} 
	
	public function customerlist()
	{
		$data = $this->db->select("customerid,firstname,lastname,cust_phone")
			->from('customerinfo')
			->get()
			->result();

		$list[''] = 'Select Customer';

		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->customerid] = $value->firstname.' '.$value->lastname.'-'.$value->cust_phone;
			return $list;
		} else {
			return $list; 
		}
	}
}
