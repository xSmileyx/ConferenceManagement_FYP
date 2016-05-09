<?php 
if(isset($_POST['submit'])) 
{ 
    foo(); 
}
	
	function foo()
	{
		$input = $_POST["numI"];


		for($i = 1; $i <= $input; $i++)
			{
				echo "Speaker $i: ";
				//echo "<input type=\"text\" name=\"speaker[$i]\" value=\"\"/>";
				
				echo "<select name=\"ssSpeaker[$i]\" id=\"ssSpeaker[$i]\" autocomplete=off>";
				$conn = new mysqli('localhost', '4308875', '123456', 'CMROP') or die ('Cannot connect to db');
				$result = $conn->query("SELECT speaker_id, speaker_firstname,speaker_lastname  FROM Speaker"); 
				
				while ($row = $result->fetch_assoc())
					{
						unset($id, $name);
						$id = $row['speaker_id'];
						$fname = $row['speaker_firstname']; 
						$lname = $row['speaker_lastname']; 
						echo '<option value="'.$id.'">'.$fname. ' ' .$lname. '</option>';
					}
					
				echo "</select>";
				echo "<br><br>";

				
			}
	}
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Description: Template for XHTML1.0 Strict with an external CSS -->
<!-- Author: Rayner Paun -->
<!-- Date: 24/3/2016 -->
<!-- Validated: 24/3/2016 -->

<head>
	<title>Add Session</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="author" content="Rayner Paun" />
	<meta name="description" content="The home page of the CMROP." />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="loginForm.js"></script>
	<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
	<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
	<script>
	
			function loadYear()
							{
								var startyear = 2016;
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
	<script>
$(document).ready(function(){
    $("p").click(function(){
        $(this).hide();
    });
});

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
		<form action="processAddSession.php" method="post" name="ssForm">
		
		Session ID:
				<input type="text" id="ssID" name="ssID" value="<?php 
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
				
		Start Time:
		<input type="text" id="sTime"  autocomplete=off>
		<script>
			var timepicker = new TimePicker('sTime');
		
			timepicker.on('change', function(evt) 
								{ 
								  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
								  evt.element.value = value;
								});
					
		</script>
		<br><br>
		Duration:<br>
		Hours: <input type="number" id="dHours" autocomplete=off>
		Minutes: <input type="number" id="dMinutes" step="5" max="60" autocomplete=off>
		<br><br>
			

	<form action="addSession.php" method="post">
   
	
		Number of speakers: <input type="number"  name="numI" autocomplete=off placeholder="enter number">

			<input type="button" name="submit" value="Submit">
		<br><br>
																							
																									
		Room:
			<select name="ssRoom" id="ssRoom" onchange="" size="1" autocomplete=off>
					<option value="00" selected>--</option>
					<option value="01">Room 1</option>
					<option value="02">Room 2</option>
					<option value="03">Room 3</option>
			</select>
			<br><br>
				
		<input type="submit" name="submit" value="Add">
		<input type="reset" name="reset" value="Clear"><br>

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