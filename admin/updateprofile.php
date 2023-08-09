<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validation checks
    $error = '';
    $successMessage = '';

    // Validate old password
    include "../dbconnect.php"; // Ensure to include the database connection file

    $q = "SELECT password FROM tbl_admin WHERE a_id=$id";
    $result = mysqli_query($con, $q);
    $row = mysqli_fetch_assoc($result);
    $existingPassword = $row["password"];

    if ($oldPassword!==$existingPassword) {
        $error = "Old password is incorrect. Please try again.";
    } elseif ($newPassword !== $confirmPassword) {
        $error = "New password and confirm password do not match. Please try again.";
    }elseif (!empty($newPassword)){
        if (strlen($newPassword) < 8) {
            $error = "New password must be at least 8 characters long.";
        } elseif (!preg_match("/[A-Z]/", $newPassword)) {
            $error = "New password must contain at least one uppercase letter.";
        } elseif (!preg_match("/[a-z]/", $newPassword)) {
            $error = "New password must contain at least one lowercase letter.";
        } elseif (!preg_match("/\d/", $newPassword)) {
            $error = "New password must contain at least one digit.";
            
        } else if (!preg_match("/[^a-zA-Z\d]/",$newPassword)){
            $error = "NewPassword must contain at least one special character.<br>";

        }
}

     else {
        // All validations passed, proceed with updating the profile
        if ($newPassword === "") {
            $q = "UPDATE `tbl_admin` SET `email`='$email',`phone`='$phone' WHERE a_id=$id";
        } else {
            // Hash the new password before updating
            // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); password cryptographic 
            $q = "UPDATE `tbl_admin` SET `email`='$email',`phone`='$phone',`password`='$newPassword' WHERE a_id=$id";
        }

        $result = mysqli_query($con, $q);

        if ($result) {
            $successMessage = "Profile data updated successfully.";
        } else {
            $error = "Failed to update profile data. Please try again later.";
        }
    }

    // Send the response back to editprofile.php using a URL parameter
    header("location: editadmin.php?id=$id&erroredit=" . urlencode($error) . "&success=" . urlencode($successMessage));
    exit;
}
?>
