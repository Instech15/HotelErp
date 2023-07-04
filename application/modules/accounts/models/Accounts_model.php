<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model {


     function get_userlist()
    {
        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsActive',1);
        $this->db->order_by('HeadName');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    function dfs($HeadName,$HeadCode,$oResult,$visit,$d)
    {
        if($d==0) echo "<li>$HeadName";
        else      echo "<li><a href='javascript:' onclick=\"loadData('".$HeadCode."')\">$HeadName</a>";
        $p=0;
        for($i=0;$i< count($oResult);$i++)
        {

            if (!$visit[$i])
            {
                if ($HeadName==$oResult[$i]->PHeadName)
                {
                    $visit[$i]=true;
                    if($p==0) echo "<ul>";
                    $p++;
                    $this->dfs($oResult[$i]->HeadName,$oResult[$i]->HeadCode,$oResult,$visit,$d+1);
                }
            }
        }
        if($p==0)
            echo "</li>";
        else
            echo "</ul>";
    }

// Accounts list
    public function Transacc()
    {
      return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->where('IsTransaction', 1)  
            ->where('IsActive', 1) 
            ->order_by('HeadName')
            ->get()
            ->result();
    }
	
// Credit Account Head
     public function Cracc()
    {
      return  $data = $this->db->select("*")
            ->from('acc_coa') 
            ->like('HeadCode',1020102, 'after')
            ->where('IsTransaction', 1) 
            ->where('IsActive', 1) 
            ->order_by('HeadName')
            ->get()
            ->result();
    }
	
    // Insert Debit voucher 
    public function insert_debitvoucher(){
           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
            $Vtype="DV";
            $cAID = $this->input->post('cmbDebit',TRUE);
            $dAID = $this->input->post('txtCode',TRUE);
            $Debit =$this->input->post('txtAmount',TRUE);
            $Credit= $this->input->post('grand_total',TRUE);
            $VDate = $this->input->post('dtpDate',TRUE);
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $IsPosted=1;
            $IsAppove=0;
            $CreateBy=$this->session->userdata('id',TRUE);
           $createdate=date('Y-m-d H:i:s');
           transaction($voucher_no, $Vtype, $VDate, $cAID, $Narration, 0, $Credit, 0, $IsPosted, $CreateBy, $createdate, 0);

            for ($i=0; $i < count($dAID); $i++) {
                $dbtid=$dAID[$i];
                $Damnt=$Debit[$i];
                transaction($voucher_no, $Vtype, $VDate, $dbtid, $Narration, $Damnt, 0, 0, $IsPosted, $CreateBy, $createdate, 0);
            }
            //Account Income Expense
            for ($i=0; $i < count($dAID); $i++) {
                $dbtid=$dAID[$i];
                $Damnt=$Debit[$i];
           
            $debitinsert = array(
    'VNo'            =>  $voucher_no,
    'Vtype'          =>  $Vtype,
    'Date'           =>  $VDate,
    'COAID'          =>  $dbtid,
    'Narration'      =>  $Narration,
    'Amount'         =>  $Damnt,
    'Paymode'        =>  'Cash',
    'StoreID'        => 0,
    'CreateBy'       => $CreateBy,
    'CreateDate'     => $createdate,
    'IsApprove'       => 0
    ); 
              $this->db->insert('acc_income_expence',$debitinsert);

    }
    return true;
}

// Update debit voucher
   public function update_debitvoucher(){
           $voucher_no = $this->input->post('txtVNo',TRUE);
            $Vtype="DV";
            $cAID = $this->input->post('cmbDebit',TRUE);
            $dAID = $this->input->post('txtCode',TRUE);
            $Debit =$this->input->post('txtAmount',TRUE);
            $Credit= $this->input->post('grand_total',TRUE);
            $VDate = $this->input->post('dtpDate',TRUE);
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $IsPosted=1;
            $IsAppove=0;
            $CreateBy=$this->session->userdata('id');
           $createdate=date('Y-m-d H:i:s');

            $this->db->where('VNo',$voucher_no)
            ->delete('acc_transaction');
            transaction($voucher_no, $Vtype, $VDate, $cAID, $Narration, 0, $Credit, 0, $IsPosted, $CreateBy, $createdate, 0);
            for ($i=0; $i < count($dAID); $i++) {
                $dbtid=$dAID[$i];
                $Damnt=$Debit[$i];
           
                transaction($voucher_no, $Vtype, $VDate, $dbtid, $Narration, $Damnt, 0, 0, $IsPosted, $CreateBy, $createdate, 0);

    }
    //Account Income Expense

              for ($i=0; $i < count($dAID); $i++) {
                  $dbtid=$dAID[$i];
                  $Damnt=$Debit[$i];
             
              $debitinsert = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'Date'           =>  $VDate,
      'COAID'          =>  $dbtid,
      'Narration'      =>  $Narration,
      'Amount'         =>  $Damnt,
      'Paymode'        =>  'Cash',
      'StoreID'        => 0,
      'CreateBy'       => $CreateBy,
      'CreateDate'     => $createdate,
      'IsApprove'       => 0
      ); 
                $this->db->insert('acc_income_expence',$debitinsert);
  
      }
    return true;
}
//Generate Voucher No
public function voNO()
    {
      return  $data = $this->db->select("Max(VNo) as voucher")
            ->from('acc_transaction') 
            ->like('VNo', 'DV-', 'after')
            ->get()
            ->row();
    }
    // Credit voucher no
    public function crVno()
    {
      return  $data = $this->db->select("Max(VNo) as voucher")
            ->from('acc_transaction') 
            ->like('VNo', 'CV-', 'after')
            ->get()
            ->row();
    }
 // Contra voucher 
    public function contra()
    {
      return  $data = $this->db->select("Max(VNo) as voucher")
            ->from('acc_transaction') 
            ->like('VNo', 'Contra-', 'after')
            ->get()
            ->row();
    }
  // Insert Credit voucher 
    public function insert_creditvoucher(){
           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
            $Vtype="CV";
            $dAID = $this->input->post('cmbDebit',TRUE);
            $cAID = $this->input->post('txtCode',TRUE);
            $Credit =$this->input->post('txtAmount',TRUE);
            $debit= $this->input->post('grand_total',TRUE);
            $VDate = $this->input->post('dtpDate',TRUE);
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $IsPosted=1;
            $IsAppove=0;
            $CreateBy=$this->session->userdata('id');
           $createdate=date('Y-m-d H:i:s');
           transaction($voucher_no, $Vtype, $VDate, $dAID, $Narration, $debit, 0, 0, $IsPosted, $CreateBy, $createdate, 0);

            for ($i=0; $i < count($cAID); $i++) {
                $crtid=$cAID[$i];
                $Cramnt=$Credit[$i];
           
                transaction($voucher_no, $Vtype, $VDate, $crtid, $Narration, 0, $Cramnt, 0, $IsPosted, $CreateBy, $createdate, 0);
    }
    //Account Income Expense
      for ($i=0; $i < count($dAID); $i++) {
        $crtid=$cAID[$i];
        $Cramnt=$Credit[$i];
             
      $debitinsert = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'Date'           =>  $VDate,
      'COAID'          =>  $crtid,
      'Narration'      =>  $Narration,
      'Amount'         =>  $Cramnt,
      'Paymode'        =>  'Cash',
      'StoreID'        => 0,
      'CreateBy'       => $CreateBy,
      'CreateDate'     => $createdate,
      'IsApprove'       => 0
      ); 
      $this->db->insert('acc_income_expence',$debitinsert);
    }
    return true;
}

// Insert Countra voucher 
     public function insert_contravoucher() {
        $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
        $Vtype = "Contra";
        $dAID = $this->input->post('cmbDebit',TRUE);
        $cAID = $this->input->post('txtCode',TRUE);
        $debit = $this->input->post('txtAmount',TRUE);
        $credit = $this->input->post('txtAmountcr',TRUE);
        $VDate = $this->input->post('dtpDate',TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('id',TRUE);
        $createdate = date('Y-m-d H:i:s');
        for ($i = 0; $i < count($cAID); $i++) {
            transaction($voucher_no, $Vtype, $VDate, $cAID[$i], $Narration, $debit[$i], $credit[$i], 0, $IsPosted, $CreateBy, $createdate, 0);
        }
        return true;
    }
// Insert journal voucher 
    public function insert_journalvoucher() {
        $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
        $Vtype = "JV";
        $dAID = $this->input->post('cmbDebit',TRUE);
        $cAID = $this->input->post('txtCode',TRUE);
        $debit = $this->input->post('txtAmount',TRUE);
        $credit = $this->input->post('txtAmountcr',TRUE);
        $VDate = $this->input->post('dtpDate',TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('id',TRUE);
        $createdate = date('Y-m-d H:i:s');
        for ($i = 0; $i < count($cAID); $i++) {
            transaction($voucher_no, $Vtype, $VDate, $cAID[$i], $Narration, $debit[$i], $credit[$i], 0, $IsPosted, $CreateBy, $createdate, 0);
        }
        return true;
    }
// journal voucher
public function journal()
    {
      return  $data = $this->db->select("Max(VNo) as voucher")
            ->from('acc_transaction') 
            ->like('VNo', 'Journal-', 'after')
            ->get()
            ->row();
    }

    // voucher Aprove 
    public function approve_voucher(){
        $values = array("DV", "CV", "JV","Contra");
      
       return $approveinfo = $this->db->select('*,SUM(Debit) as totaldebit,SUM(Credit) as totalcredit')
                           ->from('acc_transaction')
                           ->where_in('Vtype',$values)
                           ->where('IsAppove',0)
                           ->group_by('VNo')
                           ->get()
                           ->result();
    }
//approved
        public function approved($data = [])
    {
        return $this->db->where('VNo',$data['VNo'])
            ->update('acc_transaction',$data); 
    } 
        public function approvedIncome($data = [])
    {
        return $this->db->where('VNo',$data['VNo'])
            ->update('acc_income_expence',$data); 
    } 

    //debit update voucher
    public function dbvoucher_updata($id){
      return  $vou_info = $this->db->select('*')
                 ->from('acc_transaction')
                 ->where('VNo',$id)
                 ->where('Credit <',1)
                 ->get()
                 ->result();
    }

     //credit voucher update 
    public function crdtvoucher_updata($id){
      return  $vou_info = $this->db->select('*')
                 ->from('acc_transaction')
                 ->where('VNo',$id)
                 ->where('Debit <',1)
                 ->get()
                 ->result();
    }
	
	 public function journalCrebitVoucher_edit($id) {
        return $vou_info = $this->db->select('*')
                ->from('acc_transaction')
                ->where('VNo', $id)
                ->get()
                ->result();
    }
    //Debit voucher inof
     //credit voucher update 
    public function debitvoucher_updata($id){
      return $cr_info = $this->db->select('*')
                 ->from('acc_transaction')
                 ->where('VNo',$id)
                 ->where('Credit<',1)
                 ->get()
                 ->row();
    }
     // debit update voucher credit info
    public function crvoucher_updata($id){
       return $v_info = $this->db->select('*')
                 ->from('acc_transaction')
                 ->where('VNo',$id)
                 ->where('Debit<',1)
                 ->get()
                 ->row();
    }

    // update Credit voucher
     public function update_creditvoucher(){
           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
            $Vtype="CV";
            $dAID = $this->input->post('cmbDebit',TRUE);
            $cAID = $this->input->post('txtCode',TRUE);
            $Credit =$this->input->post('txtAmount',TRUE);
            $debit= $this->input->post('grand_total',TRUE);
            $VDate = $this->input->post('dtpDate',TRUE);
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $IsPosted=1;
            $IsAppove=0;
            $CreateBy=$this->session->userdata('id',TRUE);
           $createdate=date('Y-m-d H:i:s');

           $this->db->where('VNo',$voucher_no)
           ->delete('acc_transaction');
           
           transaction($voucher_no, $Vtype, $VDate, $dAID, $Narration, $debit, 0, 0, $IsPosted, $CreateBy, $createdate, 0);
            for ($i=0; $i < count($cAID); $i++) {
                $crtid=$cAID[$i];
                $Cramnt=$Credit[$i];
           
                transaction($voucher_no, $Vtype, $VDate, $crtid, $Narration, 0, $Cramnt, 0, $IsPosted, $CreateBy, $createdate, 0);

            }
        //Account Income Expense
        for ($i=0; $i < count($dAID); $i++) {
            $crtid=$cAID[$i];
            $Cramnt=$Credit[$i];
         
          $debitinsert = array(
  'VNo'            =>  $voucher_no,
  'Vtype'          =>  $Vtype,
  'Date'           =>  $VDate,
  'COAID'          =>  $crtid,
  'Narration'      =>  $Narration,
  'Amount'         =>  $Cramnt,
  'Paymode'        =>  'Cash',
  'StoreID'        => 0,
  'CreateBy'       => $CreateBy,
  'CreateDate'     => $createdate,
  'IsApprove'       => 0
  ); 
            $this->db->insert('acc_income_expence',$debitinsert);

  }
    return true;
}
 //contra voucher update 
    public function contravoucher_updata($id){
      return  $vou_info = $this->db->select('*')
                 ->from('acc_transaction')
                 ->where('VNo',$id)
                 ->get()
                 ->result();
    }
 //Trial Balance Report 
    public function trial_balance_report($FromDate,$ToDate,$WithOpening){

        if($WithOpening)
            $WithOpening=true;
        else
            $WithOpening=false;

        $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND IsActive=1 AND HeadType IN ('A','E') ORDER BY HeadCode";
        $oResultTr = $this->db->query($sql);
        
        $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND IsActive=1 AND HeadType IN ('L','I') ORDER BY HeadCode";
        $oResultInEx = $this->db->query($sql);

        $data = array(
            'oResultTr'   => $oResultTr->result_array(),
            'oResultInEx' => $oResultInEx->result_array(),
            'WithOpening' => $WithOpening
        );

        return $data;
    }

     //al hassan working
      public  function get_vouchar(){


         $date=date('Y-m-d');
          $sql="SELECT VNo, Vtype,VDate, Narration, IsAppove, SUM(Debit+Credit)/2 as Amount FROM acc_transaction  WHERE VDate='$date' AND VType IN ('DV','JV','CV') GROUP BY VNO, Vtype, VDate ORDER BY VDate";
          $query = $this->db->query($sql);
          return $query->result();
    }
    //al hassan working
    public  function get_vouchar_view($date){
        $sql="SELECT acc_income_expence.COAID,SUM(acc_income_expence.Amount) AS Amount,acc_income_expence.IsApprove, acc_coa.HeadName FROM acc_income_expence INNER JOIN acc_coa ON acc_coa.HeadCode=acc_income_expence.COAID WHERE VNo='$date' AND acc_income_expence.IsApprove=1 AND acc_income_expence.Paymode='Cash' GROUP BY acc_income_expence.COAID, acc_coa.HeadName ORDER BY acc_coa.HeadName";
        $query = $this->db->query($sql);
        $data = $query->result();
        if(empty($data)){
            $sql="SELECT acc_transaction.COAID,(SUM(acc_transaction.Debit)) AS Amount, acc_coa.HeadName FROM acc_transaction INNER JOIN acc_coa ON acc_coa.HeadCode=acc_transaction.COAID WHERE acc_transaction.VDate='$date' AND acc_transaction.COAID='1020101' GROUP BY acc_transaction.COAID, acc_coa.HeadName ORDER BY acc_coa.HeadName";
            $query = $this->db->query($sql);
            $data = $query->result();
            if(!empty($data)){
                $data[0]->IsApprove=1;
            }
        }
        return $data;
    }
    //al hassan working
    public  function get_cash(){
        $date=date('Y-m-d');

        $sql="SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$date' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";
        $query = $this->db->query($sql);
        $data = $query->row();
        $sql1="SELECT SUM(acc_income_expence.Amount) as Amount FROM acc_income_expence WHERE Date='$date' AND acc_income_expence.IsApprove=1 AND acc_income_expence.Paymode='Cash' GROUP BY acc_income_expence.COAID";
        $query1 = $this->db->query($sql1);
        $data1 = $query1->row();
        $data->Amount += (!empty($data1->Amount)?$data1->Amount:0);
        return $data;
    }
    //al hassan working
    public  function get_general_ledger(){

        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsGL',1);
        $this->db->where('IsActive',1);
        $this->db->order_by('HeadName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    //al hassan working
    public function general_led_get($Headid){
        $sql="SELECT * FROM acc_coa WHERE HeadCode='$Headid' ";
        $query = $this->db->query($sql);
        $rs=$query->row();


        $sql="SELECT * FROM acc_coa WHERE IsTransaction=1 AND PHeadName='".$rs->HeadName."' ORDER BY HeadName";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function voucher_report_serach($vouchar){
        $sql="SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$vouchar' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";
        $query = $this->db->query($sql);
        $data = $query->row();
        $sql1="SELECT SUM(acc_income_expence.Amount) as Amount FROM acc_income_expence WHERE Date='$vouchar' AND acc_income_expence.IsApprove=1 AND acc_income_expence.Paymode='Cash' GROUP BY acc_income_expence.COAID";
        $query1 = $this->db->query($sql1);
        $data1 = $query1->row();
        $data->Amount += (!empty($data1->Amount)?$data1->Amount:0);
        return $data;
    }
    public function IEvoucher_report_serach($vouchar){
        $sql="SELECT * FROM acc_income_expence WHERE Date='$vouchar' AND IsApprove='1'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function general_led_report_headname($cmbGLCode){
        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('HeadCode',$cmbGLCode);
        $this->db->where('IsActive',1);
        $query = $this->db->get();
        return $query->row();
    }
    public function general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction){

            if($chkIsTransction){
                $this->db->select('acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Narration, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID,acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType');
                $this->db->from('acc_transaction');
                $this->db->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left');
                $this->db->where('acc_transaction.IsAppove',1);
                $this->db->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"');
                $this->db->where('acc_transaction.COAID',$cmbCode);
                $query = $this->db->get();
                return $query->result();
            }
            else{
                $this->db->select('acc_transaction.COAID,acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType');
                $this->db->from('acc_transaction');
                $this->db->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left');
                $this->db->where('acc_transaction.IsAppove',1);
                $this->db->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"');
                $this->db->where('acc_transaction.COAID',$cmbCode);
                $query = $this->db->get();
                return $query->result();
            }
    }
    // prebalance calculation
      public function general_led_report_prebalance($cmbCode,$dtpFromDate){
                $this->db->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit');
                $this->db->from('acc_transaction');
                $this->db->where('acc_transaction.IsAppove',1);
                $this->db->where('VDate < ',$dtpFromDate);
                $this->db->where('acc_transaction.COAID',$cmbCode);
                $query = $this->db->get()->row();
                return $balance=$query->predebit - $query->precredit;

    }

    public function get_status(){

        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsTransaction',1);
        $this->db->where('IsActive',1);
        $this->db->like('HeadCode','1020102','after');
        $this->db->order_by('HeadName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
   
     //Profict loss report search
    public function profit_loss_serach(){
       
        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='I'";
        $sql1 = $this->db->query($sql);

        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='E'";
        $sql2 = $this->db->query($sql);
        
        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadCode='5020303'";
        $sql3 = $this->db->query($sql);
        
        $data = array(
          'oResultAsset'     => $sql1->result(),
          'oResultLiability' => $sql2->result(),
          'oResultTax' => $sql3->result(),
        );
        return $data;
    } 
    public function profit_loss_serach_date($dtpFromDate,$dtpToDate){
       $sqlF="SELECT  acc_transaction.VDate, acc_transaction.COAID, acc_coa.HeadName FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND acc_transaction.IsAppove = 1 AND  acc_transaction.COAID LIKE '301%'";
       $query = $this->db->query($sqlF);
       return $query->result();
    }

    public function fixed_assets()
	{
      return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Assets')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function liabilities_data()
	{
	  return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Liabilities')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function income_fields()
	{
	  return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Income')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function expense_fields()
	{
	   return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Expence')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
    public function assets_info($head_name)
	{
			 $this->db->select("*");
			 $this->db->from('acc_coa');
			 $this->db->where('PHeadName',$head_name);
			 $this->db->where('IsActive',1);
			 $this->db->group_by('HeadCode');
		   return  $records = $this->db->get()->result_array();     
	
	} 
	
	public function asset_childs($head_name,$from_date,$to_date)
	{
			 $this->db->select("*");
			 $this->db->from('acc_coa');
			 $this->db->where('PHeadName',$head_name);
             $this->db->where('IsActive',1);
			 $this->db->group_by('HeadCode');
		   return  $records = $this->db->get()->result_array();    
	}
	
	public function assets_balance($head_code,$from_date,$to_date)
	{
			 $this->db->select("(sum(Debit)-sum(Credit)) as balance");
			 $this->db->from('acc_transaction');
			 $this->db->where('COAID',$head_code);
			 $this->db->where('VDate >=',$from_date);
			 $this->db->where('VDate <=',$to_date);
			 $this->db->where('IsAppove',1);
		   return  $records = $this->db->get()->result_array(); 
	}
	public function liabilities_info($head_name)
	{
	
			 $this->db->select("*");
			 $this->db->from('acc_coa');
			 $this->db->where('PHeadName',$head_name);
             $this->db->where('IsActive',1);
		   return  $records = $this->db->get()->result_array();   
	
	}
	public function liabilities_balance($head_code,$from_date,$to_date)
	{
	   $this->db->select("(sum(Credit)-sum(Debit)) as balance,COAID");
			 $this->db->from('acc_transaction');
			 $this->db->where('COAID',$head_code);
			 $this->db->where('VDate >=',$from_date);
			 $this->db->where('VDate <=',$to_date);
			 $this->db->where('IsAppove',1);
		   return  $records = $this->db->get()->result_array(); 
	}
	public function income_balance($head_code,$from_date,$to_date)
	{
			$this->db->select("(sum(Debit)-sum(Credit)) as balance,COAID");
			 $this->db->from('acc_transaction');
			 $this->db->where('COAID',$head_code);
			 $this->db->where('VDate >=',$from_date);
			 $this->db->where('VDate <=',$to_date);
			 $this->db->where('IsAppove',1);
		   return  $records = $this->db->get()->result_array(); 
	}
    function get_yearlist()
    {
        $this->db->select('*');
        $this->db->from('tbl_financialyear');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function ob_headcode()
    {
        $data = $this->db->select("*")
            ->from('acc_coa')
            ->where('IsTransaction', 1)  
            ->where('IsActive', 1) 
            ->order_by('HeadName')
            ->get()
            ->result();

        foreach($data as $k => $val){
            if(substr($val->HeadCode,0,1)!=2 & ($val->HeadType=="A" | $val->HeadType=="L")){
                $data[$k]->HeadCode = $val->HeadCode;
                $data[$k]->HeadName = $val->HeadName;
            }else{
                unset($data[$k]);
            }
        }
        return $data;
    }
    //debit voucber head
    public function debit_headcode()
    {
        $data = $this->db->select("*")
        ->from('acc_coa')
        ->where('IsTransaction', 1)  
        ->where('IsActive', 1) 
        ->order_by('HeadName')
        ->get()
        ->result();

        foreach($data as $k => $val){
            if($val->HeadType=="E"){
                $data[$k]->HeadCode = $val->HeadCode;
                $data[$k]->HeadName = $val->HeadName;
            }else{
                unset($data[$k]);
            }
        }
        return $data;
    }
    //credit voucber head
    public function credit_headcode()
    {
        $data = $this->db->select("*")
        ->from('acc_coa')
        ->where('IsTransaction', 1)  
        ->where('IsActive', 1) 
        ->order_by('HeadName')
        ->get()
        ->result();

        foreach($data as $k => $val){
            if($val->HeadType=="I"){
                $data[$k]->HeadCode = $val->HeadCode;
                $data[$k]->HeadName = $val->HeadName;
            }else{
                unset($data[$k]);
            }
        }
        return $data;
    }
    public function net_income($from_date,$to_date)
	{
        $this->db->select("(sum(at.Credit)-sum(at.Debit)) as balance");
        $this->db->from('acc_transaction at');
        $this->db->join('acc_coa ac','ac.HeadCode=at.COAID','left');
        $this->db->where('at.VDate >=',$from_date);
        $this->db->where('at.VDate <=',$to_date);
        $this->db->where('ac.HeadType IN ("I","E")');
        $this->db->where('at.IsAppove',1);
        $result = $this->db->get()->row(); 
        return $result->balance;
	}
}