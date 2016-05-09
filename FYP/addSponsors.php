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
	
	<script>
	
			function loadYear()
							{
								var startyear = 2000;
								var endyear = 2030;
								
								for (var i = startyear;i<=endyear;i++)
									{
										node=document.createElement("Option");
										textnode=document.createTextNode(i);
										node.appendChild(textnode);
										document.getElementById("yearselect").appendChild(node);
									}
							}
							
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

<body onload="loadYear()">

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
	
	<div id="body" >
		<form action="processAddSponsors.php" method="post" name="spForm" enctype="multipart/form-data">
			
			Sponsor ID:
				<input type="text" id="spID" name="spID" value="<?php 
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
				
			Name:<br>
				<input type="text" name="spName" id="spName" autocomplete=off required><br><br>
				
			Sponsor banner/logo:<br>
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
			
			Amount(RM):<br>
				<input type="number" name="fAmount" id="fAmount" step="0.05" autocomplete=off required><br><br>
				
				
			Postcode:<br>
				<input type="text" name="postcode" id="postcode" maxlength="5" autocomplete=off required><br><br>				
			
				Date Paid:<br>
				Day:
				<!-- Month dropdown -->
				<select name="sDay" id="day" onchange="" size="1" autocomplete=off>
					<option value="01" selected>01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
			Month:
				<!-- Month dropdown -->
				<select name="sMonth" id="month" onchange="" size="1" autocomplete=off>
					<option value="January"selected>January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
				
			Year:
				<select name="sYear" id="yearselect" size="1" autocomplete=off></select><br><br>
				
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
	
</div>

</body>
</html>