<?php include('head.php'); 
/**  
 *  editProfile Page - This page is for a user to change his password, change bio, information...redirect to userProfile.php
 *  Copyright (C) 2011-2012 Betaville
 *  
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 ?>
<body> 
<div class='master-container'>
<?php
//If user is not logged in Redirect....
if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
?>
	<script type="text/javascript" >
		window.location=<?php echo '"'.$WEB_URL.'"';?>;
	</script>
<?php 
}
//If Password entered was wrong, the Service request returns false!
if(isset($_GET['changedPass'])) {
	echo '<strong>OldPassword you entered was incorrect!!!</strong>';
}
/* NOT SURE IF THIS IS NEEDED RIGHT NOW
if(isset($_POST['displayName'])){
echo "inside displayName";
$updateUser = SERVICE_URL.'?section=user&request=changedisplayName&token='.$_SESSION['token'].'&username='.$userName.'&displayName='.$_POST['displayName'];
$temp1 = file_get_contents($updateUser,0,null,null);
$dNameChanged = json_decode($temp1, true);
if ($dNameChanged['dNameChanged'])
echo "Web service call initiated for displayName <br />";
else
echo $dNameChanged['dNameChanged']; // make sure that the web service has the same name when u code it.
}
*/

//Check if either the bio or website were updated
if(isset($_POST['bio'])||isset($_POST['website'])) {
	$userName = $_SESSION['username'];
	//Service call to change bio for a user/ urlencode string before passing through service	
	if(isset($_POST['bio'])){
		$bio_encoded = urlencode($_POST['bio']);
		$updatebioRequest = SERVICE_URL.'?section=user&request=changebio&token='.$_SESSION['token'].'&username='.$userName.'&bio='.$bio_encoded;
		$updatebioJSON = file_get_contents($updatebioRequest,0,null,null);
		$bio_changed = json_decode($updatebioJSON, true);
	}
	//Service call to change website for a user/ urlencode string before passing through service
	if(isset($_POST['website'])){
		$website_encoded = urlencode($_POST['website']);
		$updatewebsiteRequest = SERVICE_URL.'?section=user&request=changewebsite&token='.$_SESSION['token'].'&username='.$userName.'&website='.$website_encoded;
		$updatewebsiteJSON = file_get_contents($updatewebsiteRequest,0,null,null);
		$website_changed = json_decode($updatewebsiteJSON, true);
	}
?>
	
	<script type="text/javascript" >
			window.location=<?php echo "\"".WEB_URL."/profile.php\""; ?>;
	</script>
<?php
}

//Service call to Change password, merged into the same file......
if(isset($_POST['oldPass']) && isset($_POST['newPass'])){
	$updatePass = SERVICE_URL.'?section=user&request=changepass&token='.$_SESSION['token'].'&oldPass='.$_POST['oldPass'].'&newPass='.$_POST['newPass'];
	$updatePassJSON = file_get_contents($updatePass,0,null,null);
	$passChanged = json_decode(updatePassJSON, true);
	$changedPass = $passChanged['passChanged'];
		if($changedPass == 'true') {
?>
			<script type="text/javascript" >
				window.location=<?php echo "\"".WEB_URL."/profile.php\""; ?>;
			</script>
<?php		
		}
		else {
			header("Location: editProfile.php?changedPass=".$changedPass);				
		}					
}

		$userName = $_SESSION['username'];
		// get user information
		$userRequest = SERVICE_URL.'?section=user&request=getpublicinfo&username='.$userName;
		$userJSON = file_get_contents($userRequest,0,null,null);
		$userOutput = json_decode($userJSON, true);
		$user = $userOutput['userInfo'];
		$gravatarImage= $user['avatar'];		
?>
		

		<!-- User Profile Update form-->
		<div class='page-container'> 
			<div class='project-container'>
				<h1> Hello <?php echo $userName; ?>! </h1>
			<div class='projects'>
				<div  class='project-description'>
				<form name='editProfile' id='editProfile' action='editProfile.php' method='post' enctype="multipart/form-data">
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




		<!-- User Password Update form-->
		<div class='activity-section'>

		<form name='changePass' id='idChangePass' method='post' action='editProfile.php'>
		<input type="hidden" name="username" value="<?php echo $userName; ?>">
		<table class="ChangePass-section" border="0" >
				<tr><td><label>Old Password: </label></td><td><input type="password" name="oldPass" onkeypress="if (event.keyCode==13) document.getElementById('button').click()"/></td></tr>
				<tr><td><label>New Password: </label></td><td><input type="password" name="newPass" onkeypress="if (event.keyCode==13) document.getElementById('button').click()"/></td></tr>
				<tr><td><label>Confirm New Password: </label></td><td><input type="password" name="confirmPass" onkeypress="if (event.keyCode==13) document.getElementById('button').click()"/></td></tr>
				<tr><td></td><td></td></tr>
				<tr><td><input type="button" id="button" value="Change Password" onclick="verifyNewPass()"/></td></tr>
		</table>
		</form>
	
		<div id="verifyMsg" style="display:none">
			<p align="center" style="color:red">Please make sure that your Confirm Password matches your New Password</p>
		</div>
		<div id="passMsg" style="display:none">
			<p align="center" style="color:red">None of the above fields can be left blank.</p>
		</div>
		
	
		<script type="text/javascript">
			function verifyNewPass(){
			
				document.getElementById('verifyMsg').style.display="none";
				document.getElementById('passMsg').style.display="none";
				var oldPass = document.forms['changePass']['oldPass'].value;
					var newPass = document.forms['changePass']['newPass'].value;
				var confirmPass = document.forms['changePass']['confirmPass'].value;
					if(oldPass=='' || newPass=='' || confirmPass=='')
						document.getElementById('passMsg').style.display="block";
					else
						if(newPass==confirmPass){
								var formId = document.getElementById('idChangePass');
							formId.submit();
						}	
					else
								document.getElementById('verifyMsg').style.display="block";
						}
		</script>
		</div>	
	
<?php include('footer.php'); ?>
</div>
</body>
</html>
