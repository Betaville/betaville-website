<?php
session_start();

// if you aren't logged in, be gone!
if(!isset($_SESSION['token'])){
	die();
}
else{
	include('../config.php');
}
 
$action = $_POST['action'];
 
if($action=="changeusertype"){
	$actionRequest = SERVICE_URL.'?section=user&request=changetype&username='.$_POST['target'].'&type='.$_POST['type'].'&token='.$_SESSION['token'];
	$actionJSON = file_get_contents($actionRequest,0,null,null);
	$actionOutput = json_decode($actionJSON, true);
	header("Location: ".WEB_URL."/admin.php?action=edituser&target=".$_POST['target']);
}
?>