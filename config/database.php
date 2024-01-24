<?php

$pdo = new PDO('mysql:host=blog.local;dbname=blog', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

//echo htmlentities($row['nickname']);