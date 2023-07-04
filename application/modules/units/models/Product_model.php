<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	private $table = 'products';
 
	public function unit_ingredient($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function ingredient_delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function update_ingredient($data = array())
	{
		return $this->db->where('id',$data["id"])
			->update($this->table, $data);
	}

    public function read_ingredient()
	{
	    $this->db->select('products.*,unit_of_measurement.uom_name,tbl_category.categoryname');
        $this->db->from($this->table);
		$this->db->join('unit_of_measurement','products.uom_id = unit_of_measurement.id','left');
		$this->db->join('tbl_category','products.category_id = tbl_category.category_id','left');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function hkcheck()
	{ 
		return $this->db->select("*")->from("tbl_category")
			->where('category_id',501) 
			->get()
			->row();
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('id',$id) 
			->get()
			->row();
	} 

 
public function count_ingredient()
	{
		$this->db->select('products.*,unit_of_measurement.uom_name');
        $this->db->from($this->table);
		$this->db->join('unit_of_measurement','products.uom_id = unit_of_measurement.id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    public function read()
	{
	    $this->db->select('tbl_category.*');
        $this->db->from("tbl_category");
        $this->db->order_by('tbl_category.category_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
	public function findId($id = null)
	{ 
		$this->db->select('*');
        $this->db->from('tbl_category');
		$this->db->where('category_id',$id); 
        $this->db->order_by('category_id', 'desc');
        $query = $this->db->get();
	    return $query->row();
	} 
	public function delete($id = null)
	{
		$this->db->where('category_id',$id)
			->delete('tbl_category');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function category_dropdown()
	{
		$data = $this->db->select("*")
			->from("tbl_category")
			->where("status",1)
			->get()
			->result();

		$list[''] = display('categorylist');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->category_id] = $value->categoryname;
			return $list;
		} else {
			return $list; 
		}
	}
	public function read_reuseiteam(){
		$this->db->select('rp.*,p.product_name,c.categoryname');
        $this->db->from("tbl_reuseableproduct rp");
		$this->db->join('products p','p.id=rp.product_id','left');
		$this->db->join('tbl_category c','c.category_id=p.category_id','left');
        $this->db->where('p.reuseable', 1);
        $this->db->order_by('p.id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
	public function read_destroyediteam(){
		$this->db->select('dp.*,p.product_name,c.categoryname');
        $this->db->from("tbl_destroyedproduct dp");
		$this->db->join('products p','p.id=dp.product_id','left');
		$this->db->join('tbl_category c','c.category_id=p.category_id','left');
        $this->db->order_by('dp.destroy_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
}
