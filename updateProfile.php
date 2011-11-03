<?php

		session_start();
		if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
	?>
	<script type="text/javascript" >
		window.location="http://localhost/betaville-website_LocalCopy";
	</script>
	<?php 
		}
		$userName = $_SESSION['username'];
?>



<?php 
include("config.php");

		if(isset($_GET['displayName']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=editProfile&username='.$userName.'&displayName='.$_GET['displayName'];
			echo "Web srevice call initiated";
		}
		if(isset($_GET['bio']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=changebio&username='.$userName.'&bio='.$_GET['bio'];
			echo "Web srevice call initiated";
		}
		if(isset($_GET['website']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=editProfile&username='.$userName.'&displayName='.$_GET['displayName'];
			echo "Web srevice call initiated";
		}
		if(isset($_GET['profilePicture']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=updateavatar&username='.$userName.'&profilePicture='.$_GET['profilePicture'];
			echo "Web srevice call initiated";
		}
	
	/*
Redirect to profile.php
*/
?>
