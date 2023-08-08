<?php
try{


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$address=$_POST['address'];

include "../dbconnect.php";

$stmt = $con->prepare("INSERT INTO `tbl_admin` (`name`, `email`, `password`, `phone`, `address`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $address);
    $result = $stmt->execute();

    if ($result) {
        // Success, redirect to a success page or do something else
        header("Location: super-admin.php");
        exit();
    } else {
        // Error occurred, redirect back to the form with an error message
        header("Location: super-admin.php?error=Error occurred while saving data");
        exit();
    }

}
catch(Exception $e){

    header("Location: super-admin.php?error=An unexpected error occurred");
    exit();

}

?>