<?php

include 'header.php';

include "dbconnect.php";

if (isset($_GET['user_id']) && isset($_GET['id']) && isset($_GET['booking_date'])) {
    $userId = $_GET['user_id'];
    $stkId = $_GET['id'];
    $bookingDate = $_GET['booking_date'];

    // Perform checks to ensure that userId and stkId are valid before proceeding
    $checkUserQuery = "SELECT u_id FROM tbl_user WHERE u_id = '$userId'";
    $checkStockQuery = "SELECT stk_id FROM tbl_inventory WHERE stk_id = '$stkId'";

    $checkUserResult = mysqli_query($con, $checkUserQuery);
    $checkStockResult = mysqli_query($con, $checkStockQuery);
    


    if (mysqli_num_rows($checkUserResult) > 0 && mysqli_num_rows($checkStockResult) > 0) {
        // Both user_id and stk_id are valid, check if user has already booked for the same date
        $checkExistingBookingQuery = "SELECT * FROM tbl_booking WHERE client_id = '$userId' AND date = '$bookingDate'";
        $existingBookingResult = mysqli_query($con, $checkExistingBookingQuery);

        if (mysqli_num_rows($existingBookingResult) > 0) {
            $checkbookid = "SELECT book_id FROM tbl_booking WHERE client_id = '$userId' AND date = '$bookingDate'";
            $checkBookResult = mysqli_query($con, $checkbookid);

            $checkBookData = mysqli_fetch_assoc($checkBookResult);
            $checkBookId = $checkBookData['book_id'];

            $checkTokenQuery = "SELECT token FROM tbl_booking WHERE book_id = '$checkBookId' AND client_id = '$userId' AND date = '$bookingDate'";
            $tokenResult = mysqli_query($con, $checkTokenQuery);

            $tokenData = mysqli_fetch_assoc($tokenResult);
            $token = $tokenData['token'];

            if ($token != 0) {
                echo "<script>
                    alert('Booking for this date is done.');
                    window.location.href = 'product.php';
                  </script>";
            exit;
            }
            else{

                $deleteNotPaybook = "DELETE FROM tbl_booking WHERE book_id = '$checkBookId'";
                $deleteResult = mysqli_query($con, $deleteNotPaybook);
                if ($deleteResult) {
                    proceedBooking($con, $userId, $stkId, $bookingDate);
                }
                else{
                    echo "<script>
                alert('something went wrong');
                window.location.href = 'product.php';
              </script>";
        exit;
                }

            }


        } else {
            
            proceedBooking($con, $userId, $stkId, $bookingDate);


    }

    } else {
        echo "<script>
                alert('Invalid user_id or stk_id');
                window.location.href = 'product.php';
              </script>";
        exit;
    }    
}
function proceedBooking($con, $userId, $stkId, $bookingDate){
    // User hasn't booked for this date, proceed with the booking
    $getUserQuery = "SELECT name FROM tbl_user WHERE u_id = '$userId'";
    $getUserResult = mysqli_query($con, $getUserQuery);
    $userData = mysqli_fetch_assoc($getUserResult);
    $userName = $userData['name'];

    $getCycleQuery = "SELECT name FROM tbl_inventory WHERE stk_id = '$stkId'";
    $getCycleResult = mysqli_query($con, $getCycleQuery);
    $cycleData = mysqli_fetch_assoc($getCycleResult);
    $cycleName = $cycleData['name'];

    $getPriceQuery = "SELECT price FROM tbl_inventory WHERE stk_id = '$stkId'";
    $getPriceResult = mysqli_query($con, $getPriceQuery);
    $PriceData = mysqli_fetch_assoc($getPriceResult);
    $price = $PriceData['price'];

    $checkPhotoQuery = "SELECT photo FROM tbl_inventory WHERE stk_id = '$stkId'";
    $checkPhotoResult = mysqli_query($con, $checkPhotoQuery);
    $checkPhoto = mysqli_fetch_assoc($checkPhotoResult);
    $stk_photo = $checkPhoto['photo'];

    // Insert the booking along with user's name and cycle name
    $insertQuery = "INSERT INTO tbl_booking (`client_id`, `stock_id`, `username`, `cyclename`, `date`) VALUES ('$userId', '$stkId', '$userName', '$cycleName', '$bookingDate')";
    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        $insertedBookId = mysqli_insert_id($con);

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/booking.css">
    <title>Product</title>
</head>
<body>
    <div class="databook">
        <div class="databook-con">
            <p style="display:none;">' . $insertedBookId . '</p>
            <div class="image-con">
                <img class="image-prod" src="photo/' . $stk_photo . '" alt="Stock Photo">
            </div>
            <div class="detail-prod">
                <p>' . $userName . '</p>
                <p>' . $cycleName . '</p>
                <p>' . $bookingDate . '</p>
                <p>' . $price . '</p>
            </div>
        </div>

        <div class="paymethod">
            <button onclick="window.location.href=\'esewa.php\'">esewa</button>
';

include 'khalti.php';

echo '
        </div>
    </div>
</body>
</html>
';


        exit; // Make sure to include this exit statement

    } else {
        echo "<script>
                alert('Error inserting booking: " . mysqli_error($con) . "');
                window.location.href = 'product.php';
              </script>";
        exit;
    }
}
?>