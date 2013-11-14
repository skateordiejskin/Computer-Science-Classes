<?php
require_once("databaseLogin.php");
require_once 'includes/header.inc';


$userID=$_SESSION['userID'];

$tvChange = new DBconnector();

$tvFetch=$tvChange->fetchArray($tvChange->query("SELECT tv FROM users WHERE userID=$userID"));
?>
<div id='whiteboard' class='span-23 prepend-1 last text' align='center'>
				<form action='tvUpdate.php' method='post'>
					<h5>Favorite TV Shows:</h5>
					<textarea name='tv' cols='40' rows='6'><?php echo $tvFetch['tv']; ?></textarea>
					<br /><input type='submit' value='Update' />
				</form></h4>
			</div>

<?php require_once 'includes/footer.inc'; ?>
	