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
		}
		if(isset($_POST['bio']))
		{
			echo "inside bio";
			$updateUser = SERVICE_URL.'?section=user&request=changebio&token='.$_SESSION['token'].'&username='.$userName.'&bio='.$_POST['bio'];
			$temp1 = file_get_contents($updateUser,0,null,null);
			$bioChanged = json_decode($temp1, true);
			if ($bioChanged['bioChanged'])
				echo "Web service call initiated for bio <br />";
			else
				echo $bioChanged['bioChanged'];
		}
		if(isset($_POST['website']))
		{
			echo "inside website";
			echo $_POST['website'];
			$updateUser = SERVICE_URL.'?section=user&request=changewebsite&token='.$_SESSION['token'].'&username='.$userName.'&website='.$_POST['website'];
			$temp1 = file_get_contents($updateUser,0,null,null);
			$websiteChanged = json_decode($temp1, true);
			if ($websiteChanged['websiteChanged'])
				echo "Web service call initiated for website <br />";
			else
				echo $websiteChanged['websiteChanged'];
		}
		
		
	 header("Location: profile.php");

	
?>
