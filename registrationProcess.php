<?php

/*
 * Ty's Tees N Things
 * Zac Almas
 * 1/23/21
 * This page handles the users registration.
 */

//Allows us to call the function that connects us to the database
include 'funcs.php';

$name = $_POST["name"];
echo "Welcome " . $name . "!" . "</br>";

//Retrieving the variables
$email = $_POST["email"];
$bday = $_POST["birthday"];
$pword = $_POST["password"];
$uname = $_POST["username"];

// Check connection
if (dbConnect()->connect_error) {
    die("Connection failed: " . dbConnect()->connect_error);
}
echo "Connected successfully";

//Insert data into database
$sql = "INSERT INTO `siteusers` (`ID`, `Name`, `EMail`, `Birthday`, `Password`, `Username`, `Role`) VALUES (NULL, '$name', '$email', '$bday', '$pword', '$uname', '')";

//Checking to make sure it made it to the database
if (mysqli_query(dbConnect(), $sql)) {
    header("Location: registrationSuccess.php");
} else {
    echo " Error: " . $sql . "<br>" . dbConnect()->error;
}

?>