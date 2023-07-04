<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couponlist_model extends CI_Model {
 
	private $table = 'tbl_token';
        //Retrive sms Data
    public function token_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	
   
	public function token_delete($id = null)
	{
		$this->db->where('tokenid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function update_token($data = array())
	{
		return $this->db->where('tokenid',$data["tokenid"])
			->update($this->table, $data);
	}

    public function read_token()
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('tokenid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('tokenid',$id) 
			->get()
			->row();
	} 
	public function count_token()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}

}
