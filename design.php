<!doctype html> 
<html> 
<head> 
	<title>Betaville</title> 
	<link href='stylesheets/reset.css' rel='stylesheet'> 
	<link href='stylesheets/screen.css' rel='stylesheet'> 
	<script src='js/jquery-1.4.2.min.js'></script> 
	<script src='js/jquery.jcarousel.min.js'></script> 
	<script src='js/betaville.home.js'></script> 
	<script src='js/jquery.easing.1.3.js'></script> 
	<script src='fancybox/jquery.mousewheel-3.0.4.pack.js' type='text/javascript'></script> 
	<script src='fancybox/jquery.fancybox-1.3.4.pack.js' type='text/javascript'></script> 
	<link href='fancybox/jquery.fancybox-1.3.4.css' media='screen' rel='stylesheet' type='text/css'> 
	<meta content='text/html;charset=utf-8' http-equiv='Content-Type'> 
	<meta name="csrf-param" content="authenticity_token"/> 
	<meta name="csrf-token" content="RhggWRywuKy3UD4o+d6Tdnp6IHWBEVjpEBPLJ1L+aA8="/> 

</head> 
<body> 


<?php
// setup the basics

include('config.php');
$designID = $_GET['id'];

// get the project information

$designRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$designID;
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$design = $designOutput['design'];

$commentRequest = SERVICE_URL.'?section=comment&request=getforid&id='.$designID;
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];

?>
<div class='master-container'> 
	<header> 
		<nav> 
			<ul> 
				<li class='logo'> 
					<a href='/'> 
						<img src='/images/logo-header.png'> 
					</a> 
				</li> 
				<li> 
					<a href='http://betaville.net/webstart/betaville.jnlp'>Download</a> 
				</li> 
				<li> 
					<a class='' href='/what-is-betaville'>Info</a> 
				</li> 
				<li> 
					<a class='' href='/proposals'>Explore</a> 
				</li> 
				<li> 
					<a class='' href='/contribute'>Contribute</a> 
				</li> 
			</ul> 
			<div class='clear'></div> 
		</nav> 
	</header> 
	<div class='page-container'> 
		<div class='page-body container project' id='project'> 
			<div class='project-container'> 
				<h1><?php echo $design['name']; ?></h1> 
				<div class='project-meta'> 
					<ul> 
						<li> 
							<strong> 
								Author&nbsp;
							</strong> 
							<?php echo $design['user']; ?>
							·
						</li> 
						<li> 
							<strong> 
								Last&nbsp;Update
							</strong> 
							<?php echo $design['date']; ?>
							·
						</li> 
						<li> 
							<span class='comment'> 
								<a href=''> 
									<span class='count'>
										<?php
									// count the number of comments
									$commentCount=0;
									foreach($comments as $comment){
										$commentCount++;
									}
									echo $commentCount;
									?>
								</span> 
								comments,
								<span class='count'> 
									0
								</span> 
								likes
							</a> 
						</span> 
					</li> 
				</ul> 
				<div class='button-row'> 
					<a class='uberbutton green' href='/betaville.jnlp'> 
						Launch
						<span class='icon i-play'>9</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Like
						<span class='icon'>k</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Share
						<span class='icon i-share'>G</span> 
					</a> 
				</div> 
			</div> 
			<div class='project-description'>
				<?php echo $design['description']; ?>
			</div> 
			<div class='discussion'> 
				<h2> 
					Discussion
				</h2> 
				<p> 
					<em>To comment, find this project in Betaville.</em> 
				</p> 
				<ul> 



					<?php


				foreach($comments as $comment){
					?>
					<li> 
						<div class='discussion-meta column span-3'> 
							<a class='author'><?php echo $comment['user']; ?></a> 
							<div class='timestamp'>
								<?php echo $comment['date'] ?>
							</div> 
						</div> 
						<div class='discussion-body column span-9 last'>
							<?php echo $comment['comment'] ?>
						</div> 
					</li> 
					<?php
			}
			?>


		</ul> 
	</div> 
</div> 
<aside>
	<?php echo "<img src='".THUMBNAIL_URL.$designID.".png'>" ?>
</aside> 
</div> 

</div> 

<footer> 
	&copy; 2008-2011
	<a href='http://bxmc.poly.edu'>Brooklyn Experimental Media Center at Polytechnic Institute of New York University</a> 
</footer> 
</div> 
</body> 
</html> 