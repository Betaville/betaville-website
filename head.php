<head>
<title>Betaville</title> 
	<link href='stylesheets/reset.css' rel='stylesheet'> 
	<link href='stylesheets/screen.css' rel='stylesheet'> 
	<script src='js/jquery-1.4.2.min.js'></script> 
	<script src='js/jquery.jcarousel.min.js'></script> 
	<script src='js/betaville.home.js'></script> 
	<script src='js/jquery.easing.1.3.js'></script> 
	<script src='fancybox/jquery.mousewheel-3.0.4.pack.js' type='text/javascript'></script> 
	<script src='fancybox/jquery.fancybox-1.3.4.pack.js' type='text/javascript'></script> 
	<link href='fancybox/jquery.fancybox-1.3.4.css' media='screen' rel='stylesheet' type='text/css'> 
	<meta content='text/html;charset=utf-8' http-equiv='Content-Type'> 
	<meta name="csrf-param" content="authenticity_token"/> 
	<meta name="csrf-token" content="kg1Klytrjq1CyeFy3G1cujAERmXA69mxelZXrv9FcFc="/>
	<?php include("betaville-functions.php"); ?>
<head>
</body>
<header>
	<nav>
		<ul>
			<li class='logo'>
				<a href='./'>
					<img src='images/logo-header.png'>
				</a>
			</li>
			<li><a href='http://betaville.net/webstart/betaville.jnlp'>Download</a></li>
			<li><a class='' href='what-is-betaville.php'>Info</a></li>
			<li><a class='' href='proposals.php'>Explore</a></li>
			<li><a class='' href='contribute.php'>Contribute</a></li>
			<li>
			<?php 
			ob_start();
			if ( !isset($_SESSION['logged']))
				session_start();
			//include("userAction.php");
			//isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && $userActions->login($_COOKIE["user"], $_COOKIE["pass"],false)
			//echo $_COOKIE['user'];
			if ( isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
			?>
			<a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
			<li>
			<?php echo "<a href=\"logout.php\">Log Out</a>";
			}
			?>
			</ul>
		<div class='clear'></div>
	</nav>
</header>
