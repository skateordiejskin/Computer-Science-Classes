<?php 
			require_once("../databaseLogin.php");
			$landing=new DBconnector;

			$email= mysql_escape_string($_GET['email']);

			$checkRows=$landing->numRows($landing->query("SELECT email FROM landingRequest WHERE email='$email'"));
			if(($isset($email) && (!empty($email))){
				if($checkRows!=0)
					echo "You've already asked to join the revolution. We'll email you shortly!";
				else
					$landingRequest=$landing->query("INSERT INTO landingRequest(email) VALUES('$email')");
				
				if($landingRequest)
					echo "Thank You For Joining the Revolution! We'll send you an email when it begins!";
			}
			else{
				echo "<meta http-equiv='refresh' content='1; url='http://socialmutiny.com' />"}
			?>
