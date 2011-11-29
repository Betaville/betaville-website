<?php include('head.php'); ?>  
<body>

<?php
/*
 * Conditions where the user will be denied:
 * - Not logged in
 * - Not an administrator
 */
 if(!isset($_SESSION['token'])){
 	header('Location: ./');
 }
 
	// check the user's type:
	include('config.php');
	$userRequest = SERVICE_URL.'?section=user&request=getlevel&username='.$_SESSION['username'];
	$userJSON = file_get_contents($userRequest,0,null,null);
	$userOutput = json_decode($userJSON, true);
	$userType = $userOutput['userType'];
	
?>

	<div class='master-container'> 
		<div class='decoration'> 
			<div class='page-title'> 
				<h1>Administer Your Betaville Server</h1> 
			</div> 
		</div> 
		<div class='page-container'> 
			<div class='page-body container' id='menu'> 
				<div class='column span-7 append-1'> 
					<h1><a href="#users">Users</a></h1>
					<h3>Check on users</h3>
					</p>
				</div> 
				<div class='column span-7 append-1'> 
					<h1><a href="#designs">Designs</a></h1>
					<h3>I'm not sure what to put here</h3>
				</div> 
				<div class='column span-7 last'> 
					<h1><a href="#options">Options</a></h1>
					<h3>Change the settings for this Betaville Server</h3>
				</div> 
			</div>
			<div class='page-body container' id='content'>
				<div id="users">
					<h2>Users</h2>
					<script type="text/javascript">
					function showResult(str){
						if (str.length==0){ 
							document.getElementById("livesearch").innerHTML="";
							document.getElementById("livesearch").style.border="0px";
							return;
						}
						if (window.XMLHttpRequest)
						{// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
						}
						else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						xmlhttp.onreadystatechange=function(){
							if (xmlhttp.readyState==4 && xmlhttp.status==200){
								document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
								document.getElementById("livesearch").style.border="1px solid #A5ACB2";
							}
						}
						
						xmlhttp.open("GET","searches/user-search.php?link=admin&query="+str,true);
						xmlhttp.send();
					}
					</script>
					<form>
						<input type="text" size="30" onkeyup="showResult(this.value)" />
						<div id="livesearch"></div>
					</form>
					<?php
						if($_GET['action']=='edituser' && isset($_GET['target'])){
						echo '<h3>'.$_GET['target'].'</h3>';
						echo '<form name="usertype-selection" action="interact/admin-actions.php" method="POST">';?>
							<div>
								<select name="type">
									<?php
									// get the user type of the target user firstChild// grab the user's type
									$targetUserRequest = SERVICE_URL.'?section=user&request=getlevel&username='.$_GET['target'];
									$targetUserJSON = file_get_contents($targetUserRequest,0,null,null);
									$targetUserOutput = json_decode($targetUserJSON, true);
									$targetUserType = $targetUserOutput['userType'];
									
									echo '<option value="'.$targetUserType.'">'.$targetUserType.'</option>';
									if($targetUserType!="member") echo '<option value="member">member</option>';
									if($targetUserType!="base_committer") echo '<option value="base_committer">base_committer</option>';
									if($targetUserType!="moderator") echo '<option value="moderator">moderator</option>';
									if($targetUserType!="admin") echo '<option value="admin">admin</option>';
									?>
								</select>
								<?php echo '<input type="hidden" name="target" value="'.$_GET['target'].'" />'; ?>
								<input type="hidden" name="action" value="changeusertype" />
								<input type="submit" value="Update" />
							</div>
						</form>
						<?php
						}
					?>
				</div>
				
				
				<div id="designs">
					<h2>Designs</h2>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum augue tristique mi ultricies a porta diam tincidunt. In hac habitasse platea dictumst. Nam eget ante id lorem dignissim adipiscing. Integer mattis, est a aliquam ultricies, nibh purus dictum neque, nec volutpat ipsum metus non diam. Nullam nec nibh quis elit semper dignissim sed ac dui. Maecenas a justo vitae nulla pretium consequat. In posuere turpis vel sapien convallis varius scelerisque ipsum sollicitudin. Donec laoreet lectus at dolor vestibulum et aliquam nisl rutrum. Suspendisse a mi non arcu ullamcorper ultricies. Etiam aliquet viverra magna sed volutpat. Mauris venenatis, massa vitae adipiscing volutpat, tellus est feugiat est, nec dapibus dolor justo vel metus. Nullam nisl leo, sollicitudin vel fermentum vitae, volutpat commodo nisi. Curabitur rutrum hendrerit suscipit. Phasellus sapien turpis, aliquet ac scelerisque eu, mattis in leo. Aenean vitae libero orci, sed tincidunt odio. Cras sed libero sed purus gravida elementum.

Sed non mauris vitae justo interdum convallis. Donec vel turpis massa. Integer leo massa, convallis a ornare a, egestas vitae augue. Donec luctus elit nec ligula imperdiet laoreet. In hac habitasse platea dictumst. Vivamus libero tortor, condimentum a posuere ac, consequat mattis nibh. Morbi volutpat mollis purus, vitae blandit diam ornare vitae. Vivamus nec diam eu sem condimentum elementum. Suspendisse quis massa vel augue ultrices hendrerit. Ut sed arcu tellus. Cras adipiscing est non tellus sagittis mattis. Mauris eget felis ipsum. Sed eget congue libero. Donec euismod, leo at aliquet hendrerit, odio nisi pellentesque libero, a luctus turpis turpis nec ante. Maecenas mattis leo at sapien sodales posuere.

Morbi iaculis felis vulputate diam suscipit varius. Nullam quis placerat turpis. Nulla quis lectus at ante cursus lacinia ac vel velit. Sed faucibus commodo leo ut cursus. Proin tincidunt rutrum lectus a venenatis. Cras aliquet, lacus eget tincidunt adipiscing, mi enim varius urna, non ullamcorper neque nunc in nibh. Ut rhoncus tempor scelerisque. Phasellus sollicitudin, ante ac pretium posuere, velit leo molestie sapien, id faucibus mi nisl non urna. Mauris nec tempus arcu. Nulla sagittis mi eu felis iaculis ullamcorper. Vivamus sollicitudin magna in ipsum egestas vel convallis neque luctus. Suspendisse risus augue, laoreet ut ullamcorper et, mollis quis eros. Suspendisse pharetra mattis pharetra. Proin porta lectus id justo elementum ultricies. Nulla libero metus, euismod ac fermentum lobortis, dictum sit amet odio. Integer in nibh vitae leo imperdiet consectetur.

Morbi commodo, tellus at sagittis eleifend, nunc turpis pretium nisi, ut suscipit lorem erat nec dui. In gravida pharetra purus et consequat. Nullam adipiscing rhoncus magna sed feugiat. Suspendisse lacus odio, faucibus sit amet lobortis porta, ornare non eros. In in faucibus nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam imperdiet eleifend tortor quis fermentum. Sed nec libero non nibh blandit blandit id nec tellus. In at risus sapien, non consequat mauris. Quisque dolor velit, convallis et tempus vitae, rutrum vel tortor. Nulla quis lorem at odio tempor tincidunt a vitae elit. Aliquam in semper tortor.

Sed tincidunt hendrerit risus nec suscipit. Quisque est nunc, ullamcorper sed convallis quis, congue sit amet eros. Vestibulum vitae purus iaculis massa consequat dictum ac eget purus. Donec eros turpis, porttitor ac rhoncus in, iaculis commodo massa. Phasellus elementum quam turpis. Donec eu nibh lacus, quis molestie diam. Etiam nec tellus neque. Phasellus rhoncus nisl ac velit faucibus suscipit.
					</p>
				</div>
				
				
				<div id="options">
					<h2>Options</h2>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum augue tristique mi ultricies a porta diam tincidunt. In hac habitasse platea dictumst. Nam eget ante id lorem dignissim adipiscing. Integer mattis, est a aliquam ultricies, nibh purus dictum neque, nec volutpat ipsum metus non diam. Nullam nec nibh quis elit semper dignissim sed ac dui. Maecenas a justo vitae nulla pretium consequat. In posuere turpis vel sapien convallis varius scelerisque ipsum sollicitudin. Donec laoreet lectus at dolor vestibulum et aliquam nisl rutrum. Suspendisse a mi non arcu ullamcorper ultricies. Etiam aliquet viverra magna sed volutpat. Mauris venenatis, massa vitae adipiscing volutpat, tellus est feugiat est, nec dapibus dolor justo vel metus. Nullam nisl leo, sollicitudin vel fermentum vitae, volutpat commodo nisi. Curabitur rutrum hendrerit suscipit. Phasellus sapien turpis, aliquet ac scelerisque eu, mattis in leo. Aenean vitae libero orci, sed tincidunt odio. Cras sed libero sed purus gravida elementum.

Sed non mauris vitae justo interdum convallis. Donec vel turpis massa. Integer leo massa, convallis a ornare a, egestas vitae augue. Donec luctus elit nec ligula imperdiet laoreet. In hac habitasse platea dictumst. Vivamus libero tortor, condimentum a posuere ac, consequat mattis nibh. Morbi volutpat mollis purus, vitae blandit diam ornare vitae. Vivamus nec diam eu sem condimentum elementum. Suspendisse quis massa vel augue ultrices hendrerit. Ut sed arcu tellus. Cras adipiscing est non tellus sagittis mattis. Mauris eget felis ipsum. Sed eget congue libero. Donec euismod, leo at aliquet hendrerit, odio nisi pellentesque libero, a luctus turpis turpis nec ante. Maecenas mattis leo at sapien sodales posuere.

Morbi iaculis felis vulputate diam suscipit varius. Nullam quis placerat turpis. Nulla quis lectus at ante cursus lacinia ac vel velit. Sed faucibus commodo leo ut cursus. Proin tincidunt rutrum lectus a venenatis. Cras aliquet, lacus eget tincidunt adipiscing, mi enim varius urna, non ullamcorper neque nunc in nibh. Ut rhoncus tempor scelerisque. Phasellus sollicitudin, ante ac pretium posuere, velit leo molestie sapien, id faucibus mi nisl non urna. Mauris nec tempus arcu. Nulla sagittis mi eu felis iaculis ullamcorper. Vivamus sollicitudin magna in ipsum egestas vel convallis neque luctus. Suspendisse risus augue, laoreet ut ullamcorper et, mollis quis eros. Suspendisse pharetra mattis pharetra. Proin porta lectus id justo elementum ultricies. Nulla libero metus, euismod ac fermentum lobortis, dictum sit amet odio. Integer in nibh vitae leo imperdiet consectetur.

Morbi commodo, tellus at sagittis eleifend, nunc turpis pretium nisi, ut suscipit lorem erat nec dui. In gravida pharetra purus et consequat. Nullam adipiscing rhoncus magna sed feugiat. Suspendisse lacus odio, faucibus sit amet lobortis porta, ornare non eros. In in faucibus nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam imperdiet eleifend tortor quis fermentum. Sed nec libero non nibh blandit blandit id nec tellus. In at risus sapien, non consequat mauris. Quisque dolor velit, convallis et tempus vitae, rutrum vel tortor. Nulla quis lorem at odio tempor tincidunt a vitae elit. Aliquam in semper tortor.

Sed tincidunt hendrerit risus nec suscipit. Quisque est nunc, ullamcorper sed convallis quis, congue sit amet eros. Vestibulum vitae purus iaculis massa consequat dictum ac eget purus. Donec eros turpis, porttitor ac rhoncus in, iaculis commodo massa. Phasellus elementum quam turpis. Donec eu nibh lacus, quis molestie diam. Etiam nec tellus neque. Phasellus rhoncus nisl ac velit faucibus suscipit.
					</p>
				</div>
			</div>
		</div> 

		<?php include('footer.php'); ?>
	</div> 
</body> 
</html> 