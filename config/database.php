<?php
$pdo = new PDO('mysql:host=blog.local;dbname=blog', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
$sql = 'SELECT * FROM USERS';
foreach ($pdo->query($sql) as $row) {
    echo htmlentities($row['nickname'] . "\t");
    echo htmlentities($row['name'] . "\t");
    echo htmlentities($row['surname'] . "\t");
}
//echo htmlentities($row['nickname']);