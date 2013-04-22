<?php 
/**  
 *  index.php - index file for betaville implementation website
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
ob_start(); 
include('head.php');
?>

<body>
	<div class='master-container'>
		<div class='tagline'>
			<div class='tagline-body'>
				<div class='tagline-text'>
					<div class='text-body'>
						<p class='p1'>A <strong>collaborative online platform</strong> for</p>
						<br>
						<p class='p1'><strong>proposals on urban design</strong></p>
						<div class='button-row'>
							<a class='uberbutton green' href='http://betaville.net/webstart/betaville.jnlp'>
								Webstart
								<span class='icon i-play'></span>
							</a>
							<a class='uberbutton green' href='http://betaville.net/webstart/betaville.app'>
								Download for Mac
								<span class='icon i-play'></span>
							</a>
							<a class='text' href='what-is-betaville.php'>Get info »</a>
							<a class='text' href='http://vimeo.com/37300439' id='video'>Watch a demo »</a>
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
				<div class='page-body container' id='home'>
					</div>
					<div class='project-container'>
						<div class="search">
						<h2>Search</h2>
						<form id="searchForm" method="post" action="search.php">
							<input type="radio" name="searchType" value="0" checked="true">Display Name
							<input type="radio" name="searchType" value="1">Projects
							<input type="radio" name="searchType" value="2">ID
							<input type="text"  name="searchField" size="29"> <input type="submit" value="search"><br><br>
							</form>
						</div>

					<h2>Featured Projects</h2>
						<?php
					// get the featured proposals
					// swap to request=proposals or request=versions
					if(isset($_SESSION['username'])) {
					$proposalRequest = SERVICE_URL."?section=proposal&request=getfeatured&quantity=7&token=".$_SESSION['token']."&username=".$_SESSION['username'];
					}
					else {
					$proposalRequest = SERVICE_URL."?section=proposal&request=getfeatured&quantity=7&token=".$_SESSION['token'];
					}
					$proposalJSON = file_get_contents($proposalRequest,0,null,null);
					$proposalOutput = json_decode($proposalJSON, true);
					$proposals = $proposalOutput['designs'];

					for($i = 0; $i < sizeof($proposals); ++$i){

						$proposal = $proposals[$i];

						if($i==0){
							?>
							<div class='project-featured'>
								<div class='f-10 project'>
									<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>>
										<?php
										//Check if image exists on server
										$image = checkimage(THUMBNAIL_URL.$proposal['designID'].'.png'); ?>
										<img src=<?php echo $image;?> style='background-color: #3e4b71'>
									</a>
									<div class='project-info'>
										<h3>
											<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>><?php echo $proposal['name']; ?><span class='icon'>&nbsp;</span></a>
										</h3>
										<div class='project-meta'>
											<ul>
												<li>
													<strong>Author&nbsp;</strong>
                                                    <a href='profile.php?uName=<?php echo $proposal['user']; ?>'><?php echo $proposal['user']; ?></a>
													
												</li>

												<li>
													<strong>Last&nbsp;Update</strong>
													<?php 	//echo $proposal['date']; Leaving code open if changes dont have to be made
												$updatedtime = fd($proposal['date']);
												timediff($updatedtime); ?>
												
											</li>
											<li>
												<span class='comment'>

													<span class='count'>
														<?php 	//Showing number of comments by using the webservice to fetch comments for designs on $proposal['designID'] ^_^
													$commentCount = displayComments(SERVICE_URL.'?section=comment&request=getforid&id='.$proposal['designID']); ?>		
												</span>

												<span class='count'>
													<?php
													// count the number of comments
													$likeCount = countLikes($proposal['designID']);
													echo $likeCount." likes";									
													?>
												</span>



											</span>
											
										</li>
										<li>
											<strong>ID:</strong>
											<?php echo $proposal['designID']; ?>
										</li>
									</ul>
								</div>
								<div class='project-description'><?php echo $proposal['description']; ?></div>

							</div>
						</div>
					</div>
					<div class='projects'>
						<?php
				}
				else{
					?>
					<div class='f-9 project'>
						<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>>
							<?php

							//Check if image exists
							$image = checkimage(THUMBNAIL_URL.$proposal['designID'].'.png'); ?>
							<img src=<?php echo $image;?> style='background-color: #3e4b71'>
						</a>
						<div class='project-info'>
							<h3>
								<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>><?php echo $proposal['name']; ?><span class='icon'>&nbsp;</span></a>
							</h3>
							<div class='project-meta'>
								<ul>
									<li>
										<strong>Author&nbsp;</strong>
                                       <a href='profile.php?uName=<?php echo $proposal['user']; ?>'><?php echo $proposal['user']; ?></a>
										
									</li>

									<li>
										<strong>Last&nbsp;Update</strong>
										<?php 	//echo $proposal['date']; Leaving code open if changes dont want to be made 
									$updatedtime = fd($proposal['date']);
									timediff($updatedtime); ?>
									
								</li>
								<li>
									<span class='comment'>

										<span class='count'>
											<?php 	//Showing number of comments by using the webservice to fetch comments for designs on $proposal['designID'] ^_^
										$commentCount = displayComments(SERVICE_URL.'?section=comment&request=getforid&id='.$proposal['designID']); ?>
									</span>

									<span class='count'>
										<?php
									// count the number of comments
									$likeCount = countLikes($proposal['designID']);
									echo $likeCount." likes";									
									?>
									</span>



								</span>
								
							</li>
							<li>
								<strong>ID:</strong>
								<?php echo $proposal['designID']; ?>
							</li>
						</ul>
					</div>
					<div class='project-description'><?php echo $proposal['description']; ?></div>
				</div>
			</div>
			<?php
	}
}

?>
</div>
</div>
<aside>
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
		var mypostrequest=new ajaxRequest()
		mypostrequest.onreadystatechange=function(){
			if (mypostrequest.readyState==4){
				if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
					document.getElementById("myDiv").innerHTML=mypostrequest.responseText;
					var error = "Please enter a valid username <br />";
					var error1 = "Please enter a valid password <br />";
					var error3 = error + error1;
					var error2 = "Username or password is invalid, Please try again <br />";
					var error3 = error+error1;
					var error4 = "Please activate your account before signing in <br />";
					//alert(mypostrequest.responseText);
					if ( mypostrequest.responseText == error || mypostrequest.responseText == error1 || mypostrequest.responseText == error3 || mypostrequest.responseText == error2 || mypostrequest.responseText ==error4){
						document.getElementById("myDiv").style.display="block";
					}
					else 
						window.location = <?php echo "\"".WEB_URL."\""; ?>;
				}
				else{
					alert("An error has occured making the request");
				}
			}
		}
		var userName = document.forms["credentials"]["user"].value;
		var password = document.forms["credentials"]["pass"].value;
		var rememberMe = document.forms["credentials"]["rememberMe"].value;
		var parameters="user="+userName+"&pass="+password+"&rememberMe="+rememberMe;
		mypostrequest.open("POST", "login.php", true)
		mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		mypostrequest.send(parameters)
	}
	
	</script>
	<?php	if ( !isset($_SESSION['logged'])) { ?>
		<div class="Login-section" id="form" style="display:block">
			<h2> Login </h2>
			<div id="myDiv" style="display:none"><h2></h2></div>
			<form name="credentials" method="post">
				Username:<br><input type="text" name="user" size="29" class="inputs" onkeydown="if (event.keyCode == 13) document.getElementById('submit').click()"><br>
				Password:<br><input type="password" name="pass" size="29" class="inputs" onkeydown="if (event.keyCode == 13) document.getElementById('submit').click()"><br>
				<input type="checkbox" name="rememberMe" > Remember Me <br /><br />
				<input type="button" id="submit" value="Log In" onClick="submitAjax()"> or <a href="register.php" > Register Now </a>
			</form>
				<a href="forgot-password.php?sendVeri=true">Forgot Password?</a>
		</div>
		<br /><br />
		<?php } ?>
		<?php
		include('latest-activity.php'); 
		?>
		<div class='activity-section'>
			<h2>Twitter</h2>
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
			new TWTR.Widget({
				version: 2,
				type: 'profile',
				rpp: 4,
				interval: 6000,
				width: 'auto',
				height: 300,
				theme: {
					shell: {
						background: '#ffffff',
						color: '#000000'
					},
					tweets: {
						background: '#ffffff',
						color: '#7d7b7d',
						links: '#000000'
					}
				},
				features: {
					scrollbar: false,
					loop: false,
					live: true,
					hashtags: true,
					timestamp: true,
					avatars: false,
					behavior: 'all'
				}
				}).render().setUser('betavillebxmc').start();
				</script>
			</div>
		</aside>
	</div>
</div>
<?php 
include('footer.php'); ?>
</div>
</body>
</html>
