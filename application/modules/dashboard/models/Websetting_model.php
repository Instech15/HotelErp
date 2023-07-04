<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Websetting_model extends CI_Model {
 
	private $table = "setting";
	
	public function read()
	{
		return $this->db->select("*")
			->from('common_setting')
			->get()
			->row();
	} 
	public function create_setting($data = [])
	{	 
		return $this->db->insert('common_setting',$data);
	}
	public function update_setting($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('common_setting',$data); 
	} 

	public function create($data = array())
	{	 
		return $this->db->insert('tbl_slider',$data);
	}
 	
	public function createtype($data = array())
	{	 
		return $this->db->insert('tbl_slider_type',$data);
	}
	public function updatetype($data = array())
	{
		return $this->db->where('stype_id',$data["stype_id"])
			->update('tbl_slider_type', $data);
	}
	public function type_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_slider_type')
			->get()
			->result();

		$list[''] = display('name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->stype_id] = $value->STypeName;
			return $list;
		} else {
			return false; 
		}
	}
	public function findById($id = null)
	{ 
		return $this->db->select("*")->from('tbl_slider')
			->where('slid',$id) 
			->get()
			->row();
	} 
  	public function update($data = array())
	{
		return $this->db->where('slid',$data['slid'])
			->update('tbl_slider',$data); 
	} 
	
	public function delete($id = null)
	{
		$this->db->where('slid',$id)
			->delete('tbl_slider');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
 //menu section
 
 	public function allmenu_dropdown(){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', 0);
        $parent = $this->db->get();
        $menulist = $parent->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
			
            $i++;
        }
        return $menulist;
    }

    public function sub_menu($id){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', $id);

        $child = $this->db->get();
        $menulist = $child->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
            $i++;
        }
        return $menulist;       
    }
	public function createmenu($data = array())
	{	 
		return $this->db->insert('top_menu',$data);
	}
	public function updatemenu($data = array())
	{
		return $this->db->where('menuid',$data["menuid"])
			->update('top_menu', $data);
	}
	
	public function deletemenu($id = null)
	{
		$this->db->where('menuid',$id)
			->delete('top_menu');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	
	//widget section
	public function createwidget($data = array())
	{	 
		return $this->db->insert('tbl_widget',$data);
	}
	public function updatewidget($data = array())
	{
		return $this->db->where('widgetid',$data["widgetid"])
			->update('tbl_widget', $data);
	}
	
	public function deletewidget($id = null)
	{
		$this->db->where('widgetid',$id)
			->delete('tbl_widget');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function emailread()
	{
	   $this->db->select('*');
        $this->db->from('subscribe_emaillist');
        $this->db->order_by('emailid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
	public function countlist()
	{
		$this->db->select('*');
        $this->db->from('subscribe_emaillist');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
 
}
