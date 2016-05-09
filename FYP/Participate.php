<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Description: Template for XHTML1.0 Strict with an external CSS -->
<!-- Author: Rayner Paun -->
<!-- Date: 24/3/2016 -->
<!-- Validated: 24/3/2016 -->

<head>
	<title>Participate!</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="author" content="Rayner Paun" />
	<meta name="description" content="The home page of the CMROP." />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places"></script>
	<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	<script src="loginForm.js"></script>
	
	<link rel="stylesheet" type="text/css" href="format.css" />
	
	<script type="text/javascript">
	function showSelected(val)
		{
			var venue;
			var date;
			
			if(val == 00)
				{
					venue = "Please select a conference!";
					date = "Please select a conference!";
					document.getElementById("map").style.visibility = "none";
					
				}
			else if( val == 01)
				{
					venue = "Sabah Trade Center, Kota Kinabalu, Sabah, Malaysia";
					date = "June 18, 2016 - June 19, 2016";
				
				}
			else if( val == 02)
				{
					venue = "Borneo Convention Center Kuching, Kuching, Sarawak, Malaysia";
					date = "July 9,  2016 - July 10, 2016";					 
				}
			else if( val == 03)
				{
					venue = "Kuala Lumpur Convention Centre, Kuala Lumpur, Malaysia";
					date = "June 4, 2016"						
				}
			
				
			document.getElementById("pac-input").value = venue;
			document.getElementById("showDate").innerHTML = date;
			document.getElementById("showVenue").innerHTML = venue;
			
			<!-- document.getElementById ('selectedResult').innerHTML = "The selected number is - " + val; -->
		}
		
		function toggle(bool) 
			{
				document.getElementById("fqtName").disabled = bool;
				document.getElementById("fqnAmount").disabled = bool;
			}
			
    </script>
	
	<style>
			body {
				background: #e1c192 url(wood_pattern.jpg);
			}
		</style>		
</head>

<body onload="loadYear()">
<div id="container">
	<div id="header">
		<img src="FYPbanner.jpg" width="100%" height="300" border="0" />
		<ul id = "nav">
		  <li><a href="pMain.html">Home</a></li>
		  <li><a href="Participate.php">Participate!</a></li>
		  <li><a href="Login.php"></span> Logout</a></li>
		 </ul>
		<br>
	</div>

	<div id="body">
		<form action="processParticipation.php" method="post" name="pForm" id="participation">
		Hello Mr. Samu!
		<br><br>
		
		Choose upcoming conference:
			<select name="pConference" id="pConference" onchange='showSelected(this.value)' size="1" autocomplete=off>
					<option value="00"selected>--</option>
					<option value="01">RW- International Conference on Power Control and Embedded System (ICPCES)</option>
					<option value="02">ISERD - 47th International Conference on Chemical and Biochemical Engineering (ICCBE)</option>
					<option value="03">The IIER-63rd International Conference on Recent Advances in Medical Science (ICRAMS)</option>
				</select><br><br>
			
			Venue: <div id='showVenue'></div>
			
			<!--Google Map<input type="checkbox" name="sLocation" id="searchLocation" value="sl" autocomplete=off><br>-->
			
			<input id="pac-input" class="controls" type="text" placeholder="Search Box" autocomplete=off>
			<div id="map"></div>
			<script>
			function initAutocomplete() 
			{
				var map = new google.maps.Map(document.getElementById('map'), {
				  center: {lat: -33.8688, lng: 151.2195},
				  zoom: 16,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				var infoWindow = new google.maps.InfoWindow({map: map});

				
				// Try HTML5 geolocation.
				if (navigator.geolocation) {
				  navigator.geolocation.getCurrentPosition(function(position) {
					var pos = {
					  lat: position.coords.latitude,
					  lng: position.coords.longitude
					};

					infoWindow.setPosition(pos);
					infoWindow.setContent('Location found!');
					map.setCenter(pos);
				  }, function() {
					handleLocationError(true, infoWindow, map.getCenter());
				  });
				} else {
				  // Browser doesn't support Geolocation
				  handleLocationError(false, infoWindow, map.getCenter());
				}
			  


				// Create the search box and link it to the UI element.
				var input = document.getElementById('pac-input');
				var searchBox = new google.maps.places.SearchBox(input);
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

				// Bias the SearchBox results towards current map's viewport.
				map.addListener('bounds_changed', function() {
				  searchBox.setBounds(map.getBounds());
				});

				var markers = [];
				// Listen for the event fired when the user selects a prediction and retrieve
				// more details for that place.
				searchBox.addListener('places_changed', function() {
				  var places = searchBox.getPlaces();

				  if (places.length == 0) {
					return;
				  }

				  // Clear out the old markers.
				  markers.forEach(function(marker) {
					marker.setMap(null);
				  });
				  markers = [];

				  // For each place, get the icon, name and location.
				  var bounds = new google.maps.LatLngBounds();
				  places.forEach(function(place) {
					var icon = {
					  url: place.icon,
					  size: new google.maps.Size(71, 71),
					  origin: new google.maps.Point(0, 0),
					  anchor: new google.maps.Point(17, 34),
					  scaledSize: new google.maps.Size(25, 25)
					};

					// Create a marker for each place.
					markers.push(new google.maps.Marker({
					  map: map,
					  icon: icon,
					  title: place.name,
					  position: place.geometry.location
					}));

					if (place.geometry.viewport) {
					  // Only geocodes have viewport.
					  bounds.union(place.geometry.viewport);
					} else {
					  bounds.extend(place.geometry.location);
					}
				  });
				  map.fitBounds(bounds);
				});
			}
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places&callback=initAutocomplete" async defer></script>
		<br>
			Date: <div id='showDate'></div>
		<br>
		Are you receiving or do you hope to receive any financial assistance from the organizers of the Conference / other organisation?<br>
			<input type="radio" name="fqrOne" onclick="toggle(false)" value="Yes" autocomplete=off>Yes
			<input type="radio" name="fqrOne" onclick="toggle(true)" value="No" autocomplete=off>No
			<br><br>
		 
		If yes, specify the name of the organization and the amount.<br>
			Name: <input type="text" name="fqtName" id="fqtName" autocomplete=off disabled><br>
			Amount(RM): <input type="number" name="fqnAmount" id="fqnAmount" step="0.01" maxwidth="" autocomplete=off disabled><br><br>
			
		Description of Conference Participation (tick wherever necessary):<br>
			<input type="checkbox" name="fqcbDesc1" id="fqcbDesc1" autocomplete=off>Presenting a paper<br>
			<input type="checkbox" name="fqcbDesc1" id="fqcbDesc2" autocomplete=off>Presenting a keynote or invited address<br>
			<input type="checkbox" name="fqcbDesc2" id="fqcbDesc3" autocomplete=off>Chairing a session<br>
			<input type="checkbox" name="fqcbDesc3" id="fqcbDesc4" autocomplete=off>Participating in a symposium<br><br>
			
		Payment Method:
			<select name="pMethod" id="pMethod" autocomplete=off>
				<option value="00"selected>--</option>
				<option value="01">Paypal</option>
				<option value="02">Visa/Mastercard</option>
			</select>
			<br><br>
			
		Do you require accommodation?<br>
			<input type="radio" name="fqrTwo" id="accoYes" value="Yes" autocomplete=off>Yes
			<input type="radio" name="fqrTwo" id="accoNo" value="No" autocomplete=off>No
			<br><br>	
		
		<script type="text/javascript">
				$('input[type="radio"]').click(function(){
					if($(this).attr("id")=="accoNo"){
						$("#hotelBookings").hide('slow');
					}
					if($(this).attr("id")=="accoYes"){
						$("#hotelBookings").show('slow');

					}        
				});
			$('input[type="radio"]').trigger('click');
		</script>
		
		<div id="hotelBookings">
		Please select your hotel guide:
			<a target="_blank" href="https://www.tripadvisor.com.my/Hotels-g298309-Kuching_Sarawak-Hotels.html" id="taLink"><br>
			<img src="https://www.tripadvisor.com/img/cdsi/img2/branding/socialWidget/64x64_white-21690-2.png" id="taImage"/></a>
		</div>
<br>
		
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