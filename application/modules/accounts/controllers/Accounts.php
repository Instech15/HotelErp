<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'accounts_model'
		));	
		
	}

	public function C_O_A() 
	{ 
    $this->permission->method('accounts','read')->redirect();
    $data['title'] = display('accounts_form');
		$data['module'] = "accounts";
		$data['page']   = "coa";   
		echo Modules::run('template/layout', $data); 
	}
    // tree view controller
    public function show_tree($id = null){
    	$this->permission->method('accounts','read')->redirect();
      $id      = ($id ?$id :2);
      
      $data = array(
        'userList' => $this->accounts_model->get_userlist(),
        'userID' => set_value('userID'),
      );
      $data['title'] = display('c_o_a');
      $data['module'] = "accounts";
      $data['page']   = "treeview";   
      echo Modules::run('template/layout', $data); 
    }
  public function singleOpeningBalance($headCode){
    $data = $this->db->select("opening_balance")
    ->from("tbl_openingbalance")
    ->where("headcode", $headCode)
    ->order_by("opbalance_id", "DESC")
    ->get()
    ->row();
    return (!empty($data->opening_balance)?$data->opening_balance:0);
  }
  public function singleCurrentBalance($headCode){
    $data = $this->db->select("current_balance")
    ->from("tbl_openingbalance")
    ->where("headcode", $headCode)
    ->order_by("opbalance_id", "DESC")
    ->get()
    ->row();
    return (!empty($data->current_balance)?$data->current_balance:0);
  }
  public function parentOpeningBalance($headCode){
    return $this->db->select("HeadCode,IsTransaction,HeadName")
          ->from("acc_coa")
          ->where("PHeadName", $headCode)
          ->where('IsActive',1)
          ->get()
          ->result();
  }
  public function multipheadop($HeadName){
    $p_head = $this->parentOpeningBalance($HeadName);
    $opbalance = 0;
    foreach($p_head as $k => $v){
      if($v->IsTransaction!=1){
        $opbalance += $this->multipheadop($v->HeadName);
      }
      $p_ob = $this->singleOpeningBalance($v->HeadCode);
      $opbalance += (!empty($p_ob)?$p_ob:0);
    }
    return $opbalance;
  }
  public function multipheadcr($HeadName){
    $p_head = $this->parentOpeningBalance($HeadName);
    $crbalance = 0;
    foreach($p_head as $k => $v){
      if($v->IsTransaction!=1){
        $crbalance += $this->multipheadcr($v->HeadName);
      }
      $p_cb = $this->singleCurrentBalance($v->HeadCode);
      $crbalance += (!empty($p_cb)?$p_cb:0);
    }
    return $crbalance;
  }
  public function selectedform($id){
		$role_reult = $this->db->select('*')
						->from('acc_coa')
						->where('HeadCode',$id)
						->where('IsActive',1)
						->get()
						->row();
    if($role_reult->IsTransaction==1){
      $ob = $this->singleOpeningBalance($role_reult->HeadCode);
      $cb = $this->singleCurrentBalance($role_reult->HeadCode);
      if($role_reult->HeadType=="L" | $role_reult->HeadType=="I"){
        if($ob!=0){
          $ob *= -1;
        }
        if($cb!=0){
          $cb *= -1;
        }
      }
      $role_reult->op_balance = (!empty($ob)?$ob:0);
      $role_reult->cr_balance = (!empty($cb)?$cb:0);
    }else{
      $opbalance = $this->multipheadop($role_reult->HeadName);
      $crbalance = $this->multipheadcr($role_reult->HeadName);
      if($role_reult->HeadType=="L" | $role_reult->HeadType=="I"){
        if($opbalance!=0){
          $opbalance *= -1;
        }
        if($crbalance!=0){
          $crbalance *= -1;
        }
      }
      $role_reult->op_balance = $opbalance;
      $role_reult->cr_balance = $crbalance;
    }

					$baseurl = base_url().'/'.'accounts/accounts/insert_coa';

		if ($role_reult) {
			$html = "";
			$html .= "
        <form name=\"form\" id=\"form\" action=\"".$baseurl."\" method=\"post\" enctype=\"multipart/form-data\">
                <div id=\"newData\">
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
    
      <tr>
        <td>Head Code</td>
        <td><input type=\"text\" name=\"txtHeadCode\" id=\"txtHeadCode\" class=\"form_input\"  value=\"".$role_reult->HeadCode."\" readonly=\"readonly\"/></td>
      </tr>
      <tr>
        <td>Head Name</td>
        <td><input type=\"text\" name=\"txtHeadName\" id=\"txtHeadName\" class=\"form_input\" value=\"".$role_reult->HeadName."\"/>
    <input type=\"hidden\" name=\"HeadName\" id=\"HeadName\" class=\"form_input\" value=\"".$role_reult->HeadName."\"/>
        </td>
      </tr>
      <tr>
        <td>Parent Head</td>
        <td><input type=\"text\" name=\"txtPHead\" id=\"txtPHead\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->PHeadName."\"/></td>
      </tr>
      <tr>

        <td>Head Level</td>
        <td><input type=\"text\" name=\"txtHeadLevel\" id=\"txtHeadLevel\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->HeadLevel."\"/></td>
      </tr>
       <tr>
        <td>Head Type</td>
        <td><input type=\"text\" name=\"txtHeadType\" id=\"txtHeadType\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->HeadType."\"/></td>
      </tr>
       <tr>
        <td>Pre Balance</td>
        <td><input type=\"text\" name=\"txtPreBalance\" id=\"txtPreBalance\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->op_balance."\"/></td>
      </tr>
       <tr>
        <td>Current Balance</td>
        <td><input type=\"text\" name=\"txtCurrentBalance\" id=\"txtCurrentBalance\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->cr_balance."\"/></td>
      </tr>

       <tr>
        <td>&nbsp;</td>
        <td><input type=\"checkbox\" name=\"IsTransaction\" value=\"1\" id=\"IsTransaction\" size=\"28\"  onchange=\"IsTransaction_change();\"";
        	if($role_reult->IsTransaction==1){ $html .="checked";}

        $html .="/><label for=\"IsTransaction\"> IsTransaction</label>
        <input type=\"checkbox\" value=\"1\" name=\"IsActive\" id=\"IsActive\"";
       if($role_reult->IsActive==1){ $html .="checked";}
         $html .=" size=\"28\" checked=\"\" /><label for=\"IsActive\"> IsActive</label>
        <input type=\"checkbox\" value=\"1\" name=\"IsGL\" id=\"IsGL\" size=\"28\"";
         if($role_reult->IsGL==1){ $html .="checked";}
        $html .=" onchange=\"IsGL_change();\"/><label for=\"IsGL\"> IsGL</label>

        </td>
      </tr>
       <tr>
                    <td>&nbsp;</td>
                    <td>";
                   if( $this->permission->method('accounts','create')->access()):
                    $html .="<input type=\"button\" name=\"btnNew\" id=\"btnNew\" value=\"New\" onClick=\"newdata(".$role_reult->HeadCode.")\" /><input type=\"submit\" name=\"btnSave\" id=\"btnSave\" value=\"Save\" disabled=\"disabled\"/>";
                     endif;
               if($this->permission->method('accounts','update')->access()):
           $html .=" <input type=\"submit\" name=\"btnUpdate\" id=\"btnUpdate\" value=\"Update\" />";
              endif;
                   $html .=" </td>
                  </tr>
      
    </table>
 </form>
			";
		}
		echo json_encode($html);
	}

  public function newform($id){

    $newdata = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$id)
            ->where('IsActive',1)
            ->get()
            ->row();

           
  $newidsinfo = $this->db->select('*,count(HeadCode) as hc')
            ->from('acc_coa')
            ->where('PHeadName',$newdata->HeadName)
            ->where('IsActive',1)
            ->get()
            ->row();

$nid  = $newidsinfo->hc;
$n =$nid + 1;
if ($n / 10 < 1)
  $HeadCode = $id . "0" . $n;
else
  $HeadCode = $id . $n;

  $info['headcode'] =  $HeadCode;
  $info['rowdata'] =  $newdata;
  $info['headlabel'] =  $newdata->HeadLevel+1;
    echo json_encode($info);
  }
  function _alpha_dash_space($str_in = ''){
		if (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in))
		{
			$this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters,Space,underscores, and dashes.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

  public function insert_coa(){
	$this->load->library(array('my_form_validation'));
	$this->form_validation->set_rules('txtHeadCode',display('txtHeadCode'),'required|is_natural|xss_clean|trim');
	$this->form_validation->set_rules('txtHeadName',display('txtHeadName'),'required|xss_clean|trim');
	$this->form_validation->set_rules('txtPHead',display('txtPHead'),'required|xss_clean|trim');
	$this->form_validation->set_rules('txtHeadLevel',display('txtHeadLevel'),'required|is_natural|xss_clean|trim');
	$this->form_validation->set_rules('txtHeadType',display('txtHeadType'),'required|alpha|xss_clean|trim');
	
	if ($this->form_validation->run($this)) { 
    $headcode =$this->input->post('txtHeadCode',TRUE);
    $HeadName =$this->input->post('txtHeadName',TRUE);
    $PHeadName =$this->input->post('txtPHead',TRUE);
    $HeadLevel =$this->input->post('txtHeadLevel',TRUE);
    $txtHeadType =$this->input->post('txtHeadType',TRUE);
    $isact =$this->input->post('IsActive',TRUE);
    $IsActive = (!empty($isact)?$isact:0);
    $trns =$this->input->post('IsTransaction',TRUE);
    $IsTransaction = (!empty($trns)?$trns:0);
    $isgl=$this->input->post('IsGL',TRUE);
     $IsGL = (!empty($isgl)?$isgl:0);
    $createby=$this->session->userdata('id');
    if($headcode=="1020101"|$headcode=="102010304"|$headcode=="102010301"|$headcode=="102010302"|$headcode=="1020102"|$headcode=="1020103"|$headcode=="30301"|$headcode=="30304"){
      $this->session->set_flashdata('exception', "Sorry, You can not modify this head");
      redirect($_SERVER['HTTP_REFERER']);
    }
    $createdate=date('Y-m-d H:i:s');
       $postData = array(
		  'HeadCode'       =>  $headcode,
		  'HeadName'       =>  $HeadName,
		  'PHeadName'      =>  $PHeadName,
		  'HeadLevel'      =>  $HeadLevel,
		  'IsActive'       =>  $IsActive,
		  'IsTransaction'  =>  $IsTransaction,
		  'IsGL'           =>  $IsGL,
		  'HeadType'       => $txtHeadType,
		  'IsBudget'       => 0,
		  'CreateBy'       => $createby,
		  'CreateDate'     => $createdate,
		); 
 $upinfo = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$headcode)
            ->where('IsActive',1)
            ->get()
            ->row();
            if(empty($upinfo)){
  $this->db->insert('acc_coa',$postData);
}else{

$hname =$this->input->post('HeadName',TRUE);
$updata = array(
'PHeadName'      =>  $HeadName,
);

            
  $this->db->where('HeadCode',$headcode)
      ->update('acc_coa',$postData);
  $this->db->where('PHeadName',$hname)
      ->update('acc_coa',$updata);
}
$this->session->set_flashdata('message', display('save_successfully'));
 redirect($_SERVER['HTTP_REFERER']);
	}
	else{
    $data['title'] = display('accounts_form');
        $data = array(
            'userList' => $this->accounts_model->get_userlist(),
            'userID' => set_value('userID'),
        );
		$data['module'] = "accounts";
		$data['page']   = "treeview";   
		echo Modules::run('template/layout', $data); 
	}
  }

  // Debit voucher Create 
  public function debit_voucher(){
    $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('debit_voucher');
    $data['acc'] = $this->accounts_model->debit_headcode();
    $data['voucher_no'] = $this->accounts_model->voNO();
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['module'] = "accounts";
    $data['page']   = "debit_voucher";   
    echo Modules::run('template/layout', $data); 
  }

  // Debit voucher code select onchange
  public function debtvouchercode($id){
    $debitvcode = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$id)
            ->where('IsActive',1)
            ->get()
            ->row();
      $code = $debitvcode->HeadCode;   
echo json_encode($code);

  }
  //Create Debit Voucher
 public function create_debit_voucher(){
	 $this->load->library(array('my_form_validation'));
   $this->permission->method('accounts','create')->redirect();
   $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]|xss_clean');
	$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
         if ($this->form_validation->run($this)) { 
            $finyear = $this->input->post('finyear',true);
            if($finyear<=0){
              $this->session->set_flashdata('exception',  "Please Create Financial Year First");
              redirect($_SERVER['HTTP_REFERER']);
            }
            $cmbDebit = $this->input->post('cmbDebit', TRUE);
            $acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode",$cmbDebit)->get()->row();
            $acc_name = $this->db->select("HeadName")->from("acc_coa")->where("HeadCode",$cmbDebit)->get()->row();
            if(empty($acc_cash)){
              $this->session->set_flashdata('exception', "You does not have any balance on $acc_name->HeadName account.");
              redirect($_SERVER['HTTP_REFERER']);
            }else{
              $total_amount = 0;
              $amount = $this->input->post('txtAmount', TRUE);
              for($i=0;$i<count($amount);$i++){
                $total_amount += $amount[$i];
              }
              if(($acc_cash->current_balance-$total_amount)<0){
                $this->session->set_flashdata('exception', "You does not have ".$total_amount." amount on $acc_name->HeadName account.");
                redirect($_SERVER['HTTP_REFERER']);
              }
            }
        if ($this->accounts_model->insert_debitvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/debit-voucher');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/debit-voucher");
    }else{
	$this->permission->method('accounts','create')->redirect();
    $data['title'] = display('debit_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->voNO();
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['module'] = "accounts";
    $data['page']   = "debit_voucher";   
    echo Modules::run('template/layout', $data); 
      redirect("accounts/debit-voucher");
     }

}

// Update Debit voucher 
public function update_debit_voucher(){
	 $this->load->library(array('my_form_validation'));
   $this->permission->method('accounts','create')->redirect();
   $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
	$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
         if ($this->form_validation->run($this)) { 
            $finyear = $this->input->post('finyear',true);
            if($finyear<=0){
              $this->session->set_flashdata('exception',  "Please Create Financial Year First");
              redirect($_SERVER['HTTP_REFERER']);
            }
            $cmbDebit = $this->input->post('cmbDebit', TRUE);
            $acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode",$cmbDebit)->get()->row();
            $acc_name = $this->db->select("HeadName")->from("acc_coa")->where("HeadCode",$cmbDebit)->get()->row();
            if(empty($acc_cash)){
              $this->session->set_flashdata('exception', "You does not have any balance on $acc_name->HeadName account.");
              redirect($_SERVER['HTTP_REFERER']);
            }else{
              $total_amount = 0;
              $amount = $this->input->post('txtAmount', TRUE);
              for($i=0;$i<count($amount);$i++){
                $total_amount += $amount[$i];
              }
              if(($acc_cash->current_balance-$total_amount)<0){
                $this->session->set_flashdata('exception', "You does not have ".$total_amount." amount on $acc_name->HeadName account.");
                redirect($_SERVER['HTTP_REFERER']);
              }
            }
        if ($this->accounts_model->update_debitvoucher()) { 
          $this->session->set_flashdata('message', display('update_successfully'));
          redirect('accounts/voucher-approval/');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/voucher-approval");
    }else{
      $this->session->set_flashdata('exception',  display('please_try_again'));
      redirect("accounts/voucher-approval");
     }

}

//Credit voucher 
 public function credit_voucher(){
    $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('credit_voucher');
    $data['acc'] = $this->accounts_model->credit_headcode();
    $data['voucher_no'] = $this->accounts_model->crVno();
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['module'] = "accounts";
    $data['page']   = "credit_voucher";   
    echo Modules::run('template/layout', $data); 
  }

  //Create Credit Voucher
 public function create_credit_voucher(){
   $this->load->library(array('my_form_validation'));
   $this->permission->method('accounts','create')->redirect();
   $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
	$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
         if ($this->form_validation->run($this)) { 
            $finyear = $this->input->post('finyear',true);
            if($finyear<=0){
              $this->session->set_flashdata('exception',  "Please Create Financial Year First");
              redirect($_SERVER['HTTP_REFERER']);
            }
        if ($this->accounts_model->insert_creditvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/credit-voucher');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/credit-voucher");
    }else{
      $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('credit_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->crVno();
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['module'] = "accounts";
    $data['page']   = "credit_voucher";   
    echo Modules::run('template/layout', $data); 
      redirect("accounts/credit-voucher");
     }

}
// Contra Voucher form
 public function contra_voucher(){
    $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('contra_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->contra();
    $data['module'] = "accounts";
    $data['page']   = "contra_voucher";   
    echo Modules::run('template/layout', $data); 
  }

  //Create Contra Voucher
 public function create_contra_voucher(){
	 $this->load->library(array('my_form_validation'));
   $this->permission->method('accounts','create')->redirect();
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
	$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
         if ($this->form_validation->run($this)) { 
              $finyear = $this->input->post('finyear',true);
              if($finyear<=0){
                $this->session->set_flashdata('exception',  "Please Create Financial Year First");
                redirect($_SERVER['HTTP_REFERER']);
              }
            $debit = $this->input->post('txtAmount',TRUE);
            $credit = $this->input->post('txtAmountcr',TRUE);
            $totalDebit = 0;
            for($i=0; $i<count($debit); $i++){
              $totalDebit += $debit[$i];
            }
            $totalCredit = 0;
            for($j=0; $j<count($credit); $j++){
              $totalCredit += $credit[$j];
            }
            if($totalDebit!=$totalCredit){
              $this->session->set_flashdata('exception',  "Debited and Credited amount are not equal");
              redirect("accounts/contra-voucher");
            }
            else if($totalDebit==0){
              $this->session->set_flashdata('exception',  "Voucher must be greater than 0");
              redirect("accounts/contra-voucher");
            }
        if ($this->accounts_model->insert_contravoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/contra-voucher');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/contra-voucher");
    }else{
      $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('contra_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->contra();
    $data['module'] = "accounts";
    $data['page']   = "contra_voucher";   
    echo Modules::run('template/layout', $data); 
      redirect("accounts/contra-voucher");
     }

}
// Journal voucher
 public function journal_voucher(){
    $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->journal();
    $data['module'] = "accounts";
    $data['page']   = "journal_voucher";   
    echo Modules::run('template/layout', $data); 
  }

   //Create Journal Voucher
 public function create_journal_voucher(){
	 $this->load->library(array('my_form_validation'));
   $this->permission->method('accounts','create')->redirect();
   $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
	$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
         if ($this->form_validation->run($this)) { 
              $finyear = $this->input->post('finyear',true);
              if($finyear<=0){
                $this->session->set_flashdata('exception',  "Please Create Financial Year First");
                redirect($_SERVER['HTTP_REFERER']);
              }
            $debit = $this->input->post('txtAmount',TRUE);
            $credit = $this->input->post('txtAmountcr',TRUE);
            $totalDebit = 0;
            for($i=0; $i<count($debit); $i++){
              $totalDebit += $debit[$i];
            }
            $totalCredit = 0;
            for($j=0; $j<count($credit); $j++){
              $totalCredit += $credit[$j];
            }
            if($totalDebit!=$totalCredit){
              $this->session->set_flashdata('exception',  "Debited and Credited amount are not equal");
              redirect("accounts/journal-voucher");
            }
            else if($totalDebit==0){
              $this->session->set_flashdata('exception',  "Voucher must be greater than 0");
              redirect("accounts/journal-voucher");
            }
        if ($this->accounts_model->insert_journalvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/journal-voucher/');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/journal-voucher");
    }else{
       $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_no'] = $this->accounts_model->journal();
    $data['module'] = "accounts";
    $data['page']   = "journal_voucher";   
    echo Modules::run('template/layout', $data);
      redirect("accounts/journal-voucher");
     }

}
//Aprove voucher
  public function aprove_v(){
   $this->permission->method('accounts','create')->redirect();
    $data['title'] = display('voucher_approve');
    $data['aprrove'] = $this->accounts_model->approve_voucher();
    $data['module'] = "accounts";
    $data['page']   = "voucher_approve";   
    echo Modules::run('template/layout', $data); 
}
// isApprove
 public function isactive($id = null, $action = null)
  {

    $action = ($action=='active'?1:0);

    $postData = array(
      'VNo'     => $id,
      'IsAppove' => $action
    );
    $postDatas = array(
      'VNo'     => $id,
      'IsApprove' => $action
    );
    $voucher = $this->db->select("COAID,Debit,Credit,IsAppove,Vtype")->from("acc_transaction")->where("VNo", $id)->get()->result();
    foreach($voucher as $key => $val){
      if(substr($val->COAID,0,5)=="10201" & $val->Credit>0){
        $acc_cash = $this->db->select("current_balance")->from("tbl_openingbalance")->where("headcode",$val->COAID)->get()->row();
        $acc_name = $this->db->select("HeadName")->from("acc_coa")->where("HeadCode",$val->COAID)->get()->row();
        if(empty($acc_cash)){
          $this->session->set_flashdata('exception', "You does not have any balance on $acc_name->HeadName account.");
          redirect($_SERVER['HTTP_REFERER']);
        }else{
          if(($acc_cash->current_balance-$val->Credit)<0){
            $this->session->set_flashdata('exception', "You does not have ".$val->Credit." amount on $acc_name->HeadName account.");
            redirect($_SERVER['HTTP_REFERER']);
          }
        }
      }
    }
    if ($this->accounts_model->approved($postData)) {
      $newvoucher = $this->db->select("COAID,Debit,Credit,IsAppove,Vtype")->from("acc_transaction")->where("VNo", $id)->get()->result();
      foreach($newvoucher as $key => $val){
        expenseEmcome($val->COAID, $val->Debit, $val->Credit, $val->IsAppove);
      }
        $this->session->set_flashdata('message', "Successfully Approved");
    } else {
        $this->session->set_flashdata('exception', display('please_try_again'));
    }
    if ($this->accounts_model->approvedIncome($postDatas)) {
        $this->session->set_flashdata('message', "Successfully Approved");
    } else {
        $this->session->set_flashdata('exception', display('please_try_again'));
    }

    redirect($_SERVER['HTTP_REFERER']);
  }

  //Update voucher 
  public function voucher_update($id= null){
    $this->permission->method('accounts','Update')->redirect();
    $vtype =$this->db->select('*')
                    ->from('acc_transaction')
                    ->where('VNo',$id)
                    ->get()
                    ->row();
					
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['acc'] = $this->accounts_model->Transacc();
	
                    if($vtype->Vtype =="DV"){
    $data['title'] = display('update_debit_voucher');
    $data['dbvoucher_info'] = $this->accounts_model->dbvoucher_updata($id);
    $data['credit_info'] = $this->accounts_model->crvoucher_updata($id);
    $data['page']   = "update_dbt_crtvoucher";   
    } 
    if($vtype->Vtype =="CV"){
    $data['title'] = display('update_credit_voucher');
    $data['crvoucher_info'] = $this->accounts_model->crdtvoucher_updata($id);
    $data['debit_info'] = $this->accounts_model->debitvoucher_updata($id);
    $data['page']   = "update_credit_bdtvoucher";   
    }
	if($vtype->Vtype =="Contra"){
    $data['title'] = display('update_contra_voucher');
    $data['crvoucher_info'] = $this->accounts_model->contravoucher_updata($id);
    $data['page']   = "update_contra_voucher";   
    }
	if($vtype->Vtype =="JV"){
    $data['title'] = display('update_contra_voucher');
    $data['journal_info'] = $this->accounts_model->journalCrebitVoucher_edit($id);
    $data['page']   = "update_journal_voucher";   
    }
   
    $data['module'] = "accounts";
   
    echo Modules::run('template/layout', $data); 
  }
  // update credit voucher 
  public function update_credit_voucher(){
	  $this->load->library(array('my_form_validation'));
    $this->permission->method('accounts','create')->redirect();
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
	  $this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
	  $this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
	  $this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
	  $this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
    if ($this->form_validation->run($this)) { 
        $finyear = $this->input->post('finyear',true);
        if($finyear<=0){
          $this->session->set_flashdata('exception',  "Please Create Financial Year First");
          redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->accounts_model->update_creditvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/voucher-approval/');
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        }
        redirect("accounts/voucher-approval");
    }else{
      $this->session->set_flashdata('exception',  display('please_try_again'));
      redirect("accounts/voucher-approval");
     }

}
 // Debit voucher code select onchange
  public function debit_voucher_code($id) {
      $debitvcode = $this->db->select('*')
              ->from('acc_coa')
              ->where('HeadCode', $id)
              ->where('IsActive',1)
              ->get()
              ->row();
      $code = $debitvcode->HeadCode;
      echo json_encode($code);
    }
	// update_contra_voucher
	 public function update_contra_voucher() {
		  $this->load->library(array('my_form_validation'));
		   $this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
			$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
			$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
			$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
			if ($this->form_validation->run($this)) {
          $finyear = $this->input->post('finyear',true);
          if($finyear<=0){
            $this->session->set_flashdata('exception',  "Please Create Financial Year First");
            redirect($_SERVER['HTTP_REFERER']);
          } 
          $debit = $this->input->post('txtAmount',TRUE);
          $credit = $this->input->post('txtAmountcr',TRUE);
          $totalDebit = 0;
          for($i=0; $i<count($debit); $i++){
            $totalDebit += $debit[$i];
          }
          $totalCredit = 0;
          for($j=0; $j<count($credit); $j++){
            $totalCredit += $credit[$j];
          }
          if($totalDebit!=$totalCredit){
            $this->session->set_flashdata('exception',  "Debited and Credited amount are not equal");
            redirect("accounts/voucher-approval");
          }
          else if($totalDebit==0){
            $this->session->set_flashdata('exception',  "Voucher must be greater than 0");
            redirect("accounts/voucher-approval");
          }
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
        if ($voucher_no) {
            $this->db->where('VNo', $voucher_no);
            $this->db->delete('acc_transaction');
        }
        for ($i = 0; $i < count($cAID); $i++) {
            transaction($voucher_no, $Vtype, $VDate, $cAID[$i], $Narration, $debit[$i], $credit[$i], 0, $IsPosted, $CreateBy, $createdate, 0);
        }
        $this->session->set_flashdata('message', display('save_successfully'));
			}
        redirect("accounts/voucher-approval");
    }
	//    ============== its for update_journal_voucher ==============
    public function update_journal_voucher() {
		 $this->load->library(array('my_form_validation'));
		$this->form_validation->set_rules('txtRemarks',display('txtRemarks'),'xss_clean|trim');
			$this->form_validation->set_rules('dtpDate',display('dtpDate'),'xss_clean|trim');
			$this->form_validation->set_rules('txtAmount[]',display('txtAmount'),'xss_clean|trim|numeric');
			$this->form_validation->set_rules('txtCode[]',display('txtCode'),'xss_clean|trim|is_natural');
			if ($this->form_validation->run($this)) { 
          $finyear = $this->input->post('finyear',true);
          if($finyear<=0){
            $this->session->set_flashdata('exception',  "Please Create Financial Year First");
            redirect($_SERVER['HTTP_REFERER']);
          }
          $debit = $this->input->post('txtAmount',TRUE);
          $credit = $this->input->post('txtAmountcr',TRUE);
          $totalDebit = 0;
          for($i=0; $i<count($debit); $i++){
            $totalDebit += $debit[$i];
          }
          $totalCredit = 0;
          for($j=0; $j<count($credit); $j++){
            $totalCredit += $credit[$j];
          }
          if($totalDebit!=$totalCredit){
            $this->session->set_flashdata('exception',  "Debited and Credited amount are not equal");
            redirect("accounts/voucher-approval");
          }
          else if($totalDebit==0){
            $this->session->set_flashdata('exception',  "Voucher must be greater than 0");
            redirect("accounts/voucher-approval");
          }
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
        if ($voucher_no) {
            $this->db->where('VNo', $voucher_no);
            $this->db->delete('acc_transaction');
        }
        for ($i = 0; $i < count($cAID); $i++) {
            transaction($voucher_no, $Vtype, $VDate, $cAID[$i], $Narration, $debit[$i], $credit[$i], 0, $IsPosted, $CreateBy, $createdate, 0);
        }
        $this->session->set_flashdata('message', display('save_successfully'));
			}
        redirect("accounts/voucher-approval");
    }
 //Trial Balannce
    public function trial_balance(){
        $data['title']  = display('trial_balance');
        $data['module'] = "accounts";
        $data['page']   = "trial_balance";
        echo Modules::run('template/layout', $data);
    }
    //Trial Balance Report
    public function trial_balance_report(){
       $dtpFromDate     = $this->input->post('dtpFromDate',TRUE);
       $dtpToDate       = $this->input->post('dtpToDate',TRUE);
       $chkWithOpening  = $this->input->post('chkWithOpening',TRUE);

       $results         = $this->accounts_model->trial_balance_report($dtpFromDate,$dtpToDate,$chkWithOpening);

       if ($results['WithOpening']) {
            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;

            $data['title']  = display('trial_balance_report');
            $data['module'] = "accounts";
            $data['page']   = "trial_balance_with_opening";
            echo Modules::run('template/layout', $data);
       }else{

            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;

            $data['title']  = display('trial_balance_report');
            $data['module'] = "accounts";
            $data['page']   = "trial_balance_without_opening";
            echo Modules::run('template/layout', $data);
       }

    }

     //al hassan working
    public function vouchar_cash($date){
        $vouchar_view = $this->accounts_model->get_vouchar_view($date);
        $data = array(
            'vouchar_view' => $vouchar_view,
        );

        $data['type'] = $date;
        $data['title'] = display('accounts_form');
        $data['module'] = "accounts";
        $data['page']   = "vouchar_cash";
        echo Modules::run('template/layout', $data);
    }
//alhassan working
    public function general_ledger(){

        $general_ledger = $this->accounts_model->get_general_ledger();
        $data = array(
            'general_ledger' => $general_ledger,
        );

        $data['title'] = display('general_ledger');
        $data['module'] = "accounts";
        $data['page']   = "general_ledger";
        echo Modules::run('template/layout', $data);
    }
    //alhassan working
    public function general_led($Headid = NULL){
        $Headid = $this->input->post('Headid',TRUE);
        $HeadName = $this->accounts_model->general_led_get($Headid);
        echo  "<option>Transaction Head</option>";
        $html = "";
        foreach($HeadName as $data){
            $html .="<option value='$data->HeadCode'>$data->HeadName</option>";
            
        }
        echo $html;
    }
    //al hassan working
    public function voucher_report_serach($vouchar=NULL){
       echo $vouchar = $this->input->post('vouchar',TRUE);

        $voucher_report_serach = $this->accounts_model->voucher_report_serach($vouchar);
        $incomeExpense = $this->accounts_model->IEvoucher_report_serach($vouchar);

        if($voucher_report_serach->Amount==''){
             $pay='0.00';
        }else{
             $pay=$voucher_report_serach->Amount;
        }
        $baseurl = base_url().'accounts/accounts/vouchar_cash/'.$vouchar;
        $IEbaseurl = base_url().'accounts/accounts/vouchar_cash/';
         $html = "<tr>";
         $html.="<td>
                   <a href=\"$baseurl\">CV-BAC-$vouchar</a>
                 </td>
                 <td>Aggregated Cash Credit Voucher of $vouchar</td>
                 <td>$pay</td>
                 <td>$vouchar</td></tr>";
        if(!empty($incomeExpense)){
          foreach($incomeExpense as $val){
          $html.= "<tr>
                <td><a href=\"$IEbaseurl$val->VNo\">$val->VNo</a></td>
                <td>$val->Narration</td>
                <td>$val->Amount</td>
                <td>$val->Date</td>
            </tr>";
          }
        }
         echo htmlspecialchars_decode($html);
    }
    //alhassan working
    public function accounts_report_search(){

        $cmbGLCode = $this->input->post('cmbGLCode',TRUE);
        $cmbCode = $this->input->post('cmbCode',TRUE);

        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate = $this->input->post('dtpToDate',TRUE);
        $chkIsTransction = $this->input->post('chkIsTransction',TRUE);
      
        $HeadName = $this->accounts_model->general_led_report_headname($cmbGLCode);
        $HeadName2 = $this->accounts_model->general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction);
        $pre_balance = $this->accounts_model->general_led_report_prebalance($cmbCode,$dtpFromDate);

        $data = array(
            'dtpFromDate' => $dtpFromDate,
            'dtpToDate' => $dtpToDate,
            'HeadName' => $HeadName,
            'HeadName2' => $HeadName2,
            'prebalance' =>  $pre_balance,
            'chkIsTransction' => $chkIsTransction,

        );
        $data['ledger'] = $this->db->select('*')->from('acc_coa')->where('HeadCode',$cmbCode)->get()->row();
        $data['title'] = display('general_ledger');
        $data['module'] = "accounts";
        $data['page']   = "general_ledger_report";
        echo Modules::run('template/layout', $data);

    }

    //alhassan working
    public function check_status_report(){
        $get_status = $this->accounts_model->get_status();
        $data = array(
            'get_status' => $get_status,
        );

        $data['title'] = display('general_ledger_report');
        $data['module'] = "accounts";
        $data['page']   = "check_status_report";
        echo Modules::run('template/layout', $data);
    }



    public function cash_book(){
        $data['title'] = display('cash_book');
        $data['module'] = "accounts";
        $data['page']   = "cash_book";
        echo Modules::run('template/layout', $data);
    }
    public function bank_book(){
        $data['title'] = display('bank_book');
        $data['module'] = "accounts";
        $data['page']   = "bank_book";
        echo Modules::run('template/layout', $data);
    }
     public function voucher_report(){
        $this->permission->method('accounts','read')->redirect();
        //al hassan working
        $get_cash = $this->accounts_model->get_cash();
        $get_vouchar= $this->accounts_model->get_vouchar();
        $data = array(
            'get_cash' => $get_cash,
            'get_vouchar' => $get_vouchar,
        );
        $data['title']  = display('accounts_form');
        $data['module'] = "accounts";
        $data['page']   = "coa";   
    echo Modules::run('template/layout', $data); 
  }
   public function coa_print(){
        $data['title'] = display('coa_print');
        $data['module'] = "accounts";
        $data['page']   = "coa_print";
        echo Modules::run('template/layout', $data);
    }
     //Profit loss report page
    public function profit_loss_report(){
        $data['title'] = display('profit_loss');
        $data['module'] = "accounts";
        $data['page']   = "profit_loss_report";
        echo Modules::run('template/layout', $data);
    }
    //Profit loss serch result
    public function profit_loss_report_search(){
        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate   = $this->input->post('dtpToDate',TRUE);
        $withTax   = $this->input->post('chkWithTax',TRUE);

        $get_profit  = $this->accounts_model->profit_loss_serach();

        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['withTax']  = $withTax;
        $data['oResultTax']  = $get_profit['oResultTax'];
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income From '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
        $data['title'] = display('profit_loss');
        $data['module'] = "accounts";
        $data['page']   = "profit_loss_report_search";
        echo Modules::run('template/layout', $data);
    }
    //Cash flow page
    public function cash_flow_report(){
        $data['title']  = display('cash_flow');
        $data['module'] = "accounts";
        $data['page']   = "cash_flow_report";
        echo Modules::run('template/layout', $data);
    }
    //Cash flow report search
    public function cash_flow_report_search(){
        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate   = $this->input->post('dtpToDate',TRUE);

        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;

        $data['title']  = display('cash_flow');
        $data['module'] = "accounts";
        $data['page']   = "cash_flow_report_search";
        echo Modules::run('template/layout', $data);
    }
    //Cash flow page
    public function balance_sheet(){
      $data['title']  = display('balance_sheet');
      $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
      $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));
      $data['from_date']   = $from_date;
      $data['to_date']     = $to_date;
      $data['fixed_assets']= $this->accounts_model->fixed_assets();
      $data['liabilities'] = $this->accounts_model->liabilities_data();
      $data['incomes']     = $this->accounts_model->income_fields();
      $data['expenses']    = $this->accounts_model->expense_fields();
      $seting=$this->db->select("*")->from('setting')->get()->row();
      $data['module'] = "accounts";
      $data['page']   = "balance_sheet";
      echo Modules::run('template/layout', $data);
    }
    public function fin_yearlist(){
      $data['title'] = display('financial_year');
      $data['module'] = "accounts";
      $data['yearlist']   = $this->accounts_model->get_yearlist();   
      $data['page']   = "financial_year";   
      echo Modules::run('template/layout', $data);
    }
    public function financial_year(){
      $this->permission->method('accounts','create')->redirect();
      $this->form_validation->set_rules('yearname', display('title')  ,'required|xss_clean|trim');
      $this->form_validation->set_rules('start_date',display('from_date'),'required|xss_clean|trim');
      $this->form_validation->set_rules('end_date',display('to_date'),'required|xss_clean|trim');
      if ($this->form_validation->run($this)) { 
        $title = $this->input->post('yearname',TRUE);
        $start_date = $this->input->post('start_date',TRUE);
        $end_date = $this->input->post('end_date',TRUE);
        $date_time = date("Y-m-d H:i:s");
        $is_active = $this->input->post('status',TRUE);
        $create_by = $this->session->userdata('id');
        $postData = array(
          'title'       =>  $title,
          'start_date'       =>  $start_date,
          'end_date'      =>  $end_date,
          'date_time'      =>  $date_time,
          'is_active'       =>  $is_active,
          'create_by'  =>  $create_by,
        );
        $initial = $this->db->select('*')->from('tbl_financialyear')->get()->row();
        $yearinfo = $this->db->select('*')->from('tbl_financialyear')->where('end_date>=',$start_date)->get()->row();
        if($start_date>=$end_date){
          $this->session->set_flashdata('exception',  "Invalid Date, End date must be greater than Start date");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else if(empty($initial) & $start_date<date("Y-m-d")){
          $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous date");
          redirect($_SERVER['HTTP_REFERER']);
        }
        else if(!empty($yearinfo)){
          $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous Financial year date");
          redirect($_SERVER['HTTP_REFERER']);
        }else{
          $this->db->insert('tbl_financialyear',$postData);
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect($_SERVER['HTTP_REFERER']);
        }
      }else{
        $data['title'] = display('financial_year');
        $data['module'] = "accounts";
        $data['page']   = "financial_year";   
        echo Modules::run('template/layout', $data);
      }
    }
    public function finyear_delete($id){
      $this->permission->method('accounts','delete')->redirect();
      $fin_id = $this->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=",date("Y-m-d"))->where("end_date>=",date("Y-m-d"))->where("fiyear_id", $id)->get()->row();
      if(!empty($fin_id)){
        $this->session->set_flashdata('exception',  "You can not delete current financial year");
        redirect($_SERVER['HTTP_REFERER']);
      }
      $delete = $this->db->where("fiyear_id", $id)->delete("tbl_financialyear");
      if($delete){
        $this->session->set_flashdata('message', display('save_successfully'));
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        $this->session->set_flashdata('exception',  display('please_try_again'));
        redirect($_SERVER['HTTP_REFERER']);
      }

    }
    public function finyear_update(){
      $id = $this->input->post('id',TRUE);
      $title = $this->input->post('title',TRUE);
      $start = $this->input->post('start',TRUE);
      $end = $this->input->post('end',TRUE);
      $status = $this->input->post('status',TRUE);
      $postData = array(
        'title'       =>  $title,
        'start_date'       =>  $start,
        'end_date'      =>  $end,
        'is_active'       =>  $status,
        'create_by'  =>  $this->session->userdata('id'),
      );
      $initial = $this->db->select('*')->from('tbl_financialyear')->where("fiyear_id!=",$id)->get()->row();
      $start_date = $this->db->select('start_date')->from('tbl_financialyear')->where("fiyear_id=",$id)->get()->row();
      $yearinfo = $this->db->select('*')->from('tbl_financialyear')->where('end_date>=',$start)->where("fiyear_id!=",$id)->get()->row();
      if($start>=$end){
        $this->session->set_flashdata('exception',  "Invalid Date, End date must be greater than Start date");
      }
      else if(empty($initial) & $start<$start_date->start_date){
        $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous date");
      }
      else if(!empty($yearinfo)){
        $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous Financial year date");
      }else{
        $update = $this->db->where("fiyear_id", $id)->update("tbl_financialyear",$postData);
        if($update){
          $this->session->set_flashdata('message', display('save_successfully'));
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        } 
      }
    }
    public function fin_yearend(){
      $data['title'] = display('financial_year_end');
      $data['module'] = "accounts";
      $data['page']   = "endfinancial_year";   
      echo Modules::run('template/layout', $data);
    }
    public function finyear_end(){
      $status = $this->input->post('status',TRUE);
      $postData = array(
        'is_active'       =>  $status,
        'create_by'  =>  $this->session->userdata('id'),
      );
      $year_end = $this->db->select("fiyear_id")->from('tbl_financialyear')->where("end_date=",date("Y-m-d"))->where("is_active=",2)->get()->row();
      $next_year = $this->db->select("fiyear_id")->from('tbl_financialyear')->where("start_date>=",date('Y-m-d', strtotime(' +1 day')))->where("is_active=",2)->get()->row();
      if(empty($year_end)){
        $this->session->set_flashdata('exception',  "You can end financial year only the last date of financial year");
      }
      else if(empty($next_year)){
        $this->session->set_flashdata('exception',  "You did not set next financial year");
      }else{
        $update = $this->db->where("fiyear_id", $year_end->fiyear_id)->update("tbl_financialyear",$postData);
        if($update){
          $old_year = $this->db->select("*")->from("tbl_openingbalance")->where("fiyear_id", $year_end->fiyear_id)->get()->result();
          foreach($old_year as $key => $value){
            $acc_head = $value->headcode;
            $head_type = $this->db->select("HeadType")->from("acc_coa")->where("HeadCode", $acc_head)->where('IsActive',1)->get()->row();
            $cb=0;
            if(substr($acc_head,0,1)!=2 & ($head_type->HeadType=="A" | $head_type->HeadType=="L")){
              $cb = $value->current_balance;
            }
            $data = array(
              'fiyear_id' => $next_year->fiyear_id,
              'opening_balance' => !empty($value->current_balance)?$value->current_balance:0,
              'current_balance' => !empty($cb)?$cb:0,
              'headcode' => $value->headcode,
              'remark' => "Auto inserted while year end",
            );
            $this->db->insert("tbl_openingbalance", $data);
          }
          $this->session->set_flashdata('message', display('save_successfully'));
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        } 
      }
    }
    public function opening_balanceform(){
      $data['title'] = display('financial_year_end');
      $data['module'] = "accounts";
      $data['acc'] = $this->accounts_model->ob_headcode();
      $data['page']   = "opening_balance";   
      echo Modules::run('template/layout', $data);
    }
    public function opening_balance(){
      $this->permission->method('accounts','create')->redirect();
      $this->form_validation->set_rules('acc_head', display('head_of_account')  ,'required|xss_clean|trim');
      $this->form_validation->set_rules('amount',display('amount'),'required|xss_clean|trim');
      if ($this->form_validation->run($this)) { 
        $finyear = $this->input->post('finyear',true);
        if($finyear<=0){
          $this->session->set_flashdata('exception',  "Please Create Financial Year First");
          redirect($_SERVER['HTTP_REFERER']);
        }
        $fin_id = $this->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=", date("Y-m-d"))->where("end_date>=", date("Y-m-d"))->get()->row();
        $acc_head = $this->input->post('acc_head',TRUE);
        $amount = $this->input->post('amount',TRUE);
        $remark = $this->input->post('remark',TRUE);
        $postData = array(
          'headcode'         =>  $acc_head,
          'opening_balance'  =>  $amount,
          'current_balance'  =>  0,
          'fiyear_id'        =>  $fin_id->fiyear_id,
          'remark'           =>  $remark,
        );
        $head_type = $this->db->select("HeadType")->from("acc_coa")->where("HeadCode", $acc_head)->where('IsActive',1)->get()->row();
        if(substr($acc_head,0,1)!=2 & ($head_type->HeadType=="A" | $head_type->HeadType=="L")){
          $yearinfo = $this->db->select('fiyear_id')->from('tbl_financialyear')->where('start_date', date("Y-m-d"))->where("fiyear_id",$fin_id->fiyear_id)->get()->row();
          if(empty($yearinfo)){
            $this->session->set_flashdata('exception',  "Opening balance can be added only first date of financial year");
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $cheak_head = $this->db->select("opbalance_id")->from("tbl_openingbalance")->where("headcode",$acc_head)->get()->row();
            if(!empty($cheak_head)){
              $this->session->set_flashdata('exception',  "Opening balance can be added only new head of accounts");
              redirect($_SERVER['HTTP_REFERER']);
            }else{
              if($head_type->HeadType=="L"){
                $postData["opening_balance"] *= -1;
              }
              $this->db->insert('tbl_openingbalance',$postData);
              $invoice_no = "OB".date("YmdHi");
              $newdate = date("Y-m-d H:i");
              $saveid = $this->session->userdata('id');
              if($head_type->HeadType=="A"){
                $narration = 'Accounts Debited For Opening balance invoice# '.$invoice_no;
                transaction($invoice_no, 'Opening balance', $newdate, $acc_head, $narration, $amount, 0, 0, 1, $saveid, $newdate, 1);
              }else{
                $narration = 'Accounts Credited For Opening balance invoice# '.$invoice_no;
                transaction($invoice_no, 'Opening balance', $newdate, $acc_head, $narration, 0, $amount, 0, 1, $saveid, $newdate, 1);
              }
              $this->session->set_flashdata('message', display('save_successfully'));
              redirect($_SERVER['HTTP_REFERER']);
            }
          }
        }else{
          $this->session->set_flashdata('exception',  "Opening balance can be added only Assets and Liability");
          redirect($_SERVER['HTTP_REFERER']);
        }
      }else{
        $data['title'] = display('opening_balance');
        $data['module'] = "accounts";
        $data['acc'] = $this->accounts_model->ob_headcode();
        $data['page']   = "opening_balance";   
        echo Modules::run('template/layout', $data);
      }
    }
}
