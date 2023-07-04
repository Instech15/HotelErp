<?php

// module name
$HmvcMenu["room_facilities"] = array(
    //set icon
    "icon"           => "<i class='ti-view-grid'></i>
", 

 //group level name
     "faciliti_list" => array(
        //menu name
            "controller" => "room_facilities",
            "method"     => "index",
            "url"        => "room_facilities/room-facilities-list",
            "permission" => "read"
        
    ),
	 "faciliti_details_list" => array(
        //menu name
            "controller" => "room_facilitidetails",
            "method"     => "index",
            "url"        => "room_facilities/room-facilities-details-list",
            "permission" => "read"
        
    ), 
	 "roomsize_list" => array(
        //menu name
            "controller" => "room_size",
            "method"     => "index",
            "url"        => "room_facilities/room-size-list",
            "permission" => "read"
        
    ), 
);
   

 