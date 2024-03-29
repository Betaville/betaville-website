<?php 
/**  
 *  edit-proposal - Change permission functionality on proposals, editable by the proposal owner, allows adding user to a group, deleting from group, changing permissions for the particular proposal......
 *  Copyright (C) 2011-2012 Betaville
 *  
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
	include('head.php');
	include_once('betaville-functions.php');
	include_once('config.php');
?>
<body>
<link rel="stylesheet" type="text/css" href="stylesheets/userGroups.css" />
<?php
	//If user is not logged in Redirect....
	if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == true ) {
			header("Location: ".WEB_URL);
	}
	//If the viewability parameter is changed
	if(isset($_GET['view'])) {
		//Get the value from the button
		if(isset($_POST['button'])) {
			echo '<strong>Proposal permission changed</strong>';
			$designID = $_GET['id'];
			$permission = $_POST['button'];
			$addPermission = SERVICE_URL.'?section=proposal&request=setpermission&id='.$designID.'&token='.$_SESSION['token'].'&permission='.$permission;
			$addPermissionJSON = file_get_contents($addPermission,0,null,null);
			$addPermissionOutput = json_decode($addPermissionJSON, true);
		}
	}
	//Delete the user from the group
	if(isset($_GET['deleteuser'])) {
		$deletename=$_GET['deleteuser'];
		$designid=$_GET['id'];
		DeleteProposalGroupUser($designid,$deletename);
	    header('url='.WEB_URL.'/edit-proposal-group.php?id='.$designid); 
	}
	//Add a user to the group, few checks if the user already exists or if the user owns the design
	if(isset($_GET['adduser'])) {
		if(checkUserInProposalGroup($_GET['adduser'],$_GET['id']) != true && $_SESSION['username'] != $_GET['adduser']) {
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
		//Get the design information.
		$designid = $_GET['id'];
		$designRequest = SERVICE_URL.'?section=design&request=findbyid&id='.$designid;
		$designJSON = file_get_contents($designRequest,0,null,null);
		$designOutput = json_decode($designJSON, true);
		$design = $designOutput['design'];
			if($_SESSION['username']==$design['user']) {
		?>
        
        <div class="page">
        <div class="user">
			<a class="fancyButton" href="design.php?id=<?php echo $designid;?>"><span>Back to Proposal</span></a><br><br>
    
        <h1><?php echo $design['name']; ?> </h1>
        	
            <h3>Edit Viewability</h3>		
			<!-- The owner of a proposal can choose to show proposal to all, or show proposal to only him and group, if proposal does not need to be shown to a group user then delete him from group-->
            <form name="userInput" action ="edit-proposal-group.php?id=<?php echo $designid;?>&view=changed" method="post">
                <input type="radio" name="button" value="all" /> Open to all<br>
                <input type="radio" name="button" value="user_group" /> Me and Group<br>
                <input type="submit" value="Submit" />
             </form> 
            <br>
         	<h3>  Add User to Group</h3>
			
			<h4> Search users to add</h4>
	
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
									$user_to_search = $_GET['target'];
									echo '<b> Add </bold>'.$user_to_search.' ?</b>';
									$url = WEB_URL."/edit-proposal-group.php?&adduser=".$user_to_search."&id=".$design['designID'];
									echo '<nr><form name="userInput" action ="'.$url.'" method="post">
									<input type="submit" name="submit" value="Add" onClick="return confirmPost()" /></form>';}
								}
								echo '<br>';
						?>
			<h3> Delete User from Group</h3>

						<?php
							$userRequest = SERVICE_URL.'?section=user&request=getallusersingroup&id='.$designid;
							$userJSON = file_get_contents($userRequest,0,null,null);
							$userOutput = json_decode($userJSON, true);
							$users = $userOutput['users'];
							echo '<h4> Current Users in Group:  </h4>';
							foreach($users as $user_name) {
								echo '<a href="edit-proposal-group.php?deleteuser='.$user_name.'&id='.$design['designID'].'" <strong>'.$user_name.'<br></strong></a>';
							}?>
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
