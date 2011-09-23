
<?php 
//betaville-functions.php

//this function takes a mysql datetime value and returns it in the proper php datetime format.
function fd($value) 
			{ 
			    array($datetime = explode(" ",$value));
				array($date = explode("-",$datetime[0]));
					array($date1 = explode(":",$datetime[1]));
			    $final = date("Y-m-d H:i:s", mktime($date1[0],$date1[1],$date1[2],$date[1],$date[2],$date[0])); 
		      	return $final;

			} 

//this function takes one php datetime value and subtracts it from the current time in New York
function timediff($a) 

			{

			date_default_timezone_set('America/New_York');
			$date = date("Y-m-d H:i:s",time()); 

			$diff = abs(strtotime($date) - strtotime($a));
	
			$years = floor($diff / (365*60*60*24));
			
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			$hours = floor(($diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60)/(60*60));

			$minutes = floor(( $diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60 - $hours*60*60)/(60));

			$seconds = floor(( $diff - $years * 365*60*60*24 - $months*30*24*60*60 - $days*24*60*60 - $hours*60*60 - $minutes*60)/(1));

				if($years>0) { 
					if($years==1)
						{
						echo $years." year ago";
						}
					else 
						{
						echo $years." years ago";
						}
					}

				elseif($months>0) { 
		
						if($months==1)
						{
						echo $months." month ago";
						}	
						else 
						{
						echo $months." months ago";
						}
					}

				elseif($days>0) { 
						if($days==1)
							{
						echo $days." day ago";
						}
						else 
						{
						echo $days." days ago";
						}
						}
				
				elseif($hours>0) { 
						if($hours==1)
							{
						echo $hours." hour ago";
						}
						else 
							{
						echo $hours." hours ago";
						}
						}
				
				elseif($minutes>0) { 
						if($minutes==1)
							{
						echo $minutes." minute ago";
						}
						else 
							{
						echo $minutes." minutes ago";
						}
						}
				else 		{ 
						if($seconds==1)
							{
						echo $seconds." second ago";
						}
						else 
							{
						echo $seconds." seconds ago";
						}
						}
			}
?>
						
