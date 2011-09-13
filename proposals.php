
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


<div class='f-10 project'> 
	<a href='/proposals/238'> 
		<img src='http://betaville.net/designthumbs/2404.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/238'>Jan Bridge<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Gary38
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
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
					2404
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_238_featured" name="proposal[238][featured]" size="30" style="width: 15px;" type="text" value="10" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			A concept for a new high line promenade for downtown Brooklyn: above the Tillary Street median from MetroTech plaza to Cadman plaza east, then connecting north to the Brooklyn Bridge boardwalk and west over Cadman Plaza west to Brooklyn Heights.
		</div> 
	</div> 
</div> 

<div class='f-9 project'> 
	<a href='/proposals/24'> 
		<img src='http://betaville.net/designthumbs/544.png' style='background-color: #8e5644'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/24'>Environmental Farm<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					about 1 year ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								6
							</span> 
							comments,
							<span class='count'> 
								2
							</span> 
							likes
						</a> 
					</span> 
					·
				</li> 
				<li> 
					<strong>ID:</strong> 
					544
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_24_featured" name="proposal[24][featured]" size="30" style="width: 15px;" type="text" value="9" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-9 project'> 
	<a href='/proposals/57'> 
		<img src='http://betaville.net/designthumbs/835.png' style='background-color: #e4dbb7'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/57'>Bridge Pods V1<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					11 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								4
							</span> 
							comments,
							<span class='count'> 
								3
							</span> 
							likes
						</a> 
					</span> 
					·
				</li> 
				<li> 
					<strong>ID:</strong> 
					835
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_57_featured" name="proposal[57][featured]" size="30" style="width: 15px;" type="text" value="9" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Bridge Pods attempt to minimize city congestion by allowing public parking between Manhattan and Jersey City
		</div> 
	</div> 
</div> 

<div class='f-9 project'> 
	<a href='/proposals/75'> 
		<img src='http://betaville.net/designthumbs/1170.png' style='background-color: #72b31e'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/75'>Verde Tower<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					gary38
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					11 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					1170
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_75_featured" name="proposal[75][featured]" size="30" style="width: 15px;" type="text" value="9" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			First Dynamic Architectural Tower. External Wall Carries all the building's load and becomes a live wall for growing vegetation. The interior structure of the building rotates 360 degree for view of entire water front of lower Manhattan
		</div> 
	</div> 
</div> 

<div class='f-9 project'> 
	<a href='/proposals/96'> 
		<img src='http://betaville.net/designthumbs/1384.png' style='background-color: #3e4b71'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/96'>Aqua Pods<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					10 months ago
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
					1384
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_96_featured" name="proposal[96][featured]" size="30" style="width: 15px;" type="text" value="9" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Self-supporting mixed use development. Reducing traffic flow into adjacent cities. Cars park underneath the arch strucures leading to the project. Dome structure (TBD) will house residents.
		</div> 
	</div> 
</div> 

<div class='f-8 project'> 
	<a href='/proposals/220'> 
		<img src='http://betaville.net/designthumbs/2364.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/220'>Cadman Botanical<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								1
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
					2364
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_220_featured" name="proposal[220][featured]" size="30" style="width: 15px;" type="text" value="8" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/257'> 
		<img src='http://betaville.net/designthumbs/2761.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/257'>Cadman Bridge<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					6 months ago
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
					2761
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_257_featured" name="proposal[257][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/26'> 
		<img src='http://betaville.net/designthumbs/533.png' style='background-color: #3e4b71'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/26'>Time Landscape<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					about 1 year ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								4
							</span> 
							comments,
							<span class='count'> 
								2
							</span> 
							likes
						</a> 
					</span> 
					·
				</li> 
				<li> 
					<strong>ID:</strong> 
					533
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_26_featured" name="proposal[26][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			By Alan Sonfist: a corner replanted with indiginenous species in the 1970's [documentary research by Diane Ludin]
		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/305'> 
		<img src='http://betaville.net/designthumbs/3647.png' style='background-color: #72b31e'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/305'>Percent for Art<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					3647
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_305_featured" name="proposal[305][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			99 pigs, 1 lipstick
		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/323'> 
		<img src='http://betaville.net/designthumbs/3825.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/323'>Open Museum<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					3825
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_323_featured" name="proposal[323][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Visitors Center (the show is all around you)
		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/324'> 
		<img src='http://betaville.net/designthumbs/3837.png' style='background-color: #e4dbb7'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/324'>Pace Museum<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
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
					3837
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_324_featured" name="proposal[324][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			None
		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/74'> 
		<img src='http://betaville.net/designthumbs/1168.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/74'>ZEN Tower<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Gary38
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					11 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								3
							</span> 
							comments,
							<span class='count'> 
								1
							</span> 
							likes
						</a> 
					</span> 
					·
				</li> 
				<li> 
					<strong>ID:</strong> 
					1168
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_74_featured" name="proposal[74][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			The Concave Shape of this tower was desgin for proper wind circulation to direct it to the center of the building. Wind Turbines located in the center of the building generates enough electric power fo the entire structure.
		</div> 
	</div> 
</div> 

<div class='f-7 project'> 
	<a href='/proposals/230'> 
		<img src='http://betaville.net/designthumbs/2401.png' style='background-color: #e4dbb7'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/230'>Cadman Highline<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
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
					2401
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_230_featured" name="proposal[230][featured]" size="30" style="width: 15px;" type="text" value="7" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Park Network
		</div> 
	</div> 
</div> 

<div class='f-6 project'> 
	<a href='/proposals/4'> 
		<img src='http://betaville.net/designthumbs/209.png' style='background-color: #376206'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/4'>Real City<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					base
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					about 1 year ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								10
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
					209
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_4_featured" name="proposal[4][featured]" size="30" style="width: 15px;" type="text" value="6" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Digital Projection with names of people who have bet their lives on this part of this city over the years.
		</div> 
	</div> 
</div> 

<div class='f-6 project'> 
	<a href='/proposals/95'> 
		<img src='http://betaville.net/designthumbs/1240.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/95'>ER Art Gallery<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Gary38
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					11 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					1240
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_95_featured" name="proposal[95][featured]" size="30" style="width: 15px;" type="text" value="6" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Art Gallery
		</div> 
	</div> 
</div> 

<div class='f-6 project'> 
	<a href='/proposals/174'> 
		<img src='http://betaville.net/designthumbs/2544.png' style='background-color: #376206'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/174'>FUTURE TURF<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					6 months ago
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
					2544
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_174_featured" name="proposal[174][featured]" size="30" style="width: 15px;" type="text" value="6" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Contrasting natural or artificial turf, to complement the historical character of the park and say &quot;hello world!&quot; to Google Earth from downtown Brooklyn.
		</div> 
	</div> 
</div> 

<div class='f-5 project'> 
	<a href='/proposals/283'> 
		<img src='http://betaville.net/designthumbs/3502.png' style='background-color: #72b31e'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/283'>Betaville on the Bowery<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					5 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								4
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
					3502
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_283_featured" name="proposal[283][featured]" size="30" style="width: 15px;" type="text" value="5" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			storefront clinic
		</div> 
	</div> 
</div> 

<div class='f-5 project'> 
	<a href='/proposals/31'> 
		<img src='http://betaville.net/designthumbs/553.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/31'>Straddle Housing Projects<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					12 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								3
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
					553
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_31_featured" name="proposal[31][featured]" size="30" style="width: 15px;" type="text" value="5" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Building housing projects on top commercial buildings to reduce commute time for residents.
		</div> 
	</div> 
</div> 

<div class='f-5 project'> 
	<a href='/proposals/296'> 
		<img src='http://betaville.net/designthumbs/3844.png' style='background-color: #3e4b71'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/296'>Ponte Mirabile<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								1
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
					3844
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_296_featured" name="proposal[296][featured]" size="30" style="width: 15px;" type="text" value="5" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			neighborly infrastructure
		</div> 
	</div> 
</div> 

<div class='f-5 project'> 
	<a href='/proposals/229'> 
		<img src='http://betaville.net/designthumbs/2383.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/229'>New sculpture 1<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					M2C
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
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
					2383
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_229_featured" name="proposal[229][featured]" size="30" style="width: 15px;" type="text" value="5" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Martin Koplin
		</div> 
	</div> 
</div> 

<div class='f-5 project'> 
	<a href='/proposals/234'> 
		<img src='http://betaville.net/designthumbs/2392.png' style='background-color: #8e5644'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/234'>New Babylon 2.0.2<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					alidur
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								10
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
					2392
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_234_featured" name="proposal[234][featured]" size="30" style="width: 15px;" type="text" value="5" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Une Autre Ville Pour Une Autre Vie: Constant, as interpreted by McKenzie Wark, Ali Dur, and DJ Spooky (that subliminal kid)
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/268'> 
		<img src='http://betaville.net/designthumbs/3335.png' style='background-color: #8e5644'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/268'>Jee Won Kim<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					5 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					3335
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_268_featured" name="proposal[268][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/272'> 
		<img src='http://betaville.net/designthumbs/3395.png' style='background-color: #e4dbb7'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/272'>Betaville Kiosk at White Box<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					5 months ago
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
					3395
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_272_featured" name="proposal[272][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/28'> 
		<img src='http://betaville.net/designthumbs/559.png' style='background-color: #72b31e'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/28'>Canal Street Subway<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					looneydoodle
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					12 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								1
							</span> 
							comments,
							<span class='count'> 
								1
							</span> 
							likes
						</a> 
					</span> 
					·
				</li> 
				<li> 
					<strong>ID:</strong> 
					559
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_28_featured" name="proposal[28][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Subway entrance at Canal Street
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/316'> 
		<img src='http://betaville.net/designthumbs/3811.png' style='background-color: #72b31e'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/316'>Abacus<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					3811
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_316_featured" name="proposal[316][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			scoreboard and &quot;math gym&quot;
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/317'> 
		<img src='http://betaville.net/designthumbs/3813.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/317'>Balance<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								1
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
					3813
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_317_featured" name="proposal[317][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Physics calculator/ &quot;math gym&quot;
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/318'> 
		<img src='http://betaville.net/designthumbs/3815.png' style='background-color: #376206'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/318'>Dude with smartphone<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
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
					3815
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_318_featured" name="proposal[318][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			None
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/320'> 
		<img src='http://betaville.net/designthumbs/3819.png' style='background-color: #376206'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/320'>Sports fan<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					4 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					3819
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_320_featured" name="proposal[320][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Lost to Brooklyn since '57
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/207'> 
		<img src='http://betaville.net/designthumbs/2289.png' style='background-color: #376206'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/207'>Creation Engine<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					Carl
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					8 months ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								2
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
					2289
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_207_featured" name="proposal[207][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			It Might Be Art
		</div> 
	</div> 
</div> 

<div class='f-4 project'> 
	<a href='/proposals/227'> 
		<img src='http://betaville.net/designthumbs/2377.png' style='background-color: #383838'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/227'>Original Water Edge<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					scandgolden24
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					7 months ago
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
					2377
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_227_featured" name="proposal[227][featured]" size="30" style="width: 15px;" type="text" value="4" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 

		</div> 
	</div> 
</div> 

<div class='f-0 project'> 
	<a href='/proposals/23'> 
		<img src='http://betaville.net/designthumbs/523.png' style='background-color: #e4dbb7'> 
	</a> 
	<div class='project-info'> 
		<h3> 
			<a href='/proposals/23'>Subway Info Centers<span class='icon'>&nbsp;]</span></a> 
		</h3> 
		<div class='project-meta'> 
			<ul> 
				<li> 
					<strong>Author&nbsp;</strong> 
					looneydoodle
					·
				</li> 
				<li> 
					<strong>Last&nbsp;Update</strong> 
					about 1 year ago
					·
				</li> 
				<li> 
					<span class='comment'> 
						<a href=''> 
							<span class='count'> 
								8
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
					523
				</li> 
				<li class='dev-hidden'> 
					<input id="proposal_23_featured" name="proposal[23][featured]" size="30" style="width: 15px;" type="text" value="0" /> 
				</li> 
			</ul> 
		</div> 
		<div class='project-description'> 
			Information centers around Subways
		</div> 
	</div> 
</div> 

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