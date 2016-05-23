<?php
include 'dbconnection.php';


$pass_type=$_POST['pass_type'];
$pass_desc=$_POST['pass_desc'];
$pass_price=$_POST['pass_price'];
$pass_amount=$_POST['pass_amount'];

$insertInto="INSERT INTO tblpasstype

VALUES('','$pass_type','$pass_desc','$pass_price','pass_amount')";

$result=mysql_query($insertInto);

if($result){
echo 'Pass type has been added successfully';
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