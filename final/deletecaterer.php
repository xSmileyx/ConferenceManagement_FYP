<?php
include 'dbconnection.php';

$caterer_id=$_POST['caterer_id'];
// sql to delete a record
$deletequery = "DELETE FROM tblcaterer WHERE caterer_id='$caterer_id'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '<a href="admin_index.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="admin_index.php">click here to go back to main menu</a>';
}
?>
<?php
// close connection
mysql_close();
?>
