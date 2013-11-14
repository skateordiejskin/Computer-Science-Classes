<?php
require_once("databaseLogin.php");
require_once 'includes/header.inc';


$userID=$_SESSION['userID'];

$moviesChange = new DBconnector();

$moviesFetch=$moviesChange->fetchArray($moviesChange->query("SELECT movies FROM users WHERE userID=$userID"));
?>
<div id='whiteboard' class='span-23 prepend-1 last text' align='center'>
				<form action='moviesUpdate.php' method='post'>
					<h5>Favorite Movies:</h5>
					<textarea name='movies' cols='40' rows='6'><?php echo $moviesFetch['movies']; ?></textarea>
					<br /><input type='submit' value='Update' />
				</form></h4>
			</div>

<?php require_once 'includes/footer.inc'; ?>