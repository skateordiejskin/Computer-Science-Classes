<?php
	require_once 'includes/header.inc';

	require_once("databaseLogin.php");
	
	$changeEmail = new DBconnector();	
	$userID=mysql_real_escape_string($_SESSION['userID']);
	
	$newEmail=htmlentities(mysql_real_escape_string($_POST['newEmail']));
	$emailConfirm=htmlentities(mysql_real_escape_string($_POST['emailConfirm']));
	
	if(isset($newEmail)&&(isset($emailConfirm))&&(!empty($newEmail))&&(!empty($emailConfirm))){
		if($newEmail==$emailConfirm){
			$emailChange=$changeEmail->query("UPDATE users SET email='$newEmail' WHERE userID=$userID");
			if($emailChange)
				echo "Your email has been successfully changed! <meta http-equiv='refresh' content='1; url=accountSettings.php' />";
				}
	}
	elseif($newEmail!=$emailConfirm){
		echo "Your new email is not the same as the email confirmation. Please Try again <meta http-equiv='refresh' content='2; url=accountSettings.php' />";
		}
			}
		require_once 'includes/footer.inc';
		?>