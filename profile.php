<?php
/**  
 *  profile.php - user profile page, user related info on proposals, his comments, his models and link to change personal info
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
include('head.php');
//error_reporting(E_ALL);
?>
<style>
	.userInfo{
		background-color:
	}
	</style>
<body> 
<div class='master-container'> 
		<?php
		include_once('betaville-functions.php');
		//Delete The Design For the User -- Change isAlive = 0, route user here after a design is deleted.
		if(isset($_GET['designDeleted'])) {
		$designID = $_GET['id'];
		$designName = $_GET['designName'];
		$deleteDesign = SERVICE_URL.'?section=design&request=deletedesign&id='.$designID."&token=".$_SESSION['token'];
		$deleteDesignJSON = file_get_contents($deleteDesign,0,null,null);
		$deleteDesignOutput = json_decode($deleteDesignJSON, true);
		$deleted = $deleteDesignOutput['design'];
		echo '<strong>'.$designName.' deleted.</strong>';
		}

		//Check if you retrieve uName or username
		if(isset($_GET['uName']))
			$userName = $_GET['uName'];
		else if(isset($_SESSION['username'])) {
			$userName = $_SESSION['username'];
		}
		else {
			header("Location: index.php");		
		}
		// Get user's information
		$userRequest = SERVICE_URL.'?section=user&request=getpublicinfo&username='.$userName;
		$userJSON = file_get_contents($userRequest,0,null,null);
		$userOutput = json_decode($userJSON, true);
		$user = $userOutput['userInfo'];
		
		?>
		<div class='page-container'> 
			<div class='project-container'>
				<br><br>

			<div class='projects'>

			<form name='userInfo' >
			<?php
		
			$gravatarImage = $user['avatar'];
		
			?>
			<img src=<?php echo $gravatarImage;?> height='100' width='100' style='background-color: #383838'><br /><br />
			<label>Name: </label> <div style=" display:inline; margin-left: 2px"><?php if($user['userName']==null) echo '  --- '; else echo $user['userName'];?></div><br /><br />
			<label>About Me: </label><div style=" display:inline; margin-left: 2px"><?php if($user['bio']==null) echo '  --- '; else echo $user['bio'];?></div><br /><br />
			<label>Website: </label><div style=" display:inline; margin-left: 2px"><?php if($user['website']==null) echo '  --- '; else echo '<a href="http://'.$user['website'].'">'.$user['website'].'</a>';?></div><br /><br />
			<label>Profile: </label><div style="display:inline; margin-left: 2px"><?php if($user['type']==null) echo '  --- '; else echo $user['type'];?></div><br /><br />
			
			</form>
	 	
	 		<?php
	 		//Allow changing info only if session username matches the user's profile name.
	 		if($userName==$_SESSION['username'])
	 		{?>	
	 			<form name='profileForm' action='edit-profile.php' method="get">
				<input type="submit" name="submit" value="Edit Profile" />
				</form>
	 			<?php
	 		}?>
				<br />
				
		
		<?php
			// swap to request=proposals or request=versions
			$designRequest = SERVICE_URL.'?section=design&request=findbyuser&excludeempty=1&user='.$userName;
			$designJSON = file_get_contents($designRequest,0,null,null);
			$designOutput = json_decode($designJSON, true);
			$designs = $designOutput['designs'];
			/*For pagination, the idea is to determine a count of the no of proposals($pcount), calc the no of pages($pages), display page numbers 
			at the bottom(along with their hyperlinks) and display only those 10 proposals of that particular page by passing the PageNo to be loaded.*/
			
			if(isset($_GET["page"]))
				$currentPage = $_GET["page"];
			else
				$currentPage=1;
			
			/*Determine the total proposal count and store in 'tpcount' and user proposal count in 'pcount'*/
			$tpcount = count($designs);
			
			$pcount=0;
			foreach($designs as $design)
				if($userName==$design['user'])
					$pcount++;
			
			/*Calculate the total number of pages required*/
			$pages=1;
			if($pcount>10)
			{	
				$pages = $pcount/10;
				settype($pages, "integer");
				$extrapage = $pcount%10>0?1:0;
				$pages = $pages + $extrapage;
			}
			//Check if you retrieve uName or username
			if(isset($_GET['uName']))echo "<h2>Proposals</h2>";
			else echo "<h2>My Proposals</h2>";
			$designcount = 0;

			foreach($designs as $design) {
			$designcount++;
			}
			//Check if you retrieve uName or username
			if(isset($_GET['uName']))$display = $designcount.' Proposals loaded ';
			else $display = $designcount.' Proposals loaded by '.$userName;
			if($designcount>0) {
			echo '<strong>'.$display.'</strong><br><br>';
			}
			else {
			if(isset($_GET['uName']))$display = 'No Proposals loaded ';
			else $display = 'No Proposals by you';
			echo '<strong>'.$display.'</strong><br><br>';
			}

			$counter=0;
			for($i=$currentPage*10-10;$i<=$tpcount-1;$i++){
				$design =  $designs[$i];
				
				if($userName==$design['user'])
				{
				$counter++;
				?>

				<div class='f-1 project'>
				<?php
				echo "<a href='design.php?id=".$design['designID']."'>\n";
				//Check if image exists on server
				$image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
				echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
				<img src=<?php echo $image;?> style='background-color: #3e4b71'>
			
				<div class='project-info'> 
					<h3> 
						<?php echo '<a href="design.php?id='.$design['designID'].'">'.$design['name'].'<span class=\'icon\'>&nbsp;</span></a>'; ?>
					</h3> 
					<div class='project-meta'> 
						<ul> 
							<li> 
								<strong>Author&nbsp;</strong> 
								<?php echo $design['user']; ?>
								
							</li> 
							<li> 
								<strong>Last&nbsp;Update</strong> 
								<?php 	// Calling include_once to prevent undeclared function name error.
									include_once('betaville-functions.php');
									$updatedtime = fd($design['date']);
									timediff($updatedtime); ?>
								
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
								}?>
								
								<span class='count'> 
										<!--Displaying number of comments-->
										<?php echo $commentCount; ?>
									</span> 
									comments,
									<span class='count'> 
										<?php
										// count the number of likes
										$likeCount = countLikes($design['designID']);
										echo $likeCount." likes";
										?>
									</span> 
								</span> 
								
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
					break;						//$counter to increment to 11 and then break out of the loop!
				}
			}
			
			//Display page numbers except for if there's only 1 page. The current page doesn't bear a hyperlink!
			?>
			<div align='center'>
			<?php 
			if($pages>1)
			{
				for($i=1; $i<=$pages; $i++)
					if ($currentPage!=$i)
					{ 
						if($userName == $_SESSION['username'])
						{
						?>
							<a href='./profile.php?page=<?php echo $i;?>'><?php echo $i;?></a>						
						<?php
						}
						else
						{
						?>
							<a href='./profile.php?page=<?php echo $i;?>&uName=<?php echo $userName;?>'><?php echo $i;?></a>	
						<?php
						}
					}
					else
					 	echo $i; 
			}		?>
			</div>
			</div>
		</div>
	
			<aside> 
				<?php 
				//Check if you retrieve uName or username
				if(isset($_GET['uName']))
					$_GET['uName'] = $userName;
				include('latest-user-activity.php'); ?>
			</aside>
		
		</div>
		<?php include('footer.php'); ?>
</div>
</body>
</html>
