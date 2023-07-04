<?php

// module name
$HmvcMenu["purchase"] = array(
    //set icon
    "icon"           => "<i class='ti-shopping-cart' aria-hidden='true'></i>
", 

   "purchase_item" => array( 
        "controller" => "purchase",
        "method"     => "index",
        "url"        => "purchase/purchase-list",
        "permission" => "read"
    ),
	"purchase_add" => array( 
        "controller" => "purchase",
        "method"     => "create",
        "url"        => "purchase/purchase-create",
        "permission" => "create"
    ),
	"purchase_return" => array( 
        "controller" => "purchase",
        "method"     => "return_form",
        "url"        => "purchase/purchase-return",
        "permission" => "create"
    ),
	"return_invoice" => array( 
        "controller" => "purchase",
        "method"     => "return_invoice",
        "url"        => "purchase/invoice-return-list",
        "permission" => "create"
    ),
);
   

 