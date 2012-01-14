<?php
	session_start();
	include("config.php");
	if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
?>
	<script type="text/javascript" >
		window.location=<?php echo '"'.$WEB_URL.'"';?>;
	</script>
<?php 
	}
	$userName = $_SESSION['username'];
?>

<?php
		/* NOT SURE IF THIS IS NEEDED RIGHT NOW
		if(isset($_POST['displayName']))
		{
			echo "inside displayName";
			$updateUser = SERVICE_URL.'?section=user&request=changedisplayName&token='.$_SESSION['token'].'&username='.$userName.'&displayName='.$_POST['displayName'];
			$temp1 = file_get_contents($updateUser,0,null,null);
			$dNameChanged = json_decode($temp1, true);
			if ($dNameChanged['dNameChanged'])
				echo "Web service call initiated for displayName <br />";
			else
				echo $dNameChanged['dNameChanged']; // make sure that the web service has the same name when u code it.
		}*/
		

		//Service call to change bio for a user/ urlencode string before passing through service	
		if(isset($_POST['bio']))
		{
			$bio_encoded = urlencode($_POST['bio']);
			$updatebioRequest = SERVICE_URL.'?section=user&request=changebio&token='.$_SESSION['token'].'&username='.$userName.'&bio='.$bio_encoded;
			$updatebioJSON = file_get_contents($updatebioRequest,0,null,null);
			$bio_changed = json_decode($updatebioJSON, true);
		}
		//Service call to change website for a user/ urlencode string before passing through service
		if(isset($_POST['website']))
		{
			$website_encoded = urlencode($_POST['website']);
			$updatewebsiteRequest = SERVICE_URL.'?section=user&request=changewebsite&token='.$_SESSION['token'].'&username='.$userName.'&website='.$website_encoded;
			$updatewebsiteJSON = file_get_contents($updatewebsiteRequest,0,null,null);
			$website_changed = json_decode($updatewebsiteJSON, true);
		}
	//header("Location: profile.php");

	
?>
<script type="text/javascript" >
	window.location=<?php echo "\"".WEB_URL."/profile.php\""; ?>;
</script>
