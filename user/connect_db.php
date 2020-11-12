<?php
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clothing_store";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}*/

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'clothing_store');
   $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

   if (!$con) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>