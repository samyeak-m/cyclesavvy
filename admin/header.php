<?php
session_start();
$adminname = "no-user";
$id = "no-id";

if (!isset($_SESSION['edit'])) {
    header('Location:login.php');

} else {
    $adminname = $_SESSION['a_name'];

}

if (isset($_SESSION['a_id'])) {
    $id = $_SESSION['a_id'];
}

if (!isset($_SESSION['edit'])){
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Dashboard</title>

    <style>
        <?php include "css/header.css"; ?>
    </style>
</head>

<body>

    <header id="header">
        <navbar>

            <div class="left">
                <a class="logo" href="index.php"><img src="../photo/logo.png" alt="logo"></a>
            </div>

            <div class="center">

                <a class="anav product <?php if ($currentPage === 'product')
                    echo 'active'; ?>"
                    href="index.php">Product</a>
                <a class="anav message <?php if ($currentPage === 'chat')
                    echo 'active'; ?>"
                    href="message.php">Message</a>
                <a class="anav notification <?php if ($currentPage === 'notification')
                    echo 'active'; ?>"
                    href="notification.php">Notification</a>
                <a class="anav contact <?php if ($currentPage === 'contact')
                    echo 'active'; ?> "
                    href="contact.php">Contact us</a>
                <div class="profile-dropdown">
                    <a class="anav profile-btn" href="#">Profile</a>
                    <div class="profile-dropdown-content">
                        <a class="anav" href="editadmin.php?id=<?php echo $id; ?>">Edit Profile</a>
                        <a class="anav" href="logout.php">Logout</a>
                    </div>
                </div>

            </div>

            <div class="menu"> </div>
            <div class="menuToggle">

                <input onclick="menu(this)" type="checkbox" />

                <span></span>
                <span></span>
                <span></span>




                <div class="menu-list">
                    <a class="anav <?php if ($currentPage === 'product')
                        echo 'active'; ?>" href="index.php">
                        <li>Product</li>
                    </a>
                    <a class="anav <?php if ($currentPage === 'booking')
                        echo 'active'; ?>" href="booking.php">
                        <li>Booking</li>
                    </a>
                    <a class="anav <?php if ($currentPage === 'chat')
                        echo 'active'; ?>" href="admin-chat.php">
                        <li>Message</li>
                    </a>
                    <a class="anav <?php if ($currentPage === 'contact')
                        echo 'active'; ?>" href="contact.php">
                        <li>Contact us</li>
                    </a>
                    <a class="anav <?php if ($currentPage === 'edit')
                        echo 'active'; ?>" href="editadmin.php">
                        <li>Edit Profile</li>
                    </a>
                    <a class="anav" href="logout.php">
                        <li>Log Out</li>
                    </a>
                </div>
            </div>
        </navbar>
    </header>

    <script>
        function menu() {
            var menu = document.querySelector(".menu");
            var container = document.querySelector(".container");


            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
                container.style.filter = "blur(2px)";
            } else {
                menu.style.display = "none";
                container.style.filter = "none";


            }
        }

    </script>

</body>

</html>