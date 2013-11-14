<?php
	include 'functions.php';
	echo $userID=$_SESSION['userID'];
	
	$recSQL="SELECT * FROM networkLink WHERE userID=$userID";
	$recQuery=mysql_query($recSQL);
	$recFetch=mysql_fetch_array($recQuery);
	
	$networkID=$recFetch['networkID'];
	
	$networkSQL="SELECT * FROM networks WHERE networkID=$networkID";
	$networkQuery=mysql_query($networkSQL);
	$networkFetch=mysql_fetch_array($networkQuery);
	
	$networkName=$networkFetch['networkName'];
	
	echo "People you may know from the ".$networkName." network:<br />";
	
	$recUserSQL="SELECT * FROM networkLink where networkID=$networkID";
	$recUserQuery=mysql_query($recUserSQL);
	
	$sql="SELECT * FROM friends WHERE userID=$userID or friendID=$userID";
	$query=mysql_query($sql);
	
	while($recUserFetch=mysql_fetch_array($recUserQuery)){
			if($recUserFetch['userID']!=$userID)
					echo userName($recUserFetch['userID'])."<br />";
			while($fetch=mysql_fetch_array($query)){
				
				/*
				if(($fetch['friendID']==$recUserFetch['userID']) || ($fetch['userID']==$recUserFetch['userID'])){
					}
				else{
					echo userName($recUserFetch['userID'])."<br />";
					}*/
			}
		}