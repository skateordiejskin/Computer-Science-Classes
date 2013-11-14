<?php
session_start();
require_once '../databaseLogin.php';
include 'functions.inc';
$chat = new DBconnector();
echo $userID=1;

$onlineFriends=$chat->query("SELECT f.userID, f.friendID, u.userID, u.isOnline FROM friends as f, users as u WHERE (f.friendID=$userID OR f.userID=$userID) AND (f.userID=u.userID OR f.friendID = u.userID) AND isOnline=1");

while($onlineFriendsArray=$chat->fetchArray($onlineFriends){
	if($userID!=$onlineFriendsArray['f.userID'])
		echo userName($onlineFriendsArray['f.userID']);
	if($userID!=$onlineFriendsArray['f.friendID'])
		echo userName($onlineFriendsArray['f.friendID']);
		}