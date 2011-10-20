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
			<div class='project-container'>							<!--change-->
				<h1> Hello <?php echo $userName; ?>! </h1>
			<div class='projects'>
				<div  class='project-description'>
				<!--<form name='editProfile' action='profile.php' method='get'>
				<input type="hidden" name="username" value="<?php echo $userName ?>">
				<label>Name: </label><input type="text" name="displayname" value="<?php echo $user['displayName']; ?>" /><br />
				<label>About me: </label><input type="text" name="bio" value="<?php echo $user['bio']; ?>" /><br />
				<label>Website: </label><input type="text" name="website" value="<?php echo $user['website']; ?>" /><br />
				<label>Profile: </label><label><?php echo $user['type'];?></label><br />
				<img src='images\Mike.jpg' height='100' width='100' style='background-color: #383838'><br />
				<input type="submit" name="submit" value="Update Profile" />
				</form>
				-->
				
				<form name='editProfile' action='profile.php' method='get'>
                <input type="hidden" name="username" value="<?php echo $userName ?>">
                <table border="0">
				<tr><td><img src='images\sorry.gif' height='100' width='100' style='background-color: #383838'></td><td><input type="file" name="profilePicture" value="Upload Picture"></td></tr>
                <tr><td><label>Name: </label></td><td><input type="text" name="name" value="<?php echo $user['displayName']; ?>" /></td></tr>
				<tr><td><label>About me: </label></td><td><input type="text" name="bio" value="<?php echo $user['bio']; ?>" /></td></tr>
				<tr><td><label>Website: </label></td><td><input type="text" name="website" value="<?php echo $user['website']; ?>" /></td></tr>
				<tr><td><label>Profile: </label></td><td><label><?php echo $user['type'];?></label></td></tr>
				<tr><td><input type="submit" name="submit" value="Update Profile" /></td></tr>
                </table>
				</form>
				
				<?php
/*				echo "Name: ".$user['displayName']."\n<br />";
				echo "Profile: ".$user['type']."\n<br />";
				echo "About me: ".$user['bio']."\n<br />";
				echo "Website: ".$user['website']."\n<br />";
			//	echo "<img src='".THUMBNAIL_URL.$designID.".png'>";
				echo "<img src='images\Mike.jpg' height='100' width='100' style='background-color: #383838'>";
*/				?>
				
				</div>
			
		
		
		
		</div>
		<?php include('footer.php'); ?>
</div>
</body>
</html>