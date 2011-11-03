<?php
// submits a comment
// check that the user is logged in
session_start();
if(!isset($_SESSION['username'])){
	die();
}

if(isset($_POST['commentText']) && isset($_POST['designID'])){
	$commentText = urlencode($_POST['commentText']);
	$designID = $_POST['designID'];
	
	include('../config.php');
	$addRequest = SERVICE_URL.'?section=comment&request=add&designID='.$designID.'&token='.$_SESSION['token'].'&comment='.$commentText;
	$addJSON = file_get_contents($addRequest, 0, null, null);
	$addOutput = json_decode($addJSON, true);
	//var_dump($addOutput);
	
	header('Location: ../design.php?id='.$designID);
	/*
	if($addOutput['addcomment']=='true'){
		header('Location: ../design.php?id='.$designID);
	}
	else{
		echo "Failed.";
		echo "request was ".$addRequest;
		echo $addOutput['addcomment'];
	}
	*/
}

?>
