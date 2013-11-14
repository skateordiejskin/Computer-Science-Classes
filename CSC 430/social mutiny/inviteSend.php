<?php
include 'includes/header.inc';
$userID=$_SESSION['userID'];
$emailAddresses=$_POST['recipients'];
require_once 'databaseLogin.php';

$invites = new DBconnector();

$senderIDFetch=$invites->fetchArray($invites->query("SELECT * FROM users WHERE userID=$userID"));


$subject   = "Join Social Mutiny";
$message   = "Hey it's ".$senderIDFetch['firstName'].".
\n One of my friends, Joe Skinner, is trying to start a new social networking site.
\n Please Join and give him feedback on what he needs to do to improve it.
\n\n
Thanks,
$senderIDFetch['firstName']." ".$senderIDFetch['lastName']";

mail($emailAddresses, $subject, $message);
?>

Your message was successfully sent!<br />
<br />
Thank you for contacting us!

</body>
</html>