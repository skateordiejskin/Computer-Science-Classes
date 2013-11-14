<?php
session_start();
require_once("databaseLogin.php");
$photoDelete=new DBconnector();

$pictureID=mysql_real_escape_string($_GET['pictureID'];
$userID=$_SESSION['userID'];

$photoDelete->query("DELETE FROM pictures WHERE pictureID=$pictureID");
$photoDelete->query("DELETE FROM pictureComments WHERE pictureID=$pictureID");

echo "<meta http-equiv='refresh' content='1; url=/pictures.php?id=".$userID."' />";

?>