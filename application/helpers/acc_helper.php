<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function transaction($vno, $vType, $vDate, $COAID, $narration, $debit, $credit, $storeId, $isPosted, $createBy, $createDate, $isApprove){
    $acc_transection = array(
        'VNo'            =>  $vno,
        'Vtype'          =>  $vType,
        'VDate'          =>  $vDate,
        'COAID'          =>  $COAID,
        'Narration'      =>  $narration,
        'Debit'          =>  $debit,
        'Credit'         =>  $credit,
        'StoreID'        => $storeId,
        'IsPosted'       => $isPosted,
        'CreateBy'       => $createBy,
        'CreateDate'     => $createDate,
        'IsAppove'       => $isApprove
    ); 
    $ci =& get_instance();
    $ci->load->database();
    $insert = $ci->db->insert('acc_transaction',$acc_transection);
    if($insert & $isApprove==1){
        $head_type = $ci->db->select("HeadType,HeadCode")->from("acc_coa")->where("HeadCode", $COAID)->get()->row();
            $fin_id = $ci->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=",date("Y-m-d"))->where("end_date>=",date("Y-m-d"))->get()->row();
            $ob_check = $ci->db->select("opbalance_id,current_balance")->from("tbl_openingbalance")->where("headcode",$COAID)->where("fiyear_id", $fin_id->fiyear_id)->get()->row();
            if(!empty($ob_check)){
                $cr_balance = (!empty($ob_check->current_balance)?$ob_check->current_balance:0) + (!empty($debit)?$debit:0) - (!empty($credit)?$credit:0);
                $data = array(
                    'current_balance' => $cr_balance,
                );
                $ci->db->where("opbalance_id", $ob_check->opbalance_id)->update("tbl_openingbalance", $data);
            }else{
                $data = array(
                    'fiyear_id' => $fin_id->fiyear_id,
                    'opening_balance' => 0,
                    'current_balance' => $debit - $credit,
                    'headcode' => $COAID,
                    'remark' => "Auto inserted while transaction",
                );
                $ci->db->insert("tbl_openingbalance", $data);
            }
    }
}
function transaction_update($id, $vno, $vDate, $debit, $credit, $updateBy, $updateDate, $headcode=NULL, $narration=NULL, $old_code=NULL){
    $acc_update = array(
        'VNo'            =>  $vno,
        'VDate'          =>  $vDate,
        'debit'          =>  $debit,
        'Credit'         =>  $credit,
        'UpdateBy'       =>  $updateBy,
        'UpdateDate'     =>  $updateDate,
      ); 
      $ci =& get_instance();
      $ci->load->database();
      $old_acc = $ci->db->select("Debit,Credit,COAID")->from("acc_transaction")->where("ID", $id)->get()->row();
      $update = $ci->db->where("ID", $id)->update('acc_transaction',$acc_update);
      if(!empty($headcode) & !empty($narration)){
          $other_update = $ci->db->where("ID", $id)->update('acc_transaction',array("COAID"=>$headcode,"Narration"=>$narration));
      }else{
          $headcode = $old_acc->COAID;
      }
      if($update){
        $head_type = $ci->db->select("HeadType,HeadCode")->from("acc_coa")->where("HeadCode", $headcode)->get()->row();
            $fin_id = $ci->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=",date("Y-m-d"))->where("end_date>=",date("Y-m-d"))->get()->row();
            $ob_check = $ci->db->select("opbalance_id,current_balance")->from("tbl_openingbalance")->where("headcode",$headcode)->where("fiyear_id", $fin_id->fiyear_id)->get()->row();
            if(!empty($ob_check)){
                if($headcode!=$old_code & $old_code!=NULL){
                    $old_check = $ci->db->select("opbalance_id,current_balance")->from("tbl_openingbalance")->where("headcode",$old_code)->where("fiyear_id", $fin_id->fiyear_id)->get()->row();
                    $old_cr = $old_check->current_balance - $old_acc->Debit + $old_acc->Credit;
                    $old_data = array(
                        'current_balance' => $old_cr,
                    );
                    $ci->db->where("opbalance_id", $old_check->opbalance_id)->update("tbl_openingbalance", $old_data);
                    $cr_balance = $ob_check->current_balance + $debit - $credit;
                    $data = array(
                        'current_balance' => $cr_balance,
                    );
                    $ci->db->where("opbalance_id", $ob_check->opbalance_id)->update("tbl_openingbalance", $data);
                }
                if($headcode!=$old_code){
                    $cr_balance = $ob_check->current_balance + $debit - $credit - $old_acc->Debit + $old_acc->Credit;
                    $data = array(
                        'current_balance' => $cr_balance,
                    );
                    $ci->db->where("opbalance_id", $ob_check->opbalance_id)->update("tbl_openingbalance", $data);
                }    
            }else{
                $data = array(
                    'fiyear_id' => $fin_id->fiyear_id,
                    'opening_balance' => 0,
                    'current_balance' => $debit - $credit,
                    'headcode' => $headcode,
                    'remark' => "Auto inserted while transaction updated",
                );
                $ci->db->insert("tbl_openingbalance", $data);
            }
    }
}
function expenseEmcome($COAID, $debit, $credit, $isApprove){
    if($isApprove==1){
        $ci =& get_instance();
        $ci->load->database();
        $head_type = $ci->db->select("HeadType,HeadCode")->from("acc_coa")->where("HeadCode", $COAID)->get()->row();
            $fin_id = $ci->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=",date("Y-m-d"))->where("end_date>=",date("Y-m-d"))->get()->row();
            $ob_check = $ci->db->select("opbalance_id,current_balance")->from("tbl_openingbalance")->where("headcode",$COAID)->where("fiyear_id", $fin_id->fiyear_id)->get()->row();
            if(!empty($ob_check)){
                $cr_balance = $ob_check->current_balance + $debit - $credit;
                $data = array(
                    'current_balance' => $cr_balance,
                );
                $ci->db->where("opbalance_id", $ob_check->opbalance_id)->update("tbl_openingbalance", $data);
            }else{
                $data = array(
                    'fiyear_id' => $fin_id->fiyear_id,
                    'opening_balance' => 0,
                    'current_balance' => $debit - $credit,
                    'headcode' => $COAID,
                    'remark' => "Auto inserted while transaction approved",
                );
                $ci->db->insert("tbl_openingbalance", $data);
            }
    }
}
?>