<div class='activity-section'>

<script>
	$('lol').mouseover(function(){
		$(this).addClass("editable");
});
</script>
	
<?php
include_once('config.php');
echo "<h2>Latest Activity</h2>";

// swap to request=proposals or request=versions
$designRequest = SERVICE_URL.'?section=activity&request=designs&quantity=5&excludeempty=1';
$designJSON = file_get_contents($designRequest,0,null,null);
$designOutput = json_decode($designJSON, true);
$designs = $designOutput['designs'];

foreach($designs as $design){
	//Checking length of string, adjust length if it is more than a limit	
	$length_of_string = $design['description'];
	$leng = strlen($length_of_string);
		if($leng>1000) {
			$design['description'] = substr($design['description'],0,200).'<div id="lol"><bold>....(click to read more)</bold></div>';
		}?>
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
// retrieving comments
$commentRequest = SERVICE_URL.'?section=activity&request=comments&quantity=5';
$commentJSON = file_get_contents($commentRequest,0,null,null);
$commentOutput = json_decode($commentJSON, true);
$comments = $commentOutput['comments'];

$counter = 0;
foreach($comments as $comment){
	
	$counter++;
	$commentDesignRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$comment['designid'];
	$commentDesignJSON = file_get_contents($commentDesignRequest,0,null,null);
	$commentDesignOutput = json_decode($commentDesignJSON, true);
	$commentDesign = $commentDesignOutput['design'];
	//Checking length of string, adjust length if it is more than a limit		
	$length_of_string = $comment['comment'];
	$leng = strlen($length_of_string);
		if($leng>1000) {
			$comment['comment'] = substr($comment['comment'],0,200).'<div id="lol"><bold>....(click to read more)</bold></div>';
		}	
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
