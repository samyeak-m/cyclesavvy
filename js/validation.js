function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var errorMessage = '';
    nameError.innerHTML = '';
    emailError.innerHTML = '';
    passwordError.innerHTML = '';

    if(name==''){
        errorMessage += "Name cannot be blank.<br>";
        nameError.innerHTML = errorMessage;
        return false;
    }

    // Validate email format (contains '@' and '.')
    var at = email.indexOf("@");
    var dot = email.lastIndexOf(".");
    if (at < 1 || dot < at + 4 || dot + 3 >= email.length) {
        errorMessage += "Please enter a valid email address.<br>";
        emailError.innerHTML = errorMessage;
        return false;
    }

    // Validate password complexity (one uppercase, one lowercase, one numeric, one special character, and more than 8 characters)
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}$/;
    if (!password.match(passwordRegex)) {
        errorMessage += "Password requirement not fulfill";
        passwordError.innerHTML = errorMessage;
        return false;
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