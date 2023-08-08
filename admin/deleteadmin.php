<?php
$id=$_GET['id'];
$query="DELETE FROM `tbl_admin` WHERE a_id=$id";

include "../dbconnect.php";
$result=mysqli_query($con,$query) or die(mysqli_error($con));

header("Location: super-admin.php");
exit();

?>