<?php
include 'dbconnection.php';

$speaker_id=$_POST['speaker_id'];
// sql to delete a record
$deletequery = "DELETE FROM tblspeaker WHERE speaker_id='$speaker_id'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '<a href="deletespeakerlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="deletespeakerlist.php">click here</a>';
}
?>
<?php
// close connection
mysql_close();
?>
