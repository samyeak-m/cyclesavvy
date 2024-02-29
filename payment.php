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
    <link rel="stylesheet" href="css/payment.css">
    <title>Payment</title>
</head>

<body>

    <div class="formpay" style="display:none;">
        <div class="formpay-con pdfdown">
            <div class="image-con">
                <img class="image-prod" src='photo/<?php echo $stk_photo ?>' alt='Stock Photo'>
            </div>
            <div class="detail-prod">
                <p class='pay-det'>
                    <?php echo $userName; ?>
                </p>
                <p class='pay-det'>
                    <?php echo $token; ?>
                </p>
                <p class='pay-det'>
                    <?php echo $amount; ?>
                </p>
                <p class='pay-det'>
                    <?php echo $name; ?>
                </p>
            </div>
            <div class="paymethod">
                <button onclick="window.location.href='product.php'">Payment Complete</button>
                <button onclick="window.print()">Print</button>
                <button id="downloadPdf">View as PDF</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var success = <?php echo $success ? 'true' : 'false'; ?>;

            if (success) {
                var formpayElements = document.querySelectorAll(".formpay");
                formpayElements.forEach(function (element) {
                    element.style.display = "flex";
                });
            } else {
                alert("Error updating data in the database!");
            }
        });

        document.getElementById('downloadPdf').addEventListener('click', function () {
            var pdfElements = document.querySelectorAll("button");
            var pdfWidth = document.querySelector('.formpay-con');

            pdfWidth.style.width = "50vw";

            pdfElements.forEach(function (element) {
                element.style.display = "none";
            });

            var content = document.querySelector('.pdfdown');
            var contentWidth = content.clientWidth;
            var contentHeight = content.clientHeight;

            html2canvas(content, { width: contentWidth, height: contentHeight }).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');
                // let pdf = new jsPDF('p', 'px', [contentWidth, contentHeight]);
                let pdf = new jsPDF('p', 'px', [1920, 1080]);
                pdf.addImage(base64image, 'PNG', 96, 96, contentWidth, contentHeight);

                var pdfBlob = pdf.output('blob');

                // Create a blob URL for the PDF
                var pdfUrl = URL.createObjectURL(pdfBlob);

                // Open the PDF in a new browser window/tab
                window.open(pdfUrl, '_blank');

                // pdf.save('pay.pdf');
            });

            pdfWidth.style.width = "100vw";
            pdfElements.forEach(function (element) {
                element.style.display = "block";
            });
        });



    </script>
</body>

</html>