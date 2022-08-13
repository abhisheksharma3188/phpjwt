<?php
	///////////////// define header string below/////////////////
	$header='{
				"alg": "HS256",
				"typ": "JWT"
			}';
	///////////////// define header string above/////////////////
	
	///////////////// code to generate base64url header below ///
	$header_json=json_decode($header);
	$header_json_string=json_encode($header_json);
	$header_json_string_base64=base64_encode($header_json_string);
	$header_json_string_base64url=str_replace('+','-',$header_json_string_base64);
	$header_json_string_base64url=str_replace('/','_',$header_json_string_base64url);
	$header_json_string_base64url=rtrim($header_json_string_base64url, '=');
	///////////////// code to generate base64url header above ///
	
	///////////////// define header string below/////////////////
	$payload='{
				"sub": "1234567890",
				"name": "Abhishek sharma",
				"id":"1"
			}';
	///////////////// define payload string above/////////////////		
	
	///////////////// code to generate base64url payload below ///
	$payload_json=json_decode($payload);
	$payload_json_string=json_encode($payload_json);
	$payload_json_string_base64=base64_encode($payload_json_string);
	$payload_json_string_base64url=str_replace('+','-',$payload_json_string_base64);
	$payload_json_string_base64url=str_replace('/','_',$payload_json_string_base64url);
	$payload_json_string_base64url=rtrim($payload_json_string_base64url, '=');
	///////////////// code to generate base64url payload above ///
	
	///////////////// define secret string below/////////////////
	$secret='123456';
	///////////////// define secret string above/////////////////
	
	///////////////// code to generate base64url signature below ///
	$signature = hash_hmac('sha256', $header_json_string_base64url.'.'.$payload_json_string_base64url, $secret,true);
	$signature_base64=base64_encode($signature);
	$signature_base64url=str_replace('+','-',$signature_base64);
	$signature_base64url=str_replace('/','_',$signature_base64url);
	$signature_base64url=rtrim($signature_base64url, '=');
	///////////////// code to generate base64url signature above ///
	
	///////////////// code to generate jwt below ///////////////////
	$jwt=$header_json_string_base64url.'.'.$payload_json_string_base64url.'.'.$signature_base64url;
	///////////////// code to generate jwt above ///////////////////
	
	echo $header_json_string.'<br>';
	echo $header_json_string_base64.'<br>';
	echo $header_json_string_base64url.'<br><br>';
	
	echo $payload_json_string.'<br>';
	echo $payload_json_string_base64.'<br>';
	echo $payload_json_string_base64url.'<br><br>';
	
	echo $signature.'<br>';
	echo $signature_base64.'<br>';
	echo $signature_base64url.'<br><br>';
	
	echo $jwt;
	
?>