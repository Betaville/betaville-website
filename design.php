<?php include('head.php'); ?>
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
                            <a href='profile.php?uName=<?php echo $design['user']; ?>'><?php echo $design['user']; ?></a>
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
						<span class='icon i-play'>â–º</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Like
						<span class='icon'>â™¥</span> 
					</a> 
					<a class='uberbutton' href=''> 
						Share
						<span class='icon i-share'>â˜€</span> 
					</a> 
				</div> 
			</div> 
			<div class='project-description'>
				<?php echo $design['description']; ?>
				<br />
				<br />
				<?php include('map.php'); ?>
				<script type="text/javascript">
					$(document.getElementById('smallmapdiv')).ready(function() {
						var lat = <?php echo $design['coordinate']['lat']; ?>;
						var lon = <?php echo $design['coordinate']['lon']; ?>;
						projectMap(lat, lon);
					});
				</script>
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
				<?php if(isset($_SESSION['username'])){ ?>
				<li>
					<div class='discussion-meta column span-3'> 
						<a class='author'>Add Comment</a>
					</div> 
					<div class='discussion-body column span-9 last'>
						<form action="interact/submit-comment.php" method="post">
   							<p>
   								<textarea name="commentText" rows="20" cols="25"></textarea>
   								<input type="hidden" name="designID" value=<?php echo $design['designID']?>>
  								<input type="submit" value="Send">
  							 </p>
						</form>
					</div> 
				</li>
				<?php } ?>
		</ul> 
	</div> 
</div> 
<aside>
	<?php
			//Check if image exists on server
			$image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
			echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
			<img src=<?php echo $image;?> style='background-color: #3e4b71'>
</aside> 
</div> 

</div> 
<?php include('footer.php'); ?>
</div> 
</body> 
</html> 
