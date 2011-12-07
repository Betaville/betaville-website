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
		echo "inside updatePass";
		if(isset($_POST['oldPass']) && isset($_POST['newPass']))
		{
			echo "inside passArea";
			$updatePass = SERVICE_URL.'?section=user&request=changepass&token='.$_SESSION['token'].'&oldPass='.$_POST['oldPass'].'&newPass='.$_POST['newPass'];
			$temp1 = file_get_contents($updateUser,0,null,null);
			$passChanged = json_decode($temp1, true);
			if ($passChanged['passChanged'])
				echo "Web service call initiated for passChange <br />";
			else
				echo $passChanged['passChanged'];
		}

	$changedPass=$passChanged['passChanged'];	
	header("Location: editProfile.php?&passChanged=$changedPass");

?>