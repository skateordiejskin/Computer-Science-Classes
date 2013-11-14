<?php
session_start();
 include 'includes/functions.inc';
 $homeWhiteboard = new DBconnector();
	$userID=$_SESSION['userID'];
$type="picture";
echo dateCheck($userID,$type);
