<?php
// module directory name
$HmvcConfig['units']["_title"]     = "Unit Measurement and Ingredients";
$HmvcConfig['units']["_description"] = "Unit Measurement and Ingredients";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['units']['_database'] = true;
$HmvcConfig['units']["_tables"] = array( 
	'ingredients',
	'unit_of_measurement',
);
