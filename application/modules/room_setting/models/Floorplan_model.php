<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floorplan_model extends CI_Model {
	
	private $table = 'tbl_floorplan';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('floorName',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('floorplanid',$data["floorplanid"])
			->update($this->table, $data);
	}

    public function read()
	{
	    $this->db->select('tbl_floorplan.*,tbl_floor.floorname as florname');
        $this->db->from($this->table);
		$this->db->join('tbl_floor','tbl_floor.floorid=tbl_floorplan.floorName','join');
		$this->db->group_by('tbl_floorplan.floorName');
        $this->db->order_by('tbl_floorplan.floorplanid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('floorName',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('tbl_floorplan.*,tbl_floor.floorname');
        $this->db->from($this->table);
		$this->db->join('tbl_floor','tbl_floor.floorid=tbl_floorplan.floorName','join');
		$this->db->group_by('tbl_floorplan.floorName');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    
}
