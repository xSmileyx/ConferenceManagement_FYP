<?php
include 'dbconnection.php';

$venue_id=$_POST['venue_id'];
// sql to delete a record
$deletequery = "DELETE FROM tblvenue WHERE venue_id='$venue_id'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '<a href="deletevenuelist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="deletevenuelist.php">click here</a>';
}
?>
<?php
// close connection
mysql_close();
?>
