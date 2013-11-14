<?php
session_start();
require_once 'databaseLogin.php';
include('includes/thumbnailCreateClass.inc');
$picUpload = new DBconnector();

$userID=mysql_real_escape_string($_SESSION['userID']);
$profilePicCheck=mysql_real_escape_string($_POST['profilePic']);
$date=date("y-m-d, G:i:s");

$initalPicDelete=$picUpload->query("SELECT * FROM pictures where userID=$userID");
$deleteRow=$picUpload->fetchArray($initalPicDelete);

if(($deleteRow['name']=='Users/male.jpg') ||($deleteRow['name']=='Users/female.jpg'))
	$picDelete=$picUpload->query("DELETE FROM pictures where userID=$userID and pictureID=1");


if(isset($profilePicCheck)){
	$profilePic=1;
	$profilePicChange=$picUpload->query("SELECT * FROM pictures where userID=$userID AND profilePicture=1");
	$rowCount=$picUpload->numRows($profilePicChange);


	if($rowCount>0)
		$anotherRowCount=$picUpload->query("UPDATE pictures set profilePicture=0 WHERE userID=$userID AND profilePicture=1");
}
else
	$profilePic=0;



$picNumCheck=$picUpload->query("SELECT * FROM pictures where userID=$userID");
$picNumCheckResult=$picUpload->numRows($picNumCheck);
$name="Users/user".$userID."/".$userID."_".$picNumCheckResult.".jpg";



if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 4000000)){

	$target=$name;

	if ($_FILES["file"]["error"] > 0){
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	}
	else{
		if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
			$pictureQuery=$picUpload->query("INSERT INTO pictures (userID, name, profilePicture, date) VALUES('$userID','$name','$profilePic','$date')");

			if($profilePic==1)
				$boardInsert=$picUpload->query("INSERT INTO theBoard (sender, recipient, post, type, date) VALUES ('$userID','$userID','changed their profile picture','picture', '$date')");
			else
				$boardInsert=$picUpload->query("INSERT INTO theBoard (sender, recipient, post, type, date) VALUES ('$userID','$userID','added new photos','picture', '$date')");
				$getPicID=$picUpload->query("SELECT pictureID FROM pictures WHERE name='$name'");
				$getPicFetch=$picUpload->fetchArray($getPicID);
				echo "<meta http-equiv='refresh' content='0; url=thumbnailCreate.php?pictureID=".$getPicFetch['pictureID']."' />";
		}
		else 
			echo "Sorry, there was a problem uploading your file.";
	}
}

?>