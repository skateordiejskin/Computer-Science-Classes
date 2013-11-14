<?php
	include 'includes/header.inc';
?>
	<div class='text span-24 last' id='whiteboard'>
		<h4>A few more question and you'll be on your way</h4>
		<h4>Would you like to join a network now? This makes it easier for us to match you up with your friends!</h4>
				<form action='networkSelect.php' method='post'>	
					<select name='network' id='network'>
					<option>Choose Your Network</option>
					<?php include 'includes/functions.inc'; networkDisplay(); ?>
					 <input type='submit' value='Network Select'/>
				</form>
			
		<h4>If you can't find your network, submit it to us and we'll add it shortly!</h4>
		<form action= 'networkRequest.php' method='post'>
			<input type='text' name='network' id='network' size=50 />
			<input type='submit' value='Request Network' />
		</form>
		
<br />
		<div class='form' align='right'>
		<form action='moreInfo.php' method='post'>
			<input type='submit' value='Skip' />
		</form>
		</div>
		</div>
<?php 	include "includes/footer.inc"; ?>