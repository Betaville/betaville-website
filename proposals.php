<!doctype html> 
<html> 
<head>
	<?php include('head.php');
	      include_once('betaville-functions.php');
	 ?>
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
			include_once('config.php');

			// swap to request=proposals or request=versions
			$designRequest = SERVICE_URL.'?section=activity&request=proposals';
			$designJSON = file_get_contents($designRequest,0,null,null);
			$designOutput = json_decode($designJSON, true);
			$designs = $designOutput['designs'];

			/*The idea is to determine a count of the no of proposals($pcount), calc the no of pages($pages), display page numbers 
			at the bottom(along with their hyperlinks) and display only those 10 proposals of that particular page by passing the PageNo to be loaded.*/
			
			if(isset($_GET["page"]))
				$currentPage = $_GET["page"];
			else
				$currentPage=1;
			
			/*Determine the proposal count*/
			$pcount = count($designs);
			
			/*Calculates the total number of pages required*/
			$pages = $pcount/10;
			$extrapage = $pcount%10>0?1:0;
			$pages = $pages + $extrapage;
			
			$counter=0;
			for($i=$currentPage*10-10;$i<=$pcount-1;$i++){
				$design =  $designs[$i];
				$counter++;
				?>

				<div class='f-1 project'>
				<a href='design.php?id=".$design['designID']."'>
				<?php
				//Check if image exists on server
				$image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
				echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
				<img src=<?php echo $image;?> style='background-color: #3e4b71'>
				

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
								
									<span class='count'> 
										<?php echo $commentCount; ?>
									</span> 
									comments,
									<span class='count'> 
										0
									</span> 
									likes
								
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
			
				if ($counter>=10)				//This logic is at the end of the for loop so as to not wait for 
					break;					//$counter to increment to 11 and then break out of the loop!
			}
			
			//Display page numbers. And the current page doesn't bear a hyperlink
			echo "<div align='center'>";	
			for($i=1; $i<=$pages; $i++)	
				if ($currentPage!=$i)
				{
				?>
					<a href='./proposals.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				<?php
				}
				else
				 	echo $i; ?>
					</div>
			</div> 
<aside>
	<?php include('latest-activity.php'); ?>
</aside> 
<?php include('footer.php'); ?>
</div> 
</body> 
</html> 