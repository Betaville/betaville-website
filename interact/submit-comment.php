<?php
// submits a comment
// check that the user is logged in
session_start();
if(!isset($_SESSION['username'])){
	die();
}

if(isset($_POST['commentText']) && isset($_POST['designID'])){
	$commentText = $_POST['commentText'];
	$designID = $_POST['designID'];
	
	include('../config.php');
	$addRequest = SERVICE_URL.'?section=comment&request=add&designID='.$designID.'&comment='.$commentText.'&token='.$_SESSION['token'];
	$addJSON = curl_exec(curl_init($addRequest));
	$addOutput = json_decode($addJSON, true);
	if($addOutput['addcomment']){
		header('Location: ../design.php?id='.$designID);
	}
	else{
		echo "Failed.";
		echo "request was ".$addRequest;
		echo $addOutput['addcomment'];
	}
}

?>