<?php
include 'dbconnection.php';


$venue_name=$_POST['venue_name'];
$venue_address=$_POST['venue_address'];
$venue_nrooms=$_POST['venue_nrooms'];

$insertInto="INSERT INTO tblvenue

VALUES('$venue_id','$venue_name','$venue_address','$venue_nrooms')";

$result=mysql_query($insertInto);

if($result){
echo 'Venue has been added successfully';
echo '<a href="	">Click here</a>';


}
else {
	echo "ERROR";
}


?>
<?php
// close connection
mysql_close();
?>