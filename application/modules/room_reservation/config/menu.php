<?php

// module name
$HmvcMenu["room_reservation"] = array(
    //set icon
    "icon"           => "<i class='ti-layout-slider-alt'></i>
", 
 //group level name
     "booking_list" => array(
        //menu name
            "controller" => "room_reservation",
            "method"     => "index",
            "url"        => "room_reservation/booking-list",
            "permission" => "read"
        
    ),
);
   

 