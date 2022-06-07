<!DOCTYPE html>
<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,600');

    body {
        margin: 0;
        background: rgb(49, 49, 49);
        font-family: 'Work Sans', sans-serif;
        font-weight: 100;
        text-align: center;
        color: orange;
    }

    a {
        color: #444;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 14px;
        color: orange;
    }

    pre {
        animation-name: anim;
        animation-duration: 20s;
        animation-iteration-count: infinite;
    }
    #mainPageLink {
        font-size: 25px;
    }
    #php {
        color: black;
        background-color: grey;
        border-radius: 230px;
        width: 50%;
        margin-left: 330px;
    }
    header {
        font-size: 30px;
    }
    @keyframes anim {
        0% {
            color: orange;
        }

        25% {
            color: rgb(49, 49, 49);
        }

        50% {
            color: orange;
        }

        75% {
            color: rgb(49, 49, 49);
        }

        100% {
            color: orange;
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max php page</title>
</head>

<body>
    <header>GHOSTFACE</header>
    <pre>
███████████▓▓▓▓▓▓▓▓▒░░░░░▒▒░░░░░░░▓█████
██████████▓▓▓▓▓▓▓▓▒░░░░░▒▒▒░░░░░░░░▓████
█████████▓▓▓▓▓▓▓▓▒░░░░░░▒▒▒░░░░░░░░░▓███
████████▓▓▓▓▓▓▓▓▒░░░░░░░▒▒▒░░░░░░░░░░███
███████▓▓▓▓▓▓▓▓▒░░▒▓░░░░░░░░░░░░░░░░░███
██████▓▓▓▓▓▓▓▓▒░▓████░░░░░▒▓░░░░░░░░░███
█████▓▒▓▓▓▓▓▒░▒█████▓░░░░▓██▓░░░░░░░▒███
████▓▒▓▒▒▒░░▒███████░░░░▒████░░░░░░░░███
███▓▒▒▒░░▒▓████████▒░░░░▓████▒░░░░░░▒███
██▓▒▒░░▒██████████▓░░░░░▓█████░░░░░░░███
██▓▒░░███████████▓░░░░░░▒█████▓░░░░░░███
██▓▒░▒██████████▓▒▒▒░░░░░██████▒░░░░░▓██
██▓▒░░▒███████▓▒▒▒▒▒░░░░░▓██████▓░░░░▒██
███▒░░░░▒▒▒▒▒▒▒▒▒▒▒▒░░░░░░███████▓░░░▓██
███▓░░░░░▒▒▒▓▓▒▒▒▒░░░░░░░░░██████▓░░░███
████▓▒▒▒▒▓▓▓▓▓▓▒▒▓██▒░░░░░░░▓███▓░░░░███
██████████▓▓▓▓▒▒█████▓░░░░░░░░░░░░░░████
█████████▓▓▓▓▒▒░▓█▓▓██░░░░░░░░░░░░░█████
███████▓▓▓▓▓▒▒▒░░░░░░▒░░░░░░░░░░░░██████
██████▓▓▓▓▓▓▒▒░░░░░░░░░░░░░░░░▒▓████████
██████▓▓▓▓▓▒▒▒░░░░░░░░░░░░░░░▓██████████
██████▓▓▓▓▒▒██████▒░░░░░░░░░▓███████████
██████▓▓▓▒▒█████████▒░░░░░░▓████████████
██████▓▓▒▒███████████░░░░░▒█████████████
██████▓▓░████████████░░░░▒██████████████
██████▓░░████████████░░░░███████████████
██████▓░▓███████████▒░░░████████████████
██████▓░███████████▓░░░█████████████████
██████▓░███████████░░░██████████████████
██████▓▒██████████░░░███████████████████
██████▒▒█████████▒░▓████████████████████
██████░▒████████▓░██████████████████████
██████░▓████████░███████████████████████
██████░████████░▒███████████████████████
█████▓░███████▒░████████████████████████
█████▒░███████░▓████████████████████████
█████░▒██████░░█████████████████████████
█████░▒█████▓░██████████████████████████
█████░▓█████░▒██████████████████████████
█████░▓████▒░███████████████████████████
█████░▓███▓░▓███████████████████████████
██████░▓▓▒░▓████████████████████████████
███████▒░▒██████████████████████████████
████████████████████████████████████████
████████████████████████████████████████

    </pre>
    <a href="index.html" id="mainPageLink">Go back to main page</a><br>
    <a href="fail.php">Click here for fail.php | </a>
    <a href="check.php">Click here for check.php</a><br>
    <hr>
    <div id="php">
        <?php
        echo nl2br("PHP CODE RIGHT HERE!!! \n");
        echo nl2br("The SHA256 hash of \"Ghostface\" is \n");
        print hash('sha256', 'Ghostface');
        ?>
    </div>
</body>

</html>