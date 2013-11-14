<?php
require_once 'includes/header.inc';
?>
<div class='span-19 last text' id='whiteboard'>
			<h2>Sorry, wrong username or password. Please try again</h2>
			<form action="userLogin.php" method="post">
				Email:
				<input type="text" name="email" id="email" /><br />
				Password:
				<input type="password" name="password" id="password" /><br />
				<input type="submit" value="submit" />
			</form>
		</div>

<?php
require_once 'includes/footer.inc';
?>