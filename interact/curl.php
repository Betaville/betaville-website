<?php

// Check if a curl handle is already setup for this session
if(!isset($_SESSION['curl'])){
	
	/*
	// if it curl hasn't been initialized, set it up
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		if(strpos($_SERVER['SERVER_SOFTWARE'], "Win")===false){
			curl_setopt($curl, curlopt_cookiejar, "/dev/null");
		}
		else{
			curl_setopt($curl, curlopt_cookiejar, "NUL");
		}
		
	// Assign curl to the session variable
	$_SESSION['curl'] = $curl;
	*/
}

if(!isset($_SESSION['curlcookie'])){
	
	echo "creating";
	
	$ckfile = tempnam ("/tmp", "CURLCOOKIE");
	$_SESSION['curlcookie'] = $ckfile;
}

function bv_download($url){
	//curl_setopt($_SESSION['curl'], CURLOPT_URL, $url);
	//return curl_exec($_SESSION['curl']);
	
	$ch = curl_init ($url);
	curl_setopt ($ch, CURLOPT_COOKIEFILE, $_SESSION['curlcookie']); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec ($ch);
}
?>