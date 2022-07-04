<?php
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}

if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_REQUEST['name'])) {
            echo '<h1>Tracking Autos for ';
            echo htmlentities($_REQUEST['name']);
            echo "</h1>\n";
        }
        ?>
        <?php
        $failure = false;
        require_once "pdo.php";
        if (
            isset($_POST['make']) && isset($_POST['year'])
            && isset($_POST['mileage'])
        ) {
            $sql = "INSERT INTO autos (make, year, mileage) 
              VALUES (:make, :year, :mileage)";
            $stmt = $pdo->prepare('INSERT INTO autos
        (make, year, mileage) VALUES ( :mk, :yr, :mi)');
            $stmt->execute(
                array(
                    ':mk' => $_POST['make'],
                    ':yr' => $_POST['year'],
                    ':mi' => $_POST['mileage']
                )
            );
        } else if(!isset($_POST['make'])) {
            $failure = "Make is required";
        } else if(!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
            $failure = "Mileage and year must be numeric";
        }
        $stmt = $pdo->query("SELECT auto_id	make, year, mileage FROM autos");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php
        if ($failure !== false) {
            echo ('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
        }
        ?>

        <form method="post">
            <p>Make:
                <input type="text" name="make" size="40">
            </p>
            <p>Year:
                <input type="text" name="year">
            </p>
            <p>Mileage:
                <input type="text" name="mileage">
            </p>
            <p><input type="submit" value="Add" />
                <input type="submit" name="logout" value="Logout">
            </p>
        </form>
        <h2>Automobiles</h2>
        <ul>
            <?php
            foreach ($rows as $row) {
                echo ("<li>");
                echo ($row['make']);
                echo "\n";
                echo ($row['year']);
                echo " / ";
                echo ($row['mileage']);
                echo "\n";
                echo ("</li>");
            }
            ?>
        </ul>
</body>

</div>
</body>

</html>