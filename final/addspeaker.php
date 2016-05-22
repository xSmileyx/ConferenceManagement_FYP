<?php
include 'dbconnection.php';


$speaker_firstname=$_POST['speaker_firstname'];
$spaker_lastname=$_POST['spaker_lastname'];
$speaker_details=$_POST['speaker_details'];
$speaker_image=$_POST['speaker_image'];

$insertInto="INSERT INTO tblspeaker

VALUES('','$speaker_firstname','$spaker_lastname','$speaker_details','$speaker_image')";

$result=mysql_query($insertInto);

if($result){
echo 'Speaker has been added successfully';
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