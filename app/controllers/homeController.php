<?php
try {
    $show = isset($_GET['show']) ? filter_input(INPUT_GET, 'show', FILTER_SANITIZE_URL) : 10;
    $lastBlogPosts = lastBlogPosts($pdo, $show);
    $categories = categories($pdo);
}catch (Exception $e)
{
    echo $e->getMessage();
}
include '../ressources/views/home.tpl.php';