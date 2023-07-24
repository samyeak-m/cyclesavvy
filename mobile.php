<?php
$currentPage = 'home';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    
    <title>Cycle</title>
    <style>
            <?php include "css/mobile.css"; ?>
            
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
        
    <a class="img change home <?php if ($currentPage === 'home') echo 'active'; ?>" href="index.php">
                <img src="photo/home_green.png" class="img-top" alt="Home">
                <img src="photo/home_grey.png" alt="Home">
            </a>

            <div class="mmessage">
                <div class = "msgBtn" href = "#">

                    <div class="mBtn">
                        <div class = "nnumber">4</div>
                        <a class="img change message <?php if ($currentPage === 'message') echo 'active'; ?>">
                            <img src="photo/message_green.png" class="img-top"alt="Message">
                            <img src="photo/message_grey.png" alt="Message">
                        </a>
                    </div>
                    <div class = "mbox">
                    <div class = "ndisplay">
    
                        <div class = "ncont">
                            <div class="mhead">
                            
                                <div class="mtitle">
                                    <h1>Chats</h1>
                                </div>

                                <div class="ricon">
                                    <a href="chat.php" class="cimg"><img src="photo/expand.png" alt="see all"></a>
                                    <a href="message.php" class="cimg"><img src="photo/newmessage.png" alt="new chat"></a>
                                    
                                </div>
                                
                            </div>

                            <div class="msearchbar">
                
                                <a class="msearch">
                                <input type="text" id="msearchbox" placeholder="Search..." onkeyup="micon_change(this)">
                                <button type="submit" id="msbtn" onmousemove="mcheck(this)" onmouseleave="mgray(this)" style="background-image: url(&quot;photo/search_green.png&quot;);"></button>
                                
                                </a>
                            </div>
    
                        <div class = "nsec nnew">
                            <a href = "message.php">
                            <div class = "nprofCont">
                            <img class = "nprofile" src = "photo/user.png">
                            </div>
                            <div class = "ntxt mname">Jhon Doe</div>
                            <div class = "ntxt">Jhon liked your post: "Pure css notification box"</div>
                            <div class = "ntxt nsub">11/7 - 2:30 pm</div>
                            </a>
                        </div>
                        
                        <div class = "nsec">
                            <a href = "message.php">
                            <div class = "nprofCont">
                            <img class = "nprofile" src = "photo/user.png">
                            </div>
                            <div class = "ntxt mname">Debra dan</div>
                            <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
                            <div class = "ntxt nsub">11/5 - 10:20 am</div>
                            </a>
                        </div>

                        
    
                    </div>
    
                    </div>
    
                </div>
            </div>
            </div>

            <div class="nnotification">
                <div class = "notBtn" href = "#">
                    <div class="nBtn">
                        <div class = "nnumber">2</div>
                        <a class="img change notification <?php if ($currentPage === 'notification') echo 'active'; ?>">
                            <img src="photo/notification_green.png" class="img-top" alt="Notification">
                            <img src="photo/notification_grey.png"  alt="Notification">
                        </a>
                    </div>
                    <div class = "nbox">
                        <div class = "ndisplay">
                            <div class = "ncon">
                                
                                <div class="nhead">
                                    
                                    <div class="ntitle">
                                        <h1>Notifications</h1>
                                    </div>

                                    <div class="nltext">
                                        <a href="#all" class="ntext npar active"><h4>All</h4></a>
                                        <a href="#unread" class="ntext npar"><h4>Unread</h4></a>
                                        <a href="notification.php" class="ntext nrtext npar"><h4>see all</h4></a>
                                    </div>                                    
                                </div>
                                
                                <div class = "nsec nnew">
                                <a href = "#">
                                <div class = "nprofCont">
                                <img class = "nprofile" src = "photo/user.png">
                                    </div>
                                <div class = "ntxt">James liked your post: "Pure css notification box"</div>
                                <div class = "ntxt nsub">11/7 - 2:30 pm</div>
                                </a>
                                </div>

                                <div class = "nsec nnew">
                                    <a href = "#">
                                    <div class = "nprofCont">
                                    <img class = "nprofile" src = "photo/user.png">
                                    </div>
                                    <div class = "ntxt">James liked your post: "Pure css notification box"</div>
                                <div class = "ntxt nsub">11/7 - 2:30 pm</div>
                                    </a>
                                </div>
                                
                                <div class = "nsec">
                                <a href = "#">
                                <div class = "nprofCont">
                                <img class = "nprofile" src = "photo/user.png">
                                    </div>
                                <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
                                <div class = "ntxt nsub">11/5 - 10:20 am</div>
                                </a>
                                </div>

                                <div class = "nsec">
                                    <a href = "#">
                                    <div class = "nprofCont">
                                    <img class = "nprofile" src = "photo/user.png">
                                    </div>
                                    <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
                                <div class = "ntxt nsub">11/5 - 10:20 am</div>
                                    </a>
                                </div>

                                <div class = "nsec">
                                    <a href = "#">
                                    <div class = "nprofCont">
                                    <img class = "nprofile" src = "photo/user.png">
                                    </div>
                                    <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
                                <div class = "ntxt nsub">11/5 - 10:20 am</div>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="puser">
                <div class = "puBtn" href = "#">
                    <div class="pBtn">
                        <a class="img user">
                            <img src="photo/user.png" alt="User">
                        </a>
                    </div>

                    <div class = "pbox">
                        <div class = "ndisplay">
                        <div class="uprofile">
                        <a href="#profile" class="uimg"><img src="photo/user.png" alt="User Profile"></a>

                        <div class="notsign">
                            <a class="popbtn" onclick="document.getElementById('popsign').style.display='flex'" style="width:auto;">Login</a>
                            <div id="popsign" class="modal">
                                <div class="container animate" id="container">
                            
                                <span onclick="document.getElementById('popsign').style.display='none'" class="close">&times;</span>
                                    <div class="form-container sign-up-container">
                                <form action="#">
                                    <h1>Create Account</h1>
                                
                                    <input type="text" placeholder="Name" />
                                    <input type="email" placeholder="Email" />
                                    <input type="password" placeholder="Password" />
                                    <button>Sign Up</button>
                                </form>
                            </div>
                            <div class="form-container sign-in-container">
                                <form action="#">
                                    <h1>Sign in</h1>

                                    <input type="email" placeholder="Email" />
                                    <input type="password" placeholder="Password" />
                                    <a class="fpsw" href="#">Forgot your password?</a>
                                    <button>Sign In</button>
                                </form>
                            </div>
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-left">
                                        <h1>Welcome Back!</h1>
                                        <p>To keep connected with us please login with your personal info</p>
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
                                <p>User Name</p>
                            </div>

                            </div> 
                            
                            <div class="auser">
                                    <div class="activities">
                                        <a href = "#">My Orders</a>
                                        <a href = "#">My Booking</a>
                                        <a href = "#">Change Password</a>
                                        <a href = "#">Log out </a>
                                    </div>
                                </div>
                                
                          
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

<script>
// mobile header start
var prevScrollpos= window.pageYoffset;
var html = document.documentElement;
    var body = document.body;
var currentwidth = document.documentElement.clientWidth;

window.addEventListener('scroll', function() {
    var width = document.documentElement.clientWidth;
       


  if (width <= 780) {

        var currentScrollPos = window.pageYOffset;
        
        if (prevScrollpos < currentScrollPos) {        
            document.getElementById("right").style.display="none";
        } else if (prevScrollpos > currentScrollPos) {        
            document.getElementById("right").style.display="flex";
        }
            prevScrollpos = currentScrollPos;
      }
  else{
  }

});

// mobile header end

// search start
    function icon_change(textbox){
        
        var obj=document.getElementById("sbtn");
        if(textbox.value==""){
            obj.style.backgroundImage="url('photo/search_green.png')";
        }else{
            obj.style.backgroundImage="url('photo/search_grey.png')";
        }
       
    }
    function check(obj){
        obj.style.backgroundImage="url('photo/search_green.png')";
    } function gray(obj){
        if(document.getElementById("searchbox").value!="")
        obj.style.backgroundImage="url('photo/search_grey.png')";
    }

// search end

// notification dropdown
document.addEventListener("DOMContentLoaded", function() {
var notBtn = document.querySelector(".nBtn");
var box = document.querySelector(".nbox");
var width = document.documentElement.clientWidth;

  function onResize(event) {
    width = document.documentElement.clientWidth; 
  }

  function onClick() {
    if (width >780) {
        <?php if ($currentPage !== 'notification') { ?>
		if(box.classList.contains("active")==false){
			box.classList.add("active");
		}else{
			box.classList.remove("active");
		}

        <?php } ?>

  	document.addEventListener("click", function(event) {
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

  window.addEventListener("resize", function() {
    notBtn.removeEventListener("click", onClick); 
    onResize();
    notBtn.addEventListener("click", onClick);
  });
});

// notification end

// message dropdown

document.addEventListener("DOMContentLoaded", function() {
  var notBtn = document.querySelector(".mBtn");
  var box = document.querySelector(".mbox");
  var search = document.querySelector(".search");
  var width = document.documentElement.clientWidth; 

  function onResize(event) {
    width = document.documentElement.clientWidth; 
	}

  function onClick() {
    if (width >781) {
        <?php if ($currentPage !== 'message') { ?>
		if(box.classList.contains("active")==false){
			box.classList.add("active");
		}else{
			box.classList.remove("active");
		}
        <?php } ?>
  	document.addEventListener("click", function(event) {
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

  window.addEventListener("resize", function() {
    notBtn.removeEventListener("click", onClick); 
    onResize();
    notBtn.addEventListener("click", onClick);
  });
});

// message end

// message search start

function micon_change(textbox){
        
        var obj=document.getElementById("msbtn");
        if(textbox.value==""){
            obj.style.backgroundImage="url('photo/search_green.png')";
        }else{
            obj.style.backgroundImage="url('photo/search_grey.png')";
        }  
    }

    function mcheck(obj){
        obj.style.backgroundImage="url('photo/search_green.png')";
    } function mgray(obj){
        if(document.getElementById("msearchbox").value!="")
        obj.style.backgroundImage="url('photo/search_grey.png')";
    }

// message search end

// user dropdown start

document.addEventListener("DOMContentLoaded", function() {
var notBtn = document.querySelector(".pBtn");
var box = document.querySelector(".pbox");
var width = document.documentElement.clientWidth;

  function onResize(event) {
    width = document.documentElement.clientWidth; 
	
  }

  function onClick() {
    if (width >780) {
		if(box.classList.contains("active")==false){
			box.classList.add("active");
		}else{
			box.classList.remove("active");
		}

  	document.addEventListener("click", function(event) {
    if (!box.contains(event.target) && !notBtn.contains(event.target)) {
      box.classList.remove("active");
    }
  });
    } else {
		window.location.href = "#profile";
    }
  }

  notBtn.addEventListener("click", onClick);

  window.addEventListener("resize", function() {
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
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
</body>
</html>