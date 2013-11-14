<?php
	include 'header.php';
	$userID=$_SESSION['userID'];
	
	$subject=$_POST['subject'];
	$comment=$_POST['comment'];
	$date=date("y-m-d, G:i:s");

	if(($subject!=NULL)||($comment!=NULL)){
		$feedbackSQL="INSERT INTO feedback (userID, subject, comment, date) VALUES ('$userID','$subject','$comment','$date')";
		$feedbackQuery=mysql_query($feedbackSQL);
	
			if($feedbackQuery){
				echo"<br /><br /><br /><h4 align='center'>
					Your feedback has been sent. Thank you for taking the time to improve the site.
						</h4>";
						}
						}
				else{
					echo "<h4 align='center'>You forgot something =[!";
					}
	
		?>