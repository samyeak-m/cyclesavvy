<?php
$currentPage = 'edit';
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="css/editadmin.css">
</head>

<body>

<div class="edit-admin">
  <div class="container">
    <h1>Edit Profile</h1>
    <form id="editProfileForm">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
  <label for="oldPassword">Old Password:</label>
  <input type="password" id="oldPassword" name="oldPassword" required>
  <span class="password-toggle" id="oldPasswordToggle">Show Password</span>
</div>
      <div class="form-group">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <span class="password-toggle" id="passwordToggle" onclick="toggle(this)">Show Password</span>
      </div>
      <div class="form-group">
  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" id="confirmPassword" name="confirmPassword" required>
  <span class="password-toggle" id="confirmPasswordToggle">Show Password</span>
</div>

      <button type="submit">Save Changes</button>
    </form>
  </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
  function togglePasswordVisibility(inputElement, toggleElement) {
    if (inputElement.type === 'password') {
      inputElement.type = 'text';
      toggleElement.textContent = 'Hide Password';
    } else {
      inputElement.type = 'password';
      toggleElement.textContent = 'Show Password';
    }
  }

  const passwordInput = document.getElementById('newPassword');
  const oldPasswordInput = document.getElementById('oldPassword');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  const passwordToggle = document.getElementById('passwordToggle');
  const oldPasswordToggle = document.getElementById('oldPasswordToggle');
  const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');

  passwordToggle.addEventListener('click', function () {
    togglePasswordVisibility(passwordInput, passwordToggle);
  });

  oldPasswordToggle.addEventListener('click', function () {
    togglePasswordVisibility(oldPasswordInput, oldPasswordToggle);
  });

  confirmPasswordToggle.addEventListener('click', function () {
    togglePasswordVisibility(confirmPasswordInput, confirmPasswordToggle);
  });

  const editProfileForm = document.getElementById('editProfileForm');

  editProfileForm.addEventListener('submit', function (event) {
    event.preventDefault();

    // You can add the logic here to handle form submission and password change
    // For now, let's just log the form data
    const formData = new FormData(editProfileForm);
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
    console.log(data);
  });
});


  </script>
</body>

</html>
