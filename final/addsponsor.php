<?php
include 'dbconnection.php';


$sponsor_name=$_POST['sponsor_name'];
$sponsor_email=$_POST['sponsor_email'];
$sponsor_phone=$_POST['sponsor_phone'];
$sponsor_logo=$_POST['sponsor_logo'];

$insertInto="INSERT INTO tblsponsor

VALUES('','$sponsor_name','$sponsor_email','$sponsor_phone','$sponsor_logo')";

$result=mysql_query($insertInto);

if($result){
echo 'Sponsor has been added successfully';
echo '<a href="admin_index.php">Click here</a>';


}
else {
	echo "ERROR";
}


?>
<?php
// close connection
mysql_close();
?>