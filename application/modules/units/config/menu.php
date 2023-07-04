<?php

// module name
$HmvcMenu["units"] = array(
    //set icon
    "icon"           => "<i class='ti-pin-alt' aria-hidden='true'></i>
", 

  //group level name
    "unit_list" => array(
        //menu name
            "controller" => "unitmeasurement",
            "method"     => "index",
            "url"        => "units/unit-measurement-list",
            "permission" => "read"
        
    ), 
 //group level name
       "ingradient_list" => array(
        //menu name
            "controller" => "products",
            "method"     => "index",
            "url"        => "units/product-list",
            "permission" => "read"
        
    ), 
	 "supplier_list" => array(
        //menu name
            "controller" => "supplierlist",
            "method"     => "index",
            "url"        => "units/supplier-list",
            "permission" => "read"
        
    ), 
   
);
   

 