<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title><?= $metaTitle ?? 'Title' ?></title>
</head>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="/">Your Logo</a>
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="?action=about">About</a></li>
            <li><a href="?action=contact">Contact</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
</header>
<br>