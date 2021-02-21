<?php
session_start();
include_once 'Database.php';

//Connects us to the database
$database= new Database();
$conn = $database->dbConnect();

//Array that will be used to display products <Work In Progress>
$product_array = array();
?>

<html>
	<head>
   <meta charset="UTF-8">
	<title>MainMenu</title>
	 <!--Linking the css file to make the website look good  -->
	 <link href="makeup.css" rel="stylesheet" type="text/css">
	 <style>
	 
	     body {	  			
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
				 right: 400px;	
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
   <body>
   	  
   	  <h2>Ty's Tees N Things</h2>
   	  <!-- Buttons that redirect you to the login page or the registration page. -->
   	  <a href="logout.php" class="button7">Logout</a>
   	  <a href="newPost.php" class="button3">New Post</a>
   	  <a href="search.php" class="button1">Search</a>
   	  <a href="shop2.php" class="button">next page</a>
   	  
   	  <?php if($_SESSION['role'] == 'admin'):?>
   	  <a href="adminControls.php" class="button5">Admin Page</a>
   	  <?php endif;?>
   	  
<?php

//Connect to the database
$sql = "SELECT * FROM `products` LIMIT 0, 10";

//If a product is available, it will display it with a button to learn more
if ($result = mysqli_query($conn, $sql)) {
    if($result)
    {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        while($row = mysqli_fetch_assoc($result))
        {        
            array_push($product_array, $row);
            ?>
				<div class = "form-container">
				<form class="login-form2" action="displayProduct.php">
					<h2><?php echo $row['ProductName'];?></h2>
					<h3>$<?php echo $row['Price'];?></h3>
					<input type="hidden" name="id" value="<?php echo $row['ID'];?>"></input>
					<button type="submit" class="btn2 btn2-primary btn ghost">See Post</button>
				</form>
				</div>
            <?php          
        }
        $_SESSION['products'] = $product_array;
        
    }
}

?>

   </body>
	
</html>