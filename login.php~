<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
include("config.php");
if ( $_POST['user'] == "" || $_POST['user'] == NULL ) {
	echo "Please enter a valid username <br />";
}
if ( $_POST['pass'] == "" || $_POST['pass'] == NULL ) {
	echo "Please enter a valid password <br />";
	exit();
}
$loginAuth = SERVICE_URL.'?user='.$_POST['user'].'&pass='.$_POST['pass'].'';
$userAuth = SERVICE_URL.'?user='.$_POST['user'].'';
if ( ( $userAuth == '1' ) || !($loginAuth)  ){
	echo "Username or password is invalid, Please try again <br />";
	exit();
}
else {
	echo "Welcome " . $_POST['user'];
}
?>