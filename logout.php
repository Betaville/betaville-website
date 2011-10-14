<?php
	session_start();
	session_unset();
	session_destroy();
	//echo "You have successfully logged out";
?>
<script type="text/javascript" >
	window.location="http://localhost/betaville-website";
</script>
