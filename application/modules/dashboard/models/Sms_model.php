<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model {
	
        //Retrive sms Data
    public function retrieve_sms_editdata(){
        $this->db->select('*');
        $this->db->from('sms_configuration');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();   
        }
        return false;
    }
	
	public function retrieve_active_getway(){
		$this->db->select('*');
        $this->db->from('sms_configuration');
        $this->db->where('status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();   
        }
        return false;
		} 
	public function update_sms_config($data,$id)
		{
			if($id){
				$this->db->where('id',$id);
				$resutl = $this->db->update('sms_configuration',$data);
				return $resutl;
			}else{
				$resutl = $this->db->insert('sms_configuration',$data);
				return $resutl;
			}
	
		}  
  public function template_list(){
		return $data = $this->db->select('*')
		->from('sms_template')
		->get()
		->result();
	}
public function save_sms_template($data){
		$result = $this->db->insert('sms_template',$data);
		return $result;
	}
//update template
	public function template_update($data){
		$id = $this->input->post('id', TRUE);
		$resutl=$this->db->where('id',$id)->update('sms_template',$data);
		return $result;
	} 

}
