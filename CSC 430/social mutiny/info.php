<?php

	include 'includes/header.inc';
	include 'includes/sidebarProfile.inc';
	require_once("databaseLogin.php");
	$info = new DBconnector();	
	$profileUserID=mysql_real_escape_string(base64_decode($_GET['id']));
	
	$infoArray=$info->fetchArray($info->query("SELECT * FROM users WHERE userID=$profileUserID"));
	
	if($infoArray['movies']!=NULL)
		$movies=$infoArray['movies'];
	else
		$movies="Nothing has been posted for Movies";
	
	if($infoArray['music']!=NULL)
		$music=$infoArray['music'];
	else
		$music="Nothing has been posted for Music";
	
	if($infoArray['books']!=NULL)
		$books=$infoArray['books'];
	else
		$books="Nothing has been posted for Books";
	
	if($infoArray['tv']!=NULL)
		$tv=$infoArray['tv'];
	else
		$tv="Nothing has been posted for TV";
	
	if($about==NULL)
		$about=userName($profileUserID)." hasn't updated about me yet";
	
		?>
<div class='span-19 last text' id='whiteboard'>
	<h5> About Me:</h5>
	<div align='left'>
		<?php echo str_replace("''","'",$infoArray['about']); ?>
	</div><hr />
	<h5>Email: </h5>
	<div align='left'>
		<?php echo $infoArray['email']; ?>
	</div><hr />
	<h5>Favorite Movies:</h5>
	<div align='left'>
		<?php echo $movies ?>
	</div><hr />
	<h5>Favorite Music:</h5>
	<div align='left'>
		<?php echo $music ?>
	</div><hr />
	<h5>Favorite Books:</h5>
	<div align='left'>
		<?php echo $books ?>
	</div><hr />
	<h5>Favorite TV Shows:</h5>
	<div align='left'>
		<?php echo $tv ?>
	</div><hr />

</div>
<?php
include 'includes/footer.php';

?>
	