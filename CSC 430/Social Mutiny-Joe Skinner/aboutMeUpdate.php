<?php
session_start();
require_once 'databaseLogin.php';
$userID=$_SESSION['userID'];

$connector = new DBconnector();
$about = htmlentities(mysql_real_escape_string($_POST['about']));


$insertQuery=$connector->query("UPDATE users SET about='$about' WHERE userID='$userID'");

?>