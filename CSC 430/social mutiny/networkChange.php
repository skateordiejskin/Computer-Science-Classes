<?php 
	include 'includes/header.inc';
	include 'includes/sidebarHome.inc';
	?>

	<div class='span-19 last text' id='whiteboard'>
		
		<h4>Change Your Network</h4>
				<form action='networkUpdate.php' method='post'>	
					<select name='network' id='network'>
					<option>Choose Your Network</option>
					<?php  networkDisplay(); ?>
					 <input type='submit' value='Network Select'/>
				</form>
		</div>
<?php include 'includes/footer.inc';?>