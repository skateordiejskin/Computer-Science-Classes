<div id='photos' class="sub section">
<br /><br />
<h2 align='center'>Photos</h2><br />
<?php 
require_once("databaseLogin.php");
$picUpload = new DBconnector();

$userID=mysql_real_escape_string($_SESSION['userID']);
$date=date("y-m-d");

$pictureQuery=$picUpload->query("SELECT pictureID, userID, name, thumbnailName, name FROM pictures WHERE userID=$userID");
$numberOfPictures=$picUpload->numRows($pictureQuery);

$albumQuery=$picUpload->query("SELECT * FROM albums WHERE userID=$userID");
$numberOfAlbums=$picUpload->numRows($albumQuery);

?>
	<form action='picUpload.php' method='post' enctype='multipart/form-data' >
	<input type='hidden' name='MAX_FILE_SIZE' value='4000000'>
	<h5 align='right'>Picture Upload <input name='file' id='file' type='file' /> </h5>
	<h6 align='right'><input type='checkbox' name='profilePic' value='profilePic' />Set this as my Profile Picture</h6>
	<div align=right><input type='submit' value='Submit' /></div></form>
	<br /><h4 align='right'><a href='albumCreate.php?id=<?php echo $userID;?>'>Create Albums</a><br />
	<a href="setProfilePhotos.php">Set Profile Pictures</a></h4>
<?php

if($numberOfAlbums>0){
	echo "<div class='section'>Albums(".$numberOfAlbums.")</h3><div class='albums'><h5>";

	while($albumArray=$picUpload->fetchArray($albumQuery)){
		$albumID=$albumArray['albumID'];
		$albumTile=$picUpload->fetchArray($picUpload->query("SELECT DISTINCT pictureID FROM albumsLink WHERE albumID=$albumID"));
		$pictureID=$albumTile['pictureID'];

		$albumTilePicture=$picUpload->query("SELECT pictureID, thumbnailName FROM pictures WHERE pictureID=$pictureID");
		$albumTileArray=$picUpload->fetchArray($albumTilePicture);

		if(strlen(str_replace("''","'",$albumArray['albumTitle']))>20){
			$shortTitle=substr(str_replace("''","'",$albumArray['albumTitle']),0,18)."…";
			echo "<div class='individualAlbum'>
				<a href='albumView.php?albumID=".base64_encode($albumID)."&id=".base64_encode($profileUserID)."'>".$shortTitle."
				<img src='".$albumTileArray['thumbnailName']."' alt='' /></a>
				</div>";
		}
		else{
			echo "<div class='individualAlbum'>
				<a href='albumView.php?albumID=".base64_encode($albumID)."&id=".base64_encode($profileUserID)."'>".str_replace("''","'",$albumArray['albumTitle'])."
				<img src='".$albumTileArray['thumbnailName']."' alt='' /></a>
				</div>";
		}

	}
	echo "<br /><br /><br /><br /><br /><br /><br /><hr />";
}
else{}
echo "<div class='photos'>Photos(".$numberOfPictures.")</h3>";

while($pictureArray=$picUpload->fetchArray($pictureQuery)){
	$pictureID=$pictureArray['pictureID'];
	?>
		<div class='crop'>
			<a href="<?php echo $pictureArray['name']; ?>" class="lytebox" data-lyte-options="group:Photos titleTop:true navTop:true" data-description="<?php echo pictureCommentHome($userID, $pictureID);?>">
			<img src="<?php echo $pictureArray['thumbnailName'];?>" class="thumbnail" alt="" /> </a>
		</div>
		<?php

}
?>
</div>
</div>
<br />
<hr />
