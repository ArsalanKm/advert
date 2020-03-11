<?php 
	include_once("sender.php");
	
	$url = 'http://bitpay.ir/payment/gateway-send'; 
	$api = 'Your-API';
	$amount = 1000;
	$redirect = 'REDIRECT-PAGE';
	$name = '';
	$email = '';
	$description = '';
	$factorId = 1;
	
	$result = send($url,$api,$amount,$redirect,$factorId,$name,$email,$description); 
	
	if($result > 0 && is_numeric($result))
	{
		$go = "http://bitpay.ir/payment/gateway-$result"; 
		header("Location: $go");
	} 
?>
