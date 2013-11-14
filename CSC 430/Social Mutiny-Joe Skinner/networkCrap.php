<?php
	include 'header.php';
	
	$select="SELECT * FROM networkLink";
	$query=mysql_query($select);
	
	while($fetch=mysql_fetch_array($query)){
		echo $update="UPDATE users SET networkID=".$fetch['networkID']." WHERE userID=".$fetch['userID'];
		echo "<br />";
		$updateQuery=mysql_query($update);
		}