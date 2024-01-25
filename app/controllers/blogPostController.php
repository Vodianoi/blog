<?php

$id = $_GET['id'] ?? -1;
if ($id != -1) {
    $blogPost = blogPostById($pdo, $id);
    $comments = commentsByBlogPost($pdo, $id);
    include '../ressources/views/layouts/post.tpl.php';
}

