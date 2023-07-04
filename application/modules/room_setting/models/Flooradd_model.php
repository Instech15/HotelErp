<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flooradd_model extends CI_Model {
	
	private $table = 'tbl_floor';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		
		$this->db->where('floorid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('floorid',$data["floorid"])
			->update($this->table, $data);
	}

    public function read()
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('floorid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('floorid',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
		$this->db->order_by('floorid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function allfloorlist()
	{
		$data = $this->db->select("*")->from('tbl_floor')->get()->result();

		$list[''] = 'Select Floor Name';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->floorid] = $value->floorname;
			return $list;
		} else {
			return false; 
		}
		
	}
    
}
