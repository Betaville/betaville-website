
<!doctype html> 
<html> 
<head> 
	<title>Proposals</title> 
	<link href='stylesheets/reset.css' rel='stylesheet'> 
	<link href='stylesheets/screen.css' rel='stylesheet'> 
	<script src='js/jquery-1.4.2.min.js'></script> 
	<script src='js/jquery.jcarousel.min.js'></script> 
	<script src='js/betaville.home.js'></script> 
	<script src='js/jquery.easing.1.3.js'></script> 
	<script src='fancybox/jquery.mousewheel-3.0.4.pack.js' type='text/javascript'></script> 
	<script src='fancybox/jquery.fancybox-1.3.4.pack.js' type='text/javascript'></script> 
	<link href='fancybox/jquery.fancybox-1.3.4.css' media='screen' rel='stylesheet' type='text/css'> 
	<meta content='text/html;charset=utf-8' http-equiv='Content-Type'> 
	<meta name="csrf-param" content="authenticity_token"/> 
	<meta name="csrf-token" content="kg1Klytrjq1CyeFy3G1cujAERmXA69mxelZXrv9FcFc="/> 

</head> 
<body> 
	<div class='master-container'> 
		<?php include('header.php'); ?>
		<div class='page-container'> 
			<h1> 
				Explore Betaville
			</h1> 
			<div class='projects'> 
				<form accept-charset="UTF-8" action="/proposals/update_all" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="kg1Klytrjq1CyeFy3G1cujAERmXA69mxelZXrv9FcFc=" /></div> 

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
										<?php echo $design['date']; ?>
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

		<?php
}
?>

<div class='dev-hidden'> 
	<input name="commit" type="submit" value="Update" /> 
</div> 
</form> 
</div> 
<aside> 
	<div class='activity-section'> 
		<h2>Latest Activity</h2> 
		<div class='activity'> 
			<a href='/designs/3894'> 
				<img src='http://betaville.net/designthumbs/3894.png' style='background-color: #e4dbb7'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3894"><strong>susie</strong> 
					commented on
					<strong>Shae's tribute to Philip Johnson</strong>:
					<span class='content'> 
						Hey Shae, love your house...
					</span> 
				</a><div class='activity-meta'>2 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3846'> 
				<img src='http://betaville.net/designthumbs/3846.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3846"><strong>susie</strong> 
					commented on
					<strong>Alexa</strong>:
					<span class='content'> 
						Oh no! I'm sinking!
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3844'> 
				<img src='http://betaville.net/designthumbs/3844.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3844"><strong>Carl</strong> 
					commented on
					<strong>Ponte Mirabile</strong>:
					<span class='content'> 
						Wow, I can hardly wait!
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3836'> 
				<img src='http://betaville.net/designthumbs/3836.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3836"><strong>Carl</strong> 
					commented on
					<strong>Whitman Bikeway</strong>:
					<span class='content'> 
						It won't be enough to quote poets, or name thin...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3836'> 
				<img src='http://betaville.net/designthumbs/3836.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3836"><strong>Carl</strong> 
					commented on
					<strong>Whitman Bikeway</strong>:
					<span class='content'> 
						When the Brooklyn bridge was built, it was stil...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3830'> 
				<img src='http://betaville.net/designthumbs/3830.png' style='background-color: #3e4b71'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3830"><strong>scandgolden24</strong> 
					uploaded a new version of
					<strong>Dodger Stadium 1950</strong> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3830'> 
				<img src='http://betaville.net/designthumbs/3830.png' style='background-color: #8e5644'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3830"><strong>scandgolden24</strong> 
					uploaded a new version of
					<strong>Dodger Stadium 1950</strong> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3830'> 
				<img src='http://betaville.net/designthumbs/3830.png' style='background-color: #3e4b71'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3830"><strong>scandgolden24</strong> 
					uploaded a new version of
					<strong>Dodger Stadium 1950</strong> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3828'> 
				<img src='http://betaville.net/designthumbs/3828.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3828"><strong>scandgolden24</strong> 
					uploaded a new version of
					<strong>Pace Museum</strong> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3825'> 
				<img src='http://betaville.net/designthumbs/3825.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3825"><strong>Carl</strong> 
					commented on
					<strong>Open Museum</strong>:
					<span class='content'> 
						No changes to the architecture, only to the pro...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3825'> 
				<img src='http://betaville.net/designthumbs/3825.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3825"><strong>Carl</strong> 
					commented on
					<strong>Open Museum</strong>:
					<span class='content'> 
						Audio works by Walt Whitman or Janet Cardiff, s...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3819'> 
				<img src='http://betaville.net/designthumbs/3819.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3819"><strong>Carl</strong> 
					commented on
					<strong>Sports fan</strong>:
					<span class='content'> 
						Augmented Reality on his smartphone!
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3819'> 
				<img src='http://betaville.net/designthumbs/3819.png' style='background-color: #8e5644'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3819"><strong>Carl</strong> 
					commented on
					<strong>Sports fan</strong>:
					<span class='content'> 
						A fit 70-year-old, drawn back to his native Bro...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3807'> 
				<img src='http://betaville.net/designthumbs/3807.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3807"><strong>Carl</strong> 
					commented on
					<strong>OPEN Museum Center</strong>:
					<span class='content'> 
						A place to freshen up, enjoy a refreshment, dow...
					</span> 
				</a><div class='activity-meta'>4 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #3e4b71'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #8e5644'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #8e5644'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #e4dbb7'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3522'> 
				<img src='http://betaville.net/designthumbs/3522.png' style='background-color: #3e4b71'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3522"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Ponte Mirabile</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3502'> 
				<img src='http://betaville.net/designthumbs/3502.png' style='background-color: #e4dbb7'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3502"><strong>Carl</strong> 
					commented on
					<strong>Betaville on the Bowery</strong>:
					<span class='content'> 
						The clinic will be held over to September, but ...
					</span> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3333'> 
				<img src='http://betaville.net/designthumbs/3333.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3333"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Jee Won Kim</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/3333'> 
				<img src='http://betaville.net/designthumbs/3333.png' style='background-color: #8e5644'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/3333"><strong>Carl</strong> 
					uploaded a new version of
					<strong>Jee Won Kim</strong> 
				</a><div class='activity-meta'>5 months ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/514'> 
				<img src='http://betaville.net/designthumbs/514.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/514"><strong>jarredlhumphrey</strong> 
					commented on
					<strong>Liberty Piers</strong>:
					<span class='content'> 
						test message
					</span> 
				</a><div class='activity-meta'>about 1 year ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/503'> 
				<img src='http://betaville.net/designthumbs/503.png' style='background-color: #72b31e'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/503"><strong>kday</strong> 
					commented on
					<strong>Ferry Terminal</strong>:
					<span class='content'> 
						I am practicing adding comments, just a test.
					</span> 
				</a><div class='activity-meta'>about 1 year ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/494'> 
				<img src='http://betaville.net/designthumbs/494.png' style='background-color: #376206'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/494"><strong>jarredlhumphrey</strong> 
					commented on
					<strong>Seventeen State </strong>:
					<span class='content'> 
						another test comment
					</span> 
				</a><div class='activity-meta'>about 1 year ago</div> 
			</div> 
		</div> 

		<div class='activity'> 
			<a href='/designs/494'> 
				<img src='http://betaville.net/designthumbs/494.png' style='background-color: #383838'> 
			</a> 
			<div class='activity-body'> 
				<a href="/designs/494"><strong>jarredlhumphrey</strong> 
					commented on
					<strong>Seventeen State </strong>:
					<span class='content'> 
						test comment
					</span> 
				</a><div class='activity-meta'>about 1 year ago</div> 
			</div> 
		</div> 

	</div> 
</aside> 
</div> 

<?php include('footer.php'); ?>
</div> 
</body> 
</html> 