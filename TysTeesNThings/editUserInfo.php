<?php
session_start();
/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This is the form that the admin can use to update the users profile
 */

//Makes sure the user is an admin before allowing updates
if ($_SESSION['role'] != 'admin')
{
    echo "Please log in as an admin.";
    exit;
}

//Gets the id of the user being updated
$id = $_GET['id'];

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

if ($connection)
{
    //SQL statement that pulls the users info from the database
    $sql = "SELECT * FROM `siteusers` WHERE `ID` = '$id' LIMIT 1";
    $result = mysqli_query($connection, $sql);
    if ($result)
    {
        //Pulls out all the data from the database and puts it into variables
        while ($row = mysqli_fetch_assoc($result))
        {
            $Name = $row['Name'];
            $Email = $row['EMail'];
            $Birthday = $row['Birthday'];
            $Password = $row['Password'];
            $Username = $row['Username'];
            $Role = $row['Role'];
        }
    }
    
}else {
    echo "Error connecting. " . mysqli_connect_error();
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
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
</style>
</head>

<!-- Buttons that redirect you to the main page and admin page. -->
   	  	<a href="getUsers.php" class="button1">Get Users</a>
   	  	<a href="adminControls.php" class="button3">Admin Page</a>
   	  	
<!-- Form used to update user info --> 	  	
<div class = "form-container">
	<h2>Edit a User</h2>
	<p>Please tell us your story!</p>
	<form class="login-form" action="processEditUser.php">
		<input type = "hidden" name = "id" value = "<?php echo $id;?>"></input>
			Name: <input type="text" name="name" value = "<?php echo $Name;?>"></input><br>
			EMail: <input type="email" name="email" value = "<?php echo $Email;?>"></input><br>
			Birthday: <input type="date" name="birthday" value = "<?php echo $Birthday;?>"></input><br>
			Password: <input type="text" name="password" value = "<?php echo $Password;?>"></input><br>
			Username: <input type="text" name="username" value = "<?php echo $Username;?>"></input><br>
			Role: <input type="text" name="role" value = "<?php echo $Role;?>"></input><br>
			<button type="submit">Submit Changes</button>
	</form>

</div>

</html>