<?php
// module directory name
$HmvcConfig['tax']["_title"]     = "tax All Method";
$HmvcConfig['tax']["_description"] = "tax method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['tax']['_database'] = true;
$HmvcConfig['tax']["_tables"] = array( 
	'tbl_tax'
);
