<?php
	$jwt=$_POST['jwt'];
	$secret='123456';
	
	$header_json_string_base64url=explode('.',$jwt)[0];
	
	$payload_json_string_base64url=explode('.',$jwt)[1];
	
	$signature_received_base64url=explode('.',$jwt)[2];
	
	$signature = hash_hmac('sha256', $header_json_string_base64url.'.'.$payload_json_string_base64url, $secret,true);
	$signature_base64=base64_encode($signature);
	$signature_base64url=str_replace('+','-',$signature_base64);
	$signature_base64url=str_replace('/','_',$signature_base64url);
	$signature_base64url=rtrim($signature_base64url, '=');
	
	if($signature_base64url==$signature_received_base64url){
		echo 'Valid Token<br><br>';	
		echo base64_decode($header_json_string_base64url).'<br><br>';
		echo base64_decode($payload_json_string_base64url).'<br><br>';
	}
	else{
		echo 'Inalid Token';
	}
	
?>	