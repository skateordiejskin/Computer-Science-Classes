<?php

include 'includes/header.inc';
require_once("databaseLogin.php");
$search = new DBconnector();

$searchTerm=htmlentities(mysql_real_escape_string($_POST['search']));
$name=(explode(' ',$searchTerm));

if(empty($searchTerm)){
	echo "<div class='span-23 prepend-1 last text' id='whiteboard'>
		<br /><h3 align='center'>There are no people that match your search </h3>";
}

else{
	if($name[1]==NULL)
		$searchSQL=$search->query("SELECT * FROM users WHERE firstName LIKE '%" .$name[0]. "%' OR lastName LIKE '%" .$name[0]."%'");

	elseif ($name[1]!=NULL)
		$searchSQL=$search->query("SELECT * FROM users WHERE firstName LIKE '%" .$name[0]. "%' AND lastName LIKE '%" .$name[1]."%'");


	echo "<div class='span-23 prepend-1 last text' id='whiteboard'>";
	while ($searchArray = $search->fetchArray($searchSQL)) {
		$userIDSearch=$searchArray['userID'];

		$searchPictureSQL=$search->query("SELECT * FROM pictures WHERE userID=$userIDSearch AND profilePicture=1");
		$resultProfilePic=$search->numRows($searchPictureSQL);


		while($profilePicGet=$search->fetchArray($searchPictureSQL)){
			$profilePic=$profilePicGet['profilePicture'];
			if($profilePic==1){
				$profilePicName=$profilePicGet['name'];
			}
		}


		echo "<a href='profile.php?id=".$userIDSearch."'>
			<img src='".$profilePicName."' alt='' height=100/> ".$searchArray['firstName']." ".$searchArray['lastName']."</a><hr />";
	}
	$rowCount = $search->numRows($searchSQL);

	if($rowCount==0){
		echo "<br /><h3 align='center'>There are no people that match your search </h3>";
	}
}
echo "</div>";
include 'includes/footer.inc';


?>
	