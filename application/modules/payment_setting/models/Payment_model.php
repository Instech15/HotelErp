<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
	
	private $table = 'payment_method';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('payment_method_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function update($data = array())
	{
		return $this->db->where('payment_method_id',$data["payment_method_id"])
			->update($this->table, $data);
	}

    public function read()
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('payment_method_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('payment_method_id',$id) 
			->get()
			->row();
	} 

public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
	/***********payment setup*************/
// payment Dropdown
	public function payment_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = display('payment_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->payment_method_id] = $value->payment_method;
			return $list;
		} else {
			return false; 
		}
	}	
public function psetupcreate($data = array())
	{
		return $this->db->insert('paymentsetup', $data);
	}
	public function setupdelete($id = null)
	{
		$this->db->where('setupid',$id)
			->delete('paymentsetup');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
public function psetupupdate($data = array())
	{
		return $this->db->where('setupid',$data["setupid"])
			->update('paymentsetup', $data);
	}
 public function setupread()
	{
		$this->db->select('paymentsetup.*,payment_method.payment_method');
        $this->db->from('paymentsetup');
		$this->db->join('payment_method','paymentsetup.paymentid=payment_method.payment_method_id','left');
        $this->db->order_by('paymentsetup.setupid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	public function psetupById($id = null)
	{ 
		return $this->db->select("*")->from('paymentsetup')
			->where('setupid',$id) 
			->get()
			->row();
	} 
public function countsetuplist()
	{
		$this->db->select('paymentsetup.*,payment_method.payment_method');
        $this->db->from('paymentsetup');
		$this->db->join('payment_method','paymentsetup.paymentid=payment_method.payment_method_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    public function currency_read()
	{
	   $this->db->select('*');
        $this->db->from("payment_currency");
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
	public function currency_create($data = array())
	{
		return $this->db->insert('payment_currency', $data);
	}
	public function currency_update($data = array())
	{
		return $this->db->where('id',$data["id"])
			->update('payment_currency', $data);
	}
	public function currency_findById($id = null)
	{ 
		return $this->db->select("*")->from('payment_currency')
			->where('id',$id) 
			->get()
			->row();
	}
	public function currency_delete($id = null)
	{
		$this->db->where('id',$id)
			->delete('payment_currency');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}  
	public function currency_dropdown()
	{
		$data = $this->db->select("*")
			->from('payment_currency')
			->get()
			->result();

		$list[''] = display('currency_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->currency_name] = "(".$value->currency_name.")".$value->currency_details;
			return $list;
		} else {
			return false; 
		}
	}
}
