<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<style>
#table1{
	font-size:5px;
	font: bold 15px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color:#333;
	cellpadding:20px;
	text-align:center;
}
</style>
<title>Delete Caterer List</title>
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
        <li><a href="#">Text Link</a></li>
        <li><a href="#">Text Link</a></li>
        <li><a href="#">Text Link</a></li>
        <li><a href="#">Text Link</a></li>
        <li class="last"><a href="#">Text Link</a></li>
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
      <!-- section 2 -->
      <section>
<?php
include 'dbconnection.php';

$query="SELECT * FROM tblcaterer" ;

$executeQuery=mysql_query($query);

if (!$executeQuery)
{
 die ('Could not connect'.mysql_error());
}
$query_info=mysql_query($query) or die(mysql_error());
$query_info_count=mysql_num_rows($query_info);


echo '<h2 style="color: blue;font-family: arial" align=center>List of Caterers</h2>';


echo '<table border=0  table id=table1 align=center cellspacing="10px">';
echo '<tr>';
echo '<td>Caterer ID &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Caterer name &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Phone &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Email Name &nbsp;&nbsp;&nbsp;</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
	
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo "<td><form method='post' action='deletecaterer.php'><input type='hidden' name='caterer_id' value='".$row[0]."'><input type='submit' value='Delete'></form></td>";
echo '</tr>';
}
echo '</table>';

?>
<?php
// close connection
mysql_close();
?>

     
     
      </section>
      <!-- section 2 -->
      <section id="latest" class="last">

      </section>
    </div>
    <!-- right column -->
    <aside id="right_column">
      <h2 class="title">Categories</h2>
      <nav>
        <ul>
          <li><a href="#">Free Website Templates</a></li>
          <li><a href="#">Free CSS Templates</a></li>
          <li><a href="#">Free XHTML Templates</a></li>
          <li><a href="#">Free Web Templates</a></li>
          <li><a href="#">Free Website Layouts</a></li>
          <li><a href="#">Free HTML 5 Templates</a></li>
          <li><a href="#">Free Webdesign Templates</a></li>
          <li><a href="#">Free FireWorks Templates</a></li>
          <li><a href="#">Free PNG Templates</a></li>
          <li class="last"><a href="#">Free Website Themes</a></li>
        </ul>
      </nav>
      <!-- /nav -->
      <h2 class="title">Get In Contact</h2>
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
