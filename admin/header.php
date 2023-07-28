<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Document</title>

    <style>
        <?php include "css/header.css"; ?>
    </style>
</head>
<body>
    
<header id="header">
<navbar>

    <div class="left">
        <a class="logo" href="index.html"><img src="../photo/logo.png" alt="logo"></a>
    </div>

    <div class="center">

        <a class="anav product <?php if ($currentPage === 'product') echo 'active'; ?>" href="index.php">Product</a>
        <a class="anav message <?php if ($currentPage === 'chat') echo 'active'; ?>" href="message.php">Message</a>
        <a class="anav notification <?php if ($currentPage === 'notification') echo 'active'; ?>" href="notification.php">Notification</a>
        <a class="anav contact <?php if ($currentPage === 'contact') echo 'active'; ?> " href="index.html">Contact us</a>
        <a class="anav logout" href="index.html">Log Out</a>

    </div>

    <div class="menu"> </div>
    <div class="menuToggle">

            <input onclick="menu(this)" type="checkbox" />

        <span></span>
        <span></span>
        <span></span>

       

        
            <div class="menu-list">
            <a class="anav <?php if ($currentPage === 'product') echo 'active'; ?>" href="index.php"><li>Product</li></a>
            <a class="anav <?php if ($currentPage === 'chat') echo 'active'; ?>" href="admin-chat.php"><li>Message</li></a>
            <a class="anav <?php if ($currentPage === 'notification') echo 'active'; ?>" href="notification.php"><li>Notification</li></a>
            <a class="anav <?php if ($currentPage === 'contact') echo 'active'; ?>" href="index.php"><li>Contact us</li></a>
            <a class="anav" href="index.php"><li>Log Out</li></a>
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
    container.style.filter="blur(2px)";
  } else {
    menu.style.display = "none";
    container.style.filter="none";


    }
}
    
</script>

</body>
</html>