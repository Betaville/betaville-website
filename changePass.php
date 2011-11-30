<div class='activity-section'>
	
<?php
include_once('config.php');
$changedPass=$_GET['passChanged'];
echo "<br/><br/><br/>";
if($changedPass=='true')
	echo "Password Changed Successfully !";
echo "<br/><br/><br/>";
echo "<h2>Change Password?</h2>";
echo "<br/><br/>";
?>

	<form name='changePass' id='idChangePass' method='post' action='updatePass.php'>
	<input type="hidden" name="username" value="<?php echo $userName ?>">
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
	function verifyNewPass()
	{
		document.getElementById('verifyMsg').style.display="none";
		document.getElementById('passMsg').style.display="none";
		var oldPass = document.forms['changePass']['oldPass'].value;
		var newPass = document.forms['changePass']['newPass'].value;
		var confirmPass = document.forms['changePass']['confirmPass'].value;
		if(oldPass=='' || newPass=='' || confirmPass=='')
			document.getElementById('passMsg').style.display="block";
		else
			if(newPass==confirmPass)
			{	
				var formId = document.getElementById('idChangePass');
				formId.submit();
			}
			else
				document.getElementById('verifyMsg').style.display="block";
	}
</script>
</div>