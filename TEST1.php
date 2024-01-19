<?php

session_start();

include "dbconnect.php";

if (isset($_GET['user_id']) && isset($_GET['id']) && isset($_GET['booking_date'])) {
    $userId = $_GET['user_id'];
    $stkId = $_GET['id'];
    $bookingDate = $_GET['booking_date'];

    // Perform checks to ensure that userId and stkId are valid before proceeding
    $checkUserQuery = "SELECT u_id FROM tbl_user WHERE u_id = '$userId'";
    $checkStockQuery = "SELECT stk_id FROM tbl_inventory WHERE stk_id = '$stkId'";
    $checkbookid = "SELECT book_id FROM tbl_booking WHERE client_id = '$userId' AND stock_id='$stkId' date = '$bookingDate'";

    $checkUserResult = mysqli_query($con, $checkUserQuery);
    $checkStockResult = mysqli_query($con, $checkStockQuery);
    $checkBookResult = mysqli_query($con, $checkbookid);

    $checkTokenQuery = "SELECT token FROM tbl_booking WHERE book_id = '$checkBookResult' AND client_id = '$userId' AND date = '$bookingDate'";
    $tokenResult = mysqli_query($con, $checkTokenQuery);

    $tokenData = mysqli_fetch_assoc($tokenResult);

    if (mysqli_num_rows($checkUserResult) > 0 && mysqli_num_rows($checkStockResult) > 0) {
        // Both user_id and stk_id are valid, check if user has already booked for the same date
        $checkExistingBookingQuery = "SELECT * FROM tbl_booking WHERE client_id = '$userId' AND date = '$bookingDate'";
        $existingBookingResult = mysqli_query($con, $checkExistingBookingQuery);

        if (mysqli_num_rows($existingBookingResult) > 0) {
            echo '$checkBookResult';
            // $deleteNotpayBook = "ALTER * FROM tbl_booking WHERE book_id = '$checkBookResult'";
            $token = $tokenData['token'];

            if ($token != 0) {
                echo "<script>
                    alert('Booking for this date is done.');
                    window.location.href = 'product.php';
                  </script>";
            exit;
            }
                } 
                
                else {
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

            // Insert the booking along with user's name and cycle name
            $insertQuery = "INSERT INTO tbl_booking (`client_id`, `stock_id`, `username`, `cyclename`, `date`) VALUES ('$userId', '$stkId', '$userName', '$cycleName', '$bookingDate')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                $insertedBookId = mysqli_insert_id($con);

                echo "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <style>
                </style>
                    <title></title>
                </head>
                <body>
                <div class='databook'>
                <p>$insertedBookId</p>
                <p>$userName</p>
                <p>$cycleName</p>
                <p>$bookingDate</p>
                <p>$price</p>
                </div>
                <div class='paymethod'>
                <a href='esewa.php'>esew</a>
                ";
                include 'khalti.php';
                // include 'qrcode.php';
                // include 'cod.php';
                "
                </div>

                </body>
                </html>
                ";

                exit; // Make sure to include this exit statement

            } else {
                echo "<script>
                        alert('Error inserting booking: " . mysqli_error($con) . "');
                        window.location.href = 'product.php';
                      </script>";
                exit;
            }
        }
        
    } else {
        echo "<script>
                alert('Invalid user_id or stk_id');
                window.location.href = 'product.php';
              </script>";
        exit;
    }
}
?>