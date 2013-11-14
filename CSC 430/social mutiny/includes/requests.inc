<div id='requests' class="sub section">
<br /><br />
<h2 align='center'>Requests</h2><br />
<?php
require_once("databaseLogin.php");

$requests = new DBconnector;
$userID=mysql_real_escape_string($_SESSION['userID']);

$requestQuery=$requests->query("SELECT * FROM pendingRequests where requestedUser=$userID");
$requestNumRows=$requests->numRows($requestQuery);

if($requestNumRows==0){
	echo "You have no pending requests!<hr />";
}

else{

	while($requestRow=$requests->fetchArray($requestQuery)){
		$requestingUserID = $requestRow['requestingUserID'];
		$requestingUserQuery =$requests->query("SELECT * FROM users WHERE userID='$requestingUserID'");

		$friendPictureQuery=$requests->query("SELECT * FROM pictures where userID=$requestingUserID AND profilePicture=1");
		$friendPictureRow=$requests->fetchArray($friendPictureQuery);

		$requestingUserRow = $requests->fetchArray($requestingUserQuery);
		$name = $requestingUserRow['firstName']." ".$requestingUserRow['lastName'];
		$friendPicture=$friendPictureRow['name'];

		echo "<a href='profile.php?id=".$requestingUser."'>
			<img src='".$friendPicture."' alt='' class='friend' />".$name."</a>
			<form action='requestConfirm.php' method='post'><input type='hidden' name='requestingUser' id='requestingUser' value='".$requestingUserID."' />
			<input type='submit' name='accept' id='accept' value='Accept' />
			<input type='submit' name='deny' id='deny' value='Deny' />
			</form>
			<hr size='1' />";
	}
}

?>
</div>