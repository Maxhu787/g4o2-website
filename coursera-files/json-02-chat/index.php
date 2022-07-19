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
    font-family: 'Orbitron';
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

  .time {
    font-size: 14px;
    color: orange;
  }

  .msg {
    color: black;
    font-size: 20px;
  }

  #message-input {
    height: 30px;
    font-size: 20px;
    width: 70%;
  }

  #keys {
    height: 20vh;
    width: 52.4vw;
    margin-top: -6%;
    margin-left: 0.3%;
    background-color: #999;
    border-radius: 10px;
    padding: 10px;
  }
  #submit {}
</style>

<head>
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
      <img src="spinner.gif" alt="Loading..." />
    </div>
    <form method="post" action="index.php">
      <p>
        <input id='message-input' type="text" name="message" size="60" />
        <input id="submit" type="submit" value="Chat" />
        <input id='reset' type="submit" name="reset" value="Clean Chat" />
        <!--<a href="chatlist.php" target="_blank">chatlist.php</a>-->
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

    function updateMsg() {
      window.console && console.log('Requesting JSON');
      $.getJSON('chatlist.php', function(rowz) {
        window.console && console.log('JSON Received');
        window.console && console.log(rowz);
        $('#chatcontent').empty();
        for (var i = 0; i < rowz.length; i++) {
          arow = rowz[i];
          var time = '<p class="time">' + arow[1] + '</p>';
          var msg = '<p class="msg">' + arow[0] + '<br/></p>';
          $('#chatcontent').append(time);
          $('#chatcontent').append(msg)
        }
        console.log()
        setTimeout('updateMsg()', 10000000);
      });
    }

    $(document).ready(function() {
      $.ajaxSetup({
        cache: false
      });
      updateMsg();
    });
  </script>
</body>