<?php
session_start();
require_once("databaseLogin.php");

$musicUpdate = new DBconnector();
$userID=$_SESSION['userID'];
$music=htmlentities(mysql_real_escape_string($_POST['music']));



$updatemusic=$musicUpdate->query("UPDATE users SET music='$music' WHERE userID=$userID");

echo "<meta http-equiv='refresh' content='0; url=accountSettings.php' />";

?>