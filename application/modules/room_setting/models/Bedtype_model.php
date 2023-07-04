<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bedtype_model extends CI_Model {
	
	private $table = 'bedstype';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('Bedstypeid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('Bedstypeid',$data["Bedstypeid"])
			->update($this->table, $data);
	}

    public function read()
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('Bedstypeid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('Bedstypeid',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('Bedstypeid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    
}
