<?php
// module directory name
$HmvcConfig['purchase']["_title"]     = "Purchase Item";
$HmvcConfig['purchase']["_description"] = "Manage Purchase item";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['purchase']['_database'] = true;
$HmvcConfig['purchase']["_tables"] = array( 
	'purchaseitem'
);
