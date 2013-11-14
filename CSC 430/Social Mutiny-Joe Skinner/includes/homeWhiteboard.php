<div id='whiteboard' class='section box'>
	<h2 align='center'>The Board</h2>
<?php
require_once 'databaseLogin.php';
$homeWhiteboard = new DBconnector();
$userID=$_SESSION['userID'];

$homeWhiteboard->query("UPDATE users SET isOnline=1 WHERE userID=$userID");

$photoGallery= new DBconnector();
$photoGalleryQuery=$photoGallery->query("SELECT * from pictures WHERE userID=$userID LIMIT 6");
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
		<br /> <br /><br />
	 	<div align='center'>
     	<form method='post' id='whiteboardPost' autocomplete='off' action="">
		<?php echo "<input type='hidden' name='userID' id='userID' value='".$userID."' />
			<input type='hidden' name='profileUserID' id='profileUserID' value='".$userID."' />"; ?>
		<input type='hidden' name='home' class='home' value='1' />
		<input type='text' name='post' id='post' size='55' class="post" placeholder='Write Something...' />
		</form>
		
		<div class="dateText">Press enter to send.</div>
		</div>
		<br />

<div id="responseContainer" class="whiteboard">Loading Posts...</div>
</div>
