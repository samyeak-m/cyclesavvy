<?php
try{


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

include "dbconnect.php";
$q="INSERT INTO `tbl_user`( `name`, `email`, `password`) VALUES ('$name','$email','$password')";
$result=mysqli_query($con,$q);


sleep(1);
header("location:index.php");
}
catch(Exception $e){
	throw $e;
}

?>