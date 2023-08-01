<?php
$id=$_GET['id'];
$query="DELETE FROM `tbl_inventory` WHERE stk_id=$id";

include "../dbconnect.php";
$result=mysqli_query($con,$query) or die(mysqli_error($con));

header("Location: index.php");
exit();

?>