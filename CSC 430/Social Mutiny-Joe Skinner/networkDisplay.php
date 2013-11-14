<?php
	include 'header.php';
	include 'sidebarHome.php';
	$networkID=mysql_real_escape_string($_GET['networkID']);
	
	$networkUserSelect="SELECT * FROM networkLink WHERE networkID=$networkID";
	$networkUserQuery=mysql_query($networkUserSelect);
	
	echo "<div class='box'><div class='text'>";

	while($networkUserFetch=mysql_fetch_array($networkUserQuery)){
		$userSelect="SELECT * FROM users WHERE userID=".$networkUserFetch['userID'];
		$userQuery=mysql_query($userSelect);
		$userFetch=mysql_fetch_array($userQuery);
		
		$userName=$userFetch['firstName']." ".$userFetch['lastName'];
		
		
		$userPictureSQL="SELECT * FROM pictures where userID=".$networkUserFetch['userID']." AND profilePicture=1";
		$userPictureQuery=mysql_query($userPictureSQL);
		$userPictureRow=mysql_fetch_array($userPictureQuery);

			$userPicture=$userPictureRow['name'];
			
			echo "<a href='profile.php?id=".$networkUserFetch['userID']."'>";
			echo "<img src='".$userPicture."' alt='' class='profile' /> ";
			echo $userName;
			echo "</a><hr />";
			
			}
	
?>