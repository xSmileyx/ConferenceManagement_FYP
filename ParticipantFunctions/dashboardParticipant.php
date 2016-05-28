<?php
	include('config.php');
	session_start();//start session
	$logUser = $_SESSION["log_user"];
	$logID = $_SESSION["log_id"];
	$logFirstName = $_SESSION["log_firstname"];
	$logSurName = $_SESSION["log_surname"];
	$logEmail = $_SESSION["log_email"];
	$logPhone = $_SESSION["log_phone"];
	$logCountry = $_SESSION["log_country"];
	
	//configuration script
	include ('config.php');
	
	if(!isset($_SESSION['log_user']) && !isset($_SESSION["log_id"]) && !isset($_SESSION["log_firstname"]) && !isset($_SESSION["log_surname"]))//checked if session variable is not destroyed/unset
		{
			header("location: Login.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}
		

	
	// if(($_SESSION["sponsor_name"] != NULL) && ($_SESSION["sponsor_amount"] != NULL))
		// {
			// $sponsored = $_SESSION["sponsor_name"];
			// $sponsorAmt = $_SESSION["sponsor_amount"];
		// }
	
?>	<!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace inline pushright">
	  		<li><i class="fa fa-sign-in"></i> <a href="Logout.php">Log out</a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="faico clear">
      </ul>
    </div>

  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
       <h1><a href="../test/dashboardParticipant.php">Conference management system</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        
        <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConf.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Cancel Participation & Booking</a></li>
		<li><a href="Feedback.php">Provide Feedback</a>
		<li><a  href="Enquiries.php">Send Enquiries</a></li>	

      </ul>
    </nav>
  
  </header>
</div>

<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('images/demo/backgrounds/01.png');"> 
 
  <div class="wrapper">
    <article id="pageintro" class="hoc clear"> 
   
      <h2 class="heading"></h2>
      <p></p>
      <footer></footer>

    </article>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="one_half first"><img class="inspace-10 borderedbox" src="images/demo/480x480.png" alt=""></div>
    <div class="one_half"><br>
      <h2 class="heading">Autism Awareness Conference</h2>
	  <p> “What would happen if the autism gene was eliminated from the gene pool? You would have a bunch of people standing around in a cave, chatting and socializing and not getting anything done,” Dr. Temple Grandin</p>
	  <p>Come join us for the Autism Awareness conference to learn more about the subject</p>
      <p>Our goal is simple: To improve the lives of everyone on the autism spectrum and their families.</p>
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/02.png');">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h2 class="heading">Key Speakers</h2>
      <p>Ridiculus mus phasellus condimentum sapien in iaculis laoreet vivamus condimentum ultricies felis et cursus dolor.</p>
    </div>
    <article class="one_third first"><a href="#"><img class="borderedbox inspace-10 btmspace-30" src="images/demo/barry.png" alt=""></a>
      <h2 class="heading font-x1">Dr. Barry Prizant</h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a href="#"><img class="borderedbox inspace-10 btmspace-30" src="images/demo/michel.png" alt=""></a>
      <h2 class="heading font-x1">Michael John Carley</h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a href="#"><img class="borderedbox inspace-10 btmspace-30" src="images/demo/temple.png" alt=""></a>
      <h2 class="heading font-x1">Temple Grandin, Ph.D</h2>
      <p class="btmspace-30"></p>
    </article>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <article class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="one_half first"><img src="images/demo/bg.jpg" alt=""></div>
    <div class="one_half">
      <h2 class="heading">Borneo Convention Centre Kuching</h2>
      <p>The conference will be held at the Borneo Convention Centre</p>
	  <p><address>Venue:  The Isthmus, Sejingkat,, 93050 Kuching, Sarawak, Malaysia</address></p>
	  <p>Date:  June-03-2016  To  June-05-2016 <p>
      </ul>
      <footer>
        <ul class="nospace inline pushright">
        </ul>
      </footer>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </article>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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