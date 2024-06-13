<?php
try{


$name=$_POST['name'];
$price=$_POST['price'];
$description=$_POST['description'];
$photo=$_FILES['photo']['name'];

include "../dbconnect.php";
move_uploaded_file($_FILES["photo"]["tmp_name"],"../photo/$photo");
$q="INSERT INTO `tbl_inventory`( `name`, `price`, `description`, `photo`) VALUES ('$name',$price,'$description','$photo')";
$result=mysqli_query($con,$q);


sleep(1);

}
catch(Exception $e){
	throw $e;
}

?>