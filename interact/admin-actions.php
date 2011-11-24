<?php
session_start();

// if you aren't logged in, be gone!
if(!isset($_SESSION['token'])){
	//echo "bye";
	die();
}
else{
	include('../config.php');
}
 
$action = $_POST['action'];
 
if($action=="changeusertype"){
//echo "hey";
	$actionRequest = SERVICE_URL.'?section=user&request=changetype&username='.$_POST['target'].'&type='.$_POST['type'].'&token='.$_SESSION['token'];
	echo $actionRequest;
	$actionJSON = file_get_contents($actionRequest,0,null,null);
	$actionOutput = json_decode($actionJSON, true);
}
?>