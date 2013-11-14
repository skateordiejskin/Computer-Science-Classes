<?php
	require_once('databaseLogin.php');
	include 'includes/header.inc';
	$userID=$_SESSION['userID'];
	
	$connector = new DBconnector();
	$userInfoFetch=$connector->fetchArray($connector->query("SELECT * FROM users WHERE userID=$userID"));
	?>
<div id='whiteboard' class='span-23 prepend-1 last text'><h4 align='left'>
	Name:
	<div align='right'> 
		<?php echo $userInfoFetch['firstName']." ".$userInfoFetch['lastName'];?>
	</div><hr />
	Email: 
	<div align='right'>
		<?php echo $userInfoFetch['email'];?>
		<hr /><br /><a href='changeEmail.php'>
		Change Email</a></div><br />
		Password: <div align='right'><a href='passwordChange.php'>Change Password</a></div><hr />
		About me: <div align='right'><a href='aboutMeChange.php'>Change About Me</a></div><hr />
		Books: <div align='right'><a href='booksChange.php'>Change Books</a></div><hr />
		Movies: <div align='right'><a href='moviesChange.php'>Change Movies</a></div><hr />
		Music: <div align='right'><a href='musicChange.php'>Change Music</a></div><hr />
		TV: <div align='right'><a href='tvChange.php'>Change TV</a></div><hr />
		Networks: <div align='right'><a href='networkChange.php'>Change Network</a></div><hr />
		</div>
<?php include 'includes/footer.inc'; ?>