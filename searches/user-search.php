<?php
// searches for users
include('../config.php');
$userRequest = SERVICE_URL.'?section=user&request=finduser&username='.$_GET['query'];
$userJSON = file_get_contents($userRequest,0,null,null);
$userOutput = json_decode($userJSON, true);
$users = $userOutput['users'];

$userResults = "";

foreach($users as $user){
	$userResults = $userResults.'<a href="http://localhost/">user!</a></br>';
}

echo $userResults;
?>