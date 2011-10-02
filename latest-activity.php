<div class='activity-section'>
	<h2>Latest Activity</h2>

	<?php
include_once('config.php');

// swap to request=proposals or request=versions
$designRequest = SERVICE_URL.'?section=activity&request=designs&quantity=5';
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$designs = $designOutput['designs'];

foreach($designs as $design){
	?>

	<div class='activity'>
		<a href='design.php?id=".$design['designID']."'>
	<?php
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
</a><div class='activity-meta'><?php
	include_once('betaville-functions.php');
	$updatedtime = fd($design['date']);
	timediff($updatedtime);
?></div>
</div>
</div>


<?php
}

$commentRequest = SERVICE_URL.'?section=activity&request=comments&quantity=5';
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];

foreach($comments as $comment){

	$commentDesignRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$comment['designid'];
	$commentDesignJSON = file_get_contents($commentDesignRequest,0,null,null);
	$commentDesignOutput = json_decode($commentDesignJSON, true);
	$commentDesign = $commentDesignOutput['design'];

	?>
	<div class='activity'>
	<a href="design.php?id='.$commentDesign['designID'].'">
	<?php
	//Check if image exists on server
	$image = checkimage(THUMBNAIL_URL.$commentDesign['designID'].'.png'); 
	echo "<a href='design.php?id=".$commentDesign['designID']."'>\n"; ?>
	<img src=<?php echo $image;?> style='background-color: #3e4b71'>
</a>
<div class='activity-body'>
	<?php
echo '<a href="design.php?id='.$commentDesign['designID'].'"><strong>'.$comment['user'].'</strong>';
?>
 commented on
<strong><?php echo $commentDesign['name'] ?></strong>:
<span class='content'><?php echo $comment['comment'] ?></span>
</a>
<div class='activity-meta'><?php
	//this is already called above as include_once, cannot call again
	//include_once('betaville-functions.php');
	$updatedtime = fd($comment['date']);
	timediff($updatedtime);
?></div>
</div>
</div>
<?php

}
?>

</div>