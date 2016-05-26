<?php
	include 'dbconnection.php';
?>
<!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-user"></i> <a href="#">Register</a></li>
        <li><i class="fa fa-sign-in"></i> <a href="#">Login</a></li>
      </ul>
    </div>
    <div class="fl_right">

    </div>
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="../index.html">Conference management system</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="dashboard.html">Home</a></li>

        <li><a class="drop" href="#">Conference</a>
          <ul>
            <li><a href="add_conference.php">Add conference</a></li>
			<li><a href="deleteconferencelist.php">Delete conference</a></li>
			<li><a href="editconferencelist.php">Edit conference</a></li>
			<li><a href="add_confspeaker.php">Add conference speaker</a></li>
			<li><a href="add_confsponsor.php">Add conference sponsor</a></li>
			<li><a href="add_passtype.php">Add pass type</a></li>
			<li><a href="add_session.php">Add session</a></li>
			<li><a href="add_session.php">Misc</a>
				<ul>
					<li><a href="delete_confspeaker.php">Delete conference speaker</a></li>
					<li><a href="delete_confsponsor.php">Delete conference sponsor</a></li>
				</ul>
			</li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Speaker</a>
          <ul>
            <li><a href="add_speaker.php">Add Speaker</a></li>
			<li><a href="deletespeakerlist.php">Delete Speaker</a></li>
			<li><a href="editspeakerlist.php">Edit Speaker</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Caterer</a>
          <ul>
            <li><a href="add_caterer.php">Add Caterer</a></li>
			<li><a href="deletecatererlist.php">Delete Caterer</a></li>
			<li><a href="editcatererlist.php">Edit Caterer</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Sponsor</a>
          <ul>
            <li><a href="add_sponsor.php">Add Sponsor</a></li>
			<li><a href="deletesponsorlist.php">Delete Sponsor</a></li>
			<li><a href="editsponsorlist.php">Edit Sponsor</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Venue</a>
          <ul>
            <li><a href="add_venue.php">Add Venue</a></li>
			<li><a href="deletevenuelist.php">Delete Venue</a></li>
			<li><a href="editvenuelist.php">Edit Venue</a></li>
		  </ul>
		</li>
		<li>
		<li><a class="drop" href="#">Reports</a>
          <ul>
            <li><a href="viewconfdetails.php">View conference details</a></li>
			<li><a href="viewcaterer.php">View caterers</a></li>
			<li><a href="viewconference.php">View Conferences</a></li>
			<li><a href="viewsponsors.php">View sponsors</a></li>
			<li><a href="viewspeaker.php">View speakers</a></li>
			<li><a href="viewvenues.php">View venues</a></li>
			<li><a href="viewconfparticipant.php">View conference participant</a></li>
		  </ul>
        </li>
      </ul>
    </nav>
  </header>
</div>
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('images/demo/backgrounds/01.png');"> 
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
    </div>
  </div>
</div>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">
 <div id="box">
	<div id="addconference">
    <h1 align="center">Add Conference</h1>
    </br>
    	<form action="addconference.php" method="post" name="addconference">
        <table align="center">
        	<tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td colspan="2"><input type="text" name="conf_name" class="twitter" placeholder="Enter conference name" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference start date</p></td>
                <td colspan="2"><input type="date" name="conf_startdate" class="twitter" placeholder="Format: YYYY/MM/DD" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Conference end date</p></td>
                <td colspan="2"><input type="date" name="conf_enddate" class="twitter" placeholder="Format: YYYY/MM/DD" required /></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Number of pass</p></td>
                <td colspan="2"><input type="number" name="conf_numpass" class="twitter" placeholder="number of passes" required /></td>
            </tr>
                
            <tr>
            	<td align="left" valign="middle"><p>Caterer id</p></td>
                <td width="80">	     
                 <?php
					$query = "SELECT caterer_id from tblcaterer ";
					$result = mysql_query($query);
					echo "<select name='caterer_id'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['caterer_id']."'>".$row['caterer_id']."</option>";
					}
					echo "</select>";
				?>
                </td>
                <td><a href="viewcaterer.php" target="_blank">Caterer list</a></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Venue id</p></td>
                <td>
                <?php
					$query = "SELECT venue_id from tblvenue ";
					$result = mysql_query($query);
					echo "<select name='venue_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['venue_id']."'>".$row['venue_id']."</option>";
					}
					echo "</select>";
				?>
                </td>
                <td><a href="viewvenues.php" target="_blank">Venue list</a></td>
            </tr>
            <tr>
            	<td align="left" valign="middle"><p>Event manager ID</p></td>
                <td colspan="2">
                <?php
					$query = "SELECT em_id from tbleventmanager ";
					$result = mysql_query($query);
					echo "<select name='em_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['em_id']."'>".$row['em_id']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
            <tr>
            	<td align="left" valign="top"><p>Conference description</p></td>
            	<td colspan="2"><textarea name="conf_details" rows="5" cols="30"></textarea></td>   
            </tr>  
            <tr align="left">
                    <td></td>
                	<td><input type="submit" name="submit" class="button" value="Submit"/></td>
					<td align="right"><input type="reset" name="reset" class="button" value="Clear"/></td>
			</tr>        
        </table>
        </form>
    </div>
</div>
      </div>
      <div id="comments">
        
      </div>
    </div>
        <div class="sidebar one_quarter"> 
      <h6>Quick Links</h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="add_conference.php">Add conference</a></li>
          <li><a href="add_speaker.php">Add speaker</a></li>
		  <li><a href="add_session.php">Add session</a></li>
		  <li><a href="viewconfdetails.php">View conference details</a></li>
        </ul>
      </nav>
      <div class="sdb_holder">
        
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h2 class="heading">Final Year Presentaion</h2>
      <p>Team members</p>
    </div>
    <div class="one_quarter first">
      <h6 class="title">Samu Pillai Sadeiyen</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Rayner Paun</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ch’ng Chuan Way</h6>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Samuel Hii Tuan Ong</h6>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>