<?php

// module name
$HmvcMenu["customer"] = array(
    //set icon
    "icon"           => "<i class='typcn typcn-user'></i>
", 
 //group level name
     "customer_list" => array(
        //menu name
            "controller" => "customer_info",
            "method"     => "index",
            "url"        => "customer/customer-list",
            "permission" => "read"
        
     ),
    "wakeup_call_list" => array(
        //menu name
            "controller" => "customer_info",
            "method"     => "wakeup_call",
            "url"        => "customer/wakeup-call",
            "permission" => "read"
        
    )
);
   

 