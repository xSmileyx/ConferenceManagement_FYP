<?php
include 'dbconnection.php';


$caterer_name=$_POST['caterer_name'];
$caterer_phone=$_POST['caterer_phone'];
$caterer_email=$_POST['caterer_email'];

$insertInto="INSERT INTO tblcaterer

VALUES('','$caterer_name','$caterer_phone','$caterer_email')";

$result=mysql_query($insertInto);

if($result){
echo 'Caterer has been added successfully';
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