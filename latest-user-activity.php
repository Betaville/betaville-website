<div class='activity-section'>
	
<?php
$page='profile';
include_once('config.php');

if(isset($_GET['uName']))
	$userName = $_GET['uName'];
else
	$userName = $_SESSION['username'];

echo "<h2>My Latest Activities</h2><br>";

// swap to request=proposals or request=versions
// Fetching designs now findbyuser, keep in mind, a huge number of users will be returned with an empty array if you not uploaded anything
$designRequest = SERVICE_URL.'?section=design&request=findbyuser&user='.$userName.'&excludeempty=1';
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$designs = $designOutput['designs'];

//This is to echo the total number of models uploaded by the user
$count = 0;
//This is to break the loop after 5 designs
$counter = 0;

foreach($designs as $design1) {
	$count++;
	}
	$display = $count.' Models loaded by you';	
	if($count>0) {
		echo '<strong>'.$display.'</strong><br><br>';
		}
	else {
		$display = 'No Models uploaded by you';
		echo '<strong>'.$display.'</strong><br><br>';
		}
foreach($designs as $design){
	/* Im not sure if this check is to be done, it is a separate file now
	change
	if(($page=='profile' && $design['user']==$userName))*/
	?>
	<div class='activity'>
	<?php
		$counter++;		
		echo "<a href='design.php?id=".$design['designID']."'>\n";
		//Check if image exists on server
		$image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
		echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
		<img src=<?php echo $image;?> style='background-color: #3e4b71'>
	
	<div class='activity-body'>
	<?php
		echo '<a href="design.php?id='.$design['designID'].'"><strong>'.$design['user'].'</strong> uploaded ';
		echo '<strong>'.$design['name'].'</strong>:';
	?>
	<span class='content'><?php echo $design['description'] ?></span>
		</a>
	<div class='activity-meta'>
	<?php
		include_once('betaville-functions.php');
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



// retrieving comments by passing $userName in section activity request myactivity and user = $userName
if($page=='profile')
	$commentRequest = SERVICE_URL.'?section=activity&request=myactivity&user='.$userName;
//else
//	$commentRequest = SERVICE_URL.'?section=activity&request=comments&quantity=5';
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];

$counter = 0;
foreach($comments as $c1) {
echo $c1['commentid'].'&nbsp&nbsp';

}
foreach($comments as $comment){
	
	$counter++;
//	echo $counter;
	/**$commentDesignRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$comment['designid'];
	$commentDesignJSON = file_get_contents($commentDesignRequest,0,null,null);
	$commentDesignOutput = json_decode($commentDesignJSON, true);
	$commentDesign = $commentDesignOutput['design'];*/

	?>
	<div class='activity'>
	<?php 
		echo '<a href="design.php?id='.$comment['designid'].'">';
		//Check if image exists on server
		$image = checkimage(THUMBNAIL_URL.$comment['designid'].'.png');
		echo "<a href='design.php?id=".$comment['designid']."'>\n"; ?>
		<img src=<?php echo $image;?> style='background-color: #3e4b71'> </a>
	
	<div class='activity-body'>
	<?php
		echo '<a href="design.php?id='.$comment['designid'].'"><strong>'.$userName.'</strong>';
	?>
		commented on
		<strong><?php echo $comment['name'] ?></strong>:
		<span class='content'><?php echo $comment['comment'] ?></span>
		</a>
	<div class='activity-meta'>
	<?php
		//this is already called above as include_once, cannot call again
		// include_once('betaville-functions.php');
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
