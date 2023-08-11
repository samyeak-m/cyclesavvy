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

    $checkUserResult = mysqli_query($con, $checkUserQuery);
    $checkStockResult = mysqli_query($con, $checkStockQuery);

    if (mysqli_num_rows($checkUserResult) > 0 && mysqli_num_rows($checkStockResult) > 0) {
        // Both user_id and stk_id are valid, check if user has already booked for the same date
        $checkExistingBookingQuery = "SELECT * FROM tbl_booking WHERE client_id = '$userId' AND date = '$bookingDate'";
        $existingBookingResult = mysqli_query($con, $checkExistingBookingQuery);

        if (mysqli_num_rows($existingBookingResult) > 0) {
            echo "<script>alert('You have already booked a cycle for this date.');
            window.location.href = 'product.php';
            </script>";
        } else {
            // User hasn't booked for this date, proceed with the booking
            $getUserQuery = "SELECT name FROM tbl_user WHERE u_id = '$userId'";
            $getUserResult = mysqli_query($con, $getUserQuery);
            $userData = mysqli_fetch_assoc($getUserResult);
            $userName = $userData['name'];

            $getCycleQuery = "SELECT name FROM tbl_inventory WHERE stk_id = '$stkId'";
            $getCycleResult = mysqli_query($con, $getCycleQuery);
            $cycleData = mysqli_fetch_assoc($getCycleResult);
            $cycleName = $cycleData['name'];

            // Insert the booking along with user's name and cycle name
            $insertQuery = "INSERT INTO tbl_booking (`client_id`, `stock_id`, `username`, `cyclename`, `date`) VALUES ('$userId', '$stkId', '$userName', '$cycleName', '$bookingDate')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                $insertedBookId = mysqli_insert_id($con);
                echo "<script>
                        alert('Booking done! Book ID: $insertedBookId, User Name: $userName, Cycle Name: $cycleName, Date: $bookingDate');
                        window.location.href = 'product.php';
                      </script>";
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
