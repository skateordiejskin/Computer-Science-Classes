<?php
include 'includes/header.inc';
include 'includes/sidebarProfile.inc';
require_once("databaseLogin.php");
$photoView=new DBconnector();

$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));
$pictureID=mysql_real_escape_string(base64_decode($_GET['pictureID']));
$userID=mysql_real_escape_string($_SESSION['userID']);

$pictureQuery=$photoView->query("SELECT * FROM pictures WHERE pictureID=$pictureID");
$pictureFetch=$photoView->fetchArray($pictureQuery);

$pictureNextQuery=$photoView->query("SELECT * FROM pictures WHERE userID=$profileUserID");
$pictureNextNumRow=$photoView->numRows($pictureNextQuery);


echo "<div class='span-19 last text' id='whiteboard'>";
if($userID==$profileUserID){
	echo "<form action='setProfilePic.php' method='post'>
		<input type='hidden' name='pictureID' id='pictureID' value='".$pictureID."' />
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />
		<input type='submit' value='Make Profile Picture' /></form>";

		
	if($pictureFetch['Title']==NULL)
		echo "<a href='addPhotoTitle.php?pictureID=".$pictureID."'>Add a Title to This Photo</a>";

	else
		echo "<h4 align='center'>".$pictureFetch['Title']."</h4>";

}

echo "	<h3 align='center'><img src='".$pictureFetch['name']."' class='photoView'/></h3>
		<div align='center'><p> <form action='picComment.php' method='post'>
		<input type='hidden' name='pictureID' id='pictureID' value='".$pictureID."' />
		<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />
		<input type='hidden' name='userID' id='userID' value='".$userID."' />
		<input type='text' name='post' id='post' size='100' />
		<input type='submit' name='send' value='Send' /></form></p></div>";

$commentQuery=$photoView->query("SELECT * FROM pictureComments WHERE pictureID=$pictureID ORDER BY date DESC");

if($photoView->numRows($commentQuery)>0){
	while($commentFetch=$photoView->fetchArray($commentQuery)){

		echo userNameLink($commentFetch['postingUserID'])." wrote:
			".$commentFetch['post']."
			<br /><br /><div id='dateText'>".date("g:i a F j, Y" ,strtotime(date("g:i a F j, Y" ,strtotime($commentFetch['date']))))."<hr /></div></div>";
	}
}

else
	echo "<div class='text'>No Comments</div></div>";

include 'includes/footer.inc';
?>