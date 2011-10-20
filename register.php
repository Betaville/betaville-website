<?php
ini_set('display_errors',2); 
error_reporting(E_ALL);
?>
<!doctype html>
<html>
<?php include('head.php'); ?>
	<body>
		<div class='master-container'>
		<div class='tagline'>
			<div class='tagline-body'>
				<div class='tagline-close' onclick="$('.tagline').slideUp()">
					<span class='icon'>D</span>
				</div>
				<div class='tagline-text'>
					<div class='text-body'>
						<p class='p1'>A <strong>collaborative online platform</strong> for</p>
						<br>
						<p class='p1'><strong>proposals on urban design</strong></p>
						<div class='button-row'>
							<a class='uberbutton green' href='http://betaville.net/webstart/betaville.jnlp'>
								Download now
								<span class='icon i-play'>►</span>
							</a>
							<a class='text' href='what-is-betaville.php'>Get info »</a>
							<a class='text' href='http://www.youtube.com/watch?v=bZ6lN0Wtlb4&amp;autoplay=1' id='thevideo'>Watch a demo »</a>
						</div>
					</div>
				</div>
				<div class='carousel'>
					<ul id='tagline-carousel'>
						<li class='carousel-futuristic'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Futuristic</span>
							</div>
							<a class='carousel-learn-more' href='what-is-betaville.php'>Learn more »</a>
						</li>
						<li class='carousel-opensource'>

							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Open Source</span>
							</div>
							<a class='carousel-learn-more' href='contribute.php'>Learn more »</a>
						</li>
						<li class='carousel-participatory'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Participatory</span>
							</div>
							<a class='carousel-learn-more' href='contribute.php'>Learn more »</a>
						</li>
						<li class='carousel-publicart'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Public art</span>
							</div>
							<a class='carousel-learn-more' href='what-is-betaville.php'>Learn more »</a>
						</li>
					</ul>

					<div class='carousel-nav' id='tagline-carousel-nav'>
						<a href=''></a>
						<a href=''></a>
						<a href=''></a>
						<a href=''></a>
						<div class='active'></div>
					</div>
				</div>
			</div>
			<div class='page-container'>
			<script type="text/javascript">
			function ajaxRequest() {
				var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"]; //activeX versions to check for in IE
				if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
					for (var i=0; i<activexmodes.length; i++){
						try{
							return new ActiveXObject(activexmodes[i]);
						}
						catch(e){
							alert("error");
						}
					}
				}
				else if (window.XMLHttpRequest) // if Mozilla, Safari etc
					return new XMLHttpRequest();
				else
					return false;
			}
			function submitAjax(){
				var mypostrequest=new ajaxRequest();
				mypostrequest.onreadystatechange=function(){
					if (mypostrequest.readyState==4){
						if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
							document.getElementById("myDiv").innerHTML=mypostrequest.responseText;
							var error = "Please enter a valid username <br />";
							var error1 = "Please enter a valid password <br />";
							var error2 = "Please enter a valid email <br />";
							var error3 = error + error1 + error2;
							var error4 = "Sorry but the user name is already in use <br />";
							var error5 = "Sorry but the email address is already in use <br />";
							var error6 = "Sorry but an error occurred adding the user <br />";
							var error7 = "Sorry but we were unable to send the activation email to the email provided <br />";
							var error8 = "This is not a valid email address <br />";
							var error9 = "This is not a valid username <br />";
							if ( mypostrequest.responseText != error && mypostrequest.responseText != error1 && mypostrequest.responseText != error2 && mypostrequest.responseText != error3 && mypostrequest.responseText !=error4 && mypostrequest.responseText !=error5 && mypostrequest.responseText !=error6 && mypostrequest.responseText !=error7 && mypostrequest.responseText !=error8 && mypostrequest.responseText !=error9){
								//window.location = "http://localhost/betaville-website/index.php";
								document.getElementById("myDiv").style.display="block";
							}
							else 
								document.getElementById("myDiv").style.display="block";
						}
						else{
							alert("An error has occured making the request");
							//alert(mypostrequest.status);
						}
					}
				}
				var userName = document.forms["credentials"]["user"].value;
				var password = document.forms["credentials"]["pass"].value;
				var email = document.forms["credentials"]["email"].value;
				var parameters="user="+userName+"&pass="+password+"&email="+email;
				mypostrequest.open("POST", "register-ajax.php", true);
				mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				mypostrequest.send(parameters)
			}
			</script>
			<center><h2>Registration Form</h2></center>
			<div class="register-section" id="form" style="display:block">
			<center><div id="myDiv" style="display:none"><h2></h2></div></center>
			<form name="credentials" method="post">
				<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Username:<input type="text" name="user" size="10"></center>
				<center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password:<input type="password" name="pass" size="10"></center>
				<center>E-mail Address:<input type="text" name="email" size="10" class="inputs"></center>
				<center><input type="button" value="Register" onClick="submitAjax()"></center>
			</form>
		</div>
		<center><?php include('footer.php'); ?></center>
		</div>
		</body>
</html>