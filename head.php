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
	<link href='./fancybox/jquery.fancybox-1.3.4.css' media='screen' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script src='./js/jquery.jcarousel.min.js'></script>
	<script src='./js/betaville.home.js'></script>
	<script src='./js/jquery.easing.1.3.js'></script>
	<script src='./fancybox/jquery.mousewheel-3.0.4.pack.js' type='text/javascript'></script>
	<script src='./fancybox/jquery.fancybox-1.3.4.pack.js' type='text/javascript'></script>
	<meta content='text/html;charset=utf-8' http-equiv='Content-Type'>
	<?php
		include("betaville-functions.php");
		include("interact/curl.php");
		include("config.php");
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
					$check = SERVICE_URL.'?section=authcheck&request=authcheck&token='.$_COOKIE['token'];
					if ( $check != false ){
						$_SESSION['uid'] = session_id();
						$_SESSION['username'] = file_get_contents($check, 0, null, null);
						$_SESSION['token'] = $_COOKIE['token'];
						$_SESSION['logged'] = true;
						$userRequest = SERVICE_URL.'?section=user&request=getlevel&username='.$_SESSION['username'];
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
				if($_SESSION['userType']==='moderator' || $_SESSION['userType']==='administrator'){
					echo "<li><a href=\"admin.php\">Admin</a></li>";
				}

			}
			?>
			</ul>
		<div class='clear'></div>
	</nav>
</header>
