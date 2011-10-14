<!doctype html> 
<html> 
<head>
	<?php include('head.php'); ?>
</head> 
<body> 


<?php
// setup the basics

include('config.php');
$user = $_GET['username'];

// get the user's information

$userRequest = SERVICE_URL.'?section=user&request=getpublicinfo&username='.$user;
$userJSON = file_get_contents($userRequest,0,null,null);
$userOutput = json_decode($userJSON, true);
$user = $userOutput['userInfo'];

?>
<div class='master-container'> 
	<div class='page-container'> 
		<div class='page-body container project' id='project'> 
			<div class='project-container'> 
				<h1><?php echo $user['userName']; ?></h1>
				<div class='project-description'>
					<?php echo $user['bio']; ?>
				</div>
			</div> 
			<aside>
				<?php //echo "<img src='".THUMBNAIL_URL.$designID.".png'>" ?>
			</aside> 
		</div> 

	</div> 
	<?php include('footer.php'); ?>
</div> 
</body> 
</html> 
