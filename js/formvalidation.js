// Function to validate an individual field and update error message
function validateField(fieldName) {
    var field = document.getElementById(fieldName);
    var errorDiv = document.getElementById(fieldName + "Error");
    errorDiv.innerHTML = '';
    field.classList.remove("input-error");

    switch (fieldName) {
        case "name":
            if (field.value.length < 8 && field.value.includes("#")) {
                errorDiv.innerHTML = "Name must be at least 8 characters long and can't use #.";
                field.classList.add("input-error");
            }
            break;

        case "email":
            var atposition = field.value.indexOf("@");
            var dotposition = field.value.lastIndexOf(".");
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= field.value.length) {
                errorDiv.innerHTML = "Please enter a valid email address.";
                field.classList.add("input-error");
            }
            break;

        case "password":
            var password = field.value;
            if (password.length < 8) {
                errorDiv.innerHTML = "Password must be at least 8 characters long.";
                field.classList.add("input-error");
            } else {
                var conditionsMet = true;
                if (!/[A-Z]/.test(password)) {
                    conditionsMet = false;
                    errorDiv.innerHTML += "Password must contain at least one uppercase letter.<br>";
                }
                if (!/[a-z]/.test(password)) {
                    conditionsMet = false;
                    errorDiv.innerHTML += "Password must contain at least one lowercase letter.<br>";
                }
                if (!/\d/.test(password)) {
                    conditionsMet = false;
                    errorDiv.innerHTML += "Password must contain at least one numeric character.<br>";
                }
                if (!/[^a-zA-Z\d]/.test(password)) {
                    conditionsMet = false;
                    errorDiv.innerHTML += "Password must contain at least one special character.<br>";
                }

                if (conditionsMet) {
                    document.getElementById("submitBtn").disabled = false;
                } else {
                    document.getElementById("submitBtn").disabled = true;
                }
            }
            break;

        default:
            break;
    }
}


// Function to validate the entire form
function validateForm() {
    // Call individual field validation to update error messages
    validateField("name");
    validateField("email");
    validateField("password");

    // Check if any errors exist
    var errorsExist = document.querySelectorAll(".error").length > 0;

    // Return false to prevent form submission if there are errors
    return !errorsExist;
}