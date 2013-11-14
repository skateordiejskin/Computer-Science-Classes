<?php
include 'includes/header.inc';

require_once("databaseLogin.php");
$albumView = new DBconnector();

$userID=$_SESSION['userID'];
$date=date("y-m-d");
$albumID=mysql_real_escape_string(base64_decode($_GET['albumID']));
$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));

$albumTitle=$albumView->fetchArray($albumView->query("SELECT albumTitle FROM albums WHERE albumID=$albumID"));

$albumLink=$albumView->query("SELECT pictureID FROM albumsLink WHERE albumID=$albumID");
echo "<h5 align='center'>
			<div class='section box'><h3>".str_replace("''","'",$albumTitle['albumTitle'])."</h3>";


while($albumTile=$albumView->fetchArray($albumLink)){
	$pictureID=$albumTile['pictureID'];
	$pictureQuery=$albumView->query("SELECT pictureID, userID, name, thumbnailName FROM pictures WHERE pictureID=$pictureID");
	$pictureArray=$albumView->fetchArray($pictureQuery);

	echo "<a href='photoView.php?id=".base64_encode($profileUserID)."&pictureID=".base64_encode($pictureArray['pictureID'])."'>
		<img src='".$pictureArray['thumbnailName']."' class='thumbnailAlbum' /> </a>";
}
if($userID==$profileUserID){
	echo "<div align='right'><a href='deleteAlbumConfirm.php?albumID=".$albumID."'>Delete Album</a></div>";
	}
echo "</div></h5></div></div>";
?>