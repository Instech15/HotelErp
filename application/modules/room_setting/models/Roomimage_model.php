<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomimage_model extends CI_Model {
	
	private $table = 'room_image';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('room_img_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('room_img_id',$data["room_img_id"])
			->update($this->table, $data);
	}

    public function read()
	{
	    $this->db->select('room_image.*,roomdetails.roomid,roomdetails.roomtype');
        $this->db->from($this->table);
		$this->db->join('roomdetails','roomdetails.roomid=room_image.room_id','left');
        $this->db->order_by('room_image.room_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('room_img_id',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('room_image.*,roomdetails.roomid,roomdetails.roomtype');
        $this->db->from($this->table);
		$this->db->join('roomdetails','roomdetails.roomid=room_image.room_id','left');
        $this->db->order_by('room_image.room_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function allrooms()
	{
		$data = $this->db->select("*")
			->from('roomdetails')
			->get()
			->result();

		$list[''] = 'Select Room';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->roomid] = $value->roomid.'-'.$value->roomtype;
			return $list;
		} else {
			return false; 
		}
	}
}
