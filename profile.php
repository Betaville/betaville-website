<?php
	session_start();
	//include("userAction.php");
	if (!isset($_SESSION['uid'])) {
?>
<script type="text/javascript" >
	window.location="http://localhost/betaville-website";
</script>
<?php } ?>
<?php
   include('head.php');
	include('header.php');
	echo "Welcome " . $_SESSION['username'];
?>