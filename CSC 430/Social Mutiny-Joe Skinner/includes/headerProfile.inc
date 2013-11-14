<?php
	require_once('databaseLogin.php');
        require_once 'includes/functions.inc';
    if($_SESSION['userID']==NULL)
        header("Location:notLoggedIn.php");
    else{
        $userID=$_SESSION['userID'];
        $profileUserID=base64_decode($_GET['id']);
        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <title>Social Mutiny</title>
	    	
	    	<!--CSS Files-->
	    	<link rel="stylesheet" type="text/css" href="CSS/images.css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/SocialMutiny.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/SocialMutiny.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/text.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/whiteboard.css" type="text/css" media="screen, projection" />
						
			<!--Fonts-->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,800' rel='stylesheet' type='text/css' />
			<link href='http://fonts.googleapis.com/css?family=Glegoo' rel='stylesheet' type='text/css' />            
			
			<link rel="shortcut icon" href="http://joeskinner.me/socialmutiny/favicon.ico" />
			
			<!--Javascript Includes-->
	
	  		<!--Load jQuery -->
			 <script src="http://code.jquery.com/jquery-latest.js"></script>
		
			<!--Load ScrollTo-->
			<script src="javascript/jquery.scrollTo-min.js" type="text/javascript"></script>
		
			<!--Load LocalScroll-->
			<script src="javascript/jquery.localscroll.min.js" type="text/javascript"></script>
	     
	     	<!--Load Lytebox-->
			<script type="text/javascript" language="javascript" src="javascript/lytebox.js"></script>
			<link rel="stylesheet" href="CSS/lytebox.css" type="text/css" media="screen" />
			
			<!--Hidden Divs-->
			<script type="text/javascript" language="javascript" src="javascript/hideDiv.js"></script>
			
			<!--Ajax Browser Check-->
			<script type="text/javascript" language="javascript" src="javascript/ajaxBrowserCheck.js"></script>
			
			<script type="text/javascript" language="javascript" src="javascript/whiteboardPost.js"></script>
			<script type="text/javascript" language="javascript" src="javascript/profileWhiteboardRefresh.js"></script>
			
			<script type="text/javascript" language="javascript" src="javascript/updateAboutMe.js"></script>
			
			<script type="text/javascript" language="javascript" src="javascript/messageSend.js"></script>
			
			
			
			<script type="text/javascript" src="javascript/jquery.easing.1.3.js"></script>
			<script type="text/javascript" src="javascript/jquery.scrollTo-min.js"></script>


			<script type="text/javascript">
		$(document).ready(function () {
			$.localScroll.defaults.axis = 'x';
			$.localScroll();
		});
		</script>			
	</head>
	<body>
	 <div class="wrapper" id='main1'>
    		<div id='home'>
    			<br /><br /> <br /><br />
    			<ul class="topNav dark header" id="navigation">
	                <li><a href="home.php"><img src="images/smLogo.png" alt="" /></a></li>
	   				<li class="topNavLink sup active"><a href="#home">Whiteboard</a></li>
					<li class="topNavLink active sup"><a href="#info">Info</a></li>
					<li class="topNavLink sup active"><a href="#photos">Photos (<?php echo picturesNum($profileUserID); ?>)</a></li>
					<li class="topNavLink sup active"><a href="#friends">Friends (<?php echo friendCheckNum($profileUserID);?>)</a></li>
					<li class="topNavLink sup active"><a href="#inlineContent">Send Message</a></li>
	                <li class="search" align="right">
	            		<form action='search.php' method='post' autocomplete="off">
	            			<input type='text' class="search" name="search" id="search" size='40' placeholder="Search" /> 
	            		</form>
					</li>
           	 </ul>
     	</div>
     	