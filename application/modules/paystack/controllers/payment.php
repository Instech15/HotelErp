<?php
if ($paymentid == 7 & $this->db->table_exists('tbl_paystack')) {
    $paymentinfo = $this->hotel_model->read('*', 'paymentsetup', array('paymentid' => 7));
    $userinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$this->session->userdata('UserID'))->get()->row();
	$ref = 'B' . date('YmdHis') . rand(1000, 9999);
    echo '<form>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button type="button" onclick="payWithPaystack()" id="paytrack" style="display:none;"> Pay </button> 
    </form>
    <script>
    document.getElementById("paytrack").click();
    function payWithPaystack(){
        var handler = PaystackPop.setup({
        key: "' . $paymentinfo->password . '",
        email: "' . $userinfo->email . '",
        amount: "' . round($data['orderinfo']->total_price) * 100 . '",
        currency: "' . $paymentinfo->currency . '",
        ref: "'. $ref . '", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        metadata: {
            custom_fields: [
                {
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: "'. $userinfo->cust_phone .'"
                }
            ]
        },
        callback: function(response){
            window.location.href="' . base_url() . 'hotel/successful/'.$orderid.'/'.$paymentid.'";
        },
        onClose: function(){
            window.location.href="' . base_url() . 'hotel/fail/'.$orderid.'";
        }
        });
        handler.openIframe();
    }
    </script>';
}