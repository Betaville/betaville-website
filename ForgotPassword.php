<?php 
ob_start(); 
include('head.php');


	if(isset($_GET['sentMail'])) {
		
		$passChangeRequest = SERVICE_URL.'?section=user&request=changeCode&email='.urlencode($_POST['email']).'&websiteUrl='.WEB_URL.'/ForgotPassword.php?newCode=';
		$changeJSON = file_get_contents($passChangeRequest,0,null,null);
		$changeOutput = json_decode($changeJSON, true);
		$newCode = $changeOutput['codeChangeSuccess'];
		if($newCode===true) {
			echo "verification email has been sent, click on the link there";
		}
		else {
			echo "You have not been activated yet, click on the email link to get activated";
		}		
		//header('Location:'.WEB_URL.'/ForgotPassword.php?newCode='.$a);
		}
	
	else if(isset($_GET['newCode'])) {
		if(isset($_GET['newCode'])) {
			$code=$_GET['newCode'];
			$passChangeRequest = SERVICE_URL.'?section=user&request=checkCode&newCode='.urlencode($code);
			$changeJSON = file_get_contents($passChangeRequest,0,null,null);
			$changeOutput = json_decode($changeJSON, true);
			$newCode = $changeOutput['codeChangeSuccess'];
				if($newCode===true) {?>
				


					<script type="text/javascript">
			
						function validateForm() {
							var x=document.getElementById("newPass1");
							var y=document.getElementById("newPass2");
							if (x.value=="" || y.value==""){
		              					  alert("Insert Both the Values");
								x.focus();
								  return false;
							  }		
							if(x.value!=y.value){
								alert("Both the passwords should be same");
								x.value=null;
								y.value=null;
								x.focus();
								return false;
							  }
							return true;
						}	
					</script>
	


	<br><br>
	<center><h2>Update Password</h2></center>
				<center><div id="myDiv" style="display:none"><h2></h2></div></center>
				<div class="register-section" id="form" style="display:block">
				<form name="credentials" method="post" action="ForgotPassword.php?changed=true&code=<?php echo $code;?>">
				<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; New Password:<input id="newPass1" type="password" name="newPass1" size="29" ></center>
				<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Confirm New Password:<input id="newPass2" type="password" name="newPass2" size="29" ></center>
				<center><input  type="submit" id="submit" value="Change pass" onClick="return validateForm()"></center>
				</form> 
<?
				}
				else {
					echo '<strong>'."Validation failed".'</strong>';
				}	
		}
	}	
	elseif(isset($_GET['sendVeri'])) {
	?>
	
	<script type="text/javascript">
	
		function validateEmail(){

			var x=document.forms["credentials"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
					alert("Not a valid e-mail address");
  					return false;
				  }
		}
	</script>
					<center><h2>Enter Your Email </h2></center>
				<center><div id="myDiv" style="display:none"><h2></h2></div></center>
				<div class="register-section" id="form" style="display:block">
				<form name="credentials" method="post" action='ForgotPassword.php?sentMail=true' onsubmit="return validateEmail()">
					<center> Enter email id: <input id="email" type="text" name="email" size="29" ></center>
					<center><input  type="submit" id="submit" value="Send Email" ></center>
				</form> 
	<?	
	}
	else if(isset($_GET['changed'])&&isset($_GET['code'])) {
		$code=$_GET['code'];
		$password=$_POST['newPass1'];
		$passChangeRequest = SERVICE_URL.'?section=user&request=changePassword&newCode='.urlencode($code).'&password='.urlencode($password);
		$changeJSON = file_get_contents($passChangeRequest,0,null,null);
		$changeOutput = json_decode($changeJSON, true);
		$newCode = $changeOutput['PassChanged'];	
		if($newCode===true) {
			echo '<strong>'."Password changed, Use this password to login".'</strong>';
		}	
		else {
			echo '<strong>'."Validation failed".'</strong>';
		}
		
	}

	

	
	else {}
	include('footer.php'); 
	?>

