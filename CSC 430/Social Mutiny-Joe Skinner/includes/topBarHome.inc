<?php
require_once 'databaseLogin.php';
include 'functions.inc';



$userID=$_SESSION['userID'];
$connector = new DBconnector();

$pictureQuery=$connector->query("SELECT * FROM pictures WHERE userID=$userID");

while($profilePicGet=$connector->fetchArray($pictureQuery)){
	$profilePic=$profilePicGet['profilePicture'];
	if($profilePic==1)
		$profilePicName=$profilePicGet['name'];
}
?>