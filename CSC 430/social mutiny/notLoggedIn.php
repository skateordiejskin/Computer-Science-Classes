<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>	
			<title>Social Mutiny</title>
			
			<!--CSS Files-->
			
			<link rel="stylesheet" type="text/css" href="CSS/header.css" media="screen, projection" />
			<link rel="stylesheet" type="text/css" href="CSS/footer.css" media="screen, projection" />
			<link rel="stylesheet" type="text/css" href="CSS/navigation.css" media="screen, projection" />
			<link rel="stylesheet" type="text/css" href="CSS/images.css" media="screen, projection" />
			<link rel="stylesheet" href="CSS/whiteboard.css" type="text/css" media="screen, projection" />
			<link rel="stylesheet" href="CSS/sidebar.css" type="text/css" media="screen, projection" />
			<link rel="stylesheet" href="CSS/text.css" type="text/css" media="screen, projection" />
			
			<!-- Framework CSS -->
			<link rel="stylesheet" href="CSS/blueprint/screen.css" type="text/css" media="screen, projection" />
			<link rel="stylesheet" href="CMS/CSS/blueprint/print.css" type="text/css" media="print" /> 
			
			    	<!--[if lt IE 8]>
    	<link rel="stylesheet" href="CMS/CSS/blueprint/ie.css" type="text/css" media="screen, projection" />
    	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
    	<![endif]-->  
<link rel="stylesheet" type="text/css" href="CSS/SocialMutiny.css" media="screen, projection" />
						<link rel="shortcut icon" href="http://joeskinner.me/socialmutiny/favicon.ico" />
			
			<!--Javascript Includes-->
			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
			<script type="text/javascript" src="cgi-bin/navigation.js"></script>
			<script type="text/javascript" src="cgi-bin/watermarkSearch.js"></script>
			<script type="text/javascript" src="cgi-bin/autocompleteOff.js"></script>
			<script type="text/javascript" src="cgi-bin/insert.js"></script>
			
			<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		</head>
		<body>
  <div class="header">
				<div class="title" id="logoHeader"><img src="images/smLogo.png" /></div>


<div class="container"><br /><br /><br />
<div class='span-19 last text' id='whiteboard'>
			<h2>You must be logged in to see that page</h2>
			<form action="userLogin.php" method="post">
				Email:
				<input type="text" name="email" id="email" /><br />
				Password:
				<input type="password" name="password" id="password" /><br />
				<input type="submit" value="submit" />
			</form>
		</div>

<?php
require_once 'includes/footer.inc';
?>