<?php
// module directory name
$HmvcConfig['room_reservation']["_title"]     = "room_reservation All Method";
$HmvcConfig['room_reservation']["_description"] = "room_reservation method like Service";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['room_reservation']['_database'] = true;
$HmvcConfig['room_reservation']["_tables"] = array( 
	'booked_info',
	'booked_details'
);
