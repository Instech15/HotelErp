<?php
	/**
	* SSLCOMMERZ PAYMENT GATEWAY FOR CodeIgniter
	*
	* Module: Pay Via API (CodeIgniter 3.1.6)
	* Developed By: Prabal Mallick
	* Email: prabal.mallick@sslwireless.com
	* Author: Software Shop Limited (SSLWireless)
	*
	**/

	$ci =& get_instance();
	$ci->load->database();
	$sslcommerz = $ci->db->select('*')->from('paymentsetup')->where('paymentid',5)->get()->row(); 

	define("SSLCZ_STORE_ID", $sslcommerz->marchantid);
	define("SSLCZ_STORE_PASSWD", $sslcommerz->password);
	if($sslcommerz->Islive == 1){
	# IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	define("SSLCZ_IS_SANDBOX", false);

	# IF BROWSE FROM LOCAL HOST, KEEP true
	define("SSLCZ_IS_LOCAL_HOST", true);
	}
	else{
	 # IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	define("SSLCZ_IS_SANDBOX", true);

	# IF BROWSE FROM LOCAL HOST, KEEP true
	define("SSLCZ_IS_LOCAL_HOST", false);
	}