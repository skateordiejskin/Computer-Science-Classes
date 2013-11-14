<?php
session_start();
require_once("databaseLogin.php");
$moviesUpdate = new DBconnector();


$userID=$_SESSION['userID'];
$movies=htmlentities(mysql_real_escape_string($_POST['movies']));


$updatemovies=$moviesUpdate->query("UPDATE users SET movies='$movies' WHERE userID=$userID");

echo "<meta http-equiv='refresh' content='0; url=accountSettings.php' />";

?>