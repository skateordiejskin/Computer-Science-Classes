<div id="whiteboard" class="section box">
	<br /><br />
<?php	
	$userID=$_SESSION['userID'];
	$userProfile = new DBconnector();
	require_once 'databaseLogin.php';
	$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));
	$_SESSION['profileUserID']=$profileUserID;
	
	if(($profileUserID==$userID)||(checkFriend($userID,$_SESSION['profileUserID'])==1)){
	echo "<h2 align='center'>".userName($_SESSION['profileUserID'])."'s Whiteboard</h2>";
	$photoGallery= new DBconnector();
	$photoGalleryQuery=$photoGallery->query("SELECT * from pictures WHERE userID=$profileUserID LIMIT 6");
	$photoGalleryArray=$photoGallery->fetchArray($photoGalleryQuery);
	if(($photoGallerArray['name']=="Users/male.jpg")||($photoGallerArray['name']=="Users/female.jpg")){}
	
	else{
	echo "<div class='gallery'>";
	while($photoGalleryArray=$photoGallery->fetchArray($photoGalleryQuery)){			
		echo "<div class='crop'><a href='#photos'><img src='".$photoGalleryArray['thumbnailName']."' alt='' /></a></div>";
		}
		echo "</div>";
		}

	
?>
	<div align='center'>Write something:<br />
	    <form method='post' id='whiteboardPost' autocomplete='off' action="">
<?php echo "			<input type='hidden' name='userID' id='userID' value='".$userID."' />
			<input type='hidden' name='profileUserID' id='profileUserID' value='".$profileUserID."' />"; 
?>
			
			<input type='hidden' name='home' class='home' value='0' />
			<input type='text' name='post' id='post' size='55' class="post" placeholder='Write Something...' />
		</form>
			<div class="dateText">Press enter to send.</div>
		</div>
		<br />
		<div id="profileResponseContainer" class="whiteboard"></div>
<?php
}
elseif(($profileUserID=!$userID)||(checkFriend($userID,$_SESSION['profileUserID'])==0)){
	echo "
		<br /><br /><br />
		<h4 align='center'>
		".userName($_SESSION['profileUserID'])." only shares information with their friends.
		</h4>";
				}


?>
	</div>
