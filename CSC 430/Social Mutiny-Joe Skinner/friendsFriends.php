<?php
include 'header.inc';
include 'functions.inc';

$userID=$_SESSION['userID'];
$profileUserID=mysql_real_escape_string($_GET['id'];

require_once("databaseLogin.php");
$userFriends = new DBconnector();


$friendsQuery = $userFriends->query("SELECT userID, friendID FROM friends WHERE userID=$profileUserID or friendID=$profileUserID");

echo "<div id='whiteboard' class='span-23 prepend-1 last text'>";
while($friendsArray = $userFriends->fetchArray($friendsQuery)){
	if ($friendsArray['friendID']!=$profileUserID){
		$friendID=$friendsArray['friendID'];
		$friendQuery = $userFriends->query("SELECT * FROM users WHERE userID=$friendID");

	}
	else{
		$friendID=$friendsArray['userID'];
		$friend = $userFriends->query("SELECT * FROM users WHERE userID=$friendID");

	}
	$friendPictureQuery=$userFriends->query("SELECT * FROM pictures WHERE userID=$friendID AND profilePicture=1");
	$friendPictureArray = $userFriends->fetchArray($friendPictureQuery);


	//while($friendArray = $userFriends->fetchArray($friendQuery)){
		$friendName = userName($friendID);
		$friendPicture=$friendPictureArray['name'];

		echo "<a href='profile.php?id=".$friendID."'>
		<img src='".$friendPicture."' class='friend' /> ".$friendName."</a><hr />";

	//}
}
echo "</div>";
include 'footer.inc';
?>
