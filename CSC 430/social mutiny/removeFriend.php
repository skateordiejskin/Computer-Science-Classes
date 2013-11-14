<?php
	include 'includes/header.inc';
	require_once 'databaseLogin.php';
	$removeFriend = new DBconnector();
	$profileUserID=mysql_real_escape_string($_SESSION['profileUserID'];
	$userID=mysql_real_escape_string($_SESSION['userID'];
	$profileUserID=mysql_real_escape_string($_GET['id'];
	
	$deleteFriendSelect = $removeFriend->query("SELECT * FROM friends where friendID=$userID OR userID=$userID");
	while($deleteFriendArray = $removeFriend->fetchArray($deleteFriendSelect)){
		if($profileUserID=$deleteFriendArray['friendID']){
			$deleteFriendQuery=$removeFriend->query("DELETE FROM friends WHERE friendID=$profileUserID AND userID=$userID");
			}
		elseif($profileUserID=$deleteFriendArray['userID']){
			$deleteFriendQuery=$removeFriend->query("DELETE FROM friends WHERE userID=$profileUserID AND friendID=$userID");
			}
		}
	
	if($deleteFriendQuery){
		echo "<h2 align='center'> The user has been removed from your friends. <br /> Redirecting Now!</h2>
			<meta http-equiv='refresh' content='2; url=home.php' />";
		}
		
		include 'includes/footer.inc';
		
		?>