<?php

$stk_id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$photo=$_FILES['photo']['name'];
$description=$_POST['description'];

if($_FILES['photo']['name']==""){
    $q="UPDATE `tbl_inventory` SET `name`='$name',`price`='$price',`description`='$description' WHERE stk_id=$stk_id";
}else{
    move_uploaded_file($_FILES["photo"]["tmp_name"],"../photo/$photo");// uploading file to the server folder
    $q="UPDATE `tbl_inventory` SET `name`='$name',`price`='$price', photo='$photo',`description`='$description' WHERE stk_id=$stk_id";
}
include "../dbconnect.php"; 

$result=mysqli_query($con,$q);
echo "data updated successfully";
header("location:index.php");
?>