<?php

session_start();

/*
 * Conditions where the user will be denied:
 * - Not logged in
 * - Not an administrator
 */
 if(!isset($_SESSION['token'])){
 	header('Location: ./');
 }
 
	// check the user's type:
	include('config.php');
	$userRequest = SERVICE_URL.'?section=user&request=getlevel&username='.$_SESSION['username'];
	$userJSON = file_get_contents($userRequest,0,null,null);
	$userOutput = json_decode($userJSON, true);
	$userType = $userOutput['userType'];
	//echo "user is a " . $userType;
 
 //http://localhost/service/service.php?section=user&request=getlevel&username=sbook
	
?>
<!doctype html> 
<html>
<head>
	<?php include('head.php'); ?> 
</head> 
<body> 
	<div class='master-container'> 
		<div class='decoration'> 
			<div class='page-title'> 
				<h1>Administer Your Betaville Server</h1> 
			</div> 
		</div> 
		<div class='page-container'> 
			<div class='page-body container' id='contribute'> 
				<div class='column span-7 append-1'> 
					<h1>Users</h1>
					<h3>Check on users</h3>
					</p>
				</div> 
				<div class='column span-7 append-1'> 
					<h1>Designs</h1>
					<h3>I'm not sure what to put here</h3>
				</div> 
				<div class='column span-7 last'> 
					<h1>Options</h1>
					<h3>Change the settings for this Betaville Server</h3>
				</div> 
			</div> 
		</div> 

		<?php include('footer.php'); ?>
	</div> 
</body> 
</html> 