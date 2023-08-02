<?php

$id=$_POST['id'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$oldPassword=$_POST['oldPassword'];
$newPassword=$_POST['newPassword'];
$confirmPassword=$_POST['confirmPassword'];

if($confirmPassword==""&&$oldPassword==""&&$newPassword==""){
    $q="UPDATE `tbl_user` SET `email`='$email',`phone`='$phone' WHERE u_id=$id";
}else{
    $q="UPDATE `tbl_user` SET `email`='$email',`phone`='$phone',`oldPassword`='$oldPassword',`newPassword`='$newPassword',`confirmPassword`='$confirmPassword' WHERE u_id=$id";

}
include "dbconnect.php"; 

$result=mysqli_query($con,$q);
echo "data updated successfully";
header("location:index.php");
?>