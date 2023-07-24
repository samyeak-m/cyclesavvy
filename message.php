<?php
$currentPage = 'message';
include("header.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <link rel="stylesheet" href="css/message.css">
</head>

<body>
  <div class="msgcontainer">
    <div class="msguser-list">
      <div class = "msgncont">
        <div class="msgmhead">
        
            <div class="msgmtitle">
                <h1>Chats</h1>
            </div>

            <div class="msgricon">
                <a href="message.php" class="msgcimg"><img src="photo/newmessage.png" alt="new chat"></a>
                
            </div>
            
        </div>

        <div class="msgmsearchbar">

            <a class="msgmsearch">
            <input type="text" id="msgmsearchbox" placeholder="Search..." onkeyup="micon_change(this)">
            <button type="submit" id="msgmsbtn" onmousemove="mcheck(this)" onmouseleave="mgray(this)" style="background-image: url(&quot;photo/search_green.png&quot;);"></button>
            
            </a>
        </div>
        <div class="msgusername">
    <div class = "msgnsec msgnnew">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Jhon Doe</div>
        <div class = "msgntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/7 - 2:30 pm</div>
        </a>
    </div>
    

    <div class = "msgnsec">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Debra dan</div>
        <div class = "msgntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/5 - 10:20 am</div>
        </a>
    </div>

    <div class = "msgnsec">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Jhon Doe</div>
        <div class = "msgntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/7 - 2:30 pm</div>
        </a>
    </div>
    

    <div class = "msgnsec msgnnew">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Debra dan</div>
        <div class = "msgntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/5 - 10:20 am</div>
        </a>
    </div>
    <div class = "msgnsec">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Jhon Doe</div>
        <div class = "msgntxt">Jhon liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/7 - 2:30 pm</div>
        </a>
    </div>
    

    <div class = "msgnsec">
        <a href = "message.php">
        <div class = "msgnprofCont">
        <img class = "msgnprofile" src = "photo/user.png">
        </div>
        <div class = "msgntxt msgmname">Debra dan</div>
        <div class = "msgntxt">Debra liked your post: "Pure css notification box"</div>
        <div class = "msgntxt msgnsub">11/5 - 10:20 am</div>
        </a>
    </div>


</div>  

</div>

    </div>

    <div class="msgchat-container">
      <div class="msgchat-header">
        <a class="msgback" href="chat.php"><img src="photo/back.png" alt="back"></a>
        <a href="chat.php"><h2 id="msgmchat-title" class="msgmchat-title">Chat</h2></a>
      </div>
      <!-- <div class="msgchat-wapper"> -->
        <div class="msgchat-messages" id="msgchat-messages">
          <!-- Messages will be appended here -->
        <!-- </div> -->
      </div>
      <div class="msgchat-input">
        <textarea class="msgmessage-input" id="msgmessage-input" placeholder="Type your message..."></textarea>
        <button class="msgsend-button" id="msgsend-button">Send</button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var userList = document.querySelector('.msguser-list ul');
      var chatTitle = document.querySelector('.msgmchat-title');
      var chatMessages = document.querySelector('.msgchat-messages');
      var messageInput = document.querySelector('.msgmessage-input');
      var sendButton = document.querySelector('.msgsend-button');

      // Add event listener to send button
      sendButton.addEventListener('click', function() {
        sendMessage();
      });

      // Add event listener to message input for sending with Enter key and new line with Ctrl + Enter
      messageInput.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.keyCode === 13) {
          var obj=document.querySelector('.msgmessage-input');
          obj.value=obj.value+"\n";
        } else if (e.keyCode === 13) {
          e.preventDefault();
          var obj=document.querySelector('.msgmessage-input');
          obj.value=obj.value.replace(/\n/g,"<br>");
          sendMessage();
          
        }
      });

      // Function to send a message
      function sendMessage(newLine = false) {
        var message = messageInput.value.trim();
        if (message !== '') {
          appendMessage(message, 'msgsent');
          messageInput.value = '';
          if (newLine) {
            appendMessage('\n', '');
          }
          setTimeout(function() {
            receiveMessage('Thank you for your message!<br>hello', 'msgreceived');
          }, 500);
        }
      }

      // Function to append a message to the chat
      function appendMessage(message, className) {
        var messageContainer = document.createElement('div');
        messageContainer.classList.add('msgmessage-container', className);

        var messageElement = document.createElement('div');
        messageElement.classList.add('msgmessage', className);
        messageElement.innerHTML = message;

        messageContainer.appendChild(messageElement);
        chatMessages.appendChild(messageContainer);
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      // Function to simulate receiving a message
      function receiveMessage(message, className) {
        appendMessage(message, className);
      }

      // Function to switch chat user
      function switchUser(user) {
        chatTitle.textContent = user;
        chatMessages.innerHTML = ''; // Clear previous messages
      }

      // Add event listeners to user list items
      var userListItems = userList.querySelectorAll('li');
      userListItems.forEach(function(item) {
        item.addEventListener('click', function() {
          var user = item.textContent;
          switchUser(user);
        });
      });
    });

    $('textarea#message-input').keydown(function(e) {
      if (e.keyCode === 13 && e.ctrlKey) {
        $(this).val(function(_, value) {
          return value + '\n';
        });
        e.preventDefault();
      }
    }).keypress(function(e) {
      if (e.keyCode === 13 && !e.ctrlKey) {
        // Handle submitting the message
        alert('Submit');
        return false;
      }
    });

  function micon_change(textbox){
        
        var obj=document.getElementById("msgmsbtn");
        if(textbox.value==""){
            obj.style.backgroundImage="url('photo/search_green.png')";
        }else{
            obj.style.backgroundImage="url('photo/search_grey.png')";
        }  
    }

    function mcheck(obj){
        obj.style.backgroundImage="url('photo/search_green.png')";
    } function mgray(obj){
        if(document.getElementById("msgmsearchbox").value!="")
        obj.style.backgroundImage="url('photo/search_grey.png')";
    }

    
  </script>
</body>

</html>
