<!doctype html> 
<html> 
<head>
	<?php include('head.php'); ?>
</head> 
<body> 
<div class='master-container'> 
		<?php 
		//$userName = 'scandgolden24';
		$userName = $_SESSION['username'];
		
		include('config.php');
		
		// get user information
	//	$userRequest = SERVICE_URL.'?section=user&request=getpublicinfo&username='.$userName;
	//	$userJSON = file_get_contents($userRequest,0,null,null);
		$userJSON = file_get_contents("userScandgolden24.txt");
		$userOutput = json_decode($userJSON, true);
		$user = $userOutput['userInfo'];
		
		?>
		<div class='page-container'> 
			<div class='project-container'>
				<h1> Hello <?php echo $userName; ?>! </h1>
			<div class='projects'>
				<div  class='project-description'>
				
				<form name='editProfile' action='updateProfile.php' method='get'>
                <input type="hidden" name="username" value="<?php echo $userName ?>">
                <table border="0">
				<tr><td><img src='images\sorry.gif' height='100' width='100' style='background-color: #383838'></td><td><input type="file" name="profilePicture" value="Upload Picture"></td></tr>
                <tr><td><label>Name: </label></td><td><input type="text" name="displayName" value="<?php echo $user['displayName']; ?>" /></td></tr>
				<tr><td><label>About me: </label></td><td><input type="text" name="bio" value="<?php echo $user['bio']; ?>" /></td></tr>
				<tr><td><label>Website: </label></td><td><input type="text" name="website" value="<?php echo $user['website']; ?>" /></td></tr>
				<tr><td><label>Profile: </label></td><td><label><?php echo $user['type'];?></label></td></tr>
				<tr><td><input type="submit" name="submit" value="Update Profile" /></td></tr>
                </table>
				</form>
								
				</div>
		
			</div>
		<?php include('footer.php'); ?>
		</div>
</body>
</html>