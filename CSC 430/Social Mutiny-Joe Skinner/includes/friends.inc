<div id='friends' class="section box photos">
<br /><br />
<h2 align='center'>Friends</h2>
<br />
<?php
$userID=$_SESSION['userID'];

require_once 'databaseLogin.php';
$friends = new DBconnector();
$count=0;
$friendsQuery = $friends->query("SELECT * FROM friends where userID=$userID OR friendID=$userID");
echo "<div id=\"Friends".friendCheckNum($userID)."\"></div>";
if($friendsQuery==NULL){
	echo "<h4>You don't have any friends yet. Get out there and make some new ones!</h4>";
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
			echo "
					<div class='individualAlbum'>
					<h4>
					<a href='profile.php?id=".base64_encode($friendID)."' id=\"FriendList".$count."\">".userName($friendID);
					if($friendRow['isOnline']==1){
						echo " <img src='images/online.gif' />";
						}
					echo "<img src='".$friendPictureRow['name']."' alt='' class='friend' id=\"Image".$count."\" /></a></h4>
					<div id=\"FriendName".$count."\"></div>
					</div>";

		}
	}
}
?>

<br /><br /><br /><br /><br /><br /><br />
<hr />
</div>
