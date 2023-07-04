<?php

// module name
$HmvcMenu["payment_setting"] = array(
    //set icon
    "icon"           => "<i class='ti-money'></i>
", 
 //group level name
     "paymentmethod_list" => array(
        //menu name
            "controller" => "paymentmethod",
            "method"     => "index",
            "url"        => "payment_setting/payment-method-list",
            "permission" => "read"
        
    ),
	   "paymentmethod_setup" => array(
        //menu name
            "controller" => "paymentmethod",
            "method"     => "paymentsetup",
            "url"        => "payment_setting/payment-setup",
            "permission" => "read"
        
    )
);
   

 