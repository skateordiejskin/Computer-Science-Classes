<?php
	include 'includes/header.inc';
?>
	<div class='span-19 last text' id='whiteboard'><h4>
		<form action='passwordChangeConfirm.php' method='post'><br />
	Current Password:<br />
	<input type='password' name='currPass' id='currPass' /><br /><br />
	New Password:<br />
	<input type='password' name='newPass' id='newPass' /><br /><br />
	Password Confirm:<br />
	<input type='password' name='passConfirm' id='passConfirm' />
	<br /><br />
	<input type='submit' value='Change Password' />
	</div></div>
	</form>
	</h4>
	
	<?php
	include('includes/footer.inc');
	?>