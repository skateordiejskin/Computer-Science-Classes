<?php
	session_start();

	
	require_once('databaseLogin.php');
   	include('includes/thumbnailCreateClass.inc');

	$thumbnailCreate=new DBconnector;
	
	$pictureID=mysql_real_escape_string($_GET['pictureID']);
	$userID=mysql_real_escape_string($_SESSION['userID']);
	$thumbnailQuery=$thumbnailCreate->query("SELECT name from pictures where pictureID=$pictureID");
	
	$thumbnailDir="Users/user".$userID."/thumbnails".$userID."/";
	
	while($thumbnailFetch=$thumbnailCreate->fetchArray($thumbnailQuery)){
		$picExplode=(explode('/',$thumbnailFetch['name']));
		$name=$thumbnailFetch['name'];
		$picName=$picExplode[2];
		$thumbnailName=$thumbnailDir.$picName;
		
		$updateThumbnails=$thumbnailCreate->query("UPDATE pictures SET thumbnailName='$thumbnailName' WHERE userID=$userID AND name='$name'");
		
		$image = new SimpleImage();
   		$image->load($thumbnailFetch['name']);
   		$image->resizeToWidth(150);
  		$image->save($thumbnailName);
		}
		echo "<meta http-equiv='refresh' content='0; url=home.php' />";
		
	
	
   ?>