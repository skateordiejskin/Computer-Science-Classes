<div id="info" class="section box">
	<br /><br />
	<h2 align='center'>Info</h2>
	<br />
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
	<div align='left'>
		<?php echo str_replace("\'" ,"'",$infoArray['about']); ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('aboutMeDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='aboutMeDiv' style="display: none">
			<form method='post' action='' id='aboutMe'>
				<textarea name='about' id='about' rows="20" cols="100"><?php echo str_replace("\'","'",$infoArray['about']); ?></textarea>
				<input type='submit' class="submit" value='Update' />
			</form>
		</div>
	</div>
	<hr />

	<h5>Email: </h5>
	<div align='left'>
		<?php echo $infoArray['email']; ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('emailDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='emailDiv' style="display: none">
			<form method='post' action='' id='email' autocomplete='off'>
				<input type="text" id="emailText" size="55" value="<?php echo str_replace("\'","'",$infoArray['email']); ?>"/>
				<input type='submit' class="submit" value='Update' />
			</form>
		</div>
	</div>
	<hr />

	<h5>Favorite Movies:</h5>
	<div align='left'>
		<?php echo $movies ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('moviesDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='moviesDiv' style="display: none">
			<form method='post' action='' id='movies'>
				<textarea name='movies' id='moviesText' rows="20" cols="100"><?php echo str_replace("\'","'",$infoArray['movies']); ?></textarea>
				<input type='submit' class="submit" value='Update' />
			</form>	
		</div>
	</div>
	<hr />

	<h5>Favorite Music:</h5>
	<div align='left'>
		<?php echo $music ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('musicDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='musicDiv' style="display: none">
			<form method='post' action='' id='music'>
				<textarea name='music' id='musicText' rows="20" cols="100"><?php echo str_replace("\'","'",$infoArray['music']); ?></textarea>
				<input type='submit' class="submit" value='Update' />
			</form>
		</div>
	</div>
	<hr />

	<h5>Favorite Books:</h5>
	<div align='left'>
		<?php echo $books ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('booksDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='booksDiv' style="display: none">
			<form method='post' action='' id='books'>
				<textarea name='books' id='booksText' rows="20" cols="100"><?php echo str_replace("\'","'",$infoArray['books']); ?></textarea>
				<input type='submit' class="submit" value='Update' />
			</form>
		</div>
	</div>
	<hr />
	<h5>Favorite TV Shows:</h5>
	<div align='left'>
		<?php echo $tv ?>
		
		<div class='dateText'>
			<a onclick ="javascript:ShowHide('tvDiv')" href="javascript:;">Edit</a>
		</div>
		<div id='tvDiv' style="display: none">
			<form method='post' action='' id='tv'>
				<textarea name='tv' id='tvText' rows="20" cols="100"><?php echo str_replace("\'","'",$infoArray['tv']); ?></textarea>
				<input type='submit' class="submit" value='Update' />
			</form>
		</div>
	</div>
	<hr />
</div>
