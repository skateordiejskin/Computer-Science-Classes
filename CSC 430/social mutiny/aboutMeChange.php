<?php
	require_once 'databaseLogin.php';
	require_once "includes/header.inc";

	
	$userID = $_SESSION['userID'];
	$aboutMe  =  new DBconnector();	
	 $aboutFetch=$aboutMe->fetchArray($aboutMe->query("SELECT about FROM users WHERE userID = $userID"));
	
?>
<div id='whiteboard' class='span-23 prepend-1 last text' align='center'><h5>
				About Me:</h5>
		  		<form action = 'aboutMeUpdate.php' method = 'post'>
		  		<textarea name = 'about' cols = '40' rows = '6'><?php echo $aboutFetch['about'] ?></textarea>
				<br /><input type = 'submit' value = 'Update' />
				</form>
			</div>
<?php require_once "includes/footer.inc"; ?>