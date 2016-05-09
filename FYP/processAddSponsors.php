<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Summary</title>

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
</head>


<body>
<!-- The Modal -->
<div id="myModal" class="modal" style="display:block;">

  <!-- Modal content -->
  <div class="modal-content"  style="height:70%;">
    
	<div class="modal-header">
      <span class="close">×</span>
      <h3 style="text-align:center;">Sponsor Registration Summary</h3>
    </div>
    
	<div class="modal-body">
	
	  <?php

if(isset($_POST["submit"]))
	{
		
	/*--------------------------------------------------------------------------------------------------------------*/
	
		$sponsorID = $_POST["spID"];
		$sponsorName = $_POST["spName"];
		$sponsorAmount = $_POST["fAmount"];
		$sponsorPostCode = $_POST["postcode"];
		$sponsorDPDay = $_POST["sDay"];
		$sponsorDPMonth = $_POST["sMonth"];
		$sponsorDPYear = $_POST["sYear"];
		
		$nameIMG = $_FILES["file"]["name"];
		//$size = $_FILES['file']['size']
		//$type = $_FILES['file']['type']

		$tmp_name = $_FILES['file']['tmp_name'];
		$error = $_FILES['file']['error'];

		if (isset ($nameIMG)) 
			{
				if (!empty($nameIMG)) 
					{
						$location = 'Uploads/';
						move_uploaded_file($tmp_name, $location.$nameIMG);
							
					}
			}
			
	/*--------------------------------------------------------------------------------------------------------------*/
		
		echo"<body>

				<div id=\"pricing-table\" class=\"clear\"   >
				<div class=\"plan\" style=\"margin-left: 55%; \"	>
					<h3>$sponsorName<span><img src=\"Uploads/$nameIMG\"></span></h3>
					
					 <ul >
						<li><b>ID:</b> $sponsorID</li>
						<li><b>Amount Paid:</b> RM $sponsorAmount</li>
						<li><b>Date Paid:</b> $sponsorDPDay/$sponsorDPMonth/$sponsorDPYear</li>
						<li><b>Post Code:</b> $sponsorPostCode</li>		
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
	
	/*--------------------------------------------------------------------------------------------------------------*/
	
	include 'dbConnection.php';
	
		$tableName = "Sponsor";
	
		$SQLstring = "CREATE TABLE $tableName
					(
						sponsor_id INT(7) PRIMARY KEY NOT NULL, 
						sponsor_name VARCHAR(50) NOT NULL,
						sponsor_amountpaidinRM INT(12) NOT NULL,
						sponsor_datepaidDay INT(2) NOT NULL,
						sponsor_datepaidMonth VARCHAR(50) NOT NULL,
						sponsor_datepaidYear INT(4) NOT NULL,
						sponsor_postcode VARCHAR(10) NOT NULL,
						sponsor_imagename VARCHAR(50)
					)";
					
								
		//check for table creation errors
		if ($DBConnect->query($SQLstring) === FALSE) 
			{
				echo "Error creating tables: " . $DBConnect->error . "<br>";
			}
	
	
		$DBConnect = new mysqli($serverName, $userName, $password, $dbName);
		$SQLstring = "INSERT INTO $tableName (sponsor_id, sponsor_name, sponsor_amountpaidinRM, sponsor_datepaidDay, sponsor_datepaidMonth, sponsor_datepaidYear, sponsor_postcode, sponsor_imagename)
				  VALUES('$sponsorID', '$sponsorName', '$sponsorAmount','$sponsorDPDay','$sponsorDPMonth','$sponsorDPYear','$sponsorPostCode', '$nameIMG')";
						
		
		//checks if there's any error on adding the values
		if ($DBConnect->query($SQLstring) === FALSE)
			{
				echo "Error creating records: " . $DBConnect->error . "<br>";
			}	
	
		$DBConnect->close();			
	}


?>
    </div>

  </div>

</div>

</body>
</html>
