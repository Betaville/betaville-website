<?php
function download($url){
	if(!isset($_SESSION['cookiefile'])){
		echo "new";
		$_SESSION['cookiefile'] = tempnam ("/tmp", "CURLCOOKIE");
	}
	else echo "old";

	$ch = curl_init ($url);
	curl_setopt ($ch, CURLOPT_COOKIEFILE, $_SESSION['cookiefile']); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}
?>