<?php
session_start();
require_once '../databaseLogin.php';
include '../includes/functions.inc';
$chat = new DBconnector();
$userID=1;
echo "SELECT friends.userID, friends.friendID users.isOnline FROM friends &amp;c users WHERE (friends.friendID=".$userID." OR friends.userID=".$userID") AND (friends.friendID=users.userID OR friends.userID=users.userID) AND users.isOnline='1'";

$friends=$chat->query("SELECT friends.userID, friends.friendID users.isOnline FROM friends, users WHERE (friends.friendID=$userID OR friends.userID=$userID) AND (friends.friendID=users.userID OR friends.userID=users.userID) AND users.isOnline='1'");

//$onlineCheck=$chat->query("SELECT isOnline where 

while($onlineFriendsArray=$chat->fetchArray($friends)){
	//$online=$chat->query("
	if($userID!=$onlineFriendsArray['userID']){
		echo userName($onlineFriendsArray['userID']);
		}
	if($userID!=$onlineFriendsArray['friendID']){
		echo userName($onlineFriendsArray['friendID']);
		}
		}
		?>