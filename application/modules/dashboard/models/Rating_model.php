<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_model extends CI_Model {
 
	private $table = 'tbl_rating';
        //Retrive sms Data
    public function rating_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function rating_delete($id = null)
	{
		$this->db->where('ratingid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function update_rating($data = array())
	{
		return $this->db->where('ratingid',$data["ratingid"])
			->update($this->table, $data);
	}

    public function read_rating($limit = null, $start = null)
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('ratingid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('ratingid',$id) 
			->get()
			->row();
	} 
	public function count_rating()
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
