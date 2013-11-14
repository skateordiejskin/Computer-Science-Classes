<div id='inbox' class="section box">
<br />
<br />
<a name="inbox"></a>
<h2 align='center'>Inbox</h2>
<br />

<?php
require_once 'databaseLogin.php';
$inbox = new DBconnector();

$userID=$_SESSION['userID'];

$inboxQuery=$inbox->query("SELECT * FROM (SELECT inboxID, senderID, recipientID, message, date FROM messages WHERE (recipientID=$userID OR senderID=$userID) ORDER BY date DESC) as tmp GROUP BY inboxID ORDER BY date DESC");

if ($inbox->numRows($inboxQuery)==0){?>
	<div align='center'>You have no messages in your inbox!</div>
<?php
}

else{
	while($messageFetch=$inbox->fetchArray($inboxQuery)){
		if($userID==$messageFetch['recipientID']){
			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['senderID']));

			echo "<h4 align='left'>
					<a onclick =\"javascript:ShowHide('inboxDiv_".$messageFetch['inboxID']."')\" href=\"javascript:;\">".$userFetch['firstName']." ".$userFetch['lastName']."</a>
					</h4>
					".$messageFetch['message']."
					<div class='dateText'>
						".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."
					</div>
					";
			echo "<br />
				<div id='inboxDiv_".$messageFetch['inboxID']."' style=\"display: none; border-style:solid; border-width:1px; padding:4px;\">
				<form method='post' id='".$messageFetch['inboxID']."' class='messageSend' action=''>
						<input type='hidden' name='userID' class='userID' value='".$userID."' />
						<input type='hidden' id='".$messageFetch['senderID']."' name='profileUserID' class='profileUserID' value='".$messageFetch['senderID']."' />
						<input type='hidden' name='inboxID' class='inboxID' value='".$messageFetch['inboxID']."' />
						Reply:<br /><textarea name=\"message\" class=\"message\" rows=\"5\" cols=\"50\"></textarea>
						<input type='submit' id=\"submit\" value='Send' />
					</form>";
					
					
					$inboxID=$messageFetch['inboxID'];
					?>
					
					<div id="thread_<?php echo $inboxID; ?>">Loading Messages...</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$("#thread_<?php echo $inboxID; ?>").load("includes/inboxThread.php?",{inboxid:'<?php echo $inboxID; ?>'});
							var refreshId = setInterval(function() {
							$("#thread_<?php echo $inboxID; ?>").load("includes/inboxThread.php?",{inboxid:'<?php echo $inboxID; ?>'});
								}, 1000);
								});
						</script>
					</div>
					<hr />
<?php
		}

		elseif($userID==$messageFetch['senderID']){
			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['recipientID']));
			echo "
				<h4 align='left'>
				<a onclick =\"javascript:ShowHide('inboxDiv_".$messageFetch['inboxID']."')\" href=\"javascript:;\">".$userFetch['firstName']." ".$userFetch['lastName']."</a>
				</h4>
				".$messageFetch['message']."
				<div class='dateText'>
				".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."
				</div>";
			
			echo "<br />
				<div id='inboxDiv_".$messageFetch['inboxID']."' style=\"display: none; border-style:solid; border-width:1px; padding:4px;\">
					<form method='post' id='".$messageFetch['inboxID']."' class='messageSend' action=''>
						<input type='hidden' name='userID' class='userID' value='".$userID."' />
						<input type='hidden' id='".$messageFetch['recipientID']."' name='profileUserID' class='profileUserID' value='".$messageFetch['recipientID']."' />
						<input type='hidden' name='inboxID' class='inboxID' value='".$messageFetch['inboxID']."' />
						Reply:<br /><textarea name=\"message\" class=\"message\" rows=\"5\" cols=\"50\"></textarea>
						<input type='submit' id=\"submit\" value='Send' />
					</form>";
					
					
					$inboxID=$messageFetch['inboxID'];
					?>
					
					<div id="thread_<?php echo $inboxID; ?>">Loading Messages...</div>
						<script type="text/javascript">
						$(document).ready(function(){
							$("#thread_<?php echo $inboxID; ?>").load("includes/inboxThread.php?",{inboxid:'<?php echo $inboxID; ?>'});
							var refreshId = setInterval(function() {
							$("#thread_<?php echo $inboxID; ?>").load("includes/inboxThread.php?",{inboxid:'<?php echo $inboxID; ?>'});
								}, 1000);
								});
						</script>
					</div>
					<hr />
<?php
		}
		}
	}
?>
</div>

