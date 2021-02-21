<?php
session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This page allows the admin to add a product
 */

if ($_SESSION['role'] != 'admin')
{
    echo "Please login as an admin.";
    exit;
}

?>

<!DOCTYPE HTML>
<html>
  <head>
   <meta charset="UTF-8">
	<title>New Product</title>
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
				 position: fixed;
				 top: 0;	
		   }
		   
	 button {
	            display:inline-block;
				padding:0.3em 1.2em;
				margin:0 0.3em 0.3em 0;
				border-radius:2em;
				box-sizing: border-box;
				text-decoration:none;
				font-family:'Roboto',sans-serif;
				font-weight:300;
				background-color:#9370DB;
				text-align:center;
				transition: all 0.2s;
	     }
	     
	 button:hover {
	     		background-color:#4095c6;
	     }   
		   
	 </style>
	  
   </head>
   <a href="shop1.php" class="button1">Return</a>
<div class = "form-container">
	<h2>Add a new product</h2>
	<form class="login-form" action="processAddProduct.php">
		Product Name: <input type="text" name="productName"></input><br>
		Product Description: <textarea rows="20" cols="70" name="productDesc"></textarea><br>
		Price: <input type="text" name="price"></input><br>
		<button type="submit">Post</button>
	</form>

</div>

</html>