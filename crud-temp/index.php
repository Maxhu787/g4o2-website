<?php
session_start();
require_once "pdo.php";
$stmt = $pdo->query("SELECT make, model, year, mileage, autos_id FROM autos ORDER BY make");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['logout'])) {
    header('Location: logout.php');
    return;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>80c817df</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Welcome to the Automobiles Database</h1>
        <?php
        if (!isset($_SESSION['email'])) {
            echo '<p><a href="login.php">Please Log In</a></p>';
            echo '<p>Attempt to <a href="add.php">add data</a> without logging in</p>';
        }
		if (isset($_SESSION["success"])) {
			echo ('<p style="color:green">' . htmlentities($_SESSION["success"]) . "</p>\n");
			unset($_SESSION["success"]);
		}
        ?>
        <?php
        if (isset($_SESSION['email'])) {
            echo '<table border="1">
            <thead>
            <tr><th>Make</th><th>Model</th><th>Year</th><th>Mileage</th><th>Action</th></tr></thead>';
            foreach ($rows as $row) {
                echo "<tr><td>";
                echo ($row['make']);
                echo ("</td><td>");
                echo ($row['model']);
                echo "<td>";
                echo ($row['year']);
                echo ("</td><td>");
                echo ($row['mileage']);
                echo ("</td><td>");
                echo ('<a href="edit.php?user_id=' . $row['autos_id'] . '">Edit</a> / ');
                echo ('<a href="delete.php?user_id=' . $row['autos_id'] . '">Delete</a>');
                echo ("</td></tr>\n");
                echo ("</td></tr>\n");
            }
            echo "</table>";
        }
        //echo ('<form method="post"><input type="hidden" ');
        //echo ('name="auto_id" value="' . $row['auto_id'] . '">' . "\n");
        //echo ('<input type="submit" value="Del" name="delete">');
        //echo ("\n</form>\n");
        if (isset($_SESSION['email'])) {
            echo '<p><a href="add.php">Add New Entry</a><br><a href="logout.php">Logout</a></p>';
        }
        ?>
    </div>
</body>