<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_model extends CI_Model {

	public function read($limit, $offset)
	{
		return $this->db->select("*")
			->from('dbt_blocklist')
			->order_by('id', 'desc')
			->limit($limit, $offset)
			->get()
			->result();
	}
	public function single($id = null)
	{
		return $this->db->select('*')
			->from('dbt_blocklist')
			->where('id', $id)
			->get()
			->row();
	}
	public function all()
	{
		return $this->db->select('*')
			->from('dbt_blocklist')
			->get()
			->result();
	}
	public function delete($id = null)
	{
		return $this->db->where('id', $id)
			->delete("dbt_blocklist");
	}
}