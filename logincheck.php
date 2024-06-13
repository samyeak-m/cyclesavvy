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
    $id = $row['u_id'];
    $token = bin2hex(random_bytes(32));
    session_start();
    $_SESSION['auth_token'] = $token;
    $_SESSION['name'] = $username;
    $_SESSION['u_id'] = $id;
    header("Location: product.php");
    exit();
} else {
    header("Location: index.php?error=");
    exit();
}
?>