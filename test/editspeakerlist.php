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
<title>Conference management system</title>
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
      <h1><a href="index.html">Conference management system</a></h1>
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
<!-- End Top Background Image Wrapper -->

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->

    <div class="content"> 

      <div class="scrollable">
      <?php
include 'dbconnection.php';

$query="SELECT * FROM tblspeaker" ;

$executeQuery=mysql_query($query);

if (!$executeQuery)
{
 die ('Could not connect'.mysql_error());
}
$query_info=mysql_query($query) or die(mysql_error());
$query_info_count=mysql_num_rows($query_info);


echo '<h2 style="color: blue;font-family: arial" align=center>List of speakers</h2>';


echo '<table border=0  table id=table1 align=center cellspacing="10px">';
echo '<tr>';
echo '<td>Speaker ID &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Speaker First name &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Speaker Last name &nbsp;&nbsp;&nbsp;</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
	
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo "<td><form method='post' action='edit_speaker.php'><input type='hidden' name='speaker_id' value='".$row[0]."'><input type='submit' class='button' value='Edit'></form></td>";
echo '</tr>';
}
echo '</table>';

?>
<?php
// close connection
mysql_close();
?>
        
      </div>
      <div id="comments"></div>
        
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
    <div class="sidebar one_quarter"> 

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