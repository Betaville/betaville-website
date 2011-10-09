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
			session_start();
			//include("userAction.php");
			//isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && $userActions->login($_COOKIE["user"], $_COOKIE["pass"],false)
			//echo $_COOKIE['user'];
			if ( isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
			?>
			<?php echo $_SESSION['username']; ?><input type="button" id="button" value="Log Out" onclick="location.href='logout.php';">
			<?php
			}
			?>
			</li>
		</ul>
		<div class='clear'></div>
	</nav>
</header>
