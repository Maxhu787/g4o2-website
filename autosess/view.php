<?php
session_start();
require_once "pdo.php";

if (!isset($_SESSION['account'])) {
    die('Not logged in');
}

if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

$stmt = $pdo->query("SELECT make, year, mileage, auto_id FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <title>6f1a4abb</title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <h1>Tracking Autos for <?= htmlentities($_SESSION['email']); ?></h1>
        <?php
        if (isset($_SESSION["success"])) {
            echo ('<p style="color:green">' . htmlentities($_SESSION["success"]) . "</p>\n");
            unset($_SESSION["success"]);
        }
        ?>
        <h2>Automobiles</h2>
        <?php
        foreach ($rows as $row) {
            echo "<ul><li>";
            echo ($row['year']);
            echo " ";
            echo ($row['make']);
            echo " ";
            echo "/";
            echo " ";
            echo ($row['mileage']);
            echo "</li></ul>\n";
        }

        ?>
        <p>
            <a href="add.php">Add New</a> |
            <a href="logout.php">Logout</a>
</body>

</div>
</body>

</html>