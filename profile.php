<?php
	include('head.php');
	include('config.php');
	if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
?>
<script type="text/javascript" >
	window.location=<?php echo "\"".WEB_URL."\""; ?>;
</script>
<?php } ?>
<?php
 echo "Welcome " . $_SESSION['username'];
?>
