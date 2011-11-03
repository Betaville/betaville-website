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

		if(isset($_POST['displayName']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=changedisplayName&username='.$userName.'&displayName='.$_POST['displayName'];
			echo "Web srevice call initiated for displayname\n";
		}
		if(isset($_POST['bio']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=changebio&username='.$userName.'&bio='.$_POST['bio'];
			echo "Web srevice call initiate for bio\r";
		}
		if(isset($_POST['website']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=changewebsite&username='.$userName.'&website='.$_POST['website'];
			echo "Web srevice call initiated for website </ br>";
		}
		if(isset($_FILES['profilePicture']['name']))
		{
			echo "inside isset";
			$type= strtolower($_FILES['profilePicture']['type']);
			echo $_FILES['profilePicture']['type'];
			echo $type;
			
			$size= $_FILES['profilePicture']['size'];
			echo $size;
			
			if(($type == "image/gif") || ($type == "image/jpeg") || ($type == "image/pjpeg") || ($type == "image/png"))
			{
				if ($size < 200000)
			
				{
					echo "inside restriction";
					echo $_FILES['profilePicture']['name'];
					echo $_FILES['profilePicture']['size'];
			
					$updateUser = SERVICE_URL.'?section=user&request=updateavatar&username='.$userName.'&profilePicture='.$_FILES['profilePicture'];
					echo "Web service call initiated for picture";
				}
				else
					echo "File size too big!</ br>";
			}
			else 
			{
				echo "Incorrect file type </ br>";
			}
		}
		
		
	header("Location: profile.php"); 

	
?>
