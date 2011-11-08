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
			$updateUser = SERVICE_URL.'?section=user&request=changedisplayName&token='.$_SESSION['token'].'&username='.$userName.'&displayName='.$_POST['displayName'];
			echo "Web service call initiated for displayname </ br>";
		}
		if(isset($_POST['bio']))
		{
			$updateUser = SERVICE_URL.'?section=user&request=changebio&token='.$_SESSION['token'].'&username='.$userName.'&bio='.$_POST['bio'];
			echo "Web service call initiate for bio </ br>";
		}
		if(isset($_POST['website']))
		{
			echo $_POST['website'];
			$updateUser = SERVICE_URL.'?section=user&request=changewebsite&token='.$_SESSION['token'].'&username='.$userName.'&website='.$_POST['website'];
			echo "Web service call initiated for website </ br>";
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
