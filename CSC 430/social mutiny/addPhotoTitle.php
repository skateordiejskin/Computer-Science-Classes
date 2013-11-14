<?php
include 'includes/header.inc';
include 'includes/sidebarHome.inc';
require_once("databaseLogin.php");
$photoView=new DBconnector();

$profileUserID=mysql_real_escape_string($_GET['id']);
$pictureID=mysql_real_escape_string($_GET['pictureID']);
$userID=mysql_real_escape_string($_SESSION['userID']);

$pictureQuery=$photoView->query("SELECT * FROM pictures WHERE pictureID=$pictureID");
$pictureFetch=$photoView->fetchArray($pictureQuery);

echo "<div class='span-19 last text' id='whiteboard'>
	<h3 align='center'><img src='".$pictureFetch['name']."' class='photoView'/></h3>
	<div align='center'>
	<form action='addTitle.php' method='post'>
		<input type='hidden' name='pictureID' id='pictureID' value='".$pictureID."' />
		<input type='hidden' name='userID' id='userID' value='".$userID."' />
		<input type='text' name='title' id='post' size='100' />
		<input type='submit' name='submit' value='Add Title' />
	</form></p></div></div>";

	?>
