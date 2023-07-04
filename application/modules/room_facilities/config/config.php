<?php
// module directory name
$HmvcConfig['room_facilities']["_title"]     = "room_facilities All Method";
$HmvcConfig['room_facilities']["_description"] = "room_facilities method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['room_facilities']['_database'] = true;
$HmvcConfig['room_facilities']["_tables"] = array( 
	'roomfacilitytype',
	'roomfacilitydetails',
	'roomsizemesurement',
	'roomfaility_ref_accomodation'
);
