<?php
$currentPage = 'edit';
include("header.php");
$id=$_GET['id'];
include "../dbconnect.php";
$q="select * from tbl_admin where a_id=$id";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

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
    <form id="myform" method="post" action="updateprofile.php">
    <input type="hidden" value="<?php  echo $row['a_id'];?>" name="id">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php  echo $row['email'] ?>" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php  echo $row['phone'] ?>" required>
      </div>
      <div class="form-group">
  <label for="Password">Password:</label>
  <input type="password" id="oldPassword" name="oldPassword" required>
  <span class="password-toggle" id="oldPasswordToggle">Show Password</span>
</div>
      <div class="form-group">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" >
        <span class="password-toggle" id="passwordToggle" onclick="toggle(this)">Show Password</span>
      </div>
      <div class="form-group">
  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" id="confirmPassword" name="confirmPassword" >
  <span class="password-toggle" id="confirmPasswordToggle">Show Password</span>
</div>

<?php
        if (isset($_GET['erroredit'])) {
            $error = $_GET['erroredit'];
            echo '<div class="error">' . $error . '</div>';
        }
        if (isset($_GET['success'])) {
            $successMessage = $_GET['success'];
            echo '<div class="success">' . $successMessage . '</div>';
        }
        ?>

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

});

function removeURLParameters() {
    setTimeout(function () {
      // Remove URL parameters without refreshing the page
      var newURL = location.href.split("?")[0];
      window.history.replaceState({}, document.title, newURL);
    }, 1); // 2000 milliseconds = 2 seconds
  }

  // Call the function to remove URL parameters after 2 seconds
  removeURLParameters();


  </script>
</body>

</html>
