<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomsize_model extends CI_Model {
	
	private $table = 'roomsizemesurement';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('mesurementid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('mesurementid',$data["mesurementid"])
			->update($this->table, $data);
	}

    public function read()
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('mesurementid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('mesurementid',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('mesurementid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    
}
