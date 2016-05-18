<!doctype html>
<html>
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
<meta charset="utf-8">
<title>View Venues</title>
</head>

<body>
<?php
include 'dbconnection.php';

$query="SELECT * FROM tblvenue" ;
$executeQuery=mysql_query($query);
if (!$executeQuery)

{
 die ('Could not connect'.mysql_error());
}

echo '<h2 style="color: blue;font-family: arial" align=center>List of venues</h2>';

echo '<table border=1  table id=table1 align=center>';
echo '<tr>';
echo '<td>Venue ID</td>';
echo '<td>Venue name</td>';
echo '<td>Address</td>';
echo '<td>Number of rooms</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo '</tr>';
}

echo '</table>';

?>

</body>
</html>