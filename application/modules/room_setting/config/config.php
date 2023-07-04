<?php
// module directory name
$HmvcConfig['room_setting']["_title"]     = "room_setting All Method";
$HmvcConfig['room_setting']["_description"] = "room_setting method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['room_setting']['_database'] = true;
$HmvcConfig['room_setting']["_tables"] = array( 
	'bookingtype',
	'starclass',
	'roomsizemesurement',
	'roomfaility_ref_accomodation'
);
