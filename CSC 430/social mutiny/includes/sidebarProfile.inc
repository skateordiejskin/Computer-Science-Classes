<?php
include 'functions.inc';
include 'cgi-bin/friendCheck.js';
require_once("databaseLogin.php");
$date = date("y-m-d, G:i:s");

$connector=new DBconnector();

$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));
$userID=$_SESSION['userID'];

$userInfo=$connector->fetchArray($connector->query("SELECT * FROM users WHERE userID='$profileUserID'"));

$pictureQuery=$connector->query("SELECT * FROM pictures WHERE userID=$profileUserID");
$profilePicCheck = $connector->numRows($pictureQuery);

while($profilePicGet=$connector->fetchArray($pictureQuery)){
	$profilePic=$profilePicGet['profilePicture'];
	if($profilePic==1)
		$profilePicName=$profilePicGet['thumbnailName'];
}

echo "<div class='span-3 append-1' id='sidebar'><br />".userNameTitleLink($profileUserID,"<h3 align='left'>","</h3>")."
				<a href='pictures.php?id=".$profileUserID."'><img src='".$profilePicName."' alt='user posted image' class='profile'/></a><br />";



if(($profileUserID==$userID)||(checkFriend($userID,$profileUserID)==1)){
	echo "<br />";
}
else{
	echo "<br /><br />
				<a href='friendRequest.php?id=".$profileUserID."'>Request Friend</a>
				<hr />
				<a href='profile.php?id=".$profileUserID."'>Profile</a>
				<hr />";
}

echo "				<a href='messages.php?pid=".$profileUserID."'>Send Message</a>
					<hr />
					<a href='info.php?id=".$profileUserID."'>Info</a><hr />
					<a href='pictures.php?id=".base64_encode($profileUserID)."'>Pictures(".picturesNum($profileUserID).")</a><hr />
					<a href='friendsFriends.php?id=".$profileUserID."'>Friends(".friendCheckNum($profileUserID).")</a><hr />";

if(($profileUserID!=$userID)&&(friendCheckNum($profileUserID)==1)){
	echo "<a href='removeFriend.php?id=".$profileUserID."'>Remove From Friends</a>
					<hr />";
}

echo "</div>";

?>
	