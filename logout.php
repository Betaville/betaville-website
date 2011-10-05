<?php
	session_start();
	//include("userAction.php");
	//$userActions->_logout();
	session_unset();
	session_destroy();
	//echo "You have successfully logged out";
?>
<script type="text/javascript" >
	window.location="http://localhost/betaville-website";
</script>