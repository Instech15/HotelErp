<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomdetails_model extends CI_Model {
	
	private $table = 'roomdetails';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('roomid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update($data = array())
	{
		return $this->db->where('roomid',$data["roomid"])
			->update($this->table, $data);
	}

    public function read()
	{
	    $this->db->select('roomdetails.*,bedstype.bedstypetitle,roomsizemesurement.roommesurementitle');
        $this->db->from($this->table);
		$this->db->join('roomsizemesurement','roomsizemesurement.mesurementid=roomdetails.roomsizemesurement','left');
		$this->db->join('bedstype','bedstype.Bedstypeid=roomdetails.bedstype','left');
        $this->db->order_by('roomdetails.roomid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('roomid',$id) 
			->get()
			->row();
	} 

 
public function countlist()
	{
		$this->db->select('roomdetails.*,bedstype.bedstypetitle,roomsizemesurement.roommesurementitle');
        $this->db->from($this->table);
		$this->db->join('roomsizemesurement','roomsizemesurement.mesurementid=roomdetails.roomsizemesurement','left');
		$this->db->join('bedstype','bedstype.Bedstypeid=roomdetails.bedstype','left');
        $this->db->order_by('roomdetails.roomid', 'desc');
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

		$list[''] = 'Select Room Type';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->roomid] = $value->roomtype;
			return $list;
		} else {
			return false; 
		}
	}
public function allrateplan()
	{
		$data = $this->db->select("*")
			->from('rateplan')
			->get()
			->result();

		$list[''] = 'Select Rateplan';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->rateplanid] = $value->rateplanname;
			return $list;
		} else {
			return false; 
		}
	}
public function allbeds()
	{
		$data = $this->db->select("*")
			->from('bedstype')
			->get()
			->result();

		$list[''] = 'Select Type';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->Bedstypeid] = $value->bedstypetitle;
			return $list;
		} else {
			return false; 
		}
	}
public function allsizes()
	{
		$data = $this->db->select("*")
			->from('roomsizemesurement')
			->get()
			->result();

		$list[''] = 'Select Size';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->mesurementid] = $value->roommesurementitle;
			return $list;
		} else {
			return false; 
		}
	}
	public function allmonthyear()
	{
		$list[''] = 'Select Month/Year';
		for ($x=0; $x < 13; $x++) {
		$time = strtotime('+' . $x . ' months', strtotime(date('Y-m' . '-01')));
		$key = date('m', $time);
		$name = date('M', $time);
		$year = date('Y', $time);
		$full_date= date('Y-m-d', $time);
		$monthyear=$months[$key]= $name ."-".$year;
		$yearmonth=$months[$key] = $year."-".$key;
			$list[$yearmonth] = $monthyear;
		}
		return $list;
	}
	public function allfloor(){

        $this->db->select('*');
        $this->db->from('tbl_floor');
        $parent = $this->db->get();
        $roomnolist = $parent->result();
        $i=0;
        foreach($roomnolist as $floors){
            $roomnolist[$i]->sub = $this->roomno($floors->floorid);
            $i++;
        }
        return $roomnolist;
    }

    public function roomno($id){

        $this->db->select('*');
        $this->db->from('tbl_floorplan');
        $this->db->where('floorName', $id);

        $roomno = $this->db->get();
        $roomnolist = $roomno->result();
        $i=0;
        foreach($roomnolist as $floors){
            $roomnolist[$i]->sub = $floors->roomno;
            $i++;
        }
        return $roomnolist;       
    }
	public function allfacility(){

        $this->db->select('*');
        $this->db->from('roomfacilitytype');
        $parent = $this->db->get();
        $facilitilist = $parent->result();
        $i=0;
        foreach($facilitilist as $facility){
            $facilitilist[$i]->sub = $this->facilitiinfo($facility->facilitytypeid);
            $i++;
        }
        return $facilitilist;
    }

    public function facilitiinfo($id){

        $this->db->select('*');
        $this->db->from('roomfacilitydetails');
        $this->db->where('facilitytypeid', $id);

        $faciliti = $this->db->get();
        $facilitilist = $faciliti->result();
        $i=0;
        foreach($facilitilist as $facility){
            $facilitilist[$i]->sub = $facility->facilitytitle;
            $i++;
        }
        return $facilitilist;       
    }
    
}
