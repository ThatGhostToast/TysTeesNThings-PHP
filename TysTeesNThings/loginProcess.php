<?php

session_start();
/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/7/21
 * This page handles logins
 */

include 'Database.php';

//Variables
$uname = $_POST["username"];
$pword = $_POST["pword"];

$connect = new Database();
$connection = $connect->dbConnect();


//Validating variables
if ($uname == null or $pword == null){
    echo "Both username and password must be entered. ";
    
}else {
    
    $sql = "SELECT * FROM `siteusers` WHERE `Password` = '$pword' AND `Username` = '$uname'";
    //Checking login information with the database.
    
    if ($result = mysqli_query($connection, $sql)) {
        echo "<br>";
        
        if ($row = mysqli_fetch_assoc($result)) {
            
            $_SESSION['username']=$row['Username'];
            $_SESSION['id']=$row['ID'];
            $_SESSION['role'] = $row['Role'];
            echo "Welcome " . $row['Username'] . "! Login Successful." . "<br>";
            
            header("Location: shop1.php");
        }else {
            header("Location: loginFailed.php");
            
        }
        
    } else {
        echo " Error: Login unsuccessful: " . $sql . "<br>" . $connection->error;
    }
    
}