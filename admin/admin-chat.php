<?php
$currentPage = 'chat';
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <link rel="stylesheet" href="css/admin-chat.css">
</head>
<body>
<div class="mgmessage">
    <div class="mgbody">
        <div class="mgtitle">
            <div class="mghead">
                <h1>Chats</h1>
            </div>

            <div class="mgricon">
                <a href="message.php" class="mgcimg"><img src="../photo/newmessage.png" alt="new chat"></a>
            
            </div>   
        </div>                         

        <div class="mgmsearchbar">
                    
            <a class="mgmsearch">
            <input type="text" id="mgmsearchbox" placeholder="Search..." onkeyup="micon_change(this)">
            <button type="submit" id="mgmsbtn" onmousemove="mcheck(this)" onmouseleave="mgray(this)" style="background-image: url(&quot;../photo/search_green.png&quot;);"></button>
            </a>
        </div>
        
        <div class="nsec nnew">
        <a href="message.php">
        <div class="nprofCont">
        <img class="nprofile" src = "../photo/user.png">
        </div>
        <div class="ntxt mname">Jhon Doe</div>
        <div class = "ntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/7 - 2:30 pm</div>
        </a>
        </div>
                            
        <div class = "nsec">
        <a href = "message.php">
        <div class = "nprofCont">
        <img class = "nprofile" src = "../photo/user.png">
        </div>
        <div class = "ntxt mname">Debra dan</div>
        <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/5 - 10:20 am</div>
        </a>
        </div>

        <div class = "nsec">
        <a href = "message.php">
        <div class = "nprofCont">
        <img class = "nprofile" src = "../photo/user.png">
        </div>
        <div class = "ntxt mname">Jhon Doe</div>
        <div class = "ntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/7 - 2:30 pm</div>
        </a>
        </div>
                            
        <div class = "nsec nnew">
        <a href = "message.php">
        <div class = "nprofCont">
        <img class = "nprofile" src = "../photo/user.png">
        </div>
        <div class = "ntxt mname">Debra dan</div>
        <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/5 - 10:20 am</div>
        </a>
        </div>

        <div class = "nsec">
        <a href = "message.php">
        <div class = "nprofCont">
        <img class = "nprofile" src = "../photo/user.png">
        </div>
        <div class = "ntxt mname">Jhon Doe</div>
        <div class = "ntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/7 - 2:30 pm</div>
        </a>
        </div>
                            
        <div class = "nsec">
        <a href = "message.php">
        <div class = "nprofCont">
        <img class = "nprofile" src = "../photo/user.png">
        </div>
        <div class = "ntxt mname">Debra dan</div>
        <div class = "ntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "ntxt nsub">11/5 - 10:20 am</div>
        </a>
        </div>


    </div>
</div>

<script>
    function micon_change(textbox){
        
        var obj=document.getElementById("mgmsbtn");
        if(textbox.value==""){
            obj.style.backgroundImage="url('../photo/search_green.png')";
        }else{
            obj.style.backgroundImage="url('../photo/search_grey.png')";
        }  
    }

    function mcheck(obj){
        obj.style.backgroundImage="url('../photo/search_green.png')";
    } function mgray(obj){
        if(document.getElementById("mgmsearchbox").value!="")
        obj.style.backgroundImage="url('../photo/search_grey.png')";
    }

    var width = document.documentElement.clientWidth;

    document.addEventListener("DOMContentLoaded", function() {
        if (width >781) {
            window.location.href = "message.php";
        }
    
    });

</script>

</body>
</html>