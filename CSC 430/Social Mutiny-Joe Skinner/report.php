<?php
	session_start();
	require_once 'databaseLogin.php';
	include 'functions.inc';
	$userID=$_SESSION['userID'];
	
	$today=date("y-m-d");
	echo $today;
	$test = new DBconnector();
	
	$testQuery=$test->query("SELECT * FROM theBoard order by date DESC ");
	$testFriend= $test->query("SELECT userID, friendID FROM friends WHERE userID=$userID OR friendID=$userID");
	
	while($testArray=$test->fetchArray($testFriend)){
		if($userID==$testArray['userID']){
			$friendID=$testArray['friendID'];
			}
	 	
	 	elseif($userID==$testArray['friendID']){
	 		$checkDate=date("y-m-d, G:i:s", strtotime($postArray['date']));
	 		echo "<br />".$checkDate."</br >";
	 		$friendID=$testArray['userID'];
	 		while($postArray=$test->fetchArray($testQuery)){
	 		if(($friendID==$postArray['sender']) && ($friendID==$postArray['recipient'])){
				echo userNameLink($postArray['sender'])." posted:
					 <br />".$postArray['writing']."
					 <div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";	 		
	 		}
	 		}
	 		}
	}
 	?>

	