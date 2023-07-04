<?php

// module name
$HmvcMenu["reports"] = array(
    //set icon
    "icon"           => "<i class='ti-bar-chart' aria-hidden='true'></i>
", 

   "booking_report" => array( 
        "controller" => "report",
        "method"     => "index",
        "url"        => "reports/booking-report",
        "permission" => "read"
    ),
   "purchase_report" => array( 
        "controller" => "report",
        "method"     => "productreport",
        "url"        => "reports/purchase-report",
        "permission" => "read"
    ),
	"stock_report" => array( 
        "controller" => "report",
        "method"     => "stockreport",
        "url"        => "reports/stock-report",
        "permission" => "read"
    ),
	
);
   

 