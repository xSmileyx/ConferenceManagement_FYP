<?php
include 'dbconnection.php';

$sponsor_id=$_POST['sponsor_id'];
// sql to delete a record
$deletequery = "DELETE FROM tblsponsor WHERE sponsor_id='$sponsor_id'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '<a href="deletesponsorlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="deletesponsorlist.php">click here</a>';
}
?>
<?php
// close connection
mysql_close();
?>
