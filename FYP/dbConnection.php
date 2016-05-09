<?php

	//initialising the server name, username, password, database name for connection as well as the table name for queries
	$serverName = "localhost";
	$userName = "4308875";
	$password = "123456";
	$dbName = "CMROP";
	
	// Create connection
	$DBConnect = new mysqli($serverName, $userName, $password);
	
	// Check connection
	if ($DBConnect->connect_error) 
		{
			die("Connection failed: " . $DBConnect->connect_error);
		}

	
	//creating database
	$SQLstring = "CREATE DATABASE $dbName";
	$DBConnect->query($SQLstring);
	//checks whether there's an error creating the database
	// if ($DBConnect->query($SQLstring) === FALSE) 
		// {
			// echo "<font color=green>Database named $dbName created successfully! </font><br>";
			// continue;
		// } 
	// else 
		// {
			// echo "Error creating database: " . $DBConnect->error . "<br>";
		// }
	
	
	// Create connection again after database has been created
	$DBConnect = new mysqli($serverName, $userName, $password, $dbName);
	
	
?>