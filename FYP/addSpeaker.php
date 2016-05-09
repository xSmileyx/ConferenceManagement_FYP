<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Description: Template for XHTML1.0 Strict with an external CSS -->
<!-- Author: Rayner Paun -->
<!-- Date: 24/3/2016 -->
<!-- Validated: 24/3/2016 -->

<head>
	<title>Add Speaker</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="author" content="Rayner Paun" />
	<meta name="description" content="The home page of the CMROP." />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://lab.iamrohit.in/js/location.js"></script>
	
	<script>
		//this function is to enable the selection of food and quantity once the checkbox is ticked
		function enableObject(object) { eval(object + ".disabled = false"); }
							
		//this function is to disable the selection of food and quantity if the checkbox is not ticked
		function disableObject(object) { eval(object + ".disabled = true"); }

		//this function is to control which checkbox is ticked/not ticked to be enabled/disabled respectively
		function toggleForm(form, checkObject, objectStr) 
				{
					var checked = eval(form + "." + checkObject + ".checked");
					var object = objectStr.split(",");
								
						for (i = 0; i < object.length; i++)
							{
								object[i] = form + "." + object[i];
							}
									
						if (checked == false) 
							{
								for (i = 0; i < object.length; i++) 
									{
										disableObject(object[i]);
									}
							}
						else 
							{
								for (i = 0; i < object.length; i++) 
									{
										enableObject(object[i]);
									}
							}
				}
		</script>
	
	<link rel="stylesheet" type="text/css" href="format.css" />
	<style>
			body {
				background: #e1c192 url(wood_pattern.jpg);
			}
		</style>
<head>

<body>

<div id="container">
	<div id="header">
		<img src="FYPbanner.jpg" width="100%" height="300" border="0" />
		<ul id = "nav">
		  <li><a href="Main.html">Home</a></li>
		  <li><a href="addSpeaker.php">Add Speaker</a></li>
		  <li><a href="addSponsors.php">Add Sponsors</a><li>
		  <li><a href="addConference.php">Add Conference</a></li>
		  <li><a href="addSession.php">Add Session</a></li>
		  <li><a href="addCaterer.php">Add Caterer</a><li>
		  <li><a href="Login.php"></span> Logout</a></li>
		 </ul>
		<br>
	</div>

	<div id="body">
		<form action="processAddSpeaker.php" method="post" name="sForm" id="speakerForm" enctype="multipart/form-data">
		
		Speaker ID:
				<input type="text" id="sID" name="sID" value="<?php 
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
		
		First Name:<br>
			<input type="text" name="fName" id="fName" autocomplete=off required><br><br>
		
		Last Name:<br>
			<input type="text" name="lName" id="lName" autocomplete=off required><br><br>
			
		Speaker picture:<br>
			<input type='file' name="file"/><br><br>
			<img id="myImg" name="myImg" style="width:84%; border: 1px solid #888;" />
			<br><br>
			<script>
			$(function () {
				$(":file").change(function () {
					if (this.files && this.files[0]) {
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
					}
				});
			});

			function imageIsLoaded(e) {
				$('#myImg').attr('src', e.target.result);
			};
			</script>
		<!--Title:<br>
			<input type="text" name="sTitle" id="sTitle" autocomplete=off><br><br>-->
			
		Occupation:<br>
			<input type="text" name="sOccupation" id="sOccupation" autocomplete=off required><br><br>
			
		Organization:<br>
			<input type="text" name="sOrganization" id="sOrganization" autocomplete=off required><br><br>
			
		Qualifications:<br>
			<input type="checkbox" name="cbDegree" value="cbDegree" onclick="toggleForm('document.sForm','cbDegree','txtDegree')">
			Degree:<br>
			<input type="text" name="txtDegree" autocomplete=off disabled="true"><br>
			
			<input type="checkbox" name="cbMasters" value="cbMasters" onclick="toggleForm('document.sForm','cbMasters','txtMasters')">
			Masters:<br>
			<input type="text" name="txtMasters" autocomplete=off disabled="true"><br>
			
			<input type="checkbox" name="cbPHD" value="cbPHD" onclick="toggleForm('document.sForm','cbPHD','txtPHD')">
			PHD:<br>
			<input type="text" name="txtPHD" autocomplete=off disabled="true"><br><br>
			
		Address:<br>
			<textarea name="sAddress" id="sAddress" autocomplete=off required></textarea><br><br>
			
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
		    <input type="text" name="postcode" id="postcode" maxlength="5" autocomplete=off required><br><br>
			
			<input type="submit" name="submit" value="Add" onclick="clicked(event);">
			<input type="reset" name="reset" value="Clear"><br>
			
			
			<script type="text/javascript">
			
			function clicked(e)
				{
					if(!confirm('Are you sure?'))e.preventDefault();
				}
			</script>
				
		</form>
	</div>

	
	<div id="footer">	
		<hr>
			<p>Created by: Rayner Paun<br>
			Student ID: 4308875<br>
			Email Address: <a href="mailto:4308875@students.swinburne.edu.my">
			4308875@students.swinburne.edu.my</a></p>
	</div>
<div>

</body>


</html>
