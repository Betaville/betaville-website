<?php
// searches for users
include('../config.php');
$userRequest = SERVICE_URL.'?section=user&request=finduser&username='.$_GET['query'];
$userJSON = file_get_contents($userRequest,0,null,null);
$userOutput = json_decode($userJSON, true);
$users = $userOutput['users'];

$linkToUser = "";
if($_GET['link']=="admin"){
	$linkToUser = WEB_URL."/admin.php?action=edituser&target=";
}

$userResults = "";

foreach($users as $user){
	$userResults = $userResults.'<a href="'.$linkToUser.$user.'">'.$user.'</a></br>';
}

echo $userResults;
?>