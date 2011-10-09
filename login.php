<?php
ini_set('display_errors',2); 
error_reporting(E_ALL);
include("config.php");
if ( $_POST['user'] == "" || $_POST['user'] == NULL ) {
	echo "Please enter a valid username <br />";
}
if ( $_POST['pass'] == "" || $_POST['pass'] == NULL ) {
	echo "Please enter a valid password <br />";
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
	//$_SESSION['uid'] = the database value
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['pass'] = $_POST['pass'];
	$_SESSION['logged'] = true;
}
?>