<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {
	
	private $table = 'supplier';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('supid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	 public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '5020205%'");
        return $query->row();
    }
 	public function create_coa($data = [])
    {
        $this->db->insert('acc_coa',$data);
        return true;
    }

	public function update($data = array())
	{
		return $this->db->where('supid',$data["supid"])
			->update($this->table, $data);
	}

    public function read()
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('supid', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('supid',$id) 
			->get()
			->row();
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
	public function invoicelist()
	{
		$data = $this->db->select("pi.invoiceid,s.supName")
			->join("supplier s","s.supid=pi.suplierID","left")
			->from('purchaseitem pi')
			->get()
			->result();

		$list[''] = 'Select Invoice';

		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->invoiceid] = $value->invoiceid."-".$value->supName;
			return $list;
		} else {
			return $list; 
		}
	}
    
}
