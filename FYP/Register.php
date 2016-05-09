<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Description: Template for XHTML1.0 Strict with an external CSS -->
<!-- Author: Rayner Paun -->
<!-- Date: 24/3/2016 -->
<!-- Validated: 24/3/2016 -->

<head>
	<title>Registration</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="author" content="Rayner Paun" />
	<meta name="description" content="The home page of the CMROP." />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://lab.iamrohit.in/js/location.js"></script>
	<script type="text/javascript">document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");</script>
	<script src="loginForm.js"></script>
	<link rel="stylesheet" type="text/css" href="format.css" />
	<!-- <link rel="stylesheet" type="text/css" href="Login.css" /> -->
	<style>
			body {
				background: #e1c192 url(wood_pattern.jpg);
			}
		</style>
</head>

<img src="FYPbanner.jpg" width="100%" height="300" border="0" />
<ul>
    
 </ul>
<br>

<form>
<h2>Personal Details</h2>

	Participant ID:
					<input type="text" id="pID" name="pID" value="<?php 
						$rCode = mt_rand(1000001,9999999);//this will generate 7 random numbers
						
							//opens a file or create a file if it doesnt exist
							$purchaseFile = fopen("../FYP/tempDatabase.txt", "a+");
							
							//initialize the relative path of the text file
							$lFile ="../FYP/tempDatabase.txt";
							
							// Store false when the random numbers does not match
							$found = false;
							
							if (file_exists($lFile))//checks if file exists at the path given
								{
									$lines = fgets($purchaseFile);//reads all the lines of the text file
									
									//this while loop is make sure that it will generate a new random number if it found any matches within the text file
									while(strpos($lines, $rCode) !== false)
												{
													$found = true;
													$rCode = mt_rand(1000001,9999999);
													echo $rCode;
													break;
												}
										
									//echo the initial random numbers if it doesn't found any matches within the text file
									if(!$found)
										{
											echo $rCode;
										}									
								}
							else 
								{
									 echo "<font color=red><p>The file does not exist</p>";
								}					
						//closes the text file after writing and reading it
						fclose($purchaseFile);
						
						
					?>" maxlength="7" size="7" READONLY> 
					<br>
	  First name:<br>
	  <input type="text" name="firstname" autocomplete=off><br><br>
	  Last name:<br>
	  <input type="text" name="lastname" autocomplete=off><br><br>
	  IC/Passport:<br>
	  <input type="text" name="icPass" autocomplete=off><br><br>
	  Address:<br>
	  <textarea name="address" autocomplete=off></textarea><br><br>
	  User name:<br>
	  <input type="text" name="username" autocomplete=off><br><br>
	  User password:<br>
	  <input type="password" name="psw" autocomplete=off><br><br>
	  Email:<br>
	  <input type="text" name="email" autocomplete=off><br><br>
	  Phone Number:
	  <input type="text" name="pNumber" autocomplete=off>
	  <br><br>
</form>
<br>

<form>
  <h2>Billing Information</h2>
	  Full Name:<br>
	  <input type="text" name="billingName" autocomplete=off><br><br>
	  Address:<br>
	  <textarea name="billingAddress" autocomplete=off></textarea><br><br>
	  
	  Country:<br>
	  <select name="country" class="countries" id="countryId">
	  <option value="">Select Country</option>
	  </select><br><br>
	  
	  State:<br>
	  <select name="state" class="states" id="stateId">
	  <option value="">Select State</option>
	  </select><br><br>
	  
	  City:<br>
	  <select name="city" class="cities" id="cityId">
	  <option value="">Select City</option>
	  </select><br><br>
	  
	  Postcode:<br>
	  <input type="text" name="postcode" id="postcode" maxlength="5" autocomplete=off><br><br>
	  
	  <input type="checkbox" name="newsletter" value="newsletter"> Subscribe to newsletter<br>	  
	  <input onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms" type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
	  
	  <input type="button" onclick="history.go(-1)" value="Back" name="back">
	  <input type="submit" value="Submit" name = "submit">
	  <button type="reset" value="Reset" name="reset">Reset</button>
  
</form>

</body>


</html>