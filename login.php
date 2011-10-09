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
$userAuth = SERVICE_URL.'?section=user&request=available&username='.$_POST['user'];
$temp = file_get_contents($loginAuth,0,null,null);
$loginAuthOutput = json_decode($temp, true);
$temp2 = file_get_contents($userAuth,0,null,null);
$userAuthOutput = json_decode($temp2, true);
if ( ( $userAuthOutput['usernameAvailable'] == '1' ) && !($loginAuthOutput['authenticationSuccess'])  ){
	echo "Username or password is invalid, Please try again <br />";
	exit();
}
else {
	session_start();
	$_SESSION['uid'] = sha1();
	//$_SESSION['uid'] = the database value
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['pass'] = $_POST['pass'];
	$_SESSION['logged'] = true;
}
?>