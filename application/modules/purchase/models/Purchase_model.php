<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {
	
	private $table = 'purchaseitem';
 
	public function create()
	{
		$saveid=$this->session->userdata('id');
		$p_id = $this->input->post('product_id', TRUE);
		$purchase_date = str_replace('/','-',$this->input->post('purchase_date',TRUE));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$expire_date = str_replace('/','-',$this->input->post('expire_date',TRUE));
		$exdate= date('Y-m-d' , strtotime($expire_date));
		$data=array(
			'invoiceid'				=>	$this->input->post('invoice_no',TRUE),
			'suplierID'			    =>	$this->input->post('suplierid', TRUE),
			'total_price'	        =>	$this->input->post('grand_total_price',TRUE),
			'details'	            =>	$this->input->post('purchase_details',TRUE),
			'purchasedate'		    =>	$newdate,
			'purchaseexpiredate'	=>	$exdate,
			'savedby'			    =>	$saveid
		);
		 $this->db->insert($this->table,$data);
		$returnid = $this->db->insert_id();
		
		$rate = $this->input->post('product_rate', TRUE);
		$quantity = $this->input->post('product_quantity', TRUE);
		$t_price = $this->input->post('total_price', TRUE);
		
		for ($i=0, $n=count($p_id); $i < $n; $i++) {
			$product_quantity = $quantity[$i];
			$product_rate = $rate[$i];
			$product_id = $p_id[$i];
			$total_price = $t_price[$i];
			
			$data1 = array(
				'purchaseid'		=>	$returnid,
				'proid'			    =>	$product_id,
				'quantity'			=>	$product_quantity,
				'price'				=>	$product_rate,
				'totalprice'		=>	$total_price,
				'purchaseby'		=>	$saveid,
				'purchasedate'		=>	$newdate,
				'purchaseexpiredate'=>	$exdate
			);
			$oldstock = $this->db->select("stock")->from("products")->where('id',$product_id)->get()->row();
			$oldreadystock = $this->db->select("ready")->from("tbl_reuseableproduct")->where('product_id',$product_id)->get()->row();
			$newstock = $oldstock->stock + $product_quantity;
			$newreadystock = $oldreadystock->ready + $product_quantity;
			$stdata = array(
				'id'			    =>	$product_id,
				'stock'			=>	$newstock,
			);
			if(!empty($quantity))
			{
				$this->db->insert('purchase_details',$data1);
				$this->db->where('id',$product_id)->update('products',$stdata);
				$this->db->where('product_id',$product_id)->update('tbl_reuseableproduct',array('ready'=>$newreadystock));
			}
		}
		// Acc transaction
		$recv_id = date('YmdHis');
		$invoice = $this->input->post('invoice_no',TRUE);
		$narration = 'PO Receive Receive No '.$recv_id;
		$g_total_price = $this->input->post('grand_total_price',TRUE);
		$supinfo =$this->db->select('*')->from('supplier')->where('supid',$this->input->post('suplierid', TRUE))->get()->row();
		$total_amount = $supinfo->total_amount+$g_total_price;
		$due_amount = $supinfo->due_amount+$g_total_price;
		$this->db->where("supid",$this->input->post('suplierid', TRUE))->update("supplier",array("total_amount"=>$total_amount,"due_amount"=>$due_amount));
		transaction($invoice, 'PO', $newdate, 10107, $narration, $g_total_price, 0, 0, 1, $saveid, $newdate, 1);	
		
		$supinfo =$this->db->select('*')->from('supplier')->where('supid',$this->input->post('suplierid', TRUE))->get()->row();
		$sup_head = $supinfo->suplier_code.'-'.$supinfo->supName;
		$sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
		//  Supplier credit
		$narration = 'PO received For PO No.'.$this->input->post('invoice_no',TRUE).' Receive No.'.$recv_id;
		transaction($invoice, 'PO', $newdate, $sup_coa->HeadCode, $narration, 0, $g_total_price, 0, 1, $saveid, $newdate, 1);

		return true;
	
	}
	
	public function delete($id = null)
	{
		$this->db->where('purID',$id)
			->delete($this->table);

		$this->db->where('purchaseid',$id)
			->delete('purchase_details');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 




	public function update()
	{
		$id=$this->input->post('purID', TRUE);
		$saveid=$this->session->userdata('id');
		$p_id = $this->input->post('product_id', TRUE);
		$oldinvoice=$this->input->post('oldinvoice',TRUE);
		$oldsupplier= $this->input->post('oldsupplier',TRUE);
		$length= count($p_id);
		$purchase_date = str_replace('/','-',$this->input->post('purchase_date', TRUE));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$expire_date = str_replace('/','-',$this->input->post('expire_date', TRUE));
		$exdate= date('Y-m-d' , strtotime($expire_date));
		$data=array(
			'invoiceid'				=>	$this->input->post('invoice_no',TRUE),
			'suplierID'			    =>	$this->input->post('suplierid', TRUE),
			'total_price'	        =>	$this->input->post('grand_total_price',TRUE),
			'details'	            =>	$this->input->post('purchase_details',TRUE),
			'purchasedate'		    =>	$newdate,
			'purchaseexpiredate'	=>	$exdate,
			'savedby'			    =>	$saveid
		);
		 $this->db->where('purID',$id)
			->update($this->table, $data);
		
		
		$rate = $this->input->post('product_rate',TRUE);
		$quantity = $this->input->post('product_quantity',TRUE);
		$t_price = $this->input->post('total_price',TRUE);
		
		for ($i=0, $n=count($p_id); $i < $n; $i++){
			$product_quantity = $quantity[$i];
			$product_rate = $rate[$i];
			$product_id = $p_id[$i];
			$total_price = $t_price[$i];
			$this->db->select('*');
            $this->db->from('purchase_details');
            $this->db->where('purchaseid',$id);
			$this->db->where('proid',$product_id);
            $query = $this->db->get();
			if ($query->num_rows() > 0) {
				
				$dataupdate = array(
					'purchaseid'		=>	$id,
					'proid'		        =>	$product_id,
					'quantity'			=>	$product_quantity,
					'price'				=>	$product_rate,
					'totalprice'		=>	$total_price,
					'purchaseby'		=>	$saveid,
					'purchasedate'		=>	$newdate,
					'purchaseexpiredate'=>	$exdate
				);	
				$oldpurchase = $this->db->select("quantity")->from("purchase_details")->where('proid',$product_id)->where('purchaseid', $id)->get()->row();
				$oldstock = $this->db->select("stock")->from("products")->where('id',$product_id)->get()->row();
				$oldreadystock = $this->db->select("ready")->from("tbl_reuseableproduct")->where('product_id',$product_id)->get()->row();
				$newstock = $oldstock->stock + $product_quantity - $oldpurchase->quantity;
				$newreadystock = $oldreadystock->ready + $product_quantity - $oldpurchase->quantity;
				$stupdata = array(
					'id'			    =>	$product_id,
					'stock'			=>	$newstock,
				);
				if(!empty($quantity))
				{
					$this->db->where('purchaseid', $id);
					$this->db->where('proid', $product_id);
					$this->db->update('purchase_details', $dataupdate);
					$this->db->where('id',$product_id)->update('products',array('stock'=>$newstock));
					$this->db->where('product_id',$product_id)->update('tbl_reuseableproduct',array('ready'=>$newreadystock));
				}
			  }
			else{
				$data1 = array(
					'purchaseid'		=>	$id,
					'proid'		        =>	$product_id,
					'quantity'			=>	$product_quantity,
					'price'				=>	$product_rate,
					'totalprice'		=>	$total_price,
					'purchaseby'		=>	$saveid,
					'purchasedate'		=>	$newdate
				);
				if(!empty($quantity))
				{
					$this->db->insert('purchase_details',$data1);
					$this->db->where('id',$product_id)->update('products',array('stock'=>$newstock));
				}
			}
		}
		
		$this->db->select('*');
		$this->db->from('purchase_details');
		$this->db->where('purchaseid',$id);
		$query = $this->db->get();
		$details=$query->result_array();
		$test=array();
		$k=0;
		foreach($details as $single){
			$k++;
			$test[$k]=$single['proid'];
			}
		$result=array_diff($test,$p_id);
		if(!empty($result)){
			foreach($result as $delval){
				$this->db->where('proid', $delval);
				$this->db->where('purchaseid',$id);
				$del=$this->db->delete('purchase_details',TRUE); 
				}
		}
		
		$supinfo =$this->db->select('*')->from('supplier')->where('supid',$oldsupplier)->get()->row();
		$sup_head = $supinfo->suplier_code.'-'.$supinfo->supName;
		$sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
		
		$trans_coa = $this->db->select('*')->from('acc_transaction')->where('VNo',$oldinvoice)->where('COAID','10107')->get()->row();
		$updateid=$trans_coa->ID;
		$invoice=$this->input->post('invoice_no',TRUE);
		$invoicetotal=$this->input->post('grand_total_price',TRUE);
		$change_amount = $trans_coa->Debit - $invoicetotal;
		$total_amount = $supinfo->total_amount + $change_amount;
		$due_amount = $supinfo->due_amount + $change_amount;
		$this->db->where('supid',$oldsupplier)->update("supplier",array("total_amount"=>$total_amount,"due_amount"=>$due_amount));
		//inventory debited update 
		transaction_update($updateid, $invoice, $newdate, $invoicetotal, 0, $saveid, $newdate);
			
	
		$store_inventory = $this->db->select('*')->from('acc_transaction')->where('VNo',$oldinvoice)->where('COAID','1020101')->get()->row();
	    $updateinventoryid=$store_inventory->ID;
			
		$supold_coa= $this->db->select('*')->from('acc_transaction')->where('VNo',$oldinvoice)->where('COAID',$sup_coa->HeadCode)->where('Credit>',0)->get()->row();	
		$updatesupid=$supold_coa->ID;
		
		$supold_coa= $this->db->select('*')->from('acc_transaction')->where('VNo',$oldinvoice)->where('COAID',$sup_coa->HeadCode)->where('Debit>',0)->get()->row();	
		$Debitupdatesupid=$supold_coa->ID;
		
		//  Supplier credit
		transaction_update($updatesupid, $invoice, $newdate, 0, $invoicetotal, $saveid, $newdate);
	
	  // Supplier Debit for cash Amount
	//     $podebitpaidamount = array(
	// 	  'VNo'            =>  $invoice,
	// 	  'VDate'          =>  $newdate,
	// 	  'Debit'         =>   $this->input->post('grand_total_price',TRUE),
	// 	  'UpdateBy'       =>  $saveid,
	// 	  'UpdateDate'     =>  $newdate,
    // 	); 
    //    $this->db->where('ID',$Debitupdatesupid);
    //    $this->db->update('acc_transaction',$podebitpaidamount);	
	   
	   //Cash in Hand  Cdedit.
	    // $creditcashpaidamount = array(
		//   'VNo'            =>  $invoice,
		//   'VDate'          =>  $newdate,
		//   'Credit'         =>  $this->input->post('grand_total_price',TRUE),// paid amount*****
		//   'UpdateBy'       =>  $saveid,
		//   'UpdateDate'     =>  $newdate,
    	// ); 
        // $this->db->where('ID',$updateinventoryid);
	    // $this->db->update('acc_transaction',$creditcashpaidamount);
		return true;
	
	
	}
	
	
	public function makeproduction()
	{
		$saveid=$this->session->userdata('id');
		$p_id = $this->input->post('product_id', TRUE);
		$purchase_date = str_replace('/','-',$this->input->post('purchase_date', TRUE));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$data=array(
			'itemid'				=>	$this->input->post('foodid',TRUE),
			'itemquantity'			=>	$this->input->post('pro_qty',TRUE),
			'saveddate'		    	=>	$newdate,
			'savedby'			    =>	$saveid
		);
		$this->db->insert('production',$data);
		$returnid = $this->db->insert_id();
		$quantity = $this->input->post('product_quantity', TRUE);
		
		for ($i=0, $n=count($p_id); $i < $n; $i++) {
			$product_quantity = $quantity[$i];
			$product_id = $p_id[$i];
			
			$data1 = array(
				'productionid'		=>	$returnid,
				'ingredientid'		=>	$product_id,
				'qty'				=>	$product_quantity,
				'createdby'			=>	$saveid,
				'created_date'		=>	$newdate
			);

			if(!empty($quantity))
			{
				$this->db->insert('production_details',$data1);
			}
		}
		return true;
	
	}

    public function read()
	{
	    $this->db->select('purchaseitem.*,supplier.supName');
        $this->db->from($this->table);
		$this->db->join('supplier','purchaseitem.suplierID = supplier.supid','left');
        $this->db->order_by('purID', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('purID',$id) 
			->get()
			->row();
	}
	public function settinginfo()
	{ 
		return $this->db->select("*")->from('setting')
			->get()
			->row();
	}
	public function currencysetting($id = null)
	{ 
		return $this->db->select("*")->from('currency')
			->where('currencyid',$id) 
			->get()
			->row();
	} 
	public function checkitem($product_name)
	{ 
	$this->db->select('*');
	$this->db->from('products');
	$this->db->where('is_active',1);
	$this->db->where('product_name', $product_name);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return $query->result_array();	
	}
	return false;
	}
	public function finditem($product_name)
		{ 
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('is_active',1);
		$this->db->like('product_name', $product_name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
		}
	public function get_total_product($product_id){
		$this->db->select('SUM(quantity) as total_purchase');
		$this->db->from('purchase_details');
		$this->db->where('proid',$product_id);
		$total_purchase = $this->db->get()->row();
		
		$available_quantity = $total_purchase->total_purchase ;
		
		$data2 = array(
			'total_purchase'  => $available_quantity
			);
		

		return $data2;
		}
 public function iteminfo($id){
	 	$isPaid = $this->db->select("status")->from("purchaseitem")->where("purID", $id)->get()->row();
	 	$this->db->select('purchase_details.*,products.id,products.product_name,unit_of_measurement.uom_short_code');
		$this->db->from('purchase_details');
		$this->db->join('products','purchase_details.proid=products.id','left');
		$this->db->join('unit_of_measurement','unit_of_measurement.id = products.uom_id','inner');
		$this->db->where('purchaseid',$id);
		$query = $this->db->get();
		if (!empty($isPaid)) {
			$isPaid->details = $query->result();
			return $isPaid;	
		}
		return false;
		
	 }
//item Dropdown
 public function item_dropdown()
	{
		$data = $this->db->select("*")
			->from('item_foods')
			->get()
			->result();

		$list[''] = 'Select '.display('item_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->ProductsID] = $value->ProductName;
			return $list;
		} else {
			return false; 
		}
	}
 //ingredient Dropdown
 public function ingrediant_dropdown()
	{
		$data = $this->db->select("*")
			->from('products')
			->where('is_active',1) 
			->get()
			->result();

		$list[''] = 'Select '.display('item_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->id] = $value->product_name;
			return $list;
		} else {
			return false; 
		}
	}
//item Dropdown
 public function supplier_dropdown()
	{
		$data = $this->db->select("*")
			->from('supplier')
			->get()
			->result();

		$list[''] = display('supplier_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->supid] = $value->supName;
			return $list;
		} else {
			return false; 
		}
	}
	public function product_dropdown()
	{
		$data = $this->db->select("*")
			->from('products')
			->get()
			->result();

		$list[''] = 'Select '.display('product_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->id] = $value->product_name;
			return $list;
		} else {
			return false; 
		}
	}
public function suplierinfo($id){
	return $this->db->select("*")->from('supplier')
			->where('supid',$id) 
			->get()
			->row();
	
	}
public function countlist()
	{
		
	    $this->db->select('purchaseitem.*,supplier.supName');
        $this->db->from($this->table);
		$this->db->join('supplier','purchaseitem.suplierID = supplier.supid','left');
		
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
 public function invoicebysupplier($id){
	 	 $this->db->select('*');
         $this->db->from($this->table);
		 $this->db->where('suplierID',$id);
		 $this->db->where('status',0);
		 $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	 }
public function getinvoice($id){
	 	 $this->db->select('*');
         $this->db->from($this->table);
		 $this->db->where('invoiceid',$id);
		 $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();  
        }
        return false;
	 }
	public function pur_return_insert(){
				/*purchase Return Insert*/
				$po_no =  $this->input->post('invoice',TRUE);
				$createby=$this->session->userdata('id');
				$createdate=date('Y-m-d H:i:s');
				$postData = array(
				'po_no'			        =>	$po_no,
				'supplier_id'		    =>	$this->input->post('supplier_id', TRUE),
				'return_date'           =>  $this->input->post('return_date',TRUE),
				'totalamount'           =>  $this->input->post('grand_total_price',TRUE),
				'return_reason'         =>  $this->input->post('reason',TRUE),
				'createby'		        =>	$createby,
				'createdate'		    =>	$createdate
				); 
				$grand_total_price=$this->input->post('grand_total_price',TRUE);
				$this->db->insert('purchase_return',$postData);
				$id =$this->db->insert_id();
				/***************End**********************/
				/*update Purchase stock and Amount*/
				 $this->db->select('*');
                 $this->db->from($this->table);
				 $this->db->where('invoiceid',$po_no);
				 $query = $this->db->get();
				 $purchase= $query->row();
				 $purchaseid=$purchase->purID;
				 $updategrandtotal=$purchase->total_price-$grand_total_price;
				 $updateData = array('total_price'   =>	$updategrandtotal);
				 $this->db->where('invoiceid',$po_no)
				 ->update('purchaseitem', $updateData); 
				/***************End**********************/
				
				$p_id = $this->input->post('product_id',TRUE);
				$pq = $this->input->post('total_price',TRUE);
				$rate = $this->input->post('prate',TRUE);
				$quantity = $this->input->post('total_qntt',TRUE);
				$discount = $this->input->post('discount',TRUE);
				for ($i=0, $n=count($p_id); $i < $n; $i++) {
					$product_quantity = $quantity[$i];
					$product_rate = $rate[$i];
					$product_id = $p_id[$i];
					$single_discount = $discount[$i];
					$removeprice=$pq[$i];
					if($product_quantity>0){
					$data = array(
					'preturn_id'        =>  $id,
					'product_id'		=>	$product_id,
					'qty'			    =>	$product_quantity,
					'product_rate'	    =>	$rate[$i],
					'discount'	    =>	(!empty($single_discount)?$single_discount:0)*$product_quantity,
					);

					$oldstock = $this->db->select("stock")->from("products")->where('id',$product_id)->get()->row();
					$oldreadystock = $this->db->select("ready")->from("tbl_reuseableproduct")->where('product_id',$product_id)->get()->row();
					$newstock = $oldstock->stock - $product_quantity;
					$newreadystock = $oldreadystock->ready - $product_quantity;
					$strdata = array(
						'id'			    =>	$product_id,
						'stock'			=>	$newstock,
					);

					 $this->db->insert('purchase_return_details',$data);
					 $this->db->select('*');
					 $this->db->from('purchase_details');
					 $this->db->where('purchaseid',$purchaseid);
					 $this->db->where('proid',$product_id);
					 $query = $this->db->get();
					  if ($query->num_rows() > 0) {
					 $purchasedetails= $query->row();
					 $rateprice=$product_quantity*$product_rate;
					 $qtotalpr=$purchasedetails->totalprice-$removeprice;
					 $adjustqty=$purchasedetails->quantity-$product_quantity;

					$qtyData = array(
					'quantity'   =>	$adjustqty,
					'price'   =>	$qtotalpr/$adjustqty,
					'totalprice'   => $qtotalpr);
					 $this->db->where('purchaseid',$purchaseid)
					->where('proid',$product_id)
					->update('purchase_details', $qtyData);
					$this->db->where('id',$product_id)->update('products',$strdata);
					$this->db->where('product_id',$product_id)->update('tbl_reuseableproduct',array('ready'=>$newreadystock));
					  }
					  }
				}
		$recv_id = date('YmdHis');
		$supinfo =$this->db->select('*')->from('supplier')->where('supid',$this->input->post('supplier_id', TRUE))->get()->row();
		$sup_head = $supinfo->suplier_code.'-'.$supinfo->supName;
		$sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();

	    //  Supplier debit
	  
	    $invoice = $this->input->post('invoice',TRUE);
		$total_amount = $supinfo->total_amount - $grand_total_price;
		$due_amount = $supinfo->due_amount - $grand_total_price;
		$this->db->where('supid',$this->input->post('supplier_id', TRUE))->update("supplier",array("total_amount"=>$total_amount,"due_amount"=>$due_amount));
		//sup debited
	    $narration = 'P Return For '.$po_no;
	    transaction($invoice, 'PO', $createdate, $sup_coa->HeadCode, $narration, $grand_total_price, 0, 0, 1, $createby, $createdate, 1);
		//inventory credited
	    $narration = 'P Return inventory credited For '.$po_no;
	    transaction($invoice, 'PO', $createdate, 10107, $narration, 0, $grand_total_price, 0, 1, $createby, $createdate, 1);
	    // Acc transaction
	    // $narration = 'Purchase Return For PO No'.$po_no;
	    // transaction($invoice, 'PO', $createdate, 10107, $narration, 0, $grand_total_price, 0, 1, $createby, $createdate, 1);
		return true;
		}
	public function readinvoice()
	{
	    $this->db->select('purchase_return.*,supplier.supName');
        $this->db->from('purchase_return');
		$this->db->join('supplier','purchase_return.supplier_id = supplier.supid','left');
        $this->db->order_by('purchase_return.preturn_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 	
	public function countreturnlist()
	{
		
	    $this->db->select('purchase_return.*,supplier.supName');
        $this->db->from('purchase_return');
		$this->db->join('supplier','purchase_return.supplier_id = supplier.supid','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
  public function findByreturnId($id = null)
	{ 
		 $this->db->select('purchase_return.*,supplier.supName');
        $this->db->from('purchase_return');
		$this->db->join('supplier','purchase_return.supplier_id = supplier.supid','left');
		$this->db->where('preturn_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();  
        }
        return false;
	}
  public function returniteminfo($id){
	 	$this->db->select('purchase_return_details.*,products.product_name,unit_of_measurement.uom_short_code');
		$this->db->from('purchase_return_details');
		$this->db->join('products','purchase_return_details.product_id=products.id','left');
		$this->db->join('unit_of_measurement','unit_of_measurement.id = products.uom_id','inner');
		$this->db->where('preturn_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();	
		}
		return false;
		
	 }
	 public function checkinvoice($invoice)
	 { 
	 $this->db->select('invoiceid');
	 $this->db->from('purchaseitem');
	 $this->db->where('invoiceid', $invoice);
	 $query = $this->db->get();
	 if ($query->num_rows() > 0) {
		 return $query->row();	
	 }
	 return false;
	 }
}
