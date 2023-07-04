<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {


	public function checkUser($data = array())
	{
		return $this->db->select("
				user.id, 
				CONCAT_WS(' ', user.firstname, user.lastname) AS fullname,
				user.email, 
				user.image, 
				user.last_login,
				user.last_logout, 
				user.ip_address, 
				user.status, 
				user.is_admin, 
				IF (user.is_admin=1, 'Admin', 'User') as user_level
			")
			->from('user')
			->where('email', $data['email'])
			->where('password', md5($data['password']))
			->get();
	}

	public function userPermission($id = null)
	{
		return $this->db->select("
			module.controller, 
			module_permission.fk_module_id, 
			module_permission.create, 
			module_permission.read, 
			module_permission.update, 
			module_permission.delete
			")
			->from('module_permission')
			->join('module', 'module.id = module_permission.fk_module_id', 'full')
			->where('module_permission.fk_user_id', $id)
			->get()
			->result();
	}


	public function last_login($id = null)
	{
		return $this->db->set('last_login', date('Y-m-d H:i:s'))
			->set('ip_address', $this->input->ip_address())
			->where('id',$this->session->userdata('id'))
			->update('user');
	}

	public function last_logout($id = null)
	{
		return $this->db->set('last_logout', date('Y-m-d H:i:s'))
			->where('id', $this->session->userdata('id'))
			->update('user');
	}

	public function profile($id = null)
	{
		return $this->db->select("
			*, 
				CONCAT_WS(' ', firstname, lastname) AS fullname,
				IF (user.is_admin=1, 'Admin', 'User') as user_level
			")
			->from("user")
			->where("id", $id)
			->get()
			->row();
	}

	public function setting($data = array())
	{
		return $this->db->where('id', $data['id'])
			->update('user', $data);
	}
	
	public function countorder()
	{
		$this->db->select('*');
        $this->db->from('booked_info');
		$this->db->where('bookingstatus=', 5);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function countcheckin()
	{
		$this->db->select('*');
        $this->db->from('booked_info');
		$this->db->where('bookingstatus=', 4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function countpending()
	{
		$this->db->select('*');
        $this->db->from('booked_info');
		 $this->db->where('bookingstatus=', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function countcancel()
	{
		$this->db->select('*');
        $this->db->from('booked_info');
		 $this->db->where('bookingstatus=', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function countcompleteorder()
	{
		$this->db->select('*');
        $this->db->from('customer_order');
		 $this->db->where('order_status', 4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	
	public function todayorder()
	{
		$today=date('Y-m-d');
		$this->db->select('*');
        $this->db->from('booked_info');
		$this->db->where('date(date_time)', $today);
		$this->db->where('bookingstatus!=', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	
	public function totalcustomer()
	{
		$this->db->select('*');
        $this->db->from('customerinfo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function customerlist()
	{
		$this->db->select('*');
        $this->db->from('customerinfo');
		$this->db->order_by('customerid', 'DESC');
		$this->db->limit(50);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	
	public function totalamount()
	{
		$today=date('Y-m-d');
		$this->db->select('SUM(total_price) as amount');
        $this->db->from('booked_info');
		$this->db->where('bookingstatus!=', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();  
        }
        return 0;
	}
	public function totalreservation()
	{
		$this->db->select('*');
        $this->db->from('tblreservation');
		$this->db->where('status', '5');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return 0;
	}
	public function todayorderlist()
	{
		$today=date('Y-m-d');
		$this->db->select('booked_info.*,customerinfo.cust_phone,customerinfo.firstname,customerinfo.lastname');
        $this->db->from('booked_info');
		$this->db->join('customerinfo','booked_info.cutomerid=customerinfo.customerid','left');
		$this->db->where('booked_info.checkindate', $today);
		$this->db->where('booked_info.bookingstatus!=', 1);
		$this->db->order_by('booked_info.bookedid', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	public function nextdayorderlist()
	{
	    $nextDate = date("Y-m-d", strtotime("+ 1 day"));;
		$this->db->select('booked_info.*,customerinfo.cust_phone,customerinfo.firstname,customerinfo.lastname');
        $this->db->from('booked_info');
		$this->db->join('customerinfo','booked_info.cutomerid=customerinfo.customerid','left');
		$this->db->where('booked_info.checkindate', $nextDate);
		$this->db->where('booked_info.bookingstatus!=', 1);
		$this->db->order_by('booked_info.bookedid', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	public function latestoredercount()
	{
		$this->db->select('*');
        $this->db->from('booked_info');
		$this->db->where('isSeen', 0);
		$this->db->or_where('isSeen',NULL);
		$this->db->order_by('booking_number', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows;  
        }
        return 0;
	}
	public function latestonline()
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.customer_phone,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('order_status!=', 5);
		$this->db->where('cutomertype', 2);
		$this->db->order_by('saleinvoice', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	public function latestreservation()
	{
		$this->db->select('tblreservation.*,customer_info.customer_name,customer_info.customer_phone,rest_table.tablename');
        $this->db->from('tblreservation');
		$this->db->join('customer_info','tblreservation.cid=customer_info.customer_id','left');
		$this->db->join('rest_table','tblreservation.tableid=rest_table.tableid','left');
		$this->db->where('tblreservation.status', 2);
		$this->db->order_by('tblreservation.reserveday', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	public function latestpending()
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.customer_phone,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('order_status', 1);
		$this->db->order_by('saleinvoice', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
	
	public function monthlybookingamount($year,$month)
		{
			$groupby="GROUP BY YEAR(date_time), MONTH(date_time)";
			$amount='';
			$wherequery = "YEAR(date_time)='$year' AND month(date_time)='$month' AND total_price=paid_amount GROUP BY YEAR(date_time), MONTH(date_time)";
			$this->db->select('SUM(total_price) as amount');
			$this->db->from('booked_info');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$amount.=$row->amount.", ";
					}
				return trim($amount,', ');
			}
			return 0;
		}
	public function monthlybookingorder($year,$month)
		{
			$groupby="GROUP BY YEAR(date_time), MONTH(date_time)";
			$totalorder='';
			$wherequery = "YEAR(date_time)='$year' AND month(date_time)='$month' AND bookingstatus=5 GROUP BY YEAR(date_time), MONTH(date_time)";
			$this->db->select('count(bookedid) as totalorder');
			$this->db->from('booked_info');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}
		public function monthlybookingpending($year,$month)
		{
			$groupby="GROUP BY YEAR(date_time), MONTH(date_time)";
			$totalorder='';
			$wherequery = "YEAR(date_time)='$year' AND month(date_time)='$month' AND bookingstatus=0 GROUP BY YEAR(date_time), MONTH(date_time)";
			$this->db->select('count(bookedid) as totalorder');
			$this->db->from('booked_info');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}
		public function monthlybookingcancel($year,$month)
		{
			$groupby="GROUP BY YEAR(date_time), MONTH(date_time)";
			$totalorder='';
			$wherequery = "YEAR(date_time)='$year' AND month(date_time)='$month' AND bookingstatus=1 GROUP BY YEAR(date_time), MONTH(date_time)";
			$this->db->select('count(bookedid) as totalorder');
			$this->db->from('booked_info');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}
		public function monthlybookingtotal($year,$month)
		{
			$groupby="GROUP BY YEAR(date_time), MONTH(date_time)";
			$totalorder='';
			$wherequery = "YEAR(date_time)='$year' AND month(date_time)='$month' AND bookingstatus!=1 GROUP BY YEAR(date_time), MONTH(date_time)";
			$this->db->select('count(bookedid) as totalorder');
			$this->db->from('booked_info');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}
	public function onlinesaleamount($year,$month)
		{
			$groupby="GROUP BY YEAR(order_date), MONTH(order_date)";
			$amount='';
			$wherequery = "YEAR(order_date)='$year' AND month(order_date)='$month' AND cutomertype=2 AND order_status!=5 GROUP BY YEAR(order_date), MONTH(order_date)";
			$this->db->select('SUM(totalamount) as amount');
			$this->db->from('customer_order');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$amount.=$row->amount.", ";
					}
				return trim($amount,', ');
			}
			return 0;
		}
	public function onlinesaleorder($year,$month)
		{
			$groupby="GROUP BY YEAR(order_date), MONTH(order_date)";
			$totalorder='';
			$wherequery = "YEAR(order_date)='$year' AND month(order_date)='$month' AND cutomertype=2 AND order_status!=5 GROUP BY YEAR(order_date), MONTH(order_date)";
			$this->db->select('count(order_id) as totalorder');
			$this->db->from('customer_order');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}
	
	public function offlinesaleamount($year,$month)
		{
			$groupby="GROUP BY YEAR(order_date), MONTH(order_date)";
			$amount='';
			$wherequery = "YEAR(order_date)='$year' AND month(order_date)='$month' AND cutomertype=1 AND order_status!=5 GROUP BY YEAR(order_date), MONTH(order_date)";
			$this->db->select('SUM(totalamount) as amount');
			$this->db->from('customer_order');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$amount.=$row->amount.", ";
					}
				return trim($amount,', ');
			}
			return 0;
		}
	public function offlinesaleorder($year,$month)
		{
			$groupby="GROUP BY YEAR(order_date), MONTH(order_date)";
			$totalorder='';
			$wherequery = "YEAR(order_date)='$year' AND month(order_date)='$month' AND cutomertype=1 AND order_status!=5 GROUP BY YEAR(order_date), MONTH(order_date)";
			$this->db->select('count(order_id) as totalorder');
			$this->db->from('customer_order');
			$this->db->where($wherequery, NULL, FALSE);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$totalorder.=$row->totalorder.", ";
					}
				return trim($totalorder,', ');
			}
			return 0;
		}

}
 