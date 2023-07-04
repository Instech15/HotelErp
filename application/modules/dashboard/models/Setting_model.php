<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
 
	private $table = "setting";

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->get()
			->row();
	} 
	
  	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
	
	public function currencyList()
	{
		$data = $this->db->select("*")
			->from('currency')
			->get()
			->result();

		$list[''] = 'Select '.display('currency');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->currencyid] = $value->currencyname;
			return $list;
		} else {
			return false; 
		}
	}
	public function timezone()
	{
		return $this->db->select("*")
			->from("timezone")
			->get()
			->result();
	} 
}
