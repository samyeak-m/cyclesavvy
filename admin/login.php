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
    <form>
      <label for="email">Email:</label>
      <input type="email" id="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" required>

      <button type="submit">Login</button>
    </form>
  </div>
  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission (for demonstration purposes)

  // Get the user's email and password
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Perform simple validation (you can add more complex validation as needed)
  if (email.trim() === '' || password.trim() === '') {
    alert('Please enter both email and password.');
    return;
  }

  // Perform login process here (for demonstration purposes, we just show an alert)
  alert(`Login successful!\nEmail: ${email}`);
});

  </script>
</body>
</html>
