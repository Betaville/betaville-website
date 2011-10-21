<?php
ini_set('display_errors',2); 
error_reporting(E_ALL);
include("config.php");
$count = 0;
if ( $_POST['user'] == "" || $_POST['user'] == NULL ) {
	echo "Please enter a valid username <br />";
	$count = $count + 1;
}
if ( $_POST['pass'] == "" || $_POST['pass'] == NULL ) {
	echo "Please enter a valid password <br />";
	$count = $count + 1;
}
if ( $_POST['cPass'] == "" || $_POST['cPass'] == NULL ) {
	echo "Please confirm your password <br />";
	$count = $count + 1;
}
if ( $_POST['email'] == "" || $_POST['email'] == NULL ) {
	echo "Please enter a valid email <br />";
	$count = $count + 1;
}
if ( $count > 0 ) exit();
if ( $_POST['pass'] != $_POST['cPass'] ) {
	echo "Please make sure that your confirm password matches your password <br />";
	exit();
}

$temp = SERVICE_URL.'?section=user&request=add&username='.$_POST['user']."&password=".$_POST['pass']."&email=".$_POST['email'];
$temp1 = file_get_contents($temp,0,null,null);
$userAdded = json_decode($temp1, true);
if ( $userAdded['userAdded']){
	echo "Congratulations, an activation email will be sent to the email that you provided. Please activate your account before signing in <br />";
}
else{
	echo $userAdded['userAdded'];
}
?>