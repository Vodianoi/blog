<?php
$lastBlogPosts = lastBlogPosts($pdo);
$categories = categories($pdo);
include '../ressources/views/home.tpl.php';