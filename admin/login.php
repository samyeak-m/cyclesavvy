<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-form">
    <h2>Login</h2>
    <form action="logincheck.php" method="post">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>

       <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo '<div class="error">' . $error . '</div>';
            echo '<script>window.history.replaceState(null, null, window.location.href.split("?")[0]);</script>';
        }
        if (isset($_GET['success'])) {
            $successMessage = $_GET['success'];
            echo '<div class="success">' . $successMessage . '</div>';
            echo '<script>window.history.replaceState(null, null, window.location.href.split("?")[0]);</script>';
        }
      ?>

      <button>Login</button>
    </form>
  </div>
  
</body>
</html>
