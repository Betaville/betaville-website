<?php
include("head.php");
ini_set('display_errors',2); 
error_reporting(E_ALL);
?>
<body>
	<div class='master-container'>
		<div class='tagline'>
			<div class='tagline-body'>
				<div class='tagline-close' onclick="$('.tagline').slideUp()">
					<span class='icon'>D</span>
				</div>
				<div class='tagline-text'>
					<div class='text-body'>
						<p class='p1'>A <strong>collaborative online platform</strong> for</p>
						<br>
						<p class='p1'><strong>proposals on urban design</strong></p>
						<div class='button-row'>
							<a class='uberbutton green' href='http://betaville.net/webstart/betaville.jnlp'>
								Download now
								<span class='icon i-play'></span>
							</a>
							<a class='text' href='what-is-betaville.php'>Get info »</a>
							<a class='text' href='http://www.youtube.com/watch?v=bZ6lN0Wtlb4&amp;autoplay=1' id='thevideo'>Watch a demo »</a>
						</div>
					</div>
				</div>
				<div class='carousel'>
					<ul id='tagline-carousel'>
						<li class='carousel-futuristic'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Futuristic</span>
							</div>
							<a class='carousel-learn-more' href='what-is-betaville.php'>Learn more »</a>
						</li>
						<li class='carousel-opensource'>

							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Open Source</span>
							</div>
							<a class='carousel-learn-more' href='contribute.php'>Learn more »</a>
						</li>
						<li class='carousel-participatory'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Participatory</span>
							</div>
							<a class='carousel-learn-more' href='contribute.php'>Learn more »</a>
						</li>
						<li class='carousel-publicart'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Public art</span>
							</div>
							<a class='carousel-learn-more' href='what-is-betaville.php'>Learn more »</a>
						</li>
					</ul>

					<div class='carousel-nav' id='tagline-carousel-nav'>
						<a href=''></a>
						<a href=''></a>
						<a href=''></a>
						<a href=''></a>
						<div class='active'></div>
					</div>
				</div>
			</div>
			<?php
				function searchCheck() {
					if ( isset( $_POST["searchField"]) && ($_POST['searchType'] == "0")){
						//include("config.php");
						$search = $_POST["searchField"];
						$temp = SERVICE_URL.'?section=design&request=findbyuser&excludeempty=1&user='.$search;
						$temp1 = file_get_contents($temp,0,null,null);
						$temp2 = json_decode($temp1, true);
						$results=$temp2['designs'];
						$num=count($results);
					//	echo $num;
						for ( $i = 0; $i < $num; $i++ ){
							echo "<center><div class='f-1 project'>";
							echo "<a href='design.php?id=".$results[$i]['designID']."'><br>";
							$image = checkimage(THUMBNAIL_URL.$results[$i]['designID'].'.png');
							echo "<a href='design.php?id=".$results[$i]['designID']."'><br>";
							echo "<img src='".$image."'style='background-color: #3e4b71'>";
			
							echo "<div class='project-info'>"; 
							echo "<h3>"; 
						   echo '<a href="design.php?id='.$results[$i]['designID'].'">'.$results[$i]['name'].'<span class=\'icon\'>&nbsp;</span></a>';
							echo "</h3>"; 
							echo "<div class='project-meta'>"; 
						   echo "<ul>"; 
							echo "<li>"; 
							echo "<strong>Author&nbsp;</strong>"; 
							echo $results[$i]['user'];
								
							echo "</li></center>"; 
							//echo ($i+1) . ". ".$results[$i]['name']. " by ".$results[$i]['user']."<br>";
							//$image = checkimage(THUMBNAIL_URL.$results[$i]['designID'].'.png');
							//echo "<a href='design.php?id=".$results[$i]['designID']."'><br>"."<img src=".$image."style='background-color:#3e4b71'>".'<a href="design.php?id='.$results[$i]['designID'].'">'.$results[$i]['name'].'<span class=\'icon\'>&nbsp;]</span></a>';
						}
					}
					else if ( isset( $_POST["searchField"]) && ($_POST['searchType'] == "1")){
						//include("config.php");
						$search = $_POST["searchField"];
						$temp = SERVICE_URL.'?section=design&request=findbyname&name='.$search;
						$temp1 = file_get_contents($temp,0,null,null);
						$temp2 = json_decode($temp1, true);
						$results=$temp2['designs'];
						$num=count($results);
					//	echo $num;
						for ( $i = 0; $i < $num; $i++ ){
							echo "<center><div class='f-1 project'>";
							echo "<a href='design.php?id=".$results[$i]['designID']."'><br>";
							$image = checkimage(THUMBNAIL_URL.$results[$i]['designID'].'.png');
							echo "<a href='design.php?id=".$results[$i]['designID']."'><br>";
							echo "<img src='".$image."' style='background-color: #3e4b71'>";
			
							echo "<div class='project-info'>"; 
							echo "<h3>"; 
						   echo '<a href="design.php?id='.$results[$i]['designID'].'">'.$results[$i]['name'].'<span class=\'icon\'>&nbsp;</span></a>';
							echo "</h3>"; 
							echo "<div class='project-meta'>"; 
						   echo "<ul>"; 
							echo "<li>"; 
							echo "<strong>Author&nbsp;</strong>"; 
							echo $results[$i]['user'];
								
							echo "</li></center>"; 
							//echo ($i+1) . ". ".$results[$i]['name']. " by ".$results[$i]['user']."<br>";
							//$image = checkimage(THUMBNAIL_URL.$results[$i]['designID'].'.png');
							//echo "<a href='design.php?id=".$results[$i]['designID']."'><br>"."<img src=".$image."style='background-color:#3e4b71'>".'<a href="design.php?id='.$results[$i]['designID'].'">'.$results[$i]['name'].'<span class=\'icon\'>&nbsp;]</span></a>';
						}
					}
					else if ( isset( $_POST["searchField"]) && ($_POST['searchType'] == "2")){
						//include("config.php");
						$search = $_POST["searchField"];
						$temp = SERVICE_URL.'?section=design&request=findbyid&id='.$search;
						$temp1 = file_get_contents($temp,0,null,null);
						$temp2 = json_decode($temp1, true);
						$result=$temp2['design'];
					//	echo $num
						echo "<center><div class='f-1 project'>";
						echo "<a href='design.php?id=".$result['designID']."'><br>";
						$image = checkimage(THUMBNAIL_URL.$result['designID'].'.png');
						echo "<a href='design.php?id=".$result['designID']."'><br>";
						echo "<img src='".$image."' style='background-color: #3e4b71'>";
			
						echo "<div class='project-info'>"; 
						echo "<h3>"; 
					   echo '<a href="design.php?id='.$result['designID'].'">'.$result['name'].'<span class=\'icon\'>&nbsp;</span></a>';
						echo "</h3>"; 
						echo "<div class='project-meta'>"; 
					   echo "<ul>"; 
						echo "<li>"; 
						echo "<strong>Author&nbsp;</strong>"; 
						echo $result['user'];
								
						echo "</li></center>"; 
							//echo ($i+1) . ". ".$results[$i]['name']. " by ".$results[$i]['user']."<br>";
							//$image = checkimage(THUMBNAIL_URL.$results[$i]['designID'].'.png');
							//echo "<a href='design.php?id=".$results[$i]['designID']."'><br>"."<img src=".$image."style='background-color:#3e4b71'>".'<a href="design.php?id='.$results[$i]['designID'].'">'.$results[$i]['name'].'<span class=\'icon\'>&nbsp;]</span></a>';
					}
				}
			?>
			<?php
				function display(){
					if ( isset($_POST['searchField']))
						echo "display:block";
					else echo "display:none";
				}
			?>
			<div class='page-container'>
				<div class='page-body container' id='home'>
					<center><div class="search">
					<h1>Search Results</h1>
					<a href="index.php" >Home</a>
					<div id="result" style="<?php echo display(); ?>"><center><?php searchCheck(); ?></center></div></center>
					</div>
				</div>
<?php
	include("footer.php");
?>