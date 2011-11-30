<?php include('head.php'); ?>
<body> 
<div class='master-container'> 
		<?php 
		//$userName = 'scandgolden24';
		$userName = $_SESSION['username'];
		
		include('config.php');
		$changedPass=$_GET['passChanged'];
		
		// get user information
		$userRequest = SERVICE_URL.'?section=user&request=getpublicinfo&username='.$userName;
		$userJSON = file_get_contents($userRequest,0,null,null);
	//	$userJSON = file_get_contents("userScandgolden24.txt");
		$userOutput = json_decode($userJSON, true);
		$user = $userOutput['userInfo'];
		
		$gravatarImage= $user['avatar'];
		
		?>
		<div class='page-container'> 
			<div class='project-container'>
				<h1> Hello <?php echo $userName; ?>! </h1>
			<div class='projects'>
				<div  class='project-description'>
				
				<form name='editProfile' id='editProfile' action='updateProfile.php' method='post' enctype="multipart/form-data">
                <input type="hidden" name="username" value="<?php echo $userName ?>">
                <table border="0">
				<tr><td><img src=<?php echo $gravatarImage;?> height='100' width='100' style='background-color: #383838'></td>
                <tr><td><label>Name: </label></td><td><label><?php echo $user['userName'];?></label></td></tr>
				<tr><td><label>About me: </label></td><td><input type="text" name="bio" value="<?php echo $user['bio']; ?>" /></td></tr>
				<tr><td><label>Website: </label></td><td><input type="text" name="website" value="<?php echo $user['website']; ?>" /></td></tr>
				<tr><td><label>Profile: </label></td><td><label><?php echo $user['type'];?></label></td></tr>
				<tr><td></td><td></td></tr>
				<tr><td><input type="submit" name="submit" value="Update Profile" /></td></tr>
                </table>
				</form>
				
				</div>
			</div>
			
			</div>
				<aside>
					<?php
					$_GET['passChanged']=$changedPass;
					include('changePass.php');
					?>
				</aside>
		<?php include('footer.php'); ?>
		</div>
</body>
</html>