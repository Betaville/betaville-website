<div class='activity-section'>
	
	<?php
include_once('config.php');

$page = $_GET['requestingPage'];		//change

if(isset($_GET['uName']))
	$userName = $_GET['uName'];
else
	$userName = $_SESSION['username'];
			
//$userName = $_SESSION['username'];
 //$userName = 'scandgolden24';

if ($page=='profile')
	echo "<h2>My Latest Activities</h2>";
elseif($page=='proposal' || $page=='index')
	echo "<h2>Latest Activity</h2>";

// swap to request=proposals or request=versions
$designRequest = SERVICE_URL.'?section=activity&request=designs&quantity=5&excludeempty=true';
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$designs = $designOutput['designs'];

foreach($designs as $design){
	//change
	if(($page=='profile' && $design['user']==$userName) || $page=='proposal')
	{ ?>
	<div class='activity'>
	<?php
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
	}
}
// retrieving comments
if($page=='profile')
	$commentRequest = SERVICE_URL.'?section=activity&request=myactivity&user='.$userName;
else
	$commentRequest = SERVICE_URL.'?section=activity&request=comments&quantity=5';
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];

$counter = 0;
foreach($comments as $comment){
	
	$counter++;
//	echo $counter;
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
		echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
		<img src=<?php echo $image;?> style='background-color: #3e4b71'> </a>
	
	<div class='activity-body'>
	<?php
		echo '<a href="design.php?id='.$commentDesign['designID'].'"><strong>'.$comment['user'].'</strong>';
	?>
		commented on
		<strong><?php echo $commentDesign['name'] ?></strong>:
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
