<?php
	include 'includes/header.inc';
	include 'includes/footer.inc';
?>
<div class='box'>
	<div class='text'>
		<form action='deleteAccount.php' method='post'>
			<h3 align='center'> Are you sure you want to delete your account?
			<br />
			<input type='submit' name='yes' id='yes' value='Yes' />
			<input type='submit' name='no' id='no' value='No' />
			</h3>
		</form>
	</div>
</div>
		
<?php
	include 'includes/footer.inc';
?>