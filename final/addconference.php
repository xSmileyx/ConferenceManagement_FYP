<?php
include 'dbconnection.php';


$conf_name=$_POST['conf_name'];
$conf_startdate=$_POST['conf_startdate'];
$conf_enddate=$_POST['conf_enddate'];
$conf_numpass=$_POST['conf_numpass'];
$caterer_id=$_POST['caterer_id'];
$venue_id=$_POST['venue_id'];
$em_id=$_POST['em_id'];
$conf_details=$_POST['conf_details'];

$insertInto="INSERT INTO tblconference

VALUES('','$conf_name','$conf_startdate','$conf_enddate','$conf_numpass','$caterer_id','$venue_id','$em_id','$conf_details')";

$result=mysql_query($insertInto);

if($result){
echo 'Conference has been added successfully';
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