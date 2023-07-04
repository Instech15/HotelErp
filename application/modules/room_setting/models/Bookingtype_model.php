<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingtype_model extends CI_Model {
	
	private $table = 'bookingtype';
	private $table2 = 'tbl_booking_type_info';
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('booktypeid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('booktypeid',$data["booktypeid"])
			->update($this->table, $data);
	}

    public function read()
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('booktypeid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('booktypeid',$id) 
			->get()
			->row();
	} 
	public function booking_details()
	{
	   $this->db->select('*');
        $this->db->from('tbl_booking_type_info');
        $this->db->order_by('btypeinfoid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function booking_type_data2()
	{
		$data = $this->db->select("*")
			->from('bookingtype')
			->get()
			->result();

		
			 	return $data; 
	}
	public function create_ty_d($data = array())
	{
		return $this->db->insert($this->table2, $data);
	}
	public function booking_type_data()
	{
		$data = $this->db->select("*")
			->from('bookingtype')
			->get()
			->result();

		
		return $data; 
	}


	public function bdetailsById($id = null)
	{ 
		return $this->db->select("*")->from('tbl_booking_type_info')
			->where('btypeinfoid',$id) 
			->get()
			->row();
	} 
	public function update_ty_d($data = array())
	{
		return $this->db->where('btypeinfoid',$data["btypeinfoid"])
			->update($this->table2, $data);
	}

	public function delete2($id = null)
	{
		$this->db->where('btypeinfoid',$id)
			->delete($this->table2);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
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
    
	public function read_complementary()
	{
	   $this->db->select('*');
        $this->db->from("tbl_complementary");
        $this->db->order_by('complementary_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	public function roomtype()
	{
	   $this->db->select('roomtype');
        $this->db->from("roomdetails");
        $this->db->order_by('roomid', 'Asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	
	public function complementary_create($data = array())
	{
		return $this->db->insert("tbl_complementary", $data);
	}
	public function complementary_update($data = array())
	{
		return $this->db->where('complementary_id',$data["complementary_id"])
			->update("tbl_complementary", $data);
	}
	public function complementaryById($id = null)
	{ 
		return $this->db->select("*")->from("tbl_complementary")
			->where('complementary_id',$id) 
			->get()
			->row();
	}
	public function compdelete($id = null)
	{
		$this->db->where('complementary_id',$id)
			->delete("tbl_complementary");

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}