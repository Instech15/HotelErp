<?php

// module name
$HmvcMenu["room_setting"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-spanner'></i>
", 
 //group level name
     "bed_list" => array(
        //menu name
            "controller" => "bed_type",
            "method"     => "index",
            "url"        => "room_setting/bed-list",
            "permission" => "read"
        
    ),
	"starclass_list" => array(
        //menu name
            "controller" => "starclass",
            "method"     => "index",
            "url"        => "room_setting/star-class-list",
            "permission" => "read"
        
    ), 
	"bookingtype_list" => array(
        //menu name
            "controller" => "booking_type",
            "method"     => "index",
            "url"        => "room_setting/booking-type-list",
            "permission" => "read"
        
    ), 
    "b_ty_details" => array(
        //menu name
            "controller" => "booking_type",
            "method"     => "btype_details",
            "url"        => "room_setting/booking-type-details",
            "permission" => "read"
        
    ), 
	"floorplan_list" => array(
        //menu name
            "controller" => "floorplan",
            "method"     => "index",
            "url"        => "room_setting/floor-plan-list",
            "permission" => "read"
        
    ),
	 "room_list" => array(
        //menu name
            "controller" => "room_details",
            "method"     => "index",
            "url"        => "room_setting/room-list",
            "permission" => "read"
        
    ),
	"room_image" => array(
        //menu name
            "controller" => "room_images",
            "method"     => "index",
            "url"        => "room_setting/room-images",
            "permission" => "read"
        
    ), 
);
   

 