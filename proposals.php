<!doctype html> 
<html> 
<head>
	<?php include('head.php'); ?>
</head> 
<body> 
	<div class='master-container'> 
		<?php include('header.php'); ?>
		<div class='page-container'> 
			<h1> 
				Explore Betaville
			</h1> 
			<div class='projects'>

				<?php
			include('config.php');

			// swap to request=proposals or request=versions
			$designRequest = SERVICE_URL.'?section=activity&request=proposals&quantity=10';
			$designJSON = file_get_contents($designRequest,0,null,null);
			$designOutput = json_decode($designJSON, true);
			$designs = $designOutput['designs'];

			foreach($designs as $design){
				?>

				<div class='f-1 project'>
					<?php
				echo "<a href='design.php?id=".$design['designID']."'>\n";
				echo "<img src='".THUMBNAIL_URL.$design['designID'].".png' style='background-color: #383838'></a>";
				?>





				<div class='project-info'> 
					<h3> 
						<?php echo '<a href="design.php?id='.$design['designID'].'">'.$design['name'].'<span class=\'icon\'>&nbsp;]</span></a>'; ?>
					</h3> 
					<div class='project-meta'> 
						<ul> 
							<li> 
								<strong>Author&nbsp;</strong> 
								<?php echo $design['user']; ?>
								·
							</li> 
							<li> 
								<strong>Last&nbsp;Update</strong> 
								<?php 	// Calling include_once to prevent undeclared function name error.
									include_once('betaville-functions.php');
									$updatedtime = fd($design['date']);
									timediff($updatedtime); ?>
								·
							</li> 
							<li> 
								<span class='comment'> 
									<?php
								// count the comments

								$commentRequest = SERVICE_URL.'?section=comment&request=getforid&id='.$design['designID'];
								$commentJSON = file_get_contents($commentRequest,0,null,null);
								$commentOutput = json_decode($commentJSON, true);
								$comments = $commentOutput['comments'];

								$commentCount=0;
								foreach($comments as $comment){
									$commentCount++;
								}
								?>
								<a href=''> 
									<span class='count'> 
										<?php echo $commentCount; ?>
									</span> 
									comments,
									<span class='count'> 
										0
									</span> 
									likes
								</a> 
							</span> 
							·
						</li> 
						<li> 
							<strong>ID:</strong> 
							<?php echo $design['designID']; ?>
						</li> 
						<li class='dev-hidden'> 
							<input id="proposal_238_featured" name="proposal[238][featured]" size="30" style="width: 15px;" type="text" value="10" /> 
						</li> 
					</ul> 
				</div> 
				<div class='project-description'><?php echo $design['description'];?></div> 
			</div> 
			</div>
			<?php
	}
	?>




</div> 
<aside>
	<?php include('latest-activity.php'); ?>
</aside> 
<?php include('footer.php'); ?>
</div> 
</body> 
</html> 