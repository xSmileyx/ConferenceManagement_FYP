<?php
include 'dbconnection.php';

$sponsor_id=$_POST['sponsor_id'];
$sponsor_name=$_POST['sponsor_name'];
$sponsor_email=$_POST['sponsor_email'];
$sponsor_phone=$_POST['sponsor_phone'];
$sponsor_logo=$_POST['sponsor_logo'];

$updatequery="UPDATE tblsponsor SET sponsor_id='$sponsor_id',sponsor_name='$sponsor_name', sponsor_email='$sponsor_email', sponsor_phone='$sponsor_phone' ,sponsor_logo='$sponsor_logo' WHERE sponsor_id='$sponsor_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editsponsorlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editsponsorlist.php">click here</a>';

}
?>
<?php
// close connection
mysql_close();
?>