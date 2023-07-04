<?php
// module directory name
$HmvcConfig['payment_setting']["_title"]     = "payment_setting All Method";
$HmvcConfig['payment_setting']["_description"] = "payment_setting method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['payment_setting']['_database'] = true;
$HmvcConfig['payment_setting']["_tables"] = array( 
	'payment_method',
	'paymentsetup'
);
