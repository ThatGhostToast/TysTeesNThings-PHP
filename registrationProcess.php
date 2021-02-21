<?php

/*
 * Ty's Tees N Things
 * Zac Almas
 * 2/7/21
 * This page handles the users registration.
 */

//Connects us to the database
include 'Database.php';

$name = $_POST["name"];
echo "Welcome " . $name . "!" . "</br>";

//Retrieving the variables
$email = $_POST["email"];
$bday = $_POST["birthday"];
$pword = $_POST["password"];
$uname = $_POST["username"];

$connect = new Database();
$connection = $connect->dbConnect();

//Insert data into database
$sql = "INSERT INTO `siteusers` (`ID`, `Name`, `EMail`, `Birthday`, `Password`, `Username`, `Role`) VALUES (NULL, '$name', '$email', '$bday', '$pword', '$uname', '')";

//Checking to make sure it made it to the database
if (mysqli_query($connection, $sql)) {
    header("Location: login.php");
} else {
    echo " Error: " . $sql . "<br>" . $connection->error;
}

?>