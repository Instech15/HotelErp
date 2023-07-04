<?php

class Api_hotel_model extends CI_Model
{

    public function authenticate_user($table, $data)
    {
        $Type = $data['email'];
        $Password = $data['password'];
        $type = $data['type'];
        $position = $data['pos_id'];
        if($type==2){
            $this->db->select("id,firstname,lastname,user.email,position_name,about,image,usertype,p1.employee_id");
        }else{
            $this->db->select("id,firstname,lastname,user.email,about,image,last_login,last_logout,ip_address,usertype,status,user.is_admin,p1.employee_id");
        }
        $this->db->join('employee_history p1','p1.emp_his_id=user.id','left');
        if($type==2){
            $this->db->where('p1.pos_id',$position);
            $this->db->join('position','position.pos_id=p1.pos_id','left');
        }
		$this->db->where('user.email', $data['email']);
        $this->db->where("(password = '" . $Password . "' OR password =  '" . md5($Password) . "')", NULL, TRUE);
		$this->db->where('usertype', $data['type']);
        $query = $this->db->get($table)->row();
        $num_rows = $this->db->count_all_results();
        if ($num_rows > 0)
        {
			return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function checkEmailOrPhoneIsRegistered($table, $data)
    {
        $this->db->select('id,email, password');
		$this->db->where('email', $data['email']);
        $query = $this->db->get($table)->row();
        $num_rows = $this->db->count_all_results();

        if ($num_rows > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function update_date($table, $data, $field_name, $field_value)
    {
        $this->db->where($field_name, $field_value);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function read_all($select_items, $table, $field_name, $field_value, $order_by_name = NULL, $order_by = NULL ,$limit=NULL, $start=NULL, $where_array=NULL, $field=NULL, $value=Null, $or_where=NULL, $group_by=NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        $this->db->where($field_name, $field_value);
		if ($field != NULL && $value != NULL)
		{
		$this->db->where($field, $value);
		}
        if ($where_array != NULL)
        {
        foreach ($where_array as $field => $value) {
        $this->db->where($field, $value);
      	}
        }
        if ($or_where != NULL)
        {
        foreach ($or_where as $field1 => $value1) {
        $this->db->or_where($field1, $value1);
      	}
        }
        if($group_by!=NULL){
            $this->db->group_by($group_by);
        }
        if ($order_by_name != NULL && $order_by != NULL)
        {
            $this->db->order_by($order_by_name, $order_by);
        }
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

	public function get_all($select_items, $table, $orderby,$limit=NULL,$start=NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        $this->db->limit($limit, $start);
        $this->db->order_by($orderby,'DESC');
        return $this->db->get()->result();
    }
    public function read($select_items, $table, $where_array, $where_array2=NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        if($where_array2!=NULL){
        foreach ($where_array2 as $field => $value) {
            $this->db->where($field, $value);
        }
        }
        return $this->db->get()->row();
    }
   public function read2($select_items, $table, $orderby, $where_array,$limit=NULL,$start=NULL, $or_where=NULL)
    {
        
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
            
        }
        if($or_where!=NULL){
        foreach ($or_where as $field => $value) {
            $this->db->where($field, $value);
            
        }
        }
        $this->db->limit($limit, $start);
        $this->db->order_by($orderby,'DESC');
        return $this->db->get()->result();
    }
   public function readall($select_items, $table, $orderby, $where_array)
    {
        
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
            
        }
        $this->db->order_by($orderby,'Asc');
        return $this->db->get()->result();
        
    }
    public function get_all_group($select_items, $table, $order_by_name = NULL, $order_by = NULL, $group_by = NULL)
    {
		$this->db->select($select_items);
        $this->db->from($table);
        if ($order_by_name != NULL && $order_by != NULL)
        {
            $this->db->order_by($order_by_name, $order_by);
        }
		$this->db->group_by($group_by);
        return $this->db->get()->result();
    }
    public function room_cleaningdetails($hk_id){
        $this->db->select("first_name,hk.hkeeper_id,hk.employee_id,hk.roomno");
        $this->db->from("tbl_housekeepingrecord hk");
        $this->db->join("employee_history","employee_history.employee_id=hk.employee_id","left");
        $this->db->where("hkeeper_id",$hk_id);
        $this->db->where("status!=",1);
        return $this->db->get()->row();
    }
        public function idownload($id){
        	$this->db->select('attachment');
        	$query = $this->db->get_where('tbl_issueregister',array('issueno'=>$id));    
        	return $query->row_array();
    	}
}