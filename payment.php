<?php
include "dbconnect.php";
$success = false;
$token = '';
$amount = '';
$bookid = '';
$name = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = isset($_POST["token"]) ? $_POST["token"] : '';
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : '';
    $bookid = isset($_POST["bookid"]) ? $_POST["bookid"] : '';
    $name = isset($_POST["name"]) ? $_POST["name"] : '';

    if (!isset($_SESSION['form_submitted'])) {
        $insertQuery = "UPDATE tbl_booking SET token = '$token' WHERE book_id = '$bookid'";
        if (mysqli_query($con, $insertQuery)) {
            $success = true;
            $_SESSION['form_submitted'] = true;
        } else {
            echo "Error: " . mysqli_error($con);
            $success = false;
        }

        $checkStkId = "SELECT stock_id FROM tbl_booking WHERE book_id = '$bookid'";
        $checkStkIdResult = mysqli_query($con, $checkStkId);
        $stk_id = mysqli_fetch_assoc($checkStkIdResult);
        $stkId = $stk_id['stock_id'];


        $checkPhotoQuery = "SELECT photo FROM tbl_inventory WHERE stk_id = '$stkId'";
        $checkPhotoResult = mysqli_query($con, $checkPhotoQuery);
        $checkPhoto = mysqli_fetch_assoc($checkPhotoResult);
        $stk_photo = $checkPhoto['photo'];

        $checkuserId = "SELECT client_id FROM tbl_booking WHERE book_id = '$bookid'";
        $checkuserIdResult = mysqli_query($con, $checkuserId);
        $uid = mysqli_fetch_assoc($checkuserIdResult);
        $userId = $uid['client_id'];

        $getUserQuery = "SELECT name FROM tbl_user WHERE u_id = '$userId'";
        $getUserResult = mysqli_query($con, $getUserQuery);
        $userData = mysqli_fetch_assoc($getUserResult);
        $userName = $userData['name'];
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="formpay" style="display:none;">
        <form action="product.php">
            <img src='photo/<?php echo $stk_photo ?>' alt='Stock Photo'>
            <input type="text" name="username" value="<?php echo $userName; ?>" readonly>
            <input type="text" name="token" value="<?php echo $token; ?>" readonly>
            <input type="text" name="amount" value="<?php echo $amount; ?>" readonly>
            <input type="text" name="name" value="<?php echo $name; ?>" readonly>
            <button type="submit">Payment Complete</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var success = <?php echo $success ? 'true' : 'false'; ?>;

            if (success) {
                var formpayElements = document.querySelectorAll(".formpay");
                formpayElements.forEach(function (element) {
                    element.style.display = "block";
                });
            } else {
                alert("Error updating data in the database!");
            }
        });
    </script>
</body>


</html>