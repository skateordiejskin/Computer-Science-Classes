<?php
	include 'header.php';
	
	/*
	$select="SELECT * FROM networks";
	$query=mysql_query($select);
	
	while($fetch=mysql_fetch_array($query)){
	
		
		$create="CREATE TABLE IF NOT EXISTS network_".$fetch['networkID']." (id_".$fetch['networkID']." int(10) auto_increment not null primary key, userID int(10))";
		
		if(!$createQ=mysql_query($create)){
			echo "Error<br />";
			}
			$networkIDTableName="network_".$fetch['networkID'];
			echo "<br />";
			$id=explode("_", $networkIDTableName);
			$id[1];
			
			
			}
for($i=0; $i<200; $i++){
				$user="SELECT networkID from userInfo".$i;
				
				$userQuery=mysql_query($user);
				if (!$userQuery){
					}
				
				else{
					$userFetch=mysql_fetch_array($userQuery);
					$userNetworkID=$userFetch['networkID'];
					$insertNetwork="INSERT INTO network_".$userNetworkID." (userID) VALUES ('$i')";
					
					$insertNewtworkQuery=mysql_query($insertNetwork);
					}
					}
					*/