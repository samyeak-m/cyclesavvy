<?php

$currentPage = 'profile';
include("header.php");

if($login == "false"){

    echo'<script>window.location.href = "login.php";</script>';
    exit();
}
?>
<link rel="stylesheet" href="css/profile.css">
<div class="profile-body">

    <div class="uname">
        <p>
            <?php echo $username; ?>
        </p>
    </div>


    <div class="p-user">
        <div class="p-active">
            <!-- <a href = "#">Whislist</a> -->
            <a href="mybooking.php">My Booking</a>
            <a href="editprofile.php?id=<?php echo $id; ?>">Edit Profile</a>
            <a href="logout.php">Log out </a>
        </div>
    </div>
</div>