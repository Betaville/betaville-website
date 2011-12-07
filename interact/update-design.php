<?php
// updates a design's information
// check that the user is logged in
session_start();

if(!isset($_SESSION['username'])){
	die();
}
if(isset($_GET['action'])){
	if($_GET['action']=='update'){
		if(isset($_GET['description']) && isset($_GET['id'])){
			$description = urlencode($_GET['description']);
			echo "data is ".$description;
			$designID = $_GET['id'];
			include('../config.php');
			// http://localhost/service/service.php?section=design&request=changedescription&id=7616&description=hello
			$updateRequest = SERVICE_URL.'?section=design&request=changedescription&id='.$designID.'&token='.$_SESSION['token'].'&description='.$description;
			$updateJSON = file_get_contents($updateRequest, 0, null, null);
			$updateOutput = json_decode($updateJSON, true);
			
			//var_dump($addOutput);
			
			//header('Location: ../design.php?id='.$designID);
			/*
			if($addOutput['addcomment']=='true'){
				header('Location: ../design.php?id='.$designID);
			}
			else{
				echo "Failed.";
				echo "request was ".$addRequest;
				echo $addOutput['addcomment'];
			}
			*/
		}
	}
}
else{
	header('Location: ../index.php');
}
?>
