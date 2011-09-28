<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
include("userAction.php");
if ( $_POST['user'] == "" || $_POST['user'] == NULL ) {
	echo "Please enter a valid username <br />";
}
if ( $_POST['pass'] == "" || $_POST['pass'] == NULL ) {
	echo "Please enter a valid password <br />";
	exit();
}
if ( !($userActions->login($_POST['user'], $_POST['pass'])) && ( $userActions->isUsernameAvailable($_POST['user']) == '1' ) ){
	echo "Username or password is invalid, Please try again <br />";
	exit();
}
if ( isset($_SESSION['uid']) ) {
	echo "Welcome " . $_POST['user'];
}
?>