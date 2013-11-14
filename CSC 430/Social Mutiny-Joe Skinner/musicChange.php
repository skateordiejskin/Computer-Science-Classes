<?php
require_once("databaseLogin.php");
require_once 'includes/header.inc';


$userID=$_SESSION['userID'];

$musicChange = new DBconnector();

$musicFetch=$musicChange->fetchArray($musicChange->query("SELECT music FROM users WHERE userID=$userID"));
?>
<div id='whiteboard' class='span-23 prepend-1 last text' align='center'>
				<form action='musicUpdate.php' method='post'>
					<h5>Favorite Music:</h5>
					<textarea name='music' cols='40' rows='6'><?php echo $musicFetch['music']; ?></textarea>
					<br /><input type='submit' value='Update' />
				</form></h4>
			</div>

<?php require_once 'includes/footer.inc'; ?>