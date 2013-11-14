<?php
	include 'header.php';
	include "footer.php";
	require_once("databaseLogin.php");
	$networkSearch = new DBconnector();	

	$network=$_POST['network'];

	$searchNetwork=$networkSearch->query("SELECT * FROM networks where $network LIKE '%$network%'");
?>