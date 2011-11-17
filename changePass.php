<div class='activity-section'>
	
<?php
include_once('config.php');
echo "<br/><br/><br/><br/><br/><br/>";
echo "<h2>Change Password?</h2>";
echo "<br/><br/>";
?>

	<form name='changePass' method='post'>
	<input type="hidden" name="username" value="<?php echo $userName ?>">
	<table class="ChangePass-section" border="0" >
		<tr><td><label>Old Password: </label></td><td><input type="password" name="oldPass" onkeypress="if (event.keyCode==13) document.getElementById('submit').click()"/></td></tr>
		<tr><td><label>New Password: </label></td><td><input type="password" name="newPass" onkeypress="if (event.keyCode==13) document.getElementById('submit').click()"/></td></tr>
		<tr><td><label>Confirm New Password: </label></td><td><input type="password" name="confirmPass" onkeypress="if (event.keyCode==13) document.getElementById('submit').click()"/></td></tr>
		<tr><td></td><td></td></tr>
		<tr><td><input type="button" id="submit" value="Change Password" onclick="verifyNewPass()"/></td></tr>
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
	//	alert("newPass is "+newPass);
	//	alert("confirmPass is "+confirmPass);
		if(oldPass=='' || newPass=='' || confirmPass=='')
			document.getElementById('passMsg').style.display="block";
		else
			if(newPass==confirmPass)
			{	
			//	alert("Yippy!!");
				var parameters="oldPass="+oldPass+"&newPass="+newPass;
				var mypostrequest=new ajaxRequest();
				mypostrequest.open("POST", "updatePass.php", true);
				mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				mypostrequest.send(parameters);
			}
			else
				document.getElementById('verifyMsg').style.display="block";
	}
</script>
</div>