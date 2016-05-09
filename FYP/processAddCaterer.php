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
	
		$catererID = $_POST["ctID"];
		$catererName = $_POST["ctName"];
		$catererEmail = $_POST["ctEmail"];
		$catererPhoneNum = $_POST["ctPhone"];
		$catererFoodType = "";
		
		if(isset($_POST["ctLocal"]) == TRUE)
			{
				$catererFoodType = $_POST["ctLocal"];
			}
		
		if(isset($_POST["ctWestern"]) == TRUE)
			{
				$catererFoodType  = $_POST["ctWestern"];
			}
		
		if(isset($_POST["txtOthers"]) == TRUE)
			{
				$catererFoodType  = $_POST["txtOthers"];
			}
		
	/*--------------------------------------------------------------------------------------------------------------*/	
	
		echo"<body>

				<div id=\"pricing-table\" class=\"clear\"   >
				<div class=\"plan\" style=\"margin-left: 55%; \"	>
					<h3>$catererName<span></span></h3>
					
					 <ul >
						<li><b>ID:</b> $catererID</li>
						<li><b>Type of food served:</b> $catererFoodType </li>
						<li><b>Email:</b> $catererEmail</li>		
						<li><b>Phone Number:</b> $catererPhoneNum</li>		
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
	
		$tableName = "Caterer";
	
		$SQLstring = "CREATE TABLE $tableName
					(
						caterer_id INT(7) PRIMARY KEY NOT NULL, 
						caterer_name VARCHAR(50) NOT NULL,
						caterer_foodtype VARCHAR(50) NOT NULL,
						caterer_email VARCHAR(50) NOT NULL,
						caterer_phonenumber VARCHAR(50) NOT NULL
					)";
					
								
		//check for table creation errors
		if ($DBConnect->query($SQLstring) === FALSE) 
			{
				echo "Error creating tables: " . $DBConnect->error . "<br>";
			}
	
	
		$DBConnect = new mysqli($serverName, $userName, $password, $dbName);
		$SQLstring = "INSERT INTO $tableName (caterer_id, caterer_name, caterer_foodtype, caterer_email, caterer_phonenumber)
				  VALUES('$catererID', '$catererName', '$catererFoodType','$catererEmail','$catererPhoneNum')";
						
		
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
</script>


</body>
</html>
