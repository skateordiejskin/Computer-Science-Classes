<?php
include 'header.inc';
include 'footer.inc';
require_once("databaseLogin.php");

$profileUserID=mysql_real_escape_string($_GET['id']);
$userID=mysql_real_escape_string($_SESSION['userID']);

$date = date("y-m-d, G:i:s");

$friendRequest=new DBconnector();

$requestFriend = $friendRequest->query("INSERT INTO pendingRequests (requestingUserID, requestedUser, type, date) VALUES('$userID','$profileUserID','friend','$date')");

if($requestFriend){
	echo "<h2 align=center> Request has been sent!
		<meta http-equiv='refresh' content='1; url=profile.php?id=".$profileUserID."' /></h2>";
}

?>