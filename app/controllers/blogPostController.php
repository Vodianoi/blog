<?php

$id = $_GET['id'] ?? -1;
if ($id != -1) {
    $blogPost = blogPostById($pdo, 1);
    $comments = commentsByBlogPost($pdo, 1);
    include '../ressources/views/layouts/post.tpl.php';
}

