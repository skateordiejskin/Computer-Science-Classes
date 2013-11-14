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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <title>Social Mutiny</title>
	    	
	    	<!--CSS Files-->
	    	<link rel="stylesheet" type="text/css" href="CSS/images.css" media="screen, projection" />
	    	<link rel="stylesheet" type="text/css" href="CSS/pagescroller.css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/SocialMutiny.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/thickbox.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/text.css" type="text/css" media="screen, projection" />
	    	<link rel="stylesheet" href="CSS/whiteboard.css" type="text/css" media="screen, projection" />
						
			<!--Fonts-->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,800' rel='stylesheet' type='text/css' />
			<link href='http://fonts.googleapis.com/css?family=Glegoo' rel='stylesheet' type='text/css' />            
			
			<link rel="shortcut icon" href="http://joeskinner.me/socialmutiny/favicon.ico" /><!--Javascript Includes-->
	
	  		<!-- Load jQuery -->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		
			<!-- Load ScrollTo -->
			<script src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2-min.js"></script>
		
			<!-- Load LocalScroll -->
			<script src="http://flesler-plugins.googlecode.com/files/jquery.localscroll-1.2.7-min.js"></script>
			
			<!-- Load Accordian -->
			<script type="text/javascript" src="javascript/accordian.js"></script>
	     
	     	<!-- Load Lightbox -->
			<script type="text/javascript" language="javascript" src="javascript/lytebox.js"></script>
			<link rel="stylesheet" href="CSS/lytebox.css" type="text/css" media="screen" />
			
			<!--Load Message Box-->
			<script type="text/javascript" language="javascript" src="javascript/closeWindow.js"></script>
	     
	     	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	     	
	     	<script type="text/javascript">
	     		$(document).ready(function(){
	     			$('#main').localScroll({
	     				target:'body'
	     			});
	     		});
	    	</script>
	    	

	</head>
	<body>
    <div class="wrapper">
    	<div id='main'>
    		<div class='sub' id='home'><br /><br />
    			<ul class="header">
    				    			 </ul>  
            <div>Welcome to social mutiny!</div>
            
            <ul class="topNav dark header" id="navigation">
                       <a href="home.php"><img src="images/smLogo.png" /></a>

                         <li class="topNavLink active sup"><a href="home.php">Home</a></li>
   				<li class="topNavLink sup active"><a href="#whiteboard">Whiteboard</a></li>
				<li class="topNavLink active sup"><a href="#info">Info</a></li>
				<li class="topNavLink sup active"><a href="#photos">Photos (<?php echo picturesNum($profileUserID); ?>)</a></li>
				<li class="topNavLink sup active"><a href="#inlineContent" class="lytebox" data-description="" data-lyte-options="inline:true width:430 height:200">Send Message</a></li>
				<li class="topNavLink sup active"><a href="#friends">Friends (<?php echo friendCheckNum($profileUserID);?>)</a></li>
				<li class="topNavLink sup active"><a href="includes/test.php#test">Test</a></li>
                <li class="search" align="right">
            		<form action='search.php' method='post' autocomplete="off">
            			<input type='text' class="search" name="search" id="search" size='40' placeholder="Search" /> 
            			<input type="submit" class="go" value="Go" /></form>
				</li>
            </ul>
     	</div>
     	<div id="inlineContent" style="display:none;"><?php echo sendMessage($userID, $profileUserID); ?></div>
     	<div id="whiteboard" class="sub section">
<br /><br />