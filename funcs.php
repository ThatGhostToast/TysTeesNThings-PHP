<?php
session_start();

/*
 * Ty's Tees N Things
 * Zac Almas
 * 1/23/21
 * This page is where the functions are stored
 */

//alert box function
function alert_box(){
    $message = $_SESSION['errorMessage'];
    echo "<script>alert($message)</script>";
}

//Function that connects to the database
function dbConnect()
{
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database_name = "tystees";
    
    //create a connection
    $conn = new mysqli($host, $username, $password, $database_name);
    
    return $conn;
}

