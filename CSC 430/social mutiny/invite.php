<?php
	include 'includes/header.inc';
	$userID=$_SESSION['userID'];
?>

<html>
	<head>
		<title>Send an Invitation</title>
	</head>
	<body>
	<p>
	<br />
	<br />
	<h4 align=center>
	<form action="inviteSend.php" method="post">
		Emails: (If sending to multiple email addresses, separate with commas)
		<br />
		<input type='text' name='recipients' id='recipients' size=100 />
		<br />
		<input type=submit value='Submit' />
		</form>
		</h4>
	</body>
</head>