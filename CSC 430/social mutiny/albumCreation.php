<?php
session_start();
require_once("databaseLogin.php");
$albumCreate = new DBconnector();

$userID=$_SESSION['userID'];
$albumTitle=htmlentities(mysql_real_escape_string($_POST['albumTitle']));
$count=mysql_real_escape_string($_POST['count']);
$date=date("y-m-d, G:i:s");
$i=0;

$albumOption=$_POST['existingAlbum'];


if(((empty($albumTitle)) && ($albumOption=='null'))||((empty($albumTitle))&&(empty($albumOption)))){
	$albumTitle='No Title';
}

if(((!empty($albumTitle)) && ($albumOption=='null')) || ((!empty($albumTitle)) && (empty($albumOption)))){

	$albumCreate->query("INSERT INTO albums (userID, albumTitle, date) VALUES ('$userID','$albumTitle','$date')");
	sleep(3);

	$albumArray=$albumCreate->fetchArray($albumCreate->query("SELECT DISTINCT albumID FROM albums WHERE userID=$userID ORDER BY date DESC"));
	$albumID=$albumArray['albumID'];
}
elseif((empty($albumTitle)) && ($albumOption!='null')){
	$albumID=$albumOption;
}
for($i=0; $i<=$count; $i++){
	$theCount="count".+$i;
	if(isset($_POST[$theCount])){
		$postName=$_POST[$theCount];
		$albumCreate->query("INSERT INTO albumsLink (albumID, pictureID) VALUES ('$albumID','$postName')");

	}
}
echo "<meta http-equiv='refresh' content='0; url=pictures.php?id=".$userID."' />";
?>