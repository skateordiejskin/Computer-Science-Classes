<?php
include 'header.inc';
include 'footer.inc';

require_once("databaseLogin.php");
$requestConfirm=new DBconnector();

$userID=mysql_real_escape_string($_SESSION['userID']);
$requestingUser = mysql_real_escape_string($_POST['requestingUser']);
$accept=mysql_real_escape_string($_POST['accept']);
$deny=mysql_real_escape_string($_POST['deny']);
$date=date("y-m-d, G:i:s");


if($accept != NULL){
	$acceptFriendQuery = $requestConfirm->query("INSERT INTO friends (userID, friendID, date) VALUES('$userID','$requestingUser','$date')");
	$deletePendingQuery = $requestConfirm->query("DELETE FROM pendingRequests WHERE requestingUserID=$requestingUser");
	//$reverseAcceptFriendQuery = $requestConfirm->query("INSERT INTO friends (friendID, userID, date) VALUES('$requestingUser','$userID','$date')");


	if(($acceptFriendQuery) && ($deletePendingQuery)){
		$requestingNameSelect = $requestConfirm->query("SELECT * FROM users WHERE userID=$requestingUser");
		$nameSelect = $requestConfirm->query("SELECT * FROM users WHERE userID=$userID");

		$requestingNameArray = $requestConfirm->fetchArray($requestingNameSelect);
		$nameSelectArray = $requestConfirm->fetchArray($nameSelect);

		echo "<h3 align='center'>You are now friends with ".$requestingNameArray['firstName']." ".$requestingNameArray['lastName'].'!';
		echo "<meta http-equiv='refresh' content='2; url=home.php' />";

		$requestingUserName=$requestingNameArray['firstName']." ".$requestingNameArray['lastName'];
		$userName=$result2['firstName']." ".$result2['lastName'];

		$whiteboardInsertQuery=$requestConfirm->query("INSERT INTO theBoard (sender, recipient, type, date) VALUES ('$requestingUser','$userID', 'friend', '$date')");
	}

}
if($deny !=NULL){
	$denyPendingQuery = $requestConfirm->query("DELETE FROM pendingRequests WHERE requestingUserID=$requestingUser AND requestedUser=$userID");
	echo "<meta http-equiv='refresh' content='1; url=home.php' />";
}


?>