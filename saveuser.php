<?php
try {


	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];

	
		include "dbconnect.php";

		$checkQuery = "SELECT * FROM `tbl_user` WHERE `email` = ?";
		$stmtCheck = $con->prepare($checkQuery);
		$stmtCheck->bind_param("s", $email);
		$stmtCheck->execute();
		$resultCheck = $stmtCheck->get_result();

		if ($resultCheck->num_rows > 0) {
			echo '<script>alert("Email already in use");</script>';
			echo '<script>window.location.href = "index.php";</script>';
			exit();
		}

		$q = "INSERT INTO `tbl_user`( `name`, `email`,`phone`, `password`) VALUES (?, ?, ?, ?)";
		$stmt = $con->prepare($q);
		$stmt->bind_param("ssss", $name, $email, $phone, $password);
		$result = $stmt->execute();

		if ($stmt->affected_rows > 0) {
			$id = $stmt->insert_id;
			$selectQuery = "SELECT `name` FROM `tbl_user` WHERE `u_id` = ?";
			$stmtSelect = $con->prepare($selectQuery);
			$stmtSelect->bind_param("i", $id);
			$stmtSelect->execute();
			$resultSelect = $stmtSelect->get_result();

			if ($row = $resultSelect->fetch_assoc()) {
				$username = $row['name'];
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
		} else {
			header("Location: index.php?error=");
			exit();
		}

	}
catch (Exception $e) {
	throw $e;
}

?>