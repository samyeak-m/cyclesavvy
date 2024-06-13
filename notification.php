<?php
$currentPage = 'notification';
include("header.php");

include "dbconnect.php"; // Include database connection

if (isset($_SESSION['u_id'])) {
    $userId = $_SESSION['u_id'];

    // Fetch notifications for the user from the database
    $fetchNotificationsQuery = "
        SELECT 
            
            tb.cyclename,
            tb.date AS booking_date,
            ti.stk_id,
            ti.name AS cycle_name,
            ti.price AS cycle_price,
            ti.description AS cycle_description,
            ti.photo AS cyclephoto
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
            <title>Notifications</title>
            <style>  
                <?php include "css/notification.css"; ?>
            </style>
        </head>
        <body>
            <div class="nothead">
                <div class="notbody">        
                    <div class="nottitle">
                        <h1>Notifications</h1>
                    </div>

                    <?php
                    while ($notificationData = mysqli_fetch_assoc($fetchNotificationsResult)) {
                        $cycleName = $notificationData['cyclename'];
                        $bookingDate = $notificationData['booking_date'];
                        $cyclePhoto = $notificationData['cyclephoto'];

                        ?>
                        <div class="sec">
                            <div class="profCont">
                                <img class="profile" src="photo/<?php echo $cyclePhoto; ?>" onerror="src='photo/user.png'">
                            </div>
                            <div class="txt">
                                <?php echo "$cycleName has been booked on $bookingDate."; ?>
                            </div>
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
} else {
    echo "<script>alert('User not logged in.')</script>";
}
?>
