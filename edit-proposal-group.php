<?php 
	include('head.php');
	include_once('betaville-functions.php');
	include('config.php');
?>
<body>
<link rel="stylesheet" type="text/css" href="stylesheets/userGroups.css" />
<?php

	if(isset($_GET['deleteuser'])) {
		$deletename=$_GET['deleteuser'];
		$designid=$_GET['id'];
		DeleteUser($designid,$deletename);
		
	    header('url='.WEB_URL.'/edit-proposal-group.php?id='.$designid); 
		}

	if(isset($_GET['adduser'])) {
		if(checkUserInGroup($_GET['adduser'],$_GET['id']) != true && $_SESSION['username'] != $_GET['adduser']) {
			$userToAdd=$_GET['adduser'];
			$designid=$_GET['id'];
			$userToAdd=urlencode($userToAdd.',');
			$addRequest = SERVICE_URL.'?section=user&request=addusertogroup&addname='.$userToAdd.'&designid='.$designid;
			$addJSON = file_get_contents($addRequest,0,null,null);
			$addOutput = json_decode($addJSON, true);
			
		    header('url='.WEB_URL.'/edit-proposal-group.php?id='.$designid); 
		}
		else {
			if($_GET['adduser'] == $_SESSION['username']) {
				echo '<strong>Cannot Add yourself...</strong>';
			}
			else {
			$designid = $_GET['id'];
			echo '<strong>'.$_GET['adduser'].' exists in group.</strong>';
		       header('Refresh: 2;url='.WEB_URL.'/edit-proposal-group.php?id='.$designid); 	
			}
		}
	}

		$designid = $_GET['id'];
		$designRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$designid;
		$designJSON = file_get_contents($designRequest,0,null,null);
		$designOutput = json_decode($designJSON, true);
		$design = $designOutput['design'];
		
			if($_SESSION['username']==$design['user']) {
	
		?>
        <a class="fancyButton" href="design.php?id=<?php echo $designid;?>"><span>Go Back</span></a>
        <div class="page">
        <div class="user">
        	<h1><?php echo $design['name']; ?> </h1> <br>
            <h3>  Add User </h3>
            
			<h4> Type User name into the search bar to search for users to add to the group </h4>
	
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
							var id = <?php echo $designid; ?>;
							xmlhttp.open("GET","searches/user-search.php?link=userequest&designid="+id+"&query="+str,true);
							xmlhttp.send();
						}
	
				function confirmPost()
				{
					var agree=confirm("Are you sure you want to Add This User?");
						if (agree)
							return true ;
						else
							return false ;
				}
	


			</script>
						<form>
							<input type="text" size="30" onKeyUp="showResult(this.value)" />
							<div id="livesearch"></div>
						</form>
						<?php
								if($_GET['action']=='edituser'){
									$myuser = $_GET['target'];
									echo '<b> Add </bold>'.$myuser.' ?</b>';
									$url = WEB_URL."/edit-proposal-group.php?&adduser=".$myuser."&id=".$design['designID'];
									echo '<nr><form name="userInput" action ="'.$url.'" method="post">
									<input type="submit" name="submit" value="Add" onClick="return confirmPost()" /></form>';}
								}

								echo '<br><br>';
						?>
			<h3> Delete User </h3>

						<?php
							$userRequest = SERVICE_URL.'?section=user&request=getallusersingroup&id='.$designid;
							$userJSON = file_get_contents($userRequest,0,null,null);
							$userOutput = json_decode($userJSON, true);
							$users = $userOutput['users'];
							echo '<br><br><h4> Current Users in Group:  </h4>';
							foreach($users as $musy) {
								echo '<a href="edit-proposal-group.php?deleteuser='.$musy.'&id='.$design['designID'].'" <strong>'.$musy.'<br></strong></a>';
							}
							?>
		</div>

		<div class= "proposal-image">
                <?php
                        //Check if image exists on server
                        $image = checkimage(THUMBNAIL_URL.$design['designID'].'.png');
                        echo "<a href='design.php?id=".$design['designID']."'>\n"; ?>
                        <img src=<?php echo $image;?> style='background-color: #3e4b71'>
        </div> 
	
	</div>
	<?php include('footer.php');?>
</body>
</html>
