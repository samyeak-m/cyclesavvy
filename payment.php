<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = isset($_POST["token"]) ? $_POST["token"] : '';
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : '';
    $bookid = isset($_POST["bookid"]) ? $_POST["bookid"] : '';
    $name = isset($_POST["name"]) ? $_POST["name"] : '';

    $insertQuery = "UPDATE tbl_booking SET token = '$token' WHERE book_id = '$bookid'";

    if (mysqli_query($con, $insertQuery)) {
        $success = true;
    } else {
        echo "Error: " . mysqli_error($con);
        $success = false;
    }
}
?>

<script>
    var token = sessionStorage.getItem("token");
    var amount = sessionStorage.getItem("amount");
    var bookid = sessionStorage.getItem("bookid");
    var name = sessionStorage.getItem("name");

    var form = document.createElement("form");
    form.method = "post";
    form.action = "";

    var tokenInput = document.createElement("input");
    tokenInput.type = "hidden";
    tokenInput.name = "token";
    tokenInput.value = token;

    var amountInput = document.createElement("input");
    amountInput.type = "hidden";
    amountInput.name = "amount";
    amountInput.value = amount;

    var bookidInput = document.createElement("input");
    bookidInput.type = "hidden";
    bookidInput.name = "bookid";
    bookidInput.value = bookid;

    var nameInput = document.createElement("input");
    nameInput.type = "hidden";
    nameInput.name = "name";
    nameInput.value = name;

    // Append input fields to the form
    form.appendChild(tokenInput);
    form.appendChild(amountInput);
    form.appendChild(bookidInput);
    form.appendChild(nameInput);

    // Append the form to the document body
    document.body.appendChild(form);

    // Check if the data update in the database is successful
    if (<?php echo $success ? 'true' : 'false'; ?>) {
        // Display the form
        form.style.display = "block";
    } else {
        // Display an error message
        alert("Error updating data in the database!");
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
    <input type="hidden" name="bookid" value="<?php echo $bookid; ?>">
        <input type="text" name="token" value="<?php echo $token; ?>">
        <input type="text" name="amount" value="<?php echo $amount; ?>">
        <input type="text" name="name" value="<?php echo $name; ?>">
    </form>
</body>
</html>
