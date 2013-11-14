<?php
	include 'includes/header.inc';
	?>
	
	<form method="post" action="send_form.php">
		<h4 align='center'>
		<br /> <br />
			Subject:<br />
			<input type="text" size="30" name="subject" id="subject"/><br /><br />

			
			How Can We Help You?:<br />
			<textarea rows="5" maxlength="1000" cols="26" rows="6" name="comment" id="comment"></textarea>
			<p><input type="submit" value="Submit" />
			<input type="submit" value="Clear" />

			</form>
			</h4>