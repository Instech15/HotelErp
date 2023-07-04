<?php
// module directory name
$HmvcConfig['customer']["_title"]     = "customer All Method";
$HmvcConfig['customer']["_description"] = "customer method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['customer']['_database'] = true;
$HmvcConfig['customer']["_tables"] = array( 
	'customerinfo'
);
