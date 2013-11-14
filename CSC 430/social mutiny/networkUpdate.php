<?php
	session_start();
	require_once("databaseLogin.php");
	$network = new DBconnector();	
	 
	 $userID=$_SESSION['userID'];
	 $networkName=mysql_real_escape_string($_POST['network']);
	 
	 $networkFetch=$network->fetchArray($network->query("SELECT networkID FROM networks WHERE networkName='$networkName'"));
	 $networkID=$networkFetch['networkID'];
	 
	
	$network->query("DELETE FROM networkLink WHERE userID=$userID");
	
	$network->query("INSERT INTO networkLink VALUES('$networkID','$userID')");
	 
	 echo "<meta http-equiv='refresh' content='0; url=accountSettings.php' />";
	 
	?> 