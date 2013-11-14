<?php
include 'includes/header.inc';
include 'includes/functions.inc';

$userID=$_SESSION['userID'];

require_once 'databaseLogin.php';
$friends = new DBconnector();
$count=0;
$friendsQuery = $friends->query("SELECT * FROM friends where userID=$userID OR friendID=$userID");
echo "<div id=\"Friends(".friendCheckNum($userID).")\" value=\"Friends(".friendCheckNum($userID).")\">";
echo "<div id='whiteboard' class='span-23 prepend-1 last text'>";
if($friendsQuery==NULL){
	echo "You don't have any friends yet. Get out there and make some new ones!</div></div>";
}
elseif($friendsQuery!=NULL){
	while($friendsRow = $friends->fetchArray($friendsQuery)){
		if($userID==$friendsRow['userID']){
			$friendID=$friendsRow['friendID'];
			$friendQuery=$friends->query("SELECT * FROM users WHERE userID=$friendID");
		}
		elseif($userID==$friendsRow['friendID']){
			$friendID=$friendsRow['userID'];
			$friendQuery=$friends->query("SELECT * FROM users WHERE userID=$friendID");
		}


		$friendPictureQuery=$friends->query("SELECT * FROM pictures where userID=$friendID AND profilePicture=1");
		$friendPictureRow = $friends->fetchArray($friendPictureQuery);


		while($friendRow = $friends->fetchArray($friendQuery)){
			$count++;
			echo "<h4><a href='profile.php?id=".base64_encode($friendID)."' id=\"FriendList".$count."\"><img src='".$friendPictureRow['name']."' alt='' class='friend' id=\"Image".$count."\" /> <div id=\"FrienName".$count."\">".userName($friendID)."</div></a><hr /></h4>";

		}
	}
}
echo "</div></div>";
include 'includes/footer.inc';
?>
