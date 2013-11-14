<?php
include 'includes/header.inc';
include 'includes/sidebarProfile.inc';

require_once("databaseLogin.php");
$picUpload = new DBconnector();

$userID=mysql_real_escape_string($_SESSION['userID']);
$date=date("y-m-d");
$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));

$pictureQuery=$picUpload->query("SELECT pictureID, userID, name, thumbnailName FROM pictures WHERE userID=$profileUserID");
$numberOfPictures=$picUpload->numRows($pictureQuery);

$albumQuery=$picUpload->query("SELECT * FROM albums WHERE userID=$profileUserID");
$numberOfAlbums=$picUpload->numRows($albumQuery);



if($userID==$profileUserID){

	echo  "<form action='picUpload.php' method='post' enctype='multipart/form-data' >
	<input type='hidden' name='MAX_FILE_SIZE' value='4000000'>
	<h5 align='right'>Picture Upload <input name='file' id='file' type='file' /> </h5>
	<h6 align='right'><input type='checkbox' name='profilePic' value='profilePic' />Set this as my Profile Picture</h6>
	<div align=right><input type='submit' value='Submit' /></div></form>
	<br /><h4 align='right'><a href='albumCreate.php?id=".$userID."'>Create Albums</a></h4>";
}


echo "<h5 align='center'>
			<div class='span-19 last text' id='whiteboard'>";
if($numberOfAlbums>0){
	echo "<h3 align='left'>Albums(".$numberOfAlbums,")</h3><div class='albums'><h5>";

	while($albumArray=$picUpload->fetchArray($albumQuery)){
		$albumID=$albumArray['albumID'];
		$albumLink=$picUpload->query("SELECT DISTINCT pictureID FROM albumsLink WHERE albumID=$albumID");
		$albumTile=$picUpload->fetchArray($albumLink);
		$pictureID=$albumTile['pictureID'];

		$albumTilePicture=$picUpload->query("SELECT pictureID, thumbnailName FROM pictures WHERE pictureID=$pictureID");
		$albumTileArray=$picUpload->fetchArray($albumTilePicture);

		if(strlen(str_replace("''","'",$albumArray['albumTitle']))>20){
			$shortTitle=substr(str_replace("''","'",$albumArray['albumTitle']),0,18)."…";
			echo "<div class='individualAlbum'>
				<a href='albumView.php?albumID=".base64_encode($albumID)."&id=".base64_encode($profileUserID)."'>".$shortTitle."
				<img src='".$albumTileArray['thumbnailName']."' /></a></div>";
		}
		else{
			echo "<div class='individualAlbum'>
				<a href='albumView.php?albumID=".base64_encode($albumID)."&id=".base64_encode($profileUserID)."'>".str_replace("''","'",$albumArray['albumTitle'])."
				<img src='".$albumTileArray['thumbnailName']."' /></a></div>";
		}

	}
	echo "</div><hr />";
}
else{}
echo "<h3 align='left'>Pictures(".$numberOfPictures.")</h3>";

while($pictureArray=$picUpload->fetchArray($pictureQuery)){
	echo "<div class='crop'><a href='photoView.php?id=".base64_encode($profileUserID)."&pictureID=".base64_encode($pictureArray['pictureID'])."'>
		<img src='".$pictureArray['thumbnailName']."' class='thumbnail' /> </a></div>";

}

echo "</div>";
include "includes/footer.inc";
?>