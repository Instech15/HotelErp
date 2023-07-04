<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomfacilitidetails_model extends CI_Model {
	
	private $table = 'roomfacilitydetails';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('facilityid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('facilityid',$data["facilityid"])
			->update($this->table, $data);
	}

    public function read($limit = null, $start = null)
	{
	    $this->db->select('roomfacilitydetails.*,roomfacilitytype.facilitytypetitle');
        $this->db->from($this->table);
		$this->db->join('roomfacilitytype','roomfacilitytype.facilitytypeid=roomfacilitydetails.facilitytypeid','left');
        $this->db->order_by('roomfacilitydetails.facilityid', 'desc');
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
			->where('facilityid',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('roomfacilitydetails.*,roomfacilitytype.facilitytypetitle');
        $this->db->from($this->table);
		$this->db->join('roomfacilitytype','roomfacilitytype.facilitytypeid=roomfacilitydetails.facilitytypeid','left');
        $this->db->order_by('roomfacilitydetails.facilityid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
 public function allfacilitytype()
	{
		$data = $this->db->select("*")
			->from('roomfacilitytype')
			->get()
			->result();

		$list[''] = 'Select Facility Type';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->facilitytypeid] = $value->facilitytypetitle;
			return $list;
		} else {
			return false; 
		}
	}
    
}
