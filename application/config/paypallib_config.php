<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// -------------------------------------------------------------
// Paypal IPN Class
//--------------------------------------------------------------

// PayPal Data
$ci =& get_instance();
$paypal = $ci->db->select('*')
    ->from('paymentsetup')
    ->where('paymentid',3)
    ->get()
    ->row(); 
$settinginfo = $ci->db->select('*')->from('setting')->where('id',2)->get()->row(); 	
$currencyinfo = $ci->db->select('*')->from('currency')->where('currencyid', $settinginfo->currency)->get()->row();
	 

$sandbox = "";
if ($paypal->Islive == 1) {
	$sandbox = FALSE ;
}else{
	$sandbox =TRUE;
}

// Use PayPal on Sandbox or Live
$config['sandbox'] = $sandbox; // FALSE for live environment
// PayPal Business Email ID
$config['business'] = (!empty($paypal->email)?$paypal->email:'ainalcse@gmail.com');

// What is the default currency?
$config['paypal_lib_currency_code'] =(!empty($paypal->currency)?$paypal->currency:'USD');
 

// If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at 
$config['paypal_lib_button_path'] = 'buttons';
 
 
		
 
		


