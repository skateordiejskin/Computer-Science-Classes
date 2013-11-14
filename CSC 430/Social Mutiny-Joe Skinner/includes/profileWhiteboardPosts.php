<?php
session_start();
require_once '../databaseLogin.php';
$userID=$_SESSION['userID'];
$profileUserID = $_SESSION['profileUserID'];
include 'functions.inc';
$userProfile = new DBconnector();

$boardQuery=$userProfile->query("SELECT post, type, sender, recipient, date FROM theBoard WHERE sender=$profileUserID OR recipient=$profileUserID ORDER BY date DESC");
$userQuery=$userProfile->query("SELECT userID, firstName, lastName FROM users WHERE userID=$profileUserID");
$userFetch=$userProfile->fetchArray($userQuery);
$profileName=$userFetch['firstName']." ".$userFetch['lastName'];

while($boardFetch=$userProfile->fetchArray($boardQuery)){

	if($boardFetch['type']=='friend'){

		if($profileUserID!=$boardFetch['recipient']){
			$recipientQuery=$userProfile->query("SELECT firstName, lastName FROM users WHERE userID=".$boardFetch['recipient']);
			$recipientFetch=$userProfile->fetchArray($recipientQuery);
			$recipientName=$recipientFetch['firstName']." ".$recipientFetch['lastName'];

			echo "<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
						".$profileName."</a> is now friends with 
						<a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>".userName($boardFetch['recipient']).".</a>
						<div class='dateText'>".date("g:i a F j, Y" ,strtotime(date("g:i a F j, Y" ,strtotime($boardFetch['date']))))."</div><hr  />";
		}
		else if($profileUserID!=$boardFetch['sender']){
			echo "<a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>
						".$profileName."</a> is now friends with 
						<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>".userName($boardFetch['sender']).".</a>
						<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";

		}
	}

	if($boardFetch['type']=='post'){

		if($boardFetch['sender']!=$boardFetch['recipient']){


			if($boardFetch['sender']!=$profileUserID){
				$postQuery=$userProfile->query("SELECT * FROM users WHERE userID=".$boardFetch['sender']);
				$fetchPost=$userProfile->fetchArray($postQuery);
				$otherName=$fetchPost['firstName']." ".$fetchPost['lastName'];

				echo "
					<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
					".$otherName."</a> wrote on <a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>".userName($boardFetch['recipient'])."'s </a>
					board: <br />".str_replace("\'","'",$boardFetch['post'])."
					<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
			}

			if($boardFetch['recipient']!=$profileUserID){
				$queryPost1=$userProfile->query("SELECT * FROM users WHERE userID=".$boardFetch['recipient']);
				$fetchPost1=$userProfile->fetchArray($queryPost1);
				$otherName1=$fetchPost1['firstName']." ".$fetchPost1['lastName'];

				echo "
					<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
					 ".$profileName."</a> wrote on <a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>".userName($boardFetch['recipient'])."'s </a>
					board: <br />".str_replace("\'","'",$boardFetch['post'])."
					<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
			}
		}

		if($boardFetch['recipient']==$boardFetch['sender']){
			echo "
				<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
				".$profileName."</a> wrote:<br />
				".str_replace("\'","'",$boardFetch['post'])."
				<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
		}
	}

	if($boardFetch['type']=='picture'){
		echo "
			".$profileName. " has " .str_replace("\'","'",$boardFetch['post']).".
			<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
	}

echo "</div>";
}
?>