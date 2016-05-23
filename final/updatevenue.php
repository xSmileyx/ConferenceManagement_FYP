<?php
include 'dbconnection.php';

$venue_id=$_POST['venue_id'];
$venue_name=$_POST['venue_name'];
$venue_address=$_POST['venue_address'];
$venue_nrooms=$_POST['venue_nrooms'];

$updatequery="UPDATE tblvenue SET venue_id='$venue_id',venue_name='$venue_name', venue_address='$venue_address', venue_nrooms='$venue_nrooms' 
WHERE venue_id='$venue_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editvenuelist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editvenuelist.php">click here</a>';

}
?>
<?php
// close connection
mysql_close();
?>