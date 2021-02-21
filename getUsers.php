<?php
session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This page grabs all the users for the admin so that he/she can update their information
 */
//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

//Checks to see if the user is an admin before showing all of the users
if ($_SESSION['role'] != 'admin')
{
    echo "Please log in as an admin.";
    exit;
}

//SQL statement used to pull users out of the database
$sql = "SELECT * FROM `siteusers`";

//Makes a connection to the database
if ($connection)
{
    //Pulls the users out of the database and displays them
    $result = mysqli_query($connection, $sql);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['ID'] . "<br>";
            echo $row['Name'] . "<br>";
            echo $row['Username'] . "<br>";
            
            ?>


<head>
	<!--Linking the css file to make the website look good  -->
	<link href="makeup.css" rel="stylesheet" type="text/css">
	<title>Get Users</title>
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
<body>
    <!-- Buttons that redirect you to the main page and admin page. -->
   	  	<a href="loginSuccess.php" class="button1">Main</a>
   	  	<a href="adminPage.php" class="button3">Admin Page</a>
	
	<!-- Button to edit blog posts via the admin page -->
<form action="editUserInfo.php">
	<input type="hidden" name="id" value="<?php echo $row['ID'];?>"></input>
	<button class="button2" type="submit">Edit</button>
</form>

	<?php 
	            echo "====================================<br>";
	        }
	    } else {
	        echo "Error with the SQL " . mysqli_error($connection);
	    }
	}else {
	    echo "Error connecting " . mysqli_connect_error();
	}
	
	?>

</body>

