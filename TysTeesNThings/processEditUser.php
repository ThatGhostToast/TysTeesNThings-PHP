<?php

session_start();
//Allows us to call the function that connects us to the database
include_once 'Database.php';
$connect = new Database();
$connection = $connect->dbConnect();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/21/21
 * This processes the edited user.
 */

//Gets variables from editUserInfo.php so that we can update it in the database
$name = $_GET['name'];
$email = $_GET['email'];
$id = $_GET['id'];
$birthday = $_GET['birthday'];
$password = $_GET['password'];
$username = $_GET['username'];
$updateRole = $_GET['role'];
$role = $_SESSION['role'];

//Connects to the database and makes sure you're an admin before proceding 
if ($connection && $role == "admin") {
    
    //Update SQL statement
    $sql = "UPDATE `siteusers` SET `Name` = '$name', `EMail` = '$email', `Birthday` = '$birthday', `Password` = '$password', `Username` = '$username', `Role` = '$updateRole' WHERE `id` = '$id'";
    
    //If successful will send you to the success page and if failed will show an error
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
