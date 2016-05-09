<?php

if(isset($_POST["submit"]))//checks if the submit button is selected
	{
		if(empty($_POST["title"]) || empty($_POST["desc"]) || empty($_POST["location"]) || empty($_POST["price"])
			{
					echo "<font color=red><p>There seems to be empty fields!</p>";
			}
		else
			{
			
				$id = $_POST["cID"];
				$title = $_POST["title"];
				$sDay = $_POST["sDay"];
				$sMonth = $_POST["sMonth"];
				$sYear = $_POST["sYear"];
				$eDay = $_POST["eDay"];
				$eMonth = $_POST["eMonth"];
				$eYear = $_POST["eYear"];
				$desc = $_POST["desc"];
				$location = $_POST["location"];
				$speaker = $_POST["formSpeaker"];		
				//$image = $_POST["fileToUpload"];
				
				if(isset($_POST["western"]))
					{
						$western = $_POST["western"];
					}
				if(isset($_POST["local"]));
					{
						$local = $_POST["local"];
					}
				if(isset($_POST["vegetarian"]))
					{
						$vege = $_POST["vegetarian"];
					}
				if(isset($_POST["desserts"]))
					{
						$desserts = $_POST["desserts"];
					}
					
				$sessNum = $_POST["session"];
				$price = $_POST["price"];
				
				if(isset($_POST["eb"]) || !empty($_POST["earlybird"])
					{
						$ebPrice = $_POST["earlybird"];
					}
				else
					{
						echo "<font color=red><p>There seems to be empty fields!</p>";
					}
				
				if(isset($_POST["paypal"]))
					{
						$paypal = $_POST["paypal"];
					}
				if(isset($_POST["card"]))
					{
						$card = $_POST["card"];
					}
					
				$extra = $_POST["extra"];
						 
				//initialising the server name, username, password, database name for connection as well as the table name for queries
				$serverName = "localhost";
				$userName = "4308875";
				$password = "123456";
				$dbName = "studentDB";
				//$tableName = "Conference";
				
				// Create connection
				$conn = new mysqli($serverName, $userName, $password, $dbName);
				
				// create table conference and its attributes
				$tConference = "CREATE TABLE Conference
				(
					cID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
					cTitle VARCHAR(50) NOT NULL,
					/*cBanner VARCHAR(50) NOT NULL,*/
					sDate_Day INT(2) NOT NULL,
					sDate_Month INT(2) NOT NULL,
					sDate_Year INT(4) NOT NULL,
					eDate_Day INT(2) NOT NULL,
					eDate_Month INT(2) NOT NULL,
					eDate_Year INT(4) NOT NULL,
					cDesc VARCHAR(50) NOT NULL,
					cLocation VARCHAR(50) NOT NULL,
					cSpeaker VARCHAR(50) NOT NULL,
					cfsWestern VARCHAR(50),
					cfsLocal VARCHAR(50),
					cfsVegetarian VARCHAR(50),
					cfsDesserts VARCHAR(50),
					numSession INT(2) NOT NULL,
					cPrice INT(4) NOT NULL,
					cEarlyBird INT(4) NOT NULL,
				)";
			
			}
	}
		
	
?>