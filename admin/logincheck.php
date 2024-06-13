<?php
$email = $_POST['email'];
$password = $_POST['password'];

include "../dbconnect.php";

// Use prepared statements to prevent SQL injection
$stmt = $con->prepare("SELECT * FROM `tbl_admin` WHERE `email`=? AND `password`=?");
$stmt->bind_param("ss", $email, $password);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    if ($password===$row['password']) {
      $edit = $row['permission'];
      $adminname = $row['name'];
      $id = $row['a_id'];
      session_start();
      $_SESSION['edit'] = $edit;
      $_SESSION['a_name'] = $adminname;
      $_SESSION['a_id'] = $id;
      header("Location: index.php");
      exit();
    } else {
      header("Location: login.php?error=Incorrect password");
      exit();
    }
  } else {
    header("Location: login.php?error=Incorrect email");
    exit();
  }

?>