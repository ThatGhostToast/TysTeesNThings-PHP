<?php
session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This page is for all of the user controls 
 */

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

//Makes sure the user is an admin
if ($_SESSION['role'] != 'admin')
{
    echo "Please log in as an admin.";
    exit;
}

?>
<head>
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
		  }
		
	   h2 {
				 font: bold 25px "Century Schoolbook", Georgia, Times, serif;
				 color: #9370DB;
				 line-height: 90%;
				 margin: .2em 0 .4em 0;
				 letter-spacing: -2px;
				 text-align: center;
				 
		  }
		  
		   /*
		   CSS used for the buttons was taken from https://fdossena.com/?p=html5cool/buttons/i.frag
		   */
		   
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
	     
	     body {
	  			
		  		background: radial-gradient(circle, white, #ECECEC);
		  		font-family:Trebuchet MS;
		   }
	     				  
	</style>
</head>
<!-- Buttons that redirect you to the main page and gets users. -->
   	  <a href="shop1.php" class="button1">Return</a>
   	  <a href="getUsers.php" class="button3">Get Users</a>
   	  <a href="newProduct.php" class="button4">Add New Product</a>


<?php

//Grabs all of the blog posts
$sql = "SELECT * FROM `products`";

if ($connection) {
    $result = mysqli_query($connection, $sql);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "Product ID: " . $row['ID'] . "<br>";
            echo "Title: " . $row['ProductName'] . "<br>";
            echo "Desc: " . $row['ProductDesc'] . "<br>";
?>

<!-- Button to delete post via the admin page -->
<form action="processDeleteProduct.php">
	<input type="hidden" name="id" value="<?php echo $row['ID'];?>"></input>
	<button type="submit">Delete</button>
</form>     

<!-- Button to edit blog posts via the admin page -->
<form action="editProduct.php">
	<input type="hidden" name="id" value="<?php echo $row['ID'];?>"></input>
	<button class="button2" type="submit">Edit</button>
</form>       
            
<?php 
            echo "-----------------------------------------<br>";
            
        }
    } else {
        echo "Error with the sql " . mysqli_error($connection);
    }
}else {
    echo "Error connecting " . mysqli_connect_error();
}
            
?>