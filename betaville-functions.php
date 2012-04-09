<?php 
/**  
 *  Betaville fucntions file - A file to perform function calls on the website
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

//Checking if the image exists on server
function checkimage($design_image) {
		if (@GetImageSize($design_image)){				
				return $design_image;
		}
		else{
		//Image does not exist in folder
		$design_image = 'images/sorry.gif';
		return $design_image;		
		}	
}


//To get the number of comments for the design ID parameter passed
function displayComments($commentRequest){
		$commentJSON = file_get_contents($commentRequest,0,null,null);
		$commentOutput = json_decode($commentJSON, true);
		$comments = $commentOutput['comments'];
		$commentCount=0;

		foreach($comments as $comment){
				$commentCount++;
		}
		if($commentCount==1){
			echo $commentCount." comment"; 
		}
		else{
			echo $commentCount." comments";
		}
}

function getServerTime(){
	include_once('config.php');
	$timeRequest = SERVICE_URL.'?section=time&request=getformatted';
	$timeJSON = file_get_contents($timeRequest,0,null,null);
	$timeOutput = json_decode($timeJSON, true);
	$current_time = $timeOutput['serverTime'];
	return $current_time;
}

//this function takes a mysql datetime value and returns it in the proper php datetime format.
function fd($value){ 
	array($datetime = explode(" ",$value));
	array($date = explode("-",$datetime[0]));
	array($date1 = explode(":",$datetime[1]));
	$final = date("Y-m-d H:i:s", mktime($date1[0],$date1[1],$date1[2],$date[1],$date[2],$date[0])); 
	return $final;
} 

//this function takes one php datetime value and subtracts it from the current time in New York
function timediff($a){
			//fetching current server time from getServerTime()
			$date = fd(getServerTime());
			$diff = abs(strtotime($date) - strtotime($a));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$hours = floor(($diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60)/(60*60));
			$minutes = floor(( $diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60 - $hours*60*60)/(60));
			$seconds = floor(( $diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60 - $hours*60*60 - $minutes*60)/(1));
			if($years>0){ 
				if($years==1){
					echo $years." year ago";
				}
				else{
					echo $years." years ago";
				}
			}
			elseif($months>0){ 
				if($months==1){
					echo $months." month ago";
				}	
				else{
					echo $months." months ago";
				}
			}
			elseif($days>0){ 
				if($days==1){
					echo $days." day ago";
				}
				else{
					echo $days." days ago";
				}
			}
			elseif($hours>0){ 
				if($hours==1){
					echo $hours." hour ago";
				}
				else{
					echo $hours." hours ago";
				}	
			}
			elseif($minutes>0){ 
				if($minutes==1){
					echo $minutes." minute ago";
				}
				else{
					echo $minutes." minutes ago";
				}
			}
			else{ 
				if($seconds==1){
					echo $seconds." second ago";
				}
				else{
					echo $seconds." seconds ago";
				}
			}
}

//Frigging complicated....
function DeleteProposalGroupUser($designid,$user_name){ 
					//Service request to get users in group
					$userRequest = SERVICE_URL.'?section=user&request=getallusersingroup&id='.$designid;
					$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
					$userTestOutput = json_decode($userTestRequestJSON, true);
					$users = $userTestOutput['users'];
					$count=0;
					$userTest1 = implode(",",$users);
					$userTest = explode(",",$userTest1);
					//Checks the numbers of users before deleting.........
						if($userTest[0]!=''){
							foreach($userTest as $key => $userToDelete){
								if($userToDelete == $user_name) {
										$a = $key;
										$count++;
								}
							}
							if($count==1){ 
								$len_of_array = count($userTest);
									if($len_of_array==1){
										$user_group = ',';	
										$user_group = urlencode($user_group);
										$userRequest = SERVICE_URL.'?section=user&request=deleteuserfromgroup&entry='.$user_group.'&designid='.$designid;
										$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
										$userTestOutput = json_decode($userTestRequestJSON, true);
									}
									else{
										array_splice($userTest,$a,1);
										$user_group = implode(",",$userTest);
										$user_group = ','.$user_group.',';	
										$user_group = urlencode($user_group);
										$userRequest = SERVICE_URL.'?section=user&request=deleteuserfromgroup&entry='.$user_group.'&designid='.$designid;
										$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
										$userTestOutput = json_decode($userTestRequestJSON, true);
									}
							}
							else{
								$user_group = implode(",",$userTest);
							}
						}
}

//Check if user is in group, to prevent adding the same user twice to the same group												
function checkUserInProposalGroup($user_name,$designid) {
				$userRequest = SERVICE_URL.'?section=user&request=getallusersingroup&id='.$designid;
				$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
				$userTestOutput = json_decode($userTestRequestJSON, true);
				$users = $userTestOutput['users'];
						foreach($users as $name_in_group) {
								if($user_name == $name_in_group) {
									return true;
								}
						}
				return false;
}


//Delete a User from the Fave List, if it exists ( same functionality as delete a user from a user group
function DeletefaveListUser($designid,$user_name) {
				$userRequest = SERVICE_URL.'?section=fave&request=designfaveList&id='.$designid;
				$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
				$userTestOutput = json_decode($userTestRequestJSON, true);
				$users = $userTestOutput['users'];
				$count=0;
				$userTest1 = implode(",",$users);
				$userTest = explode(",",$userTest1);
						if($userTest[0]!='') {
							foreach($userTest as $key => $userToDelete){
								if($userToDelete==$user_name){
									$a = $key;
									$count++;
								}
							}
							if($count==1){ 
								$len_of_array = count($userTest);
									if($len_of_array==1){
										$user_group = ',';	
										$user_group = urlencode($user_group);
										$userRequest = SERVICE_URL.'?section=fave&request=remove&name='.$user_group.'&id='.$designid.'&token='.$_SESSION['token'];
										$userTestRequestJSON = file_get_contents($userRequest,0,null,null);										$userTestOutput = json_decode($userTestRequestJSON, true);
									}
									else{
										array_splice($userTest,$a,1);
										$user_group = implode(",",$userTest);
										$user_group = ','.$user_group.',';	
										$user_group = urlencode($user_group);
										$userRequest = SERVICE_URL.'?section=fave&request=remove&name='.$user_group.'&id='.$designid.'&token='.$_SESSION['token'];
										$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
										$userTestOutput = json_decode($userTestRequestJSON, true);
									}
							}
							else{
								$user_group = implode(",",$userTest);
							}
						}
}



//Check if a user is in the Design Fave List, same functionality as in add user to design....
function checkUserInfaveListGroup($checkname,$designid) {
						$userRequest = SERVICE_URL.'?section=fave&request=designfaveList&id='.$designid;
						$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
						$userTestOutput = json_decode($userTestRequestJSON, true);
						$users = $userTestOutput['users'];
							foreach($users as $name_in_group) {
									if($checkname==$name_in_group) {
										return true;
									}
							}
						return false;
						}


//Count the number of likes for a Design
function countLikes($designID) {
			$userRequest = SERVICE_URL.'?section=fave&request=designfaveList&id='.$designID;
			$count=0;
			$userTestRequestJSON = file_get_contents($userRequest,0,null,null);
			$userTestOutput = json_decode($userTestRequestJSON, true);
			$users = $userTestOutput['users'];
				foreach($users as $user_in_group) {
					$count++;
				}
			return $count;
}



?>
						
