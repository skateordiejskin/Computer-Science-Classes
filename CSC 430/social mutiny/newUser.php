<?php
session_start();
require_once("databaseLogin.php");
$connector = new DBconnector();

$firstName = mysql_real_escape_string($_POST['firstName']);
$lastName = mysql_real_escape_string($_POST['lastName']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$gender = mysql_real_escape_string($_POST['sex']);
$date = date("y-m-d, G:i:s");
$month = mysql_real_escape_string($_POST['month']);
$day = mysql_real_escape_string($_POST['day']);
$year = mysql_real_escape_string($_POST['year']);


$emailExplode=(explode('@',$email));
if(!$emailExplode){
	echo "This is not a valid email address";
	echo "<meta http-equiv='refresh' content='3; url=index.html' />";
}

$emailCheck=(explode('.',$emailExplode[1]));

for($i=0;$i<50;$i++){
	if($emailCheck[$i]!=NULL && $emailCheck[$i+1]==NULL){
		if (($emailCheck[$i]=="com")||($emailCheck[$i]=="edu")||($emailCheck[$i]=="me")||($emailCheck[$i]=="org")||($emailCheck[$i]=="gov")){

			$check=$connector->query("SELECT * FROM users WHERE email='$email'");
			$count=$connector->numRows($check);

			if($count==1){
				echo "This email address already has an account<br />";
			}

			if(($count==0) && (isset($email)) && (isset($password)) && (isset($firstName)) && (isset($lastName))){
				$password=md5(md5($password));
				if($insert=$connector->query("INSERT INTO users (firstName, lastName, email, password, gender, month, day, year, date) VALUES('$firstName','$lastName','$email','$password', '$gender','$month','$day','$year','$date')")){

					$UID=$connector->query("SELECT userID FROM users WHERE email='$email'");
					$row=mysql_fetch_array($UID);

					$_SESSION['userID']=$row['userID'];
					$userID=$_SESSION['userID'];

					$userDirName="user".$userID;
					$thumbnailDirName="thumbnails".$userID;

					if($gender=='m'){
						$pictureInsert=$connector->query("INSERT INTO pictures (userID, name, profilePicture, date) VALUES ('$userID','Users/male.jpg','1','$date')");
					}
					else{
						$pictureInsert=$connector->query("INSERT INTO pictures (userID, name, profilePicture, date) VALUES ('$userID','Users/female.jpg','1','$date')");
					}

					$uploadDir = "Users/".$userDirName;
					if(is_dir($uploadDir)){
					}
					else
						mkdir($uploadDir,0777);
					$thumbnailDir = "Users/".$userDirName."/".$thumbnailDirName;
					if(is_dir($thumbnailDir)){
					}
					else
						mkdir($thumbnailDir,0777);



					echo "<meta http-equiv='refresh' content='0; url=network.php' />";
				}
			}
			else{
				echo "Error in adding user
				<meta http-equiv='refresh' content='3; url=http://socialmutiny.com/' />";
			}
		}


		else{
			echo "This is not a valid email address
				<meta http-equiv='refresh' content='3; url=http://socialmutiny.com/' />";
		}
	}

}
?> 