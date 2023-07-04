<?php

// module directory name
$HmvcConfig['paystack']["_title"]       = "Paystack";
$HmvcConfig['paystack']["_description"] = "Paystack payment gateway";
$HmvcConfig['paystack']["_version"]   = 1.0;


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['paystack']['_database'] = true;
$HmvcConfig['paystack']["_tables"] = array(
	'tbl_paystack'
);
//Table sql Data insert into existing tables to run module
$HmvcConfig['paystack']["_extra_query"] = true;


