function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var errorMessages = document.getElementById("errorMessages");
    var errorMessage = '';

    // Validate email format (contains '@' and '.')
    var at = email.indexOf("@");
    var dot = email.lastIndexOf(".");
    if (at < 1 || dot < at + 4 || dot + 3 >= email.length) {
        errorMessage += "Please enter a valid email address.<br>";
    }

    // Validate password complexity (one uppercase, one lowercase, one numeric, one special character, and more than 8 characters)
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}$/;
    if (!password.match(passwordRegex)) {
        errorMessage += "Password must contain at least one uppercase letter, one lowercase letter, one numeric character, one special character, and be at least 8 characters long.<br>";
    }

     // Display error messages on the page
     if (errorMessage) {
        errorMessages.innerHTML = errorMessage;
        return false; // Prevent form submission
    } else {
        errorMessages.innerHTML = ''; // Clear any previous error messages
        return true; // Allow form submission
    }
}