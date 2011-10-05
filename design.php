<!doctype html> 
<html> 
<head>
	<?php include('head.php'); ?>
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
	<?php include('header.php'); ?>
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
							<?php 	
									// instead of pulling the database field we pass the it to a function that returns a php date format and subtract it from the current time.
									$updatedtime = fd($design['date']);
									timediff($updatedtime);
							?>
							·
						</li> 
						<li> 
							<span class='comment'> 
								
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
							
						</span> 
					</li> 
				</ul> 
				<div class='button-row'> 
					<a class='uberbutton green' href='/webstart/betaville.jnlp'> 
						Launch
						<span class='icon i-play'>►</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Like
						<span class='icon'>♥</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Share
						<span class='icon i-share'>☀</span> 
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
<?php include('footer.php'); ?>
</div> 
</body> 
</html> 