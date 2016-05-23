<?php
include 'dbconnection.php';


$p_email=$_POST['p_email'];
$p_password=$_POST['p_password'];
$p_firstname=$_POST['p_firstname'];
$p_surname=$_POST['p_surname'];
$p_phone=$_POST['p_phone'];
$p_dob=$_POST['p_dob'];
$p_address=$_POST['p_address'];
$p_country=$_POST['p_country'];
$p_city=$_POST['p_city'];
$p_state=$_POST['p_state'];
$p_occupation=$_POST['p_occupation'];
$p_newsletter=$_POST['p_newsletter'];


$insertInto="INSERT INTO tblparticipant

VALUES('','$p_email','$p_password','$p_firstname','$p_surname','$p_phone','$p_dob','$p_address','$p_country','$p_city','$p_state','$p_occupation','$p_newsletter')";

$result=mysql_query($insertInto);

if($result){
echo 'Registration successfull';
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