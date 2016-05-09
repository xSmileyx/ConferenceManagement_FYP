<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Speaker Registration Summary</title>

	<!-- JS dependencies -->
    <script type="text/javascript" src="http://gc.kis.scr.kaspersky-labs.com/1B74BD89-2A22-4B93-B451-1C9E1052A0EC/main.js" charset="UTF-8"></script>
	 <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../FYP/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="../FYP/bootstrap-3.3.6-dist/css/bootstrap.min.css">

	<!-- bootbox code -->
   <script src="bootbox.min.js"></script>
		
	<link rel="stylesheet" type="text/css" href="summaryFormat.css" />
	<style>
	
			body {
				background: #e1c192 url(wood_pattern.jpg);
			}
					
	</style>
		
	<script>
		window.console = window.console || function(t) {};
	</script>

	
	

</head>


<body>
<!-- The Modal -->
<div id="myModal" class="modal" style="display:block; overflow-y:auto;	">

  <!-- Modal content -->
  <div class="modal-content"  style="height:110%;">
    
	<div class="modal-header">
      <span class="close">×</span>
      <h3 style="text-align:center;">Speaker Registration Summary</h3>
    </div>
    
	<div class="modal-body">
	
	  <?php

if(isset($_POST["submit"]))
	{
		
	/*--------------------------------------------------------------------------------------------------------------*/
		$speakerID = $_POST["sID"];
		$speakerFName = $_POST["fName"];
		$speakerLName = $_POST["lName"];
		$speakerOccupation = $_POST["sOccupation"];
		$speakerOrganization = $_POST["sOrganization"];		
		$speakerDegree = $_POST["txtDegree"];
		$speakerMasters = NULL;
		$speakerPHD = NULL;
		$highestLevel = "Degree";
			
		if(isset($_POST["txtMasters"]) == TRUE)
			{
				$highestLevel = "Masters";
				$speakerMasters = $_POST["txtMasters"];
			}
		
		if(isset($_POST["txtPHD"]) == TRUE)
			{
				$highestLevel = "PHD";
				$speakerPHD = $_POST["txtPHD"];
			}
			
		$speakerAddress = $_POST["sAddress"];
		$speakerCountry = $_POST["country"];
		$speakerState = $_POST["state"];
		$speakerCity = $_POST["city"];
		$speakerPostcode = $_POST["postcode"];
		
		
		$nameIMG = $_FILES["file"]["name"];
		//$size = $_FILES['file']['size']
		//$type = $_FILES['file']['type']

		$tmp_name = $_FILES['file']['tmp_name'];
		$error = $_FILES['file']['error'];

		//$imagedata = (binary)file_get_contents($_FILES[$nameIMG][$tmp_name]);
		if (isset ($nameIMG)) 
			{
				if (!empty($nameIMG)) 
					{
						$location = 'Uploads/';
						move_uploaded_file($tmp_name, $location.$nameIMG);
							
					}
			}
			
		//$imagePath = "../FYP/Uploads/$nameIMG";
	/*--------------------------------------------------------------------------------------------------------------*/	
	
		echo"<body>

				<div id=\"pricing-table\" class=\"clear\"   >
				<div class=\"plan\" >
					<h3>$speakerFName $speakerLName<span><img src=\"Uploads/$nameIMG\"></span></h3>
					
					 <ul >
						<li><b>ID:</b> $speakerID</li>
						<li><b>Occupation:</b> $speakerOccupation</li>
						<li><b>Organization:</b> $speakerOrganization</li>
						<li><b>Highest Level of Qualifications:</b> $highestLevel</li>
						<li><b>Degree:</b> $speakerDegree</li>			
						<li><b>Masters:</b> $speakerMasters</li>			
						<li><b>PHD:</b> $speakerPHD</li>			
						<li><b>Address:</b> $speakerAddress</li>			
						<li><b>Country:</b> $speakerCountry</li>			
						<li><b>State:</b> $speakerState</li>			
						<li><b>City:</b> $speakerCity</li>			
						<li><b>Post Code:</b> $speakerPostcode</li>			
						<li><button onclick=\"window.print();\" >Print</button></li>			
					</ul> 
				</div>
				</div>

			  <script src=\"//assets.codepen.io/assets/common/stopExecutionOnTimeout-f961f59a28ef4fd551736b43f94620b5.js\"></script>

				
			  <script>
				  /* original post: http://www.red-team-design.com/css3-pricing-table */
				  //# sourceURL=pen.js
			  </script>

				
			  <script>
				if (document.location.search.match(/type=embed/gi)) 
					{
					  window.parent.postMessage(\"resize\", \"*\");
					}
			  </script>
			
	        </body>";
	}		
	/*--------------------------------------------------------------------------------------------------------------*/
	
		include 'dbConnection.php';
	
		$tableName = "Speaker";
	
		$SQLstring = "CREATE TABLE $tableName
					(
						speaker_id INT(7) PRIMARY KEY NOT NULL, 
						speaker_firstname VARCHAR(50) NOT NULL,
						speaker_lastname VARCHAR(50) NOT NULL,
						speaker_occupation VARCHAR(50) NOT NULL,
						speaker_organization VARCHAR(50) NOT NULL,
						speaker_highestqualifications VARCHAR (50) NOT NULL,
						speaker_degree VARCHAR (50) NOT NULL,
						speaker_masters VARCHAR (50),
						speaker_phd VARCHAR (50),
						speaker_address VARCHAR (50) NOT NULL,
						speaker_country VARCHAR (50) NOT NULL,
						speaker_state VARCHAR (50) NOT NULL,
						speaker_city VARCHAR (50) NOT NULL,
						speaker_postcode VARCHAR (10) NOT NULL,
						speaker_imagename VARCHAR(50)
					)";
									
		//check for table creation errors
		if ($DBConnect->query($SQLstring) == FALSE) 
			{
				echo "Error creating tables: " . $DBConnect->error . "<br>";
			}
	
	
		$DBConnect = new mysqli($serverName, $userName, $password, $dbName);
		$SQLstring = "INSERT INTO $tableName (speaker_id, 
											  speaker_firstname, 
											  speaker_lastname, 
											  speaker_occupation, 
											  speaker_organization,
											  speaker_highestqualifications, 
											  speaker_degree, 
											  speaker_masters, 
											  speaker_phd, 
											  speaker_address, 
											  speaker_country, 
											  speaker_state, 
											  speaker_city, 
											  speaker_postcode,
											  speaker_imagename)
				  VALUES('$speakerID', 
				         '$speakerFName', 
						 '$speakerLName',
						 '$speakerOccupation',
						 '$speakerOrganization',
						 '$highestLevel',
						 '$speakerDegree',
						 '$speakerMasters',
						 '$speakerPHD',
						 '$speakerAddress',
						 '$speakerCountry',
						 '$speakerState',
						 '$speakerCity',
						 '$speakerPostcode',
						 '$nameIMG')";
						

		// checks if there's any error on adding the values
		if ($DBConnect->query($SQLstring) == FALSE)
			{
				echo "Error creating records: " . $DBConnect->error . "<br>";
			}	
				
		$DBConnect->close();			
		
?>
    </div>

  </div>

</div>
<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		// var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		// btn.onclick = function() {
			// modal.style.display = "block";
		// }

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			 window.location.assign("Main.html")
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				window.location.assign("Main.html")
				$('body').fadeOut(1000, newpage);
			}
		}
</script>


</body>
</html>



