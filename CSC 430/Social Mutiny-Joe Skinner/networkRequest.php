<?
	require_once("databaseLogin.php");
	$networkRequest = new DBconnector();	

	$userID=$_SESSION['userID'];
	$networkName=htmlentities(mysql_real_escape_string($_POST['network']));
	 	 	
 	$insertNetwork=$networkRequest->query("INSERT INTO networkRequest(networkName, requestingUser) VALUES ('$networkName','$userID')");

 	echo "Thank you for submitting the network. We'll add it shortly!";
 	echo "<meta http-equiv='refresh' content='0; url=moreInfo.php' />";
 	
 	?>