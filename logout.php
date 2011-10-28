<?php
	session_start();

	include("config.php");
	$logoutRequest = SERVICE_URL."?section=user&request=endsession&token=".$_SESSION['token'];
	file_get_contents($logoutRequest, 0, null, null);

	session_unset();
	session_destroy();
	
	setcookie("token",$_SESSION['token'],time() - 3600 );
	
	
	
	//echo "You have successfully logged out";
?>
<script type="text/javascript" >
	window.location=<?php echo "\"".WEB_URL."\""; ?>;
</script>
