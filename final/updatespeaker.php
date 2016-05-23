<?php
include 'dbconnection.php';

$speaker_id=$_POST['speaker_id'];
$speaker_firstname=$_POST['speaker_firstname'];
$speaker_lastname=$_POST['speaker_lastname'];
$speaker_details=$_POST['speaker_details'];
$speaker_image=$_POST['speaker_image'];

$updatequery="UPDATE tblspeaker SET speaker_id='$speaker_id',speaker_firstname='$speaker_firstname', speaker_lastname='$speaker_lastname', speaker_details='$speaker_details' ,speaker_image='$speaker_image' WHERE speaker_id='$speaker_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editspeakerlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editspeakerlist.php">click here</a>';

}
?>
<?php
// close connection
mysql_close();
?>