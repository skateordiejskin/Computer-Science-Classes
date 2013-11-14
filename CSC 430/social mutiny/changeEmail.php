<?php
	include 'includes/header.inc';
?>

<div id='whiteboard' class='span-23 prepend-1 last text' align='center'>
		<h4>
		<form action='emailChangeConfirm.php' method='post'><br />
			New Email:<br />
			<input type='text' name='newEmail' id='newEmail' /><br /><br />
			Email Confirm:<br />
			<input type='text' name='emailConfirm' id='emailConfirm' /><br /><br />
			<input type='submit' value='Change email' />
		</form>
		</h4>
	</div>
</div>
		
	<?php include('includes/footer.inc');?>