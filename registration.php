<?php
/*
 * Zac Almas
 * CST-236
 * 2/7/21
 * This page registers the customer
 */
?>

<!DOCTYPE HTML>
<html>
  <head>
   <title>Registration</title>
   <!--Linking the css file to make the website look good  -->
	 <link href="makeup.css" rel="stylesheet" type="text/css">
	  <style>
	  	body {
	  			display: flex;
	  			justify-content: center;
	  			align-items: center;
	  			min-height: 100vh;
		  		background: radial-gradient(circle, white, #ECECEC);
		  		font-family:Trebuchet MS;
		   }
	  
	  	h1 {
		  		 font: bold 50px "Century Schoolbook", Georgia, Times, serif;
				 color: #9370DB;
				 line-height: 90%;
				 margin: .2em 0 .4em 0;
				 letter-spacing: -2px;
				 text-align: center;	
		   }
		   
	  </style>
	  
  </head>
  
  <body>
   <!-- Taking in user registration information -->
  	<form class="login-form" action="registrationProcess.php" method="post">
  		<h1>Register!</h1>
		Name: <input type="text" name="name"><br>
		E-mail: <input type="email" name="email"><br> 
		Birthday: <input type="date" name="birthday"><br>
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
	  <button type="submit" class="btn btn-primary btn ghost">Submit</button>
	  
	<!-- Buttons to get back to Login or main menu -->
	  <a href="index.html" class="button1">Menu</a>
   	  <a href="loginPage.php" class="button4">Login</a>
    </form>
    
  </body>

</html>