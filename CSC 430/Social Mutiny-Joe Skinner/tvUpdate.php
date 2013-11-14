<?php
session_start();
require_once("databaseLogin.php");
$tvUpdate = new DBconnector();

$userID=$_SESSION['userID'];
$tv=htmlentities(mysql_real_escape_string($_POST['tv']));


$tvUpdate->query("UPDATE users SET tv='$tv' WHERE userID=$userID");

echo "<meta http-equiv='refresh' content='0; url=accountSettings.php' />";

?>