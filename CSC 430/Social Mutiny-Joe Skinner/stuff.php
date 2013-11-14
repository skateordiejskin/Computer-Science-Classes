<?php
	require_once("databaseLogin.php");
	$connector = new DBconnector();	
	$query=$connector->query("SELECT password, userID FROM users");
	
	while($array=$connector->fetchArray($query)){
		$password=md5($array['password']);
		$userID=$array['userID'];
		$update=$connector->query("UPDATE users SET password='$password' WHERE userID='$userID'");
		
		}

?>