<?php
	 require_once('databaseLogin.php');
	 
	 $userID=$_SESSION['userID'];
	 $network=$_POST['network'];
	 $networkSelect = new DBconnector();
	 
	 $networkQuery=$networkSelect->query"SELECT * FROM networks WHERE networkName='$network'";
	 $networkFetch=$networkSelect->fetchArray($networkQuery);
	 $networkID=$networkFetch['networkID'];
	 
	$insertNetworkLink=$networkSelect->query"INSERT INTO networkLink VALUES ('$userID','$networkID')";
	 
	 echo "<meta http-equiv='refresh' content='0; url=moreInfo.php' />";
	 
	?> 