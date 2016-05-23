<?php
include 'dbconnection.php';



$sponsor_id=$_POST['sponsor_id'];
$conf_id=$_POST['conf_id'];
$amount_provided=$_POST['amount_provided'];

$insertInto="INSERT INTO tblconf_sponsor

VALUES('','$sponsor_id','$conf_id','$amount_provided')";

$result=mysql_query($insertInto);

if($result){
echo 'Conference sponsor has been added successfully';
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