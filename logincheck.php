<?php
$email = $_POST['email'];
$password = $_POST['password'];

include "dbconnect.php";

// Use prepared statements to prevent SQL injection
$stmt = $con->prepare("SELECT * FROM `tbl_user` WHERE `email`=? AND `password`=?");
$stmt->bind_param("ss", $email, $password);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $username = $row['name'];
    session_start();
    $_SESSION['name']=$username;
        header("Location: product.php");
    exit();
} else {
    $_SESSION['errorMsg'] = "Either username or password is wrong";
    header("Location: index.php?error=");
    exit();
}
?>
