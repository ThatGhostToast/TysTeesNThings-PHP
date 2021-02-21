<?php

session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/20/21
 * This processes the edited product
 */

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

$productName = $_GET['productName'];
$productDesc = $_GET['productDesc'];
$id = $_GET['id'];
$role = $_SESSION['role'];

if ($role == "admin")
{
    
    if ($connection) {
        
        $sql = "UPDATE `products` SET `ProductName` = '$productName', `ProductDesc` = '$productDesc' WHERE `ID` = '$id'";
        
        $result = mysqli_query($connection, $sql);
        if ($result)
        {
            header("Location: shop1.php");
        }
        else {
            echo "Error in the sql " . mysqli_error(dbConnect());
        }
    }
    
    else {
        echo "Error connecting " . mysqli_connect_error();
    }
    
} else {
    echo "Error. You do not have permission to edit this post.";
}