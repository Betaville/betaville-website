<?php
	session_start();
	if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
?>
<script type="text/javascript" >
	window.location="http://localhost/betaville-website";
</script>
<?php } ?>
<?php
	include('head.php');
 echo "Welcome " . $_SESSION['username'];
?>
