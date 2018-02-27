<?php 
	//Database credentials
	$host	= "localhost";
	$user	= "root";
	$pass 	= "";
	$dbName = "herzing";

	//Try to connect to database using said credentials
	//If connection successful, we will save the persistance in a variable called $db
	try {
		$db = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
	} catch (Exception $e) {
		die("Database connection Error <br>" . $e->getMessage());
	}

?>