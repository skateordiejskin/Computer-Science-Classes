<?php
session_start();
$userID=$_SESSION['userID'];
require_once '../databaseLogin.php';
include 'functions.inc';

$homeWhiteboard = new DBconnector();
$boardQuery = $homeWhiteboard->query("SELECT post, type, sender, recipient, date FROM theBoard ORDER BY date DESC");

//Home WhiteBoard
while($boardFetch=$homeWhiteboard->fetchArray($boardQuery)){
	$friendsQuery= $homeWhiteboard->query("SELECT fID, userID, friendID FROM friends WHERE userID=$userID OR friendID=$userID");
	switch($boardFetch['type']){
	case "post":
		//If user updated status
		switch($userID){
		case (($userID==$boardFetch['sender']) && ($userID==$boardFetch['recipient'])):
			echo userNameLink($userID)." wrote: <br /> ".str_replace("\'","'",str_replace("\'","'",$boardFetch['post']))."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr />";
			break;

			//If the user either posted on someone's board or someone posted on theirs
		case (($userID==$boardFetch['sender'])||($userID==$boardFetch['recipient'])):
			echo userNameLink($boardFetch['sender'])." to ".userNameLink($boardFetch['recipient'])."<br />".str_replace("\'","'",str_replace("\'","'",$boardFetch['post'])).
				"<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
						</div>
						<div id=''></div>
						<hr />";
			break;
		}
		break;

	case "friend":
		switch($userID){
			//If the user sent the friend request
		case (($userID==$boardFetch['sender']) && ($userID!=$boardFetch['recipient'])):
			echo userNameLink($boardFetch['sender'])." is now friends with ".userNameLink($boardFetch['recipient'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
			break;
			//If the user received the friend request
		case (($userID!=$boardFetch['sender']) && ($userID==$boardFetch['recipient'])):
			echo userNameLink($boardFetch['sender'])." is now friends with ".userNameLink($boardFetch['recipient'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
			break;
		}
		break;

	case "picture":
		switch ($userID){
			//If the user posted a picture
		case ($userID==$boardFetch['sender']):
			$senderIDName=userName($boardFetch['sender']);

			echo $senderIDName." has ".str_replace("\'","'",$boardFetch['post']).".
						 <div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr />";
			break;
		}
		break;
	default:
		echo "There is nothing to display<br />";
	}


	while($friendArray=$homeWhiteboard->fetchArray($friendsQuery)){
		if($userID==$friendArray['userID']){
			$friendID=$friendArray['friendID'];

			switch($boardFetch['type']){
			case "post":
				switch($friendID){
				case (($friendID==$boardFetch['sender']) && ($friendID==$boardFetch['recipient']) && ($userID!=$boardfetch['recipient'])):
					echo userNameLink($boardFetch['sender'])." wrote:
								 <br />".str_replace("\'","'",$boardFetch['post'])."
								 <div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
								 <div id=''></div>
								 <hr /></div>";
					break;

				case (($friendID==$boardFetch['sender']) && (($userID!=$boardFetch['sender']) && ($userID!=$boardFetch['recipient'])) && ($boardFetch['sender']!=$boardFetch['recipient'])):
					$senderIDName=userName($boardFetch['sender']);
					$revieverIDName=userName($boardFetch['recipient']);
					echo userNameLink($boardFetch['sender'])." to ".userNameLink($boardFetch['recipient'])."<br />".str_replace("\'","'",$boardFetch['post'])."
								 <div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
								 <div id=''></div>
								 </div><hr />";
					break;

					break;
				}
			case "friend":
				switch($friendID){
				case (($friendID==$boardFetch['sender'])&&(($userID!=$boardFetch['recipient']) && ($userID!=$boardFetch['sender'])) && ($userID!=$boardFetch['recipient'])):
					echo userNameLink($boardFetch['sender'])." is now friends with ".userNameLink($boardFetch['recipient'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
					break;
				}
				break;

			case "picture":
				switch ($friendID){
				case (($friendID==$boardFetch['sender']) && ($userID!=$boardFetch['sender'])):
					$senderIDName=userName($boardFetch['sender']);
					echo $senderIDName. " has " .str_replace("\'","'",$boardFetch['post']).".
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
					break;
				}
				break;
			}
		}
		elseif($userID==$friendArray['friendID']){
			$friendID=$friendArray['userID'];
			switch($boardFetch['type']){
			case "post":
				switch($friendID){
				case (($friendID==$boardFetch['sender']) && ($friendID==$boardFetch['recipient']) && ($userID!=$boardFetch['recipient'])):
					echo userNameLink($boardFetch['sender'])." wrote: <br />".str_replace("\'","'",$boardFetch['post'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
							<div id=''></div>
							<hr /></div>";
					break;

				case (($friendID==$boardFetch['sender']) && (($userID!=$boardFetch['sender']) && ($userID!=$boardFetch['recipient'])) && ($boardFetch['sender']!=$boardFetch['recipient'])):
					echo userNameLink($boardFetch['sender'])." to".userNameLink($boardFetch['recipient'])."<br />".str_replace("\'","'",$boardFetch['post'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr />";
					break;
				case (($friendID==$boardFetch['recipient']) && (($userID!=$boardFetch['sender']) && ($userID!=$boardFetch['recipient'])) && ($boardFetch['sender']!=$boardFetch['recipient'])):
					echo userNameLink($boardFetch['sender'])." to".userNameLink($boardFetch['recipient'])."<br />".str_replace("\'","'",$boardFetch['post'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
							<div id=''></div>
							</div><hr />";
					break;
				}

				break;

			case "friend":
				switch($friendID){
				case (($friendID==$boardFetch['sender'])&&(($userID!=$boardFetch['recipient']) && ($userID!=$boardFetch['sender']))):
					echo userNameLink($boardFetch['sender'])." is now friends with ".userNameLink($boardFetch['recipient'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
					break;
				case (($friendID==$boardFetch['recipient'])&&(($userID!=$boardFetch['recipient']) && ($userID!=$boardFetch['sender']))):
					echo userNameLink($boardFetch['recipient'])." is now friends with ".userNameLink($boardFetch['sender'])."
							<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."
							<div id=''></div>
							<hr /></div>";
					break;

				}
				break;

			case "picture":
				switch ($friendID){
				case ($friendID==$boardFetch['sender'] && $userID!=$boardFetch['sender']):
					$senderIDName=userName($boardFetch['sender']);
					echo $senderIDName. " has " .str_replace("\'","'",$boardFetch['post']).".
						<div class='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."<hr /></div>";
					break;
				}
				break;
			}
		}
	}

}
?>
