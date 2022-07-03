<!DOCTYPE html>
<html>

<head>
    <?php require_once "bootstrap.php"; ?>
    <title>db Login Page</title>
</head>

<body>
    <div class="container">
        <h1>Please Log In</h1>
        <form method="post" action="database.php">
            <p><label for="inp01">Account:</label>
                <input type="text" name="acc" id="inp01" size="40">
            </p>
            <p><label for="inp02">Password:</label>
                <input type="password" name="pw" id="inp02" size="40">
            </p>
            <p>
                <input type="submit" name="dopost" value="Submit" />
                <input type="button" onclick="location.href='/g4o2-website/index.html'; return false;" value="Cancel">
            </p>
        </form>
    </div>
</body>