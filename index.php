<!doctype html>
<html>
<head>
	<?php include('head.php'); ?>
</head>

<body>
	<div class='master-container'>
		<?php include('header.php'); ?>
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
								<span class='icon i-play'>►</span>
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
							<a class='carousel-learn-more' href='/what-is-betaville'>Learn more »</a>
						</li>
						<li class='carousel-opensource'>

							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Open Source</span>
							</div>
							<a class='carousel-learn-more' href='/contribute'>Learn more »</a>
						</li>
						<li class='carousel-participatory'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Participatory</span>
							</div>
							<a class='carousel-learn-more' href='/contribute'>Learn more »</a>
						</li>
						<li class='carousel-publicart'>
							<div class='carousel-text'>
								<em>Betaville is</em>
								<br>
								<span>Public art</span>
							</div>
							<a class='carousel-learn-more' href='/what-is-betaville'>Learn more »</a>
						</li>
					</ul>

					<div class='carousel-nav' id='tagline-carousel-nav'>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<div class='active'></div>
					</div>
				</div>
			</div>
		</div>
		<div class='page-container'>
			<div class='page-body container' id='home'>
				<div class='project-container'>
					<h2>Featured Projects</h2>
					
					
					<?php
					include('config.php');
					// get the featured proposals
					// swap to request=proposals or request=versions
					$proposalRequest = SERVICE_URL.'?section=proposal&request=getfeatured&quantity=7';
					$proposalJSON = file_get_contents($proposalRequest,0,null,null);
					$proposalOutput = json_decode($proposalJSON, true);
					$proposals = $proposalOutput['designs'];
					
					
					for($i = 0; $i < sizeof($proposals); ++$i){
						
						$proposal = $proposals[$i];
						
						if($i==0){
							?>
							<div class='project-featured'>

								<div class='f-10 project'>
									<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>>
										<img src=<?php echo THUMBNAIL_URL.$proposal['designID'].'.png';?> style='background-color: #3e4b71'>
									</a>
									<div class='project-info'>
										<h3>
											<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>><?php echo $proposal['name']; ?><span class='icon'>&nbsp;]</span></a>
										</h3>
										<div class='project-meta'>
											<ul>
												<li>
													<strong>Author&nbsp;</strong>
													<?php echo $proposal['user']; ?>
													·
												</li>

												<li>
													<strong>Last&nbsp;Update</strong>
													<?php echo $proposal['date']; ?>
													·
												</li>
												<li>
													<span class='comment'>
														<a href=''>
															<span class='count'>
																0
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
													<?php echo $proposal['designID']; ?>
												</li>
											</ul>
										</div>
										<div class='project-description'><?php echo $proposal['description']; ?></div>

									</div>
								</div>

							</div>
							<div class='projects'>
							<?php
						}
						else{
							?>
							<div class='f-9 project'>
								<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>>
									<img src=<?php echo THUMBNAIL_URL.$proposal['designID'].'.png';?> style='background-color: #3e4b71'>
								</a>
								<div class='project-info'>
									<h3>
										<a href=<?php echo 'design.php?id='.$proposal['designID']; ?>><?php echo $proposal['name']; ?><span class='icon'>&nbsp;]</span></a>
									</h3>
									<div class='project-meta'>
										<ul>
											<li>
												<strong>Author&nbsp;</strong>
												<?php echo $proposal['user']; ?>
												·
											</li>

											<li>
												<strong>Last&nbsp;Update</strong>
												<?php echo $proposal['date']; ?>
												·
											</li>
											<li>
												<span class='comment'>
													<a href=''>
														<span class='count'>
															0
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
												<?php echo $proposal['designID']; ?>
											</li>
										</ul>
									</div>
									<div class='project-description'><?php echo $proposal['description']; ?></div>
								</div>
							</div>
							<?php
						}
						
						
					}
					
					?>
					</div>
					
					
				</div>
				<aside>
					<?php include('latest-activity.php'); ?>
					<div class='activity-section'>
						<h2>Twitter</h2>
						<script src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
						new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 4,
							interval: 6000,
							width: 'auto',
							height: 300,
							theme: {
								shell: {
									background: '#ffffff',
									color: '#000000'
								},
								tweets: {
									background: '#ffffff',
									color: '#7d7b7d',
									links: '#000000'
								}
							},
							features: {
								scrollbar: false,
								loop: false,
								live: true,
								hashtags: true,
								timestamp: true,
								avatars: false,
								behavior: 'all'
							}
							}).render().setUser('betavillebxmc').start();
							</script>
						</div>
					</aside>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>
	</body>
	</html>

