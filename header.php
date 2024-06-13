<?php
session_start();
$username = "no-user";
$id = "no-id";
$login = "false";

if (!isset($_SESSION['name'])) {
    $displayAuser = "none";
    $displayUprofile = "flex";

} else {
    $username = $_SESSION['name'];
    $displayAuser = "flex";
    $displayUprofile = "none";
    $login = "true";

}

if (isset($_GET['error'])) {
    echo '<script>alert("Either username or password is wrong");</script>';
    echo '<script>window.history.replaceState(null, null, window.location.href.split("?")[0]);</script>';

} else {
    if (isset($_SESSION['u_id'])) {
        $id = $_SESSION['u_id'];
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Cycle</title>
    <style>
        <?php include "css/header.css"; ?>
    </style>


</head>

<body>

    <div class="header">
        <div class="navbar">

            <div class="left">

                <a class="search">
                    <input type="text" id="searchbox" placeholder="Search" onkeyup="icon_change(this)">
                    <button type="submit" id="sbtn" onmousemove="check(this)" onmouseleave="gray(this)"></button>

                </a>
            </div>

            <div class="center">
                <a class="logo" href="index.php"><img src="photo/logo.png" alt="Logo"></a>
            </div>


            <div class="right" id="right">

                <a class="img change home <?php if ($currentPage === 'home')
                    echo 'active'; ?>" href="index.php" <?php if ($displayAuser == "none") {
                          echo 'style="margin-right:15px"';
                      } ?>>
                    <img src="photo/home_green.png" class="img-top" alt="Home">
                    <img src="photo/home_grey.png" alt="Home">
                </a>

                <div class="mmessage" style="display: <?php echo $displayAuser; ?>">
                    <div class="msgBtn" href="#">

                        <div class="mBtn">
                            <div class="nnumber">4</div>
                            <a class="img change message <?php if ($currentPage === 'message')
                                echo 'active'; ?>">
                                <img src="photo/message_green.png" class="img-top" alt="Message">
                                <img src="photo/message_grey.png" alt="Message">
                            </a>
                        </div>
                        <div class="mbox">
                            <div class="ndisplay">

                                <div class="ncont">
                                    <div class="mhead">

                                        <div class="mtitle">
                                            <h1>Chats</h1>
                                        </div>

                                        <div class="ricon">
                                            <a href="chat.php" class="cimg"><img src="photo/expand.png"
                                                    alt="see all"></a>
                                            <a href="message.php" class="cimg"><img src="photo/newmessage.png"
                                                    alt="new chat"></a>

                                        </div>

                                    </div>

                                    <div class="msearchbar">

                                        <a class="msearch">
                                            <input type="text" id="msearchbox" placeholder="Search..."
                                                onkeyup="micon_change(this)">
                                            <button type="submit" id="msbtn" onmousemove="mcheck(this)"
                                                onmouseleave="mgray(this)"
                                                style="background-image: url(&quot;photo/search_green.png&quot;);"></button>

                                        </a>
                                    </div>

                                    <div class="nsec nnew">
                                        <a href="message.php">
                                            <div class="nprofCont">
                                                <img class="nprofile" src="photo/user.png">
                                            </div>
                                            <div class="ntxt mname">Jhon Doe</div>
                                            <div class="ntxt">Jhon liked your post: "Pure css notification box"</div>
                                            <div class="ntxt nsub">11/7 - 2:30 pm</div>
                                        </a>
                                    </div>

                                    <div class="nsec">
                                        <a href="message.php">
                                            <div class="nprofCont">
                                                <img class="nprofile" src="photo/user.png">
                                            </div>
                                            <div class="ntxt mname">Debra dan</div>
                                            <div class="ntxt">Debra liked your post: "Pure css notification box"</div>
                                            <div class="ntxt nsub">11/5 - 10:20 am</div>
                                        </a>
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="nnotification" style="display: <?php echo $displayAuser; ?>">
                    <div class="notBtn" href="#">
                        <div class="nBtn">
                            <div class="nnumber">2</div>
                            <a class="img change notification <?php if ($currentPage === 'notification')
                                echo 'active'; ?>">
                                <img src="photo/notification_green.png" class="img-top" alt="Notification">
                                <img src="photo/notification_grey.png" alt="Notification">
                            </a>
                        </div>
                        <div class="nbox">
                            <div class="ndisplay">
                                <div class="ncon">

                                    <div class="nhead">

                                        <div class="ntitle">
                                            <h1>Notifications</h1>
                                        </div>

                                        <div class="nltext">
                                            <a href="#all" class="ntext npar active">
                                                <h4>All</h4>
                                            </a>
                                            <a href="#unread" class="ntext npar">
                                                <h4>Unread</h4>
                                            </a>
                                            <a href="notification.php" class="ntext nrtext npar">
                                                <h4>see all</h4>
                                            </a>
                                        </div>
                                    </div>

                                    <?php

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
                                            while ($notificationData = mysqli_fetch_assoc($fetchNotificationsResult)) {
                                                $cycleName = $notificationData['cyclename'];
                                                $bookingDate = $notificationData['booking_date'];
                                                $cyclePhoto = $notificationData['cyclephoto'];

                                                ?>

                                                <div class="nsec nnew">
                                                    <a href="#">
                                                        <div class="nprofCont">
                                                            <img class="nprofile" src="photo/user.png">
                                                        </div>
                                                        <div class="ntxt">
                                                            <?php echo "$cycleName has been booked on $bookingDate."; ?>

                                                        </div>
                                                        <div class="ntxt nsub">11/7 - 2:30 pm</div>
                                                    </a>
                                                </div>

                                                <?php
                                            }

                                        } else {
                                            echo "<script>alert('Error fetching notifications: " . mysqli_error($con) . "')</script>";
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="puser">
                    <div class="puBtn" href="#">
                        <div class="pBtn">
                            <a class="img user <?php if ($currentPage === 'profile')
                                echo 'active'; ?>">
                                <img src="photo/user.png" alt="User">
                            </a>
                        </div>

                        <div class="pbox">
                            <div class="ndisplay">
                                <div class="uprofile" id="uprofile" style="display: <?php echo $displayUprofile; ?>">
                                    <a class="uimg" onclick="document.getElementById('popsign').style.display='flex'"
                                        style="width:auto;"><img src="photo/user.png" alt="User Profile"></a>

                                    <div class="notsign">
                                        <a class="popbtn"
                                            onclick="document.getElementById('popsign').style.display='flex'"
                                            style="width:auto;">Login</a>
                                        <div id="popsign" class="modal">
                                            <div class="container animated" id="container">

                                                <span onclick="document.getElementById('popsign').style.display='none'"
                                                    class="close">&times;</span>
                                                <div class="form-container sign-up-container">
                                                    <form method="post" id="myform" action="saveuser.php"
                                                        enctype="multipart/form-data" onsubmit="return validateForm()">
                                                        <h1>Create Account</h1>

                                                        <div class="form_group field">
                                                            <input type="input" name="name" class="form_field"
                                                                placeholder="Name" id="name"
                                                                oninput="clearError('name')" class="input-clear">
                                                            <label for="name" class="form_label">Name</label>
                                                        </div>
                                                        <div id="nameError" class="error"></div>

                                                        <div class="form_group field">
                                                            <input type="input" name="email" class="form_field"
                                                                placeholder="Email" id="email"
                                                                oninput="clearError('email')" class="input-clear">
                                                            <label for="email" class="form_label">Email</label>
                                                            <div id="emailError" class="error"></div>
                                                        </div>

                                                        <div class="form_group field">
                                                            <input type="tel" name="phone" class="form_field"
                                                                placeholder="Phone" id="phone"
                                                                oninput="clearError('phone')" class="input-clear">
                                                            <label for="phone" class="form_label">Phone</label>
                                                            <div id="phoneError" class="error"></div>
                                                        </div>

                                                        <div class="form_group field">
                                                            <input type="password" name="password" class="form_field"
                                                                placeholder="Password" id="password"
                                                                oninput="clearError('password')" class="input-clear">
                                                            <label for="password" class="form_label">Password</label>
                                                            <div id="passwordError" class="error"></div>
                                                        </div>

                                                        <button>Sign Up</button>
                                                    </form>
                                                </div>
                                                <div class="form-container sign-in-container">
                                                    <form action="logincheck.php" method="post">
                                                        <h1>Sign in</h1>

                                                        <div class="form_group field">
                                                            <input type="email" name="email" class="form_field"
                                                                placeholder="Email" required />
                                                            <label for="email" class="form_label">Email</label>
                                                        </div>

                                                        <div class="form_group field">
                                                            <input type="password" name="password" id="log_password"
                                                                class="form_field" placeholder="Password" required />
                                                            <label for="password" class="form_label">Password</label>
                                                            <a class="fpsw" href="#">Forgot your password?</a>

                                                        </div>

                                                        <button>Sign In</button>
                                                    </form>
                                                </div>
                                                <div class="overlay-container">
                                                    <div class="overlay">
                                                        <div class="overlay-panel overlay-left">
                                                            <h1>Welcome Back!</h1>
                                                            <p>To keep connected with us please login with your personal
                                                                info</p>
                                                            <button class="ghost" id="signIn">Sign In</button>
                                                        </div>
                                                        <div class="overlay-panel overlay-right">
                                                            <h1>Hello!</h1>
                                                            <p>Enter your personal details and start journey with us</p>
                                                            <button class="ghost" id="signUp">Sign Up</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uname">
                                        <p>
                                            <?php echo $username; ?>
                                        </p>
                                    </div>

                                </div>

                                <div class="auser" id="auser" style="display: <?php echo $displayAuser; ?>">
                                    <div class="activities">
                                        <!-- <a href = "#">Whislist</a> -->
                                        <a href="mybooking.php">My Booking</a>
                                        <a href="editprofile.php?id=<?php echo $id; ?>">Edit Profile</a>
                                        <a href="logout.php">Log out </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/validation.js"></script>

    <script>

        // mobile header start
        var prevScrollpos = window.pageYoffset;
        document.addEventListener('scroll', function () {
            var width = document.documentElement.clientWidth;

            if (width <= 780) {

                var currentScrollPos = window.pageYOffset;

                if (prevScrollpos < currentScrollPos) {
                    document.getElementById("right").style.display = "none";
                } else if (prevScrollpos > currentScrollPos) {
                    document.getElementById("right").style.display = "flex";

                }
                prevScrollpos = currentScrollPos;
            }
        });

        // mobile header end

        // search start
        function icon_change(textbox) {

            var obj = document.getElementById("sbtn");
            if (textbox.value == "") {
                obj.style.backgroundImage = "url('photo/search_green.png')";
            } else {
                obj.style.backgroundImage = "url('photo/search_grey.png')";
            }

        }
        function check(obj) {
            obj.style.backgroundImage = "url('photo/search_green.png')";
        } function gray(obj) {
            if (document.getElementById("searchbox").value != "")
                obj.style.backgroundImage = "url('photo/search_grey.png')";
        }

        // search end

        // notification dropdown
        document.addEventListener("DOMContentLoaded", function () {
            var notBtn = document.querySelector(".nBtn");
            var box = document.querySelector(".nbox");
            var width = document.documentElement.clientWidth;

            function onResize(event) {
                width = document.documentElement.clientWidth;
            }

            function onClick() {
                if (width > 780) {
                    <?php if ($currentPage !== 'notification') { ?>
                        if (box.classList.contains("active") == false) {
                            box.classList.add("active");
                        } else {
                            box.classList.remove("active");
                        }

                    <?php } ?>

                    document.addEventListener("click", function (event) {
                        if (!box.contains(event.target) && !notBtn.contains(event.target)) {
                            box.classList.remove("active");
                        }
                    });
                } else {
                    <?php if ($currentPage !== 'notification') { ?>
                        window.location.href = "notification.php";
                    <?php } ?>
                }
            }

            notBtn.addEventListener("click", onClick);

            window.addEventListener("resize", function () {
                notBtn.removeEventListener("click", onClick);
                onResize();
                notBtn.addEventListener("click", onClick);
            });
        });

        // notification end

        // message dropdown

        document.addEventListener("DOMContentLoaded", function () {
            var notBtn = document.querySelector(".mBtn");
            var box = document.querySelector(".mbox");
            var search = document.querySelector(".search");
            var width = document.documentElement.clientWidth;

            function onResize(event) {
                width = document.documentElement.clientWidth;
            }

            function onClick() {
                if (width > 781) {
                    <?php if ($currentPage !== 'message') { ?>
                        if (box.classList.contains("active") == false) {
                            box.classList.add("active");
                        } else {
                            box.classList.remove("active");
                        }
                    <?php } ?>
                    document.addEventListener("click", function (event) {
                        if (!box.contains(event.target) && !notBtn.contains(event.target)) {
                            box.classList.remove("active");
                        }

                    });
                }

                else {
                    <?php if ($currentPage !== 'message') { ?>
                        window.location.href = "chat.php";
                    <?php } ?>

                }
            }

            notBtn.addEventListener("click", onClick);

            window.addEventListener("resize", function () {
                notBtn.removeEventListener("click", onClick);
                onResize();
                notBtn.addEventListener("click", onClick);
            });
        });

        // message end

        // message search start

        function micon_change(textbox) {

            var obj = document.getElementById("msbtn");
            if (textbox.value == "") {
                obj.style.backgroundImage = "url('photo/search_green.png')";
            } else {
                obj.style.backgroundImage = "url('photo/search_grey.png')";
            }
        }

        function mcheck(obj) {
            obj.style.backgroundImage = "url('photo/search_green.png')";
        } function mgray(obj) {
            if (document.getElementById("msearchbox").value != "")
                obj.style.backgroundImage = "url('photo/search_grey.png')";
        }

        // message search end

        // user dropdown start

        document.addEventListener("DOMContentLoaded", function () {
            const login = <?php echo json_encode($login); ?>;
            var notBtn = document.querySelector(".pBtn");
            var box = document.querySelector(".pbox");
            var width = document.documentElement.clientWidth;

            function onResize(event) {
                width = document.documentElement.clientWidth;

            }

            function onClick() {

                if (width > 780) {
                    if (box.classList.contains("active") == false) {
                        box.classList.add("active");
                    } else {
                        box.classList.remove("active");
                    }

                    document.addEventListener("click", function (event) {
                        if (!box.contains(event.target) && !notBtn.contains(event.target)) {
                            box.classList.remove("active");
                        }
                    });
                } else {
                    if (login == "false") {
                        console.log("login false");
                        window.location.href = "login.php";
                    }
                    else {
                        window.location.href = "profile.php";
                    }
                }
            }

            notBtn.addEventListener("click", onClick);

            window.addEventListener("resize", function () {
                notBtn.removeEventListener("click", onClick);
                onResize();
                notBtn.addEventListener("click", onClick);
            });
        });

        // user dropdown end

        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        var modal = document.getElementById('popsign');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

    </script>

</body>

</html>