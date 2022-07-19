<?php
session_start();
if (isset($_POST['reset'])) {
  $_SESSION['chats'] = array();
  header("Location: index.php");
  return;
}
if (isset($_POST['message'])) {
  if (!isset($_SESSION['chats'])) $_SESSION['chats'] = array();
  $_SESSION['chats'][] = array($_POST['message'], date(DATE_RFC2822));
  header("Location: index.php");
  return;
}
?>
<html>
<title>g4o2 chat</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  h1 {
    font-family: 'Orbitron', arial;
    color: orange;
    font-size: 8vw;
    text-transform: uppercase;
  }

  #chatcontent {
    height: 40vh;
    width: 97vw;
    overflow: auto;
    border: solid 5px white;
  }


  #chatcontent::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    background-color: #F5F5F5;
  }

  #chatcontent::-webkit-scrollbar {
    width: 10px;
    background-color: #F5F5F5;
  }

  #chatcontent::-webkit-scrollbar-thumb {
    background-color: #F90;
    background-image: -webkit-linear-gradient(45deg,
        rgba(255, 255, 255, .2) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, .2) 50%,
        rgba(255, 255, 255, .2) 75%,
        transparent 75%,
        transparent)
  }


  .time {
    font-size: 12px;
    color: orange;
  }

  .msg {
    color: black;
    font-size: 16px;
  }

  #message-input {
    height: 33px;
    font-size: 14px;
    width: 70%;
  }

  #keys {
    height: 20vh;
    width: 52.4vw;
    margin-top: -6%;
    margin-left: 0.3%;
    background-color: rgb(200, 200, 200);
    border-radius: 10px;
    padding: 10px;
  }

  #submit {
    background-color: rgb(0, 208, 255);
  }

  #submit:hover {
    background-color: white;
    transition: all .2s ease-in-out;
  }

  #reset {
    background-color: rgb(255, 82, 82);
  }

  #reset:hover {
    background-color: white;
    transition: all .2s ease-in-out;
  }

  .button {
    height: 35px;
    font-size: 16px;
    width: 10%;
    background-color: #ffc200;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    padding: 8px;
  }

  .button:hover {
    background-color: white;
    transition: all .2s ease-in-out;
  }

  .spinner {
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 7vh;
    width: 10vw;
  }
</style>
</head>

<body>
  <h1>g4o2&nbsp;chat</h1>
  <section id="keys">
    <p>Press <kbd>Enter</kbd> to submit message</p>
    <p>Press <kbd>Esc</kbd> to deselect</p>
    <p>Press <kbd>/</kbd> to select </p>
  </section>
  <section>
    <div id="chatcontent">
      <img class="spinner" src="spinner.gif" alt="Loading..." />
    </div>
    <form id='form' autocomplete="off" method="post" action="index.php">
      <p>
        <input id='message-input' type="text" name="message" size="60" placeholder="Enter message and submit" />
        <input class='button' id="submit" type="submit" value="Chat" />
        <input class='button' id='reset' type="submit" name="reset" value="Reset" />
        <a href="chatlist.php" target="_blank">chatlist.php</a>
      </p>
    </form>
  </section>
  <script type="text/javascript" src="jquery.min.js">
  </script>
  <script type="text/javascript">
    let input = document.getElementById('message-input');
    input.focus();
    input.select();
    let pageBody = document.getElementsByTagName('body')[0];
    window.addEventListener("keydown", event => {
      if ((event.keyCode == 191)) {
        if (input === document.activeElement) {
          return;
        } else {
          input.focus();
          input.select();
          event.preventDefault();
        }
      }
      if ((event.keyCode == 27)) {
        if (input === document.activeElement) {
          document.activeElement.blur();
          window.focus();
          event.preventDefault();
        }
      }
    });
    var old_value;

    function updateMsg() {
      //window.console && console.log('Requesting JSON');
      $.getJSON('chatlist.php', function(rowz) {
        //window.console && console.log('JSON Received');
        //window.console && console.log(rowz);

        if (old_value == undefined) {
          old_value = rowz.length;
        } else {
          if (rowz.length != old_value) {
            console.log("value changed");
            old_value = rowz.length;
          } else {
            //console.log("value did not change");
          }
        }


        $('#chatcontent').empty();
        for (var i = 0; i < rowz.length; i++) {
          arow = rowz[i];
          var time = '<p class="time">' + arow[1] + '</p>';
          var msg = '<p class="msg">' + arow[0] + '<br/></p>';
          $('#chatcontent').append(time);
          $('#chatcontent').append(msg)
        }
        setTimeout('updateMsg()', 100);
      });
    }

    $(document).ready(function() {
      $.ajaxSetup({
        cache: false
      });
      //let chat = document.getElementById('chatcontent')
      //chat.scrollTop = chat.scrollHeight;
      updateMsg();
    })
  </script>
</body>