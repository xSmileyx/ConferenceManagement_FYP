<?php

if(isset($_POST["submit"]))
	{
		
		//the variables are initialized and retrieved AFTER the submit button is clicked
		$username = $_POST["user"];
		$password = $_POST["password"];

		validateInput($username,$password); //calling the function
		
	}
	
function validateInput($user,$pass)
	{
		if(empty($user) && empty($pass))//checks if both text field in empty
			{
				echo "<font color=red>Do not leave any of the fields empty!</p>";	
			}
		else if(($user !== "admin") || ($pass !== "1234567"))
			{
				header("Location: Login.php");
				echo '<script language="javascript">';
				echo 'alert("message successfully sent")';
				echo '</script>';
				exit();
				
				//echo "<font color=red>Wrong username or password!</p>";	
			}
		else if(($user == "admin") && ($pass == "1234567"))
			{
				//echo "<font color = green><p>Thank you, you have key in the same email address and using the correct format";
				header('Location: Main.html');
				exit;
			}
			
		
	}

?>