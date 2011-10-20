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
if ( $_POST['email'] == "" || $_POST['email'] == NULL ) {
	echo "Please enter a valid email <br />";
	$count = $count + 1;
}
if ( $count > 0 ) exit();
$confirm_code = md5(uniqid(rand()));
$temp = SERVICE_URL.'?section=user&request=add&username='.$_POST['user']."&password=".$_POST['pass']."&email=".$_POST['email'];
$temp1 = file_get_contents($temp,0,null,null);
$userAdded = json_decode($temp1, true);
if ( $userAdded['userAdded'] == "This email address is already in use" ) {
	echo "Sorry but the email is already in use <br />";
	exit();
}
if ( $userAdded['userAdded'] == "This is not a valid email address" ) {
	echo "This is not a valid email address <br />";
	exit();
}
if ( $userAdded['userAdded'] == "This is not a valid username" ) {
	echo "This is not a valid username <br />";
	exit();
}
else if ( $userAdded['userAdded'] == "This username is already in use" ) {
	echo "Sorry but the user name is already in use <br />";
	exit();
}
else if ( $userAdded['userAdded'] == false ) {
	echo "Sorry but an error occurred adding the user <br />";
	exit();
}
else {
	$from = "Quilvin@gmail.com";
	$to = $_POST['email'];
	$subject = $_POST['user']."'s ";
	$subject .= "Betaville Activation link";
	$eol = "\n";
	$headers = 'From: Betaville <Quilvin@gmail.com>'. $eol;
	$headers .= "Reply-To: Please don't reply to this email .$eol";
	$headers .= "Message-ID:< TheSystem@" . $_SERVER['SERVER_NAME'].">".$eol;
	$headers .= "X-Mailer: PHP v" .phpversion() . $eol;
	$message = "Hello " . $_POST['user'] . ", <br />";
	$message .= "Thank you for signing up to Betaville. <br />";
	$message .= "<a href='".SERVICE_URL."?section=user&request=activateUser&code=".$confirm_code."'> Please click on this link to activate your account now </a> <br />";
	$ok = @mail($to,$subject,$message,$headers);
}
if ( !($ok) ) {
	echo "Sorry but we were unable to send the activation email to the email provided <br />";
}
else 
	echo "Congratulations an activation email will be sent to the email that you provided. Please activate your account before signing in <br />";
?>