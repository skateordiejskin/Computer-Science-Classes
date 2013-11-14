<?php
	require_once("cookieCheck.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!-- CSS Files -->
   	 		<link rel="stylesheet" type="text/css" href="CSS/SocialMutiny.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/header.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/footer.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/images.css" media="screen, projection"  />
			
			<!-- Framework CSS -->
			<link rel="stylesheet" href="CSS/blueprint/screen.css" type="text/css" media="screen, projection" />
			<link rel="stylesheet" href="CMS/CSS/blueprint/print.css" type="text/css" media="print" /> 
			
			    	<!--[if lt IE 8]>
    	<link rel="stylesheet" href="CMS/CSS/blueprint/ie.css" type="text/css" media="screen, projection" />
    	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
    	<![endif]-->  
			
			
			<!-- Javascript --> 
			<script type="text/javascript" src="cgi-bin/indexFormValidation.js"></script>
			
			<!-- Icon -->
			<link rel="shortcut icon" href="http://joeskinner.me/socialmutiny/favicon.ico">
		<title>Social Mutiny</title>
</head>

<body>
  <div class="header">
				<div class="title" id="logoHeader"><img src="images/smLogo.png" /></div>


<div class="container">
      <br />	    
	
	    <div class="span-11 prepend-1" id="newUser">
	        <br /><br /><br />
	        <h2>New User</h2>
	
	        <form action="newUser.php" method="post" onsubmit="return validateForm()" name="newUser">
	            First Name: <input type="text" name="firstName" id="firstName" /><br />
	            Last Name: <input type="text" name="lastName" id="lastName" /><br />
	            Email: <input type="text" name="email" id="email" /><br />
	            Verify Email: <input type="text" name="email2" id="email2" /><br />
	            Password: <input type="password" name="password" id="password" /><br />
	            Verify Password: <input type="password" name="password2" id="password2" /><br />
	            Gender: <input type="radio" name="sex" value="m" /> Male<br />
	            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="sex" value="f" /> Female<br />
	            <br />
	            Date of Birth:<br />
	            <select name="month">
	                <option>Month</option>
	                <option>January</option>
	                <option>February</option>
	                <option>March</option>
	                <option>April</option>
	                <option>May</option>
	                <option>June</option>
	                <option>July</option>
	                <option>August</option>
	                <option>September</option>
	                <option>October</option>
	                <option>November</option>
	                <option>December</option>
	            </select><br />

	            <select name="day">
	                <option>Day</option>
	                <option>1</option>
	                <option>2</option>
	                <option>3</option>
	                <option>4</option>
	                <option>5</option>
	                <option>6</option>
	                <option>7</option>
	                <option>8</option>
	                <option>9</option>
	                <option>10</option>
	                <option>11</option>
	                <option>12</option>
	                <option>13</option>
	                <option>14</option>
	                <option>15</option>
	                <option>16</option>
	                <option>17</option>
	                <option>18</option>
	                <option>19</option>
	                <option>20</option>
	                <option>21</option>
	                <option>22</option>
	                <option>23</option>
	                <option>24</option>
	                <option>25</option>
	                <option>26</option>
	                <option>27</option>
	                <option>28</option>
	                <option>29</option>
					<option>30</option>
	                <option>31</option>
	            </select><br />
	            
	            <select name="year">
	                <option>Year</option>
	                <option>1994</option>
	                <option>1993</option>
	                <option>1992</option>
	                <option>1991</option>
	                <option>1990</option>
	                <option>1989</option>
	                <option>1988</option>
	                <option>1987</option>
	                <option>1986</option>
	                <option>1985</option>
	                <option>1984</option>
	                <option>1983</option>
	                <option>1982</option>
	                <option>1981</option>
		           <option>1980</option>
	            </select><br />
	            <input type="submit" value="Submit" size="10" />
	        </form>
	    </div>
	    <div class="span-11 append-1 last" id="login">
	        <form action="userLogin.php" method="post">
	        <br /><br /><br />
	            <h2>User Login</h2>
	            Email:<input type="text" name="email" id="email" /><br />
	            Password: <input type="password" name="password" id="password" /><br />
	            Remember Me: <input type="checkbox" name="rememberMe" id="rememberMe" /><br />
	            <input type="submit" value="submit" />
	       </form>
	        </div>

    </div>
</body>
</html>
