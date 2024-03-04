<?php
$currentPage = 'booking';
include("header.php");
if (isset($_SESSION['u_id'])) {
    $userId = $_SESSION['u_id'];}

include "dbconnect.php"; // Include database connection

if(isset($_POST['delete_booking'])){
    $bookingId = $_POST['book_id'];
    $deleteBookingQuery = "DELETE FROM tbl_booking WHERE book_id = $bookingId";
    $deleteBookingResult = mysqli_query($con, $deleteBookingQuery);
    if($deleteBookingResult){
        // Booking deleted successfully
        echo "<script>alert('Booking deleted successfully.')</script>";
    } else {
        // Error deleting booking
        echo "<script>alert('Error deleting booking: " . mysqli_error($con) . "')</script>";
    }
}
    
    // Fetch notifications for the user from the database
    $fetchNotificationsQuery = "
    SELECT 
    tb.book_id,
    tb.cyclename,
    tb.date AS booking_date,
    ti.stk_id,
    ti.name AS cycle_name,
    ti.price AS cycle_price,
    ti.photo AS cyclephoto,
    tb.username AS user
FROM 
    tbl_booking tb
JOIN 
    tbl_inventory ti ON tb.stock_id = ti.stk_id
WHERE 
    tb.client_id = '$userId'
ORDER BY 
    tb.date DESC
    ";

    $fetchNotificationsResult = mysqli_query($con, $fetchNotificationsQuery);

if (!$fetchNotificationsResult) {
    echo "<script>alert('Query error: ' .' mysqli_error($con); '. )</script>";
    exit;
}

    if ($fetchNotificationsResult) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
            <title>Booking</title>
            <style>  
                <?php include "css/notification.css"; ?> 
            </style>
        </head>
        <body>
            <div class="nothead">
                <div class="notbody">        
                    <div class="nottitle">
                        <h1>Booking</h1>
                    </div>

                    <?php
                    while ($notificationData = mysqli_fetch_assoc($fetchNotificationsResult)) {
                        $bookingId = $notificationData['book_id'];
                        $cyclename = $notificationData['cyclename'];
                        $bookingDate = $notificationData['booking_date'];
                        $cyclePhoto = $notificationData['cyclephoto'];
                        $cycleUser = $notificationData['user'];
                        ?>
                        <div class="sec">
                            <div class="profCont">
                                <img class="profile" src="photo/<?php echo $cyclePhoto; ?>" onerror="src='photo/user.png'">
                            </div>
                            <div class="txt">
                                <?php echo "$cyclename has been booked on $bookingDate by $cycleUser."; ?>
                    </div>
                    <form method="post" action="" onsubmit="return confirmDelete();">
                        <input type="hidden" name="book_id" value="<?php echo $bookingId; ?>">
                        <button class='delete-product updatebtn' type="submit" name="delete_booking">Delete</button>
                    </form>
                        </div>
                        <?php
                    }
                    ?>
                   
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<script>alert('Error fetching notifications: " . mysqli_error($con) . "')</script>";
    }
// } else {
//     echo "<script>alert('User not logged in.')</script>";
// }
?>
<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this booking?");
        }
    </script>