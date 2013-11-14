<?php
    session_start();
    require_once 'databaseLogin.php';
    $userID=$_SESSION['userID'];
    
    $connector = new DBconnector(); 
    $books = htmlentities(mysql_real_escape_string($_POST['books']));
    
    
    $insertQuery=$connector->query("UPDATE users SET books='$books' WHERE userID='$userID'");
    echo "<meta http-equiv='refresh' content='0; url=accountSettings.php' />";
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
    <title></title>
</head>

<body>
</body>
</html>
