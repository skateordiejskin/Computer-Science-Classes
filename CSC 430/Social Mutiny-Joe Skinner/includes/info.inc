       <div id="info" class="section box">
       <a name="info"></a>
       <br /><br />
       <h2 align='center'>Info</h2><br />
<?php
require_once("databaseLogin.php");
	$info = new DBconnector();	
	$userID=$_SESSION['userID'];
	
	$infoArray=$info->fetchArray($info->query("SELECT * FROM users WHERE userID=$userID"));
	
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
		$about=userName($userID)." hasn't updated about me yet";
	
		?>
	<h5> About Me:</h5>
	<div align='left' id='aboutText'>
		<?php echo str_replace("''","'",$infoArray['about']); ?>
			<a onclick ="javascript:ShowHide('aboutMe')" href="javascript:;" id='dateText' id='aboutMe'>Edit</a>

		<div id='aboutMe' style="display: none">
			<form method='post' id='aboutMe' action=''>
				<textarea name="about" id="about"><?php echo str_replace("''","'",$infoArray['about']) ?></textarea>
				<input type='submit' id="submit" value='Change' />
			</form>
		</div>

	</div><hr />
	<h5>Email: </h5>
	<div align='left' id="">
		<?php echo $infoArray['email']; ?>
		<div id='dateText'><a href="#">Edit</a></div>
	</div><hr />
	<h5>Favorite Movies:</h5>
	<div align='left'>
		<?php echo $movies ?>
		<div id='dateText'><a href="#">Edit</a></div>
	</div><hr />
	<h5>Favorite Music:</h5>
	<div align='left'>
		<?php echo $music ?>
		<div id='dateText'><a href="#">Edit</a></div>
	</div><hr />
	<h5>Favorite Books:</h5>
	<div align='left'>
		<?php echo $books ?>
		<div id='dateText'><a href="#">Edit</a></div>
	</div><hr />
	<h5>Favorite TV Shows:</h5>
	<div align='left'>
		<?php echo $tv ?>
		<div id='dateText'><a href="#">Edit</a></div>
	</div><hr />

</div>

<script language="javascript">
	function ShowHide(divId){
		if(document.getElementById(divId).style.display == 'none'){
			document.getElementById(divId).style.display='block';
			}
		else{
			document.getElementById(divId).style.display = 'none';
			}
			}
	</script>
