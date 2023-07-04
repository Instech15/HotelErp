<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Welcome_model
 *
 * @author linktech
 */
class Hotel_model extends CI_Model{
	public function allmenu_dropdown(){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', 0);
		$this->db->where('isactive', 1);
        $parent = $this->db->get();
        $menulist = $parent->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
			
            $i++;
        }
        return $menulist;
    }

    public function sub_menu($id){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', $id);

        $child = $this->db->get();
        $menulist = $child->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
            $i++;
        }
        return $menulist;       
    }
public function insert_data($table, $data)
		{
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}
		public function update_info($table, $data, $field_name, $field_value)
    {
        $this->db->where($field_name, $field_value);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
		 public function update_date($table, $data, $field_name, $field_value)
			{
				$this->db->where($field_name, $field_value);
				$this->db->update($table, $data);
				return $this->db->affected_rows();
			}
		 public function read($select_items, $table, $where_array)
			{
			   
				$this->db->select($select_items);
				$this->db->from($table);
				foreach ($where_array as $field => $value) {
					$this->db->where($field, $value);
					
				}
				return $this->db->get()->row();
			}
		 public function read2($select_items, $table, $orderby, $where_array)
			{
			   
				$this->db->select($select_items);
				$this->db->from($table);
				foreach ($where_array as $field => $value) {
					$this->db->where($field, $value);
					
				}
				$this->db->order_by($orderby,'DESC');
				return $this->db->get()->row();
			}
		public function read_all($select_items, $table, $orderby,$delitem="",$stype="",$val="")
		{
			$this->db->select($select_items);
			$this->db->from($table);
			if($delitem!=""){
			$this->db->where($delitem,0);
			}
			if($stype!=""){
			$this->db->where($stype,$val);
			}
			$this->db->order_by($orderby,'ASC');
			return $this->db->get()->result();
		}
	public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030%'");
        return $query->row();
    }
	public function user_report($limit=null, $start=null ,$id=null)
	{
	    $this->db->select('booked_info.*,roomdetails.roomtype');
        $this->db->from('booked_info');
		$this->db->join('roomdetails','roomdetails.roomid=booked_info.roomid','left');
		$this->db->where('booked_info.cutomerid=',$id);
        $this->db->order_by('booked_info.bookedid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
	public function details($id)
	{
		
		$this->db->select('booked_info.*,roomdetails.roomtype,roomdetails.rate');
        $this->db->from('booked_info');
		$this->db->join('roomdetails','roomdetails.roomid=booked_info.roomid','left');
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
	public function commoninfo(){
		$this->db->select('*');
		$this->db->from('common_setting');
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
	public function findById($id = null)
	{ 
		return $this->db->select("*")->from('customerinfo')
			->where('customerid',$id) 
			->get()
			->row();
	} 
	public function update($data = array())
	{
		return $this->db->where('customerid',$data["customerid"])
			->update("customerinfo", $data);
	}
	public function send_email($email, $subject, $body, $emailtext,$check=null){
		if($check=="booking"){
			$status = $this->db->select("status")->from("tbl_email_permission")->where('permission',$check)->get()->row();
			if($status->status==0){
				return false;
			}
		}
		$send_email = $this->read('*', 'email_config', array('email_config_id' => 1));	
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
		if($body=="Contact Info"){
			$this->email->from($email, $body);
			$this->email->to($send_email->sender);
		}else{
			$this->email->from($send_email->sender,$body);
			$this->email->to($email);
		}
		$this->email->subject($subject);
		$this->email->message($emailtext);
		$this->email->send();
	}
	
}
