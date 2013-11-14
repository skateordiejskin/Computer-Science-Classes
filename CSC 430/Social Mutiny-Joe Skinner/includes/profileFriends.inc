<div id='friends' class="box section">
<br /><br />
<h2 align='center'>Friends</h2>
<br />
<?php
$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));

require_once 'databaseLogin.php';
$friends = new DBconnector();
$count=0;
$friendsQuery = $friends->query("SELECT fID, userID, friendID FROM friends where userID=$profileUserID OR friendID=$profileUserID");
echo "<div id=\"Friends(".friendCheckNum($profileUserID).")\" value=\"Friends(".friendCheckNum($profileUserID).")\">
	<div class=\"photos\"'><h4>";
if($friendsQuery==NULL){
	echo userName($profileUserID)." has no friends! Everybody point and laugh!</div></div>";
}
elseif($friendsQuery!=NULL){
	while($friendsRow = $friends->fetchArray($friendsQuery)){
		if($profileUserID==$friendsRow['userID']){
			$friendID=$friendsRow['friendID'];
			$friendQuery=$friends->query("SELECT * FROM users WHERE userID=$friendID");
		}
		elseif($profileUserID==$friendsRow['friendID']){
			$friendID=$friendsRow['userID'];
			$friendQuery=$friends->query("SELECT * FROM users WHERE userID=$friendID");
		}


		$friendPictureQuery=$friends->query("SELECT * FROM pictures where userID=$friendID AND profilePicture=1");
		$friendPictureRow = $friends->fetchArray($friendPictureQuery);


		while($friendRow = $friends->fetchArray($friendQuery)){
			$count++;
			echo "<div class='individualAlbum'>
					<a href='profile.php?id=".base64_encode($friendID)."' id=\"FriendList".$count."\">".userName($friendID)."
					<img src='".$friendPictureRow['name']."' alt='' class='friend' id=\"Image".$count."\" /> 
					<div id=\"FriendName".$count."\"></div>
					</a>
					</div>";

		}
	}
}
?>
</h4>
</div>
</div>
</div>