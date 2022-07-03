<?php
$pw = $_POST['pw'];
$acc = $_POST['acc'];
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=people', $acc, $pw);
$stmt = $pdo->query("SELECT name, email FROM users");
echo '<table border="1">'."\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><tr>\n");
}
echo "</table>\n";
?>