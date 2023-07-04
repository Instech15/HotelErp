<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
	
	private $table = 'customerinfo';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('customerid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function guestdelete($id = null)
	{
		$this->db->where('otherguest_id',$id)
			->delete("tbl_otherguest");

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('customerid',$data["customerid"])
			->update($this->table, $data);
	}
	public function guestupdate($data = array())
	{
		return $this->db->where('otherguest_id',$data["otherguest_id"])
			->update("tbl_otherguest", $data);
	}

    public function read()
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('customerid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
    public function guestread()
	{
	    $this->db->select('og.*,bi.booking_number');
        $this->db->from("tbl_otherguest og");
		$this->db->join("booked_info bi", "bi.bookedid=og.bookedid","left");
        $this->db->order_by('bookedid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('customerid',$id) 
			->get()
			->row();
	} 
	public function findByGuestId($id = null)
	{ 
		return $this->db->select("*")->from("tbl_otherguest")
			->where('otherguest_id',$id) 
			->get()
			->row();
	} 
public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('customerid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030%'");
        return $query->row();
    }

	function getwakeup_call_list() 
	{ 
		$query =$this->db->select("CONCAT_WS(' ',customerinfo.firstname,customerinfo.lastname) AS customer_name,tbl_wakeup_call.*")
		->from('tbl_wakeup_call')
		->join('customerinfo','customerinfo.customerid = tbl_wakeup_call.custid','left')
		
		->order_by('tbl_wakeup_call.wapupid', 'desc')->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function custelist()
    {
        $this->db->select('customerid,firstname,lastname');
        $this->db->from('customerinfo');
        $query=$this->db->get();
        $data=$query->result();
        
       $list = array('' => 'Select Customer');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->customerid]=$value->firstname." ".$value->lastname;
            }
        }
        return $list;
    }

	public function wecall_create($data = array())
	{
		return $this->db->insert('tbl_wakeup_call', $data);
	}

	public function wacall_data($id = null)
	{ 
		return $this->db->select("*")->from('tbl_wakeup_call')
			->where('wapupid',$id) 
			->get()
			->row();
	} 

	public function wecall_update($data = array())
	{
		return $this->db->where('wapupid',$data["wapupid"])
			->update('tbl_wakeup_call', $data);
	}

	public function delete_wcl($id = null)
	{
		$this->db->where('wapupid',$id)
			->delete('tbl_wakeup_call');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function invoicelist()
	{
		if ($this->db->table_exists('tbl_hallroom_booking') ){
			$roomData = $this->db->select("bi.booking_number,ci.firstname,ci.lastname")
				->join("customerinfo ci","ci.customerid=bi.cutomerid","left")
				->from('booked_info bi')
				->get()
				->result();
			$hallData = $this->db->select("hb.invoice_no as booking_number,ci.firstname,ci.lastname")
				->join("customerinfo ci","ci.customerid=hb.customerid","left")
				->from('tbl_hallroom_booking hb')
				->get()
				->result();
			$data = array_merge($roomData,$hallData);
		}else{
			$data = $this->db->select("bi.booking_number,ci.firstname,ci.lastname")
			->join("customerinfo ci","ci.customerid=bi.cutomerid","left")
			->from('booked_info bi')
			->get()
			->result();
		}

		$list[''] = 'Select Booking Number';

		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->booking_number] = $value->booking_number."-".$value->firstname.' '.$value->lastname;
			return $list;
		} else {
			return $list; 
		}
	}
	public function transaction($id)
	{
	    $this->db->select('at.*,bi.booking_number,ci.firstname');
        $this->db->from('acc_transaction at');
        $this->db->join('booked_info bi','bi.bookedid=at.VNo','left');
        $this->db->join('customerinfo ci','ci.customerid=bi.cutomerid','left');
		$this->db->where("at.COAID","102030101");
		$this->db->where("at.IsAppove","1");
		$this->db->where("bi.cutomerid",$id);
        $query1 = $this->db->get();
		$result1 = $query1->result();
	    $this->db->select('at.*,bi.booking_number,ci.firstname');
        $this->db->from('acc_transaction at');
        $this->db->join('tbl_guestpayments gp','gp.invoice=at.VNo','left');
        $this->db->join('booked_info bi','bi.bookedid=gp.bookedid','left');
        $this->db->join('customerinfo ci','ci.customerid=bi.cutomerid','left');
		$this->db->where("at.COAID","102030101");
		$this->db->where("at.IsAppove","1");
		$this->db->where("bi.cutomerid",$id);
        $query2 = $this->db->get();
		$result2 = $query2->result();
		$result = array_merge($result1,$result2);
        return $result;    
	} 
	public function detailsInformation($id)
	{
	    $this->db->select('ci.*');
        $this->db->from('customerinfo ci');
		$this->db->where("ci.customerid",$id);
        $query = $this->db->get();
		$result = $query->row();
        return $result;    
	}
}
