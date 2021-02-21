<?php
session_start();
/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/20/21
 * This page allows the admin to edit a product
 */

//get the post id
$id = $_GET['id'];

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

if ($connection)
{
    $sql = "SELECT * FROM `products` WHERE `ID` = '$id' LIMIT 1";
    $result = mysqli_query($connection, $sql);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $productID = $row['ID'];
            $productName = $row['ProductName'];
            $productDesc = $row['ProductDesc'];
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
<title>Edit Post</title>
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
	<div class = "form-container">
		<h2>Edit a product</h2>
		<form class="login-form" action="editProductProcess.php">
			<input type = "hidden" name = "id" value = "<?php echo $id;?>"></input>
			<input type="hidden" name="productID" value="<?php echo $productID;?>"></input>
			Product Name: <input type="text" name="productName" value = "<?php echo $productName;?>"></input><br>
			Product Description: <textarea rows="20" cols="70" name="productDesc"><?php echo $productDesc;?></textarea><br>
			<button type="submit">Submit Changes</button>
		</form>

	</div>

</html>