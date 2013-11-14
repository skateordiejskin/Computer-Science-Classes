<?php
	include 'dbConnect.php';
	$userID=$_SESSION['userID'];
	$delete=$_POST['delete'];
	$pictureID=$_POST['pictureID'];
	
	$deleteSQL="DELETE FROM pictures WHERE userID=$userID AND pictureID=$pictureID";
	$deleteQuery=mysql_query($deleteSQL);
	
	echo "<meta http-equiv='refresh' content='0; url=pictures.php?id=".$userID."' />";
	
	
	mysql_close($link);
	?>