<?php
require_once 'databaseLogin.php';
$userID=$_SESSION['userID'];


$userProfile = new DBconnector();


$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));

$boardQuery=$userProfile->query("SELECT post, type, sender, recipient, date FROM theBoard WHERE sender=$profileUserID OR recipient=$profileUserID ORDER BY date DESC");
$userQuery=$userProfile->query("SELECT userID, firstName, lastName FROM users WHERE userID=$profileUserID");
$userFetch=$userProfile->fetchArray($userQuery);
$profileName=$userFetch['firstName']." ".$userFetch['lastName'];

if(($profileUserID==$userID)||(checkFriend($userID,$profileUserID)==1)){
echo "
	<h5 align='center'>Write something:<br />
	     <form action='whiteboardPost.php' method='post' id='whiteboardPost' autocomplete='off'>
		<input type='hidden' name='userID' id='userID' value='".$userID."' />
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />
		<input type='text' name='post' id='post' size='55' class=\"post\" placeholder='Write Something...' />
		<input type='submit' value='Send' /><br /><br /><br /></h5>
		</form>";
echo "<div id=\"responseContainer\" class=\"whiteboard\">";

while($boardFetch=$userProfile->fetchArray($boardQuery)){

	if($boardFetch['type']=='friend'){

		if($profileUserID!=$boardFetch['recipient']){
			$recipientQuery=$userProfile->query("SELECT firstName, lastName FROM users WHERE userID=".$boardFetch['recipient']);
			$recipientFetch=$userProfile->fetchArray($recipientQuery);
			$recipientName=$recipientFetch['firstName']." ".$recipientFetch['lastName'];

			echo "<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
						".$profileName."</a> is now friends with 
						<a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>".userName($boardFetch['recipient']).".</a>
						<div id='dateText'>".date("g:i a F j, Y" ,strtotime(date("g:i a F j, Y" ,strtotime($boardFetch['date']))))."</div><hr  />";
		}
		elseif($profileUserID!=$boardFetch['sender']){
			echo "<a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>
						".$profileName."</a> is now friends with 
						<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>".userName($boardFetch['sender']).".</a>
						<div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";

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
					<div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
			}

			if($boardFetch['recipient']!=$profileUserID){
				$queryPost1=$userProfile->query("SELECT * FROM users WHERE userID=".$boardFetch['recipient']);
				$fetchPost1=$userProfile->fetchArray($queryPost1);
				$otherName1=$fetchPost1['firstName']." ".$fetchPost1['lastName'];

				echo "
					<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
					 ".$profileName."</a> wrote on <a href='profile.php?id=".base64_encode($boardFetch['recipient'])."'>".userName($boardFetch['recipient'])."'s </a>
					board: <br />".str_replace("\'","'",$boardFetch['post'])."
					<div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
			}
		}

		if($boardFetch['recipient']==$boardFetch['sender']){
			echo "
				<a href='profile.php?id=".base64_encode($boardFetch['sender'])."'>
				".$profileName."</a> wrote:<br />
				".str_replace("\'","'",$boardFetch['post'])."
				<div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
		}
	}

	if($boardFetch['type']=='picture'){
		echo "
			".$profileName. " has " .str_replace("\'","'",$boardFetch['post']).".
			<div id='dateText'>".date("g:i a F j, Y" ,strtotime($boardFetch['date']))."</div><hr  />";
	}
}
echo "</div>";
}
elseif(($profileUserID=!$userID)||(checkFriend($userID,$profileUserID)==0)){
			echo"<br /><br /><br /><h4 align='center'>".$profileName." only shares information with their friends.";

}

?>
<br />
<hr />