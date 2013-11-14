<?php
require_once("databaseLogin.php");
require_once 'includes/header.inc';


$userID=$_SESSION['userID'];

$booksChange = new DBconnector();

$booksFetch=$booksChange->fetchArray($booksChange->query("SELECT books FROM users WHERE userID=$userID"));
?>
<div id='whiteboard' class='span-23 prepend-1 last text' align='center'>
				<form action='booksUpdate.php' method='post'>
					<h5>Favorite Books:</h5>
					<textarea name='books' cols='40' rows='6'><?php echo $booksFetch['books']; ?></textarea>
					<br /><input type='submit' value='Update' />
				</form></h4>
			</div>

<?php require_once 'includes/footer.inc'; ?>