<?php
/**  
 *  latest User Activity Page - Shows the latest activity, comments and models uploaded, showing only top 5 for each, pertaining to each individual user.
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
<div class='activity-section'>
<?php
$page='profile';
include_once('config.php');
include_once('betaville-functions.php');
$loggedInUser = false;

	if(isset($_GET['uName']))
		$userName = $_GET['uName'];
	else if(isset($_SESSION['username'])){
		$userName = $_SESSION['username'];
		$loggedInUser = true;
	}
	else{
		header("Location: index.php");
	}

//Check its the logged-in user or other user
	if($loggedInUser)
		echo "<h2>My Latest Activities</h2><br>";
	else
		echo "<h2>Latest Activities</h2><br>";

// swap to request=proposals or request=versions
// Fetching designs now findbyuser, keep in mind, a huge number of users will be returned with an empty array if you have not uploaded anything
$designRequest = SERVICE_URL.'?section=design&request=findbyuser&user='.$userName.'&excludeempty=1';
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$designs = $designOutput['designs'];

//This is to echo the total number of models uploaded by the user
$count = 0;
//This is to break the loop after 5 designs
$counter = 0;

	foreach($designs as $design) {
		$count++;
	}

/*
Not sure why this is here.....
//Check if you retrieve uName or username
if($userName = $_SESSION['username'])
	$display = $count.' Models loaded by you';
else 
	$display = $count.' Models loaded by '.$userName;
	
if($count>0)
	echo '<strong>'.$display.'</strong><br><br>';
else
{
	//Check if you retrieve uName or username
	if(isset($_GET['uName'])) 
		$display = 'No Models uploaded by '.$userName;
		echo '<strong>'.$display.'</strong><br><br>';
}
*/

	if($count>0){
	//Check its the logged-in user or other user
		if($loggedInUser)
			$display = $count.' Models loaded by you';
		else 
			$display = $count.' Models loaded by '.$userName;
	}	
	else{
	//Check its the logged-in user or other user
		if($userName == $_SESSION['username'])
			$display = 'No Models loaded by you';
		else 
			$display = 'No Models loaded by '.$userName;
	}
echo '<strong>'.$display.'</strong><br><br>';

	foreach($designs as $design){
		/* Im not sure if this check is to be done, it is a separate file now	change
	if(($page=='profile' && $design['user']==$userName))*/
	?>
	<div class='activity'>
<?php
		$counter++;		
		echo "<a href='design.php?id=".$design['designID']."'>\n";
		//Check if image exists on server
		$image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
		echo "<a href='design.php?id=".$design['designID']."'>\n"; 
?>
		<img src=<?php echo $image;?> style='background-color: #3e4b71'>
	
	<div class='activity-body'>
<?php
		echo '<a href="profile.php?uName='.$design['user'].'"><strong>'.$design['user'].'</a>'.'</strong> uploaded ';
		echo '<a href="design.php?id='.$design['designID'].'"><strong>'.$design['name'].'</a>'.'</strong>:';
?>
	<span class='content'><?php echo $design['description'] ?></span>
		
	<div class='activity-meta'>
<?php
		$updatedtime = fd($design['date']);
		timediff($updatedtime);
?>
	</div>
	</div>
	</div>

<?php
	//Break loop here after showing 5 designs	
	if($counter>=5)
	break;
}
?>
<br><br>
<?php
	// retrieving comments by passing $userName in section activity request myactivity and user = $userName
	//Check its the logged-in user or other user
	if($loggedInUser) 
		$commentRequest = SERVICE_URL.'?section=activity&request=myactivity&user='.$userName;
	else
		$commentRequest = SERVICE_URL.'?section=activity&request=peruseractivity&user='.$userName;
	
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];
$commentcount = 0;
//Check if you retrieve uName or username
	if(isset($_GET['uName'])) {}
	else{
		foreach($comments as $comment){
				$commentcount++;
		}
	if($commentcount==0) {
		$display = 'No comments by you';
		echo '<strong>'.$display.'</strong><br><br>';
	}
}
$counter = 0;
	foreach($comments as $comment){
		$counter++;
		$commentDesignRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$comment['designid'];
		$commentDesignJSON = file_get_contents($commentDesignRequest,0,null,null);
		$commentDesignOutput = json_decode($commentDesignJSON, true);
		$commentDesign = $commentDesignOutput['design'];
?>
	<div class='activity'>
	<?php 
		echo '<a href="design.php?id='.$commentDesign['designID'].'">';
		//Check if image exists on server
		$image = checkimage(THUMBNAIL_URL.$commentDesign['designID'].'.png');
		echo "<a href='design.php?id=".$commentDesign['designID']."'>\n"; ?>
		<img src=<?php echo $image;?> style='background-color: #3e4b71'> </a>
	
	<div class='activity-body'>
		<?php
		//echo '<a href="profile.php?uName='.$commentDesign['user'].'"><strong>'.$commentDesign['user'].'</a>'.'</strong> commented on ';
		echo '<a href="profile.php?uName='.$userName.'"><strong>'.$userName.'</a>'.'</strong> commented on ';
		echo '<a href="design.php?id='.$commentDesign['designID'].'"><strong>'.$commentDesign['name'].'</a>'.'</strong>:';
	?>
		<span class='content'><?php echo $comment['comment'] ?></span>
	<div class='activity-meta'>
	<?php
		$updatedtime = fd($comment['date']);
		timediff($updatedtime);
	?>
	</div>
	</div>
	</div>
<?php
if($counter>=5)
	break;
}
?>

</div>
