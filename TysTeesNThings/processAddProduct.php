<?php

session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This processes the new product
 */

//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

$productName = $_GET['productName'];
$productDesc = $_GET['productDesc'];
$price = $_GET['price'];

$sql = "INSERT INTO `products` (`id`, `ProductName`, `ProductDesc`, `Price`) VALUES (NULL, '$productName', '$productDesc', '$price');";

if ($connection) {
    $result = mysqli_query($connection, $sql);
    if ($result)
    {
        include 'shop1.php';
    }
    else {
        echo "Error in the sql " . mysqli_error($connection);
    }
}

else {
    echo "Error connecting " . mysqli_connect_error();
}