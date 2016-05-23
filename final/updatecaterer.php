<?php
include 'dbconnection.php';

$caterer_id=$_POST['caterer_id'];
$caterer_name=$_POST['caterer_name'];
$caterer_phone=$_POST['caterer_phone'];
$caterer_email=$_POST['caterer_email'];

$updatequery="UPDATE tblcaterer SET caterer_id='$caterer_id',caterer_name='$caterer_name', caterer_phone='$caterer_phone', caterer_email='$caterer_email' 
WHERE caterer_id='$caterer_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editcatererlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editcatererlist.php">click here</a>';

}
?>
<?php
// close connection
mysql_close();
?>