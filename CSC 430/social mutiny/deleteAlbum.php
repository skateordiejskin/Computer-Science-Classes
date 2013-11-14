<?php

session_start();
require_once("databaseLogin.php");
$deleteAlbum = new DBconnector();

$userID=$_SESSION['userID'];
$yes=$_POST['yes'];
$no=$_POST['no'];
$albumID=$_POST['albumID'];

if($yes!=NULL){
	$deleteAlbum->query("DELETE FROM albums WHERE albumID=$albumID");
	$deleteAlbum->query("DELETE FROM albumsLink WHERE albumID=$albumID");
	echo "<meta http-equiv='refresh' content='1; url=/pictures.php?id=".$userID."' />";
}
else{
	echo "<meta http-equiv='refresh' content='1; url=/pictures.php?id=".$userID."' />";
}
?>