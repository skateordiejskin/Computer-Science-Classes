<?php
	include 'includes/header.inc';
?>
	<div class='text span-24 last' id='whiteboard'>
		<h4>Tell us a little about yourself: (Max 1000 Characters)<br /><br />
		<form action='infoInsert.php' method='post'>
				<textarea name='about' id='about' cols='40' rows='6'></textarea><br /><br />
			What are some of your favorite movies? (Max 1000 Characters)<br /><br />
				<textarea name='movies' id='about' cols='40' rows='6'></textarea><br /><br />
			What are some of your favorite TV Shows? (Max 1000 Characters)<br /><br />
				<textarea name='tv' id='about' cols='40' rows='6'></textarea><br /><br />
			What are some of your favorite bands/groups/singers? (Max 1000 Characters)<br /><br />
				<textarea name='music' id='about' cols='40' rows='6'></textarea><br /><br />
			Finally, what are some of your favorite books? (Max 1000 Characters)<br /><br />
				<textarea name='books' id='about' cols='40' rows='6'></textarea><br /><br />
				<input type='submit' value='Send' />
			</form>
			<br />
		<div class='form' align='right'>
		<form action='home.php'.php' method='post'>
			<input type='submit' value='Skip' />
		</form>
		</div>
		</div>
			
			