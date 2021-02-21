<?php
session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/19/21
 * This page processes deleting a product
 */

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

if ($_SESSION['role'] == 'admin')
{
    $productToDelete = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE `products` . `ID` = '$productToDelete'";
    //If the admin wants to delete a product, and that product exists, then it will be deleted from the database
    if ($connection) {
        $result = mysqli_query($connection, $sql);
        if ($result)
        {
            echo "Deleted post " . $productToDelete . "<br>";
            header("Location: shop1.php");
        } else {
            echo "Error with the sql " . mysqli_error($connection);
        }
    }else {
        echo "Error connecting " . mysqli_connect_error();
    }
    
}else{
    echo "Please log in as an admin.";
    exit;
}
?>