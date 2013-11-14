<?php
include 'includes/header.inc';
include 'includes/sidebarProfile.inc';

require_once("databaseLogin.php");
$picUpload = new DBconnector();

$userID=$_SESSION['userID'];
$pictureQuery=$picUpload->query("SELECT pictureID, userID, name, thumbnailName FROM pictures WHERE userID=$profileUserID");
$albumQuery=$picUpload->query("SELECT albumTitle, albumID FROM albums WHERE userID=$userID");
$albumNumRows=$picUpload->numRows($albumQuery);


echo "<h5 align='center'>
	  <div class='span-19 last text' id='whiteboard'>
		<form action='albumCreation.php' method='post'>
			Create a new album: <input type='text' name='albumTitle' size='60' /><br />";

if($albumNumRows>0){
	echo "Or Choose from an existing album: <select name='existingAlbum'><option value='null'></option>";
	while($albumArray=$picUpload->fetchArray($albumQuery)){
		$albumID=$albumArray['albumID'];
		echo "<option value='$albumID'>".str_replace("''","'",$albumArray['albumTitle'])."</option>";
	}
	echo "</select><br />";
}
$count=0;
while($pictureArray=$picUpload->fetchArray($pictureQuery)){
	echo "<input type='checkbox' value='".$pictureArray['pictureID']."' name='count".$count."' />
		<img src='".$pictureArray['thumbnailName']."' class='thumbnail' />";
	$count++;
	if($count % 4==0){
		echo "<br />";
	}
}

echo "<div align='right'><br />
	<input type='hidden' name='count' value='".$count."' />
	<input type='submit' value='Create Album' /></form></div></div>";
include "includes/footer.inc";
?>