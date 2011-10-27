<?php
	session_start();
	session_unset();
	session_destroy();
	include("config.php");
	//echo "You have successfully logged out";
?>
<script type="text/javascript" >
	window.location=<?php echo "\"".WEB_URL."\""; ?>;
</script>
