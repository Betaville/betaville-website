<?php include('head.php'); 
/**  
 *  Design page - Show individual design features, users, comments, and can now be updated if the design is a proposal
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
?>
<body> 

	
	<?php
	// setup the basics
	$designID = $_GET['id'];
	// get the project information
	//Display Project specific stuff
	$designRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$designID;
	$designJSON = file_get_contents($designRequest,0,null,null);
	$designOutput = json_decode($designJSON, true);
	$design = $designOutput['design'];

	$commentRequest = SERVICE_URL.'?section=comment&request=getforid&id='.$designID;
	$commentJSON = file_get_contents($commentRequest,0,null,null);
	$commentOutput = json_decode($commentJSON, true);
	$comments = $commentOutput['comments'];
		
	//Adding and deleting users in faveList
	if(isset($_GET['unlike'])) {
		//Service call is initiated from the function, need to first check if the user is in the list
		DeletefaveListUser($design['designID'],$_SESSION['username']);
		header('url='.WEB_URL.'/design.php?id='.$designID); 
	}
	if(isset($_GET['like'])) {
		//Check if user is in group, if is don't add
		if(checkUserInfaveListGroup($_SESSION['username'],$design['designID'])==true) {
		}
		else {	
			$likeRequest = SERVICE_URL.'?section=fave&request=add&id='.$designID.'&name='.$_SESSION['username'].'&token='.$_SESSION['token'];
			$likeRequestJSON = file_get_contents($likeRequest,0,null,null);
			$likeOutput = json_decode($likeRequestJSON, true);
			header('url='.WEB_URL.'/design.php?id='.$designID); 
		}
	}

	
	// check if the user has write access, includes users who are in group!
	if(isset($_SESSION['token'])){
		$accessRequest = SERVICE_URL.'?section=design&request=userhaswriteaccess&token='.$_SESSION['token'].'&id='.$designID;
		$accessJSON = file_get_contents($accessRequest,0,null,null);
		$accessOutput = json_decode($accessJSON, true);
		$access = $accessOutput['userhaswriteaccess'];	
			if($access === true){
			// the user has write access, include jQuery functionality
			?>
			<script>
				$(document).ready(function(){
					setClickable();
				});
			
				function setClickable(){
					$('#project-description').click(function(){
						var textarea = '<div><textarea placeholder="test" id="descriptionUpdateArea" rows="10" cols="60">'+$(this).html()+'</textarea>';
						var button = '<div><input type="button" value="Save" class="saveButton" /> OR <input type="button" value="Cancel" class="cancelButton" /></div></div>';
						var revert = $(this).html();
						$(this).after(textarea+button).remove();
						$('.saveButton').click(function(){saveChanges(this, false);});
						$('.cancelButton').click(function(){saveChanges(this, revert);});
						}).mouseover(function(){
						$(this).addClass("editable");
					}).mouseout(function(){
							$(this).removeClass("editable");
					});
					
					/*
					$('#project-description').mouseOver(function(){
							$(this).addClass("editable");
					});
					$('#project-description').mouseOut(function(){
						$(this).addClass("editable");
					});
						*/
				};
				
				function saveChanges(obj, cancel){
					if(!cancel){
						var updatedText = $('#descriptionUpdateArea').val();
							var updateString = 'interact/update-design.php?groupy=<?php echo $_SESSION['username']; ?>&action=update&id=<?php echo $designID; ?>&description='+updatedText;
						
							
						if (window.XMLHttpRequest)
								{// code for IE7+, Firefox, Chrome, Opera, Safari
								xmlhttp=new XMLHttpRequest();
						}
						else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						xmlhttp.open("GET",updateString,true);
						xmlhttp.send();
						window.location.reload();
					}
					else{
						window.location.reload();
					}
				};
			</script>
			<?php	
			}
		}	
		?>
	
	


<!-- Displaying Design Specific stuff -->
<div class='master-container'>
	<div class='page-container'>
		<div class='page-body container project' id='project'> 
			<div class='project-container'> 
				<h1><?php echo $design['name']; ?></h1>  
                <?php
				//Add User Functionality implemented on the design.php page, check if the design user is the user logged in.
				if($_SESSION['username'] == $design['user']) {
					//Web service request to check if the design is a proposal , if not do not implement the AddUser functionality.
					$proposalRequest = SERVICE_URL.'?section=design&request=checkproposal&id='.$designID;
					$proposalJSON = file_get_contents($proposalRequest,0,null,null);
					$proposalOutput = json_decode($proposalJSON, true);
					$proposal = $proposalOutput['checkdesign'];
						if($proposal == true) { ?>
							<a href = "edit-proposal-group.php?id=<?php echo $design['designID'];?>"> Add Users to Group </a>
				<?php
						}
				}
				?>

                
				<div class='project-meta'> 
					<ul> 
						<li> 
							<strong> 
								Author&nbsp;
							</strong> 
                            <a href="profile.php?uName=<?php echo $design['user']; ?>"><?php echo $design['user']; ?></a>
							
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
									<?php
									//Count the number of likes
									$likeCount = countLikes($design['designID']);
									echo $likeCount;									
									?>
								</span> 
								likes
							
						</span> 
					</li> 
				</ul> 
				<div class='button-row'> 
						<?php if(isset($_SESSION['logged'])) {
									if(checkUserInfaveListGroup($_SESSION['username'],$design['designID'])==true) {
						?>
										<a class='uberbutton green' href='<?php echo 'design.php?id='.$design['designID'].'&unlike=true';?>' method = 'post'>
										Unlike
										<span class='icon'>♥</span> 
										</a>
						<?php
									}
									else{
						?>
										<a class='uberbutton green' href='<?php echo 'design.php?id='.$design['designID'].'&like=true';?>' method = 'post'> 
										Like
										<span class='icon'>♥</span> 
										</a><?
									}
							}
						?>
					<!-- Not needed at the moment
									<a class='uberbutton green' href=''> 
									Share
									<span class='icon i-share'>☀</span> 
									</a>
					-->
					
					
					<!-- Delete Design Functionality for Users -->
						<?php if($_SESSION['username'] == $design['user']) {?>
							<script type="text/javascript">
								function confirmPost(){
									var agree=confirm("Are you sure you want to Delete This Design?");
									if (agree)
										return true ;
									else
										return false ;
								}
							</script>
							<!--Button does not look so good.......-->
							<a class='uberbutton green'>
							<form name='deleteDesign' id='DeleteDesign' action='<?php echo 'profile.php?designDeleted=true&id='.$design['designID'].'&designName='.urlencode($design['name']);?>'  method='post' enctype='multipart/form-data'>
	       							<input type='submit' class='uberbutton' name='Delete' value='Delete' onClick='return confirmPost()'>
							</form>
							</a>
							<?php
							}?>
				</div> 
			</div>
			<div id='project-description' class='project-description'><?php echo $design['description']; ?></div>
			<br />
			<br />	
			<div>
				<?php include('interact/map.php'); ?>

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
							<?php echo '<a href="profile.php?uName='.$comment['user'].'" class="author">'.$comment['user'].'</a>'; ?>
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
   							
   								<textarea class="comment" name="commentText" cols="15" rows="2"></textarea>
   								<input type="hidden" name="designID" value=<?php echo $design['designID']?>>
  								<input type="submit" value="Send">
  							
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
