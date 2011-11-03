<?php
ini_set('display_errors',2); 
error_reporting(E_ALL);
include("config.php");
$count = 0;
if ( $_POST['user'] == " " || $_POST['user'] == NULL ) {
	echo "Please enter a valid username <br />";
	$count =$count + 1;
}
if ( $_POST['pass'] == " " || $_POST['pass'] == NULL ) {
	echo "Please enter a valid password <br />";
	$count = $count + 1;
}
if ( $count > 0 ) exit();
$temp = SERVICE_URL. '?section=user&request=activated&username='.$_POST['user'];
$temp1 = file_get_contents($temp,0,null,null);
$userActivated  = json_decode($temp1, true);
if (!$userActivated){
	echo "Please activate your account before signing in <br />";
	exit();
} 
$loginAuth = SERVICE_URL.'?section=user&request=auth&username='.$_POST['user'].'&password='.$_POST['pass'];
$temp = file_get_contents($loginAuth,0,null,null);
$loginAuthOutput = json_decode($temp, true);
if ( !($loginAuthOutput['authenticationSuccess'])  ){
	echo "Username or password is invalid, Please try again <br />";
	exit();
}
else {
	session_start();
	$_SESSION['uid'] = session_id();
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['token'] = $loginAuthOutput['token'];
	$_SESSION['logged'] = true;
}
?>