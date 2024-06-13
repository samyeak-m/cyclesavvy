function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var nameInput = document.getElementById("name");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var errorMessage = '';
    var phone = document.getElementById("phone").value;
    var phoneInput = document.getElementById("phone");
    var phoneError = document.getElementById("phoneError");

    phoneError.innerHTML = '';
    phoneInput.classList.remove("input-error");

    nameError.innerHTML = '';
    emailError.innerHTML = '';
    passwordError.innerHTML = '';
    nameInput.classList.remove("input-error");
    emailInput.classList.remove("input-error");
    passwordInput.classList.remove("input-error");

    if (name.trim() === '' || name.includes('#')) {
        errorMessage += "Name cannot be blank & can't contain '#'.<br>";
        nameError.innerHTML = errorMessage;
        nameInput.classList.add("input-error");
        return false;
    }
    

    // Validate email format (contains '@' and '.')
    var at = email.indexOf("@");
    var dot = email.lastIndexOf(".");
    if (at < 1 || dot < at + 4 || dot + 3 >= email.length) {
        errorMessage += "Please enter a valid email address.<br>";
        emailError.innerHTML = errorMessage;
        emailInput.classList.add("input-error");
        return false;
    }

    if (!/^(98)\d{8}$/.test(phone)) {
        errorMessage += "Please enter a valid 10-digit phone number.<br>";
        phoneError.innerHTML = errorMessage;
        phoneInput.classList.add("input-error");
        return false;
    }

    // Validate password
    if (password.length < 8) {
        errorMessage += "Password must be at least 8 characters long.<br>";
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        return false;
    } else if (!/[A-Z]/.test(password)) {
        errorMessage += "Password must contain at least one uppercase letter.<br>";
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        return false;
    } else if (!/[a-z]/.test(password)) {
        errorMessage += "Password must contain at least one lowercase letter.<br>";
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        return false;
    } else if (!/\d/.test(password)) {
        errorMessage += "Password must contain at least one numeric character.<br>";
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        return false;
    } else if (!/[^a-zA-Z\d]/.test(password)) {
        errorMessage += "Password must contain at least one special character.<br>";
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        return false;
    }

    // Display error messages on the page
    if (errorMessage) {
        passwordError.innerHTML = errorMessage;
        passwordInput.classList.add("input-error");
        document.getElementById("submitBtn").disabled = true; // Disable submit button
        return false;
    } else {
        document.getElementById("submitBtn").disabled = false; // Enable submit button
        return true; // Allow form submission
    }
}

// Function to clear error on input change
function clearError(fieldName) {
    var errorDiv = document.getElementById(fieldName + "Error");
    var inputField = document.getElementById(fieldName);
    if (inputField.classList.contains("input-error")) {
        inputField.classList.remove("input-error");
        errorDiv.innerHTML = "";
    }
}