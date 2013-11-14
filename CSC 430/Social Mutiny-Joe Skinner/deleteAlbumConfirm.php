<?php
include 'includes/header.inc';
$albumID=mysql_real_escape_string($_GET['albumID'];


echo "<div class='span-19 last text' id='whiteboard'>
		<form action='deleteAlbum.php' method='post'>
			<h3 align='center'> Are you sure you want to delete your album?
			<br />
			<input type='submit' name='yes' value='Yes' />
			<input type='submit' name='no' value='No' />
			<input type='hidden' value=".$albumID." name='albumID'
			</h3>
		</form>
	</div>
</div>";

include 'includes/footer.inc';

?>