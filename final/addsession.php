<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Conference Management</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<link rel="stylesheet" href="styles/style.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Conference Management System</a></h1>
      <h2></h2>
    </div>
    <nav>
      <ul>
        <li class="dropdown">
			<a href="#" class="dropbtn">Home</a>
		</li>
        
		<li class="dropdown">
			<a href="#" class="dropbtn">About Us</a>
				<div class="dropdown-content">
				<a href="#">Company History</a>
				<a href="#">Organization Chart</a>
				<a href="#">Location Details</a>
				</div>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropbtn">Conferences</a>
				<div class="dropdown-content">
				<a href="#">All Upcoming Events</a>
				<a href="#">Past Events</a>
				</div>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropbtn">My Account</a>
				<div class="dropdown-content">
				<a href="#">Register</a>
				<a href="#">Log In</a>
				</div>
		</li>
		
		<li class="dropdown last">
			<a href="#" class="dropbtn">Help</a>
				<div class="dropdown-content">
				<a href="#">User Guide</a>
				<a href="#">FAQ</a>
				</div>
		</li>
		
        <!-- <li class="last"><a href="#">Text Link</a></li> -->
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- content body -->
    <section id="slider"><a href="#"><img src="images/demo/940x360.gif" alt=""></a></section>
    <!-- main content -->
    <div id="content">
		<section id="side_menu_pane">
			<nav id="side_menu">
			<div id="side_menu_title">Conference Menu</div>
				<ul>
					<li class="dropdown2">
					<div class="dropbtn2box">
						<a href="#" class="dropbtn2">Conference Management</a>
					</div>
							<div class="dropdown-content2">
								<a href="#" class="dropbtn2 dropdown-content2-item">Manage Sponsors</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Manage Venue</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Manage Speakers</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Manage Caterers</a>
						</div>
					</li>
					
					<li class="dropdown2">
					<div class="dropbtn2box">
						<a href="#" class="dropbtn2">View Schedule</a>
					</div>
					</li>
					
					<li class="dropdown2">
					<div class="dropbtn2box">
						<a href="#" class="dropbtn2">Registration Summary</a>
					</div>
					</li>
					
					<li class="dropdown2">
					<div class="dropbtn2box">
						<a href="#" class="dropbtn2">Generate Checklist</a>
					</div>
							<div class="dropdown-content2">
								<a href="#" class="dropbtn2 dropdown-content2-item">Participants Checklist</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Guests Checklist</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Sponsors Checklist</a>
								<a href="#" class="dropbtn2 dropdown-content2-item">Speakers Checklist</a>
						</div>
					</li>
					
					<li class="dropdown2">
					<div class="dropbtn2box">
						<a href="#" class="dropbtn2">Feedback Report</a>
					</div>
					</li>
				</ul>
			</nav>
		</section>
	  <!-- section 2 -->
      <section id="main_section">

	  	<div id="body">
		<div id="addsession">
          <h1 align="center">Add Session</h1>
    	<form action="addsession.php" method="post" name="addsession">
        <table align="center">
        <tr>
        <td align="left" valign="top"><p>Session name</p></td>
                <td colspan="2"><input type="time" name="session_name" class="twitter" placeholder="Session name " required /></td>
            </tr>
        <tr>
            	<td width="100" align="left" valign="top"><p>Conference id</p></td>
                <td width="80">	     
                 <?php
					$query = "SELECT conf_id from tblconference ";
					$result = mysql_query($query);
					echo "<select name='conf_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."'>".$row['conf_id']."</option>";
					}
					echo "</select>";
				?>
                </td>
                <td><a href="viewconference.php" target="_blank">Conference list</a></td>
            </tr>
            <tr>
            	<td align="left" valign="top"><p>Speaker id</p></td>
                <td>	     
                 <?php
					$query = "SELECT speaker_id from tblspeaker ";
					$result = mysql_query($query);
					echo "<select name='speaker_id'>";
					echo "<option value='0'>-Select-</option>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_id']."</option>";
					}
					echo "</select>";
				?>
                </td>
                <td><a href="viewspeaker.php" target="_blank">Speaker list</a></td>
            </tr>
            <tr>
            <td align="left" valign="top"><p>Session day</p></td>
                <td colspan="2"><input type="date" name="session_day" class="twitter" placeholder="YYYY/MM/DD " required /></td>
            </tr>
            <td align="left" valign="top"><p>Start time</p></td>
                <td colspan="2"><input type="time" name="session_starttime" class="twitter" placeholder="HH:MM:SS " required /></td>
            </tr>
            <td align="left" valign="top"><p>End time</p></td>
                <td colspan="2"><input type="time" name="session_endtime" class="twitter" placeholder="HH:MM:SS " required /></td>
            </tr>
            <td align="left" valign="top"><p>Session room</p></td>
                <td colspan="2"><input type="number" name="session_room" class="twitter" placeholder="Room name" required /></td>
            </tr>
            <tr>
					<td></td>
                    <td><input type="submit" name="submit" value="Submit"/></td>
                	<td><input type="reset" name="reset" value="Clear"	/></td>          
			</tr>        
        </table>
        </form>
    </div>
</div>
	  
      </section>
      <!-- section 2 -->
      <section id="latest" class="last">

      </section>
    </div>
    <!-- right column -->
    <aside id="right_column">
      <h2 class="title">Upcoming Events</h2>
      <nav>
        <ul>
          <li><a href="#">Conference Event 1</a></li>
          <li><a href="#">Conference Event 2</a></li>
          <li><a href="#">Conference Event 3</a></li>
          <li><a href="#">Conference Event 4</a></li>
          <li><a href="#">Conference Event 5</a></li>
          <li><a href="#">Conference Event 6</a></li>
          <li class="last"><a href="#">Conference Event 7</a></li>
        </ul>
      </nav>
      <!-- /nav -->
      <h2 class="title">Contact Us At</h2>
      <section class="last">
        <address>
        Full Name<br>
        Address Line 1<br>
        Address Line 2<br>
        Town/City<br>
        Postcode/Zip<br>
        <br>
        Tel: xxxx xxxx xxxxxx<br>
        Email: <a href="#">contact@domain.com</a>
        </address>
      </section>
      <!-- /section -->
    </aside>
    <!-- / content body -->
  </div>
</div>
<!-- Footer -->
<div class="wrapper row3">
  <div id="footer" class="clear">
    <!-- Section One -->
    <section class="one_quarter">
      <h2 class="title">Link Block</h2>
      <nav>
        <ul>
          <li><a href="#">Lorem ipsum dolor sit</a></li>
          <li><a href="#">Amet consectetur</a></li>
          <li><a href="#">Praesent vel sem id</a></li>
          <li><a href="#">Curabitur hendrerit est</a></li>
          <li class="last"><a href="#">Sed a nulla urna</a></li>
        </ul>
      </nav>
    </section>
    <!-- Section Two -->
    <section class="one_quarter">
      <h2 class="title">Link Block</h2>
      <nav>
        <ul>
          <li><a href="#">Lorem ipsum dolor sit</a></li>
          <li><a href="#">Amet consectetur</a></li>
          <li><a href="#">Praesent vel sem id</a></li>
          <li><a href="#">Curabitur hendrerit est</a></li>
          <li class="last"><a href="#">Sed a nulla urna</a></li>
        </ul>
      </nav>
    </section>
    <!-- Section Three -->
    <section class="one_quarter">
      <h2 class="title">Link Block</h2>
      <nav>
        <ul>
          <li><a href="#">Lorem ipsum dolor sit</a></li>
          <li><a href="#">Amet consectetur</a></li>
          <li><a href="#">Praesent vel sem id</a></li>
          <li><a href="#">Curabitur hendrerit est</a></li>
          <li class="last"><a href="#">Sed a nulla urna</a></li>
        </ul>
      </nav>
    </section>
    <!-- Section Four -->
    <section class="one_quarter lastbox">
      <h2 class="title">Link Block</h2>
      <nav>
        <ul>
          <li><a href="#">Lorem ipsum dolor sit</a></li>
          <li><a href="#">Amet consectetur</a></li>
          <li><a href="#">Praesent vel sem id</a></li>
          <li><a href="#">Curabitur hendrerit est</a></li>
          <li class="last"><a href="#">Sed a nulla urna</a></li>
        </ul>
      </nav>
    </section>
    <!-- / Section -->
  </div>
</div>
<!-- Copyright -->
<div class="wrapper row4">
  <footer id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </footer>
</div>
</body>
</html>
