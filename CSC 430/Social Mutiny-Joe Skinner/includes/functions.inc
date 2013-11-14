<?php


function userNameTitleLink($userID,$headerOpen,$headerClose){
	$userTableFetch=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userID=$userID"));
	return $headerOpen."<a href='profile.php?id=".base64_encode($userID)."'>" .$userTableFetch['firstName']." ".$userTableFetch['lastName']."</a>".$headerClose;
}

function userName($userID){
	$senderIDFetch=mysql_fetch_array(mysql_query("SELECT firstName, lastName FROM users where userID=$userID"));
	return $senderIDName=$senderIDFetch['firstName']." ".$senderIDFetch['lastName'];
}
function userNameLink($userID){
	$userTableFetch=mysql_fetch_array(mysql_query("SELECT userID, firstName, lastName FROM users WHERE userID=$userID"));
	return "<a href='profile.php?id=".base64_encode($userID)."'>".$userTableFetch['firstName']." ".$userTableFetch['lastName']."</a>";
}
function friendCheckNum($userID){
	return mysql_num_rows(mysql_query("SELECT * FROM friends WHERE userID=$userID OR friendID=$userID"));
}

function pictureQuery($userID){
	return mysql_fetch_array(mysql_query("SELECT * FROM pictures WHERE userID=$userID"));
}

function picturesNum($userID){
	return mysql_num_rows(mysql_query("SELECT * FROM pictures WHERE userID=$userID"));
}

function requests($userID){
	if(!(mysql_query("SELECT * FROM pendingRequests where requestedUser=$userID"))){
		return 0;
	}
	else{
		return mysql_num_rows(mysql_query("SELECT * FROM pendingRequests where requestedUser=$userID"));
	}
}

function friends($userID){
	return mysql_query("SELECT * FROM friends WHERE userID=$userID OR friendID=$userID");
}

function checkFriend($userID,$profileUserID){
	return mysql_num_rows(mysql_query("SELECT userID, friendID FROM friends WHERE (userID=$userID OR friendID=$userID) AND (userID=$profileUserID OR friendID=$profileUserID)"));
}

function messagesCheckNum($userID){
	if((mysql_query("SELECT unread FROM messages WHERE recipientID=$userID AND unread=1"))){
		return mysql_num_rows(mysql_query("SELECT unread FROM messages WHERE recipientID=$userID AND unread=1"));
	}
	else{
		return 0;
	}
}

function networkDisplay(){
	$networkQuery=mysql_query("SELECT networkName, networkID from networks ORDER BY networkName");
	while($networkFetch=mysql_fetch_array($networkQuery)){
		echo "<option>".$networkFetch['networkName']."</option>";
	}
}

function pictureCommentHome($userID, $pictureID){

	$commentQuery=mysql_query("SELECT * FROM pictureComments WHERE pictureID=$pictureID ORDER BY date DESC");
	if(mysql_num_rows($commentQuery)>0){
		while($commentFetch=mysql_fetch_array(($commentQuery))){
		echo "<div class='commentText'>";
		echo userName($commentFetch['postingUserID'])." wrote:
			".str_replace("\'","'",$commentFetch['post'])."
			<br /><br /><div class='dateText'>".date("g:i a F j, Y" ,strtotime(date("g:i a F j, Y" ,strtotime($commentFetch['date']))))."<hr /></div></div>";
	

			}
			}
			echo "
		<form action='' method='post' class='pictureComment'>
		<input type='hidden' name='pictureID' id='pictureID' value='".$pictureID."' />
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$userID."' />
		<input type='hidden' name='userID' id='userID' value='".$userID."' />
		<input type='text' name='post' id='post' size='50' />
		<input type='submit' name='send' value='Send' /></form>";
		}

function pictureCommentProfile($userID,$profileUserID, $pictureID){

	$commentQuery=mysql_query("SELECT * FROM pictureComments WHERE pictureID=$pictureID ORDER BY date DESC");
	if(mysql_num_rows($commentQuery)>0){
		while($commentFetch=mysql_fetch_array(($commentQuery))){
		echo "<div class='commentText'>";
		echo userName($commentFetch['postingUserID'])." wrote:
			".str_replace("\'","'",$commentFetch['post'])."
			<br /><br /><div class='dateText'>".date("g:i a F j, Y" ,strtotime(date("g:i a F j, Y" ,strtotime($commentFetch['date']))))."<hr /></div></div>";
	

			}
			}
			echo "
		<form action='picComment.php' method='post'>
		<input type='hidden' name='pictureID' id='pictureID' value='".$pictureID."' />
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />
		<input type='hidden' name='userID' id='userID' value='".$userID."' />
		<input type='text' name='post' id='post' size='50' />
		<input type='submit' name='send' value='Send' /></form>";
		}

function sendMessage($userID, $profileUserID){
	
	echo "<h4 style='color:white;'>Message to ".userName($profileUserID)."
	</h4><form action='sendMessage.php' method='post'>
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />
		<textarea name='message' id='message' rows='10' cols='50'> </textarea>
		<input type='submit' name='send' value='Send' onclick=\"closeWindow()\" /></form>";
		}
 
?>