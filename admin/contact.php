<?php
$currentPage = 'contact';
include("header.php");
?>

<!DOCTYPE html>
<head>
  
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <div class="contactus">
  <div class="contact-form">
    <h2>Contact Us</h2>
    <form id="contactForm" action="index.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" required>

      <label for="subject">Subject:</label>
      <input type="text" id="subject" required>

      <label for="message">Message:</label>
      <textarea id="message" rows="4" required></textarea>

      <button type="submit">Submit</button>
    </form>
  </div>
  </div>
  <script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Collect form data into a FormData object
  const formData = new FormData(event.target);

  // Convert the FormData object into a regular JavaScript object
  const formDataObject = {};
  formData.forEach((value, key) => {
    formDataObject[key] = value;
  });

  // Log the form data object (for demonstration purposes)
  console.log(formDataObject);

  // Submit the form (navigate to the form's "action" URL)
  event.target.submit();
});

  </script>
</body>
</html>
