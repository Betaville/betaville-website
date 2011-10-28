<?php
session_start();
ob_start();
?>
<!doctype html>
<html>
<head>
<title>Betaville</title> 
	<link href='./stylesheets/reset.css' rel='stylesheet'> 
	<link href='./stylesheets/screen.css' rel='stylesheet'> 
	<script src='./js/jquery-1.4.2.min.js'></script> 
	<script src='./js/jquery.jcarousel.min.js'></script> 
	<script src='./js/betaville.home.js'></script> 
	<script src='./js/jquery.easing.1.3.js'></script> 
	<script src='./fancybox/jquery.mousewheel-3.0.4.pack.js' type='text/javascript'></script> 
	<script src='./fancybox/jquery.fancybox-1.3.4.pack.js' type='text/javascript'></script> 
	<link href='./fancybox/jquery.fancybox-1.3.4.css' media='screen' rel='stylesheet' type='text/css'> 
	<meta content='text/html;charset=utf-8' http-equiv='Content-Type'> 
	<meta name="csrf-param" content="authenticity_token"/> 
	<meta name="csrf-token" content="kg1Klytrjq1CyeFy3G1cujAERmXA69mxelZXrv9FcFc="/>
	<?php
		include("betaville-functions.php");
		include("interact/curl.php");
	 ?>
</head>
<header>
	<nav>
		<ul>
			<li class='logo'>
				<a href='./'>
					<img src='./images/logo-header.png'>
				</a>
			</li>
			<li><a href='http://betaville.net/webstart/betaville.jnlp'>Download</a></li>
			<li><a class='' href='./what-is-betaville.php'>Info</a></li>
			<li><a class='' href='./proposals.php'>Explore</a></li>
			<li><a class='' href='./contribute.php'>Contribute</a></li>
			<?php
				if ( isset($_COOKIE['token'])) {
					include("config.php");
					$check = SERVICE_URL.'?section=authcheck&request=authcheck&token='.$_COOKIE['token'];
					if ( $check != false ){
						$_SESSION['uid'] = session_id();
						$_SESSION['username'] = file_get_contents($check, 0, null, null);
						echo "username is " . $_SESSION['username'];
						$_SESSION['token'] = $_COOKIE['token'];
						$_SESSION['logged'] = true;
						// this next line is for debugging only and should be removed
						$_SESSION['size'] = sizeof($_SESSION);
						$userRequest = SERVICE_URL.'?section=user&request=getlevel&username='.$check;
						$userJSON = file_get_contents($userRequest,0,null,null);//download($userRequest);
						$userOutput = json_decode($userJSON, true);
						$_SESSION['userType'] = $userOutput['userType'];
					}
				}
			?>
			<?php
			if ( isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
			?>
			<li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
			
			<?php echo "<li><a href=\"logout.php\">Log Out</a></li>";
			
			// if the user is a moderator or administrator, show the admin link
				if($_SESSION['userType']=='moderator' || $_SESSION['userType']=='administrator'){
					echo "<li><a href=\"admin.php\">Admin</a></li>";
				}
			}
			?>
			</ul>
		<div class='clear'></div>
	</nav>
</header>
