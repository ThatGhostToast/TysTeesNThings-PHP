<?php
session_start();
include_once 'ProductDataService.php';

/*
 * Zac Almas
 * CST-236
 * 2/7/21
 * This is all my own code for milestone 3
 */

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		 <title>Search</title>
	</head>
	<body>
		<h1>Search for a product</h1>
		<form action="SearchProcess.php" method="GET">
			Name: <input type="text" name="searchName"></input><br>
			<button type="submit">Search</button>
		</form>
	</body>

</html>