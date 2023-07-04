<?php 
$HmvcMenu["paystack"] = array(
    "icon"           => "<i class='ti-money'></i>
", 
    "paymentmethod_list" => array(
            "controller" => "paymentmethod",
            "method"     => "index",
            "url"        => "payment_setting/payment-method-list",
            "permission" => "read"
        
    ),
);