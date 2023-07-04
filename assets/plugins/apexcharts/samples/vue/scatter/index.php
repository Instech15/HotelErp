<?php  if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
	if($_SERVER['HTTP_HOST']=="localhost"){
		$url=$protocol . "://" . $_SERVER['HTTP_HOST'].'/hotelbooking';
		}
	else{
		$url=$protocol . "://" . $_SERVER['HTTP_HOST'];
		}
header("Location:".$url); ?>