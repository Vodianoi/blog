<?php


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
if (!isset($_GET['show'])) {
    $show = 10;
} else {
    $show = filter_input(INPUT_GET, 'show', FILTER_SANITIZE_URL);
}
$blogPost = blogPostById($pdo, $id);
$comments = lastCommentsByBlogPost($pdo, $id, $show);
include '../ressources/views/layouts/post.tpl.php';
include '../ressources/views/layouts/comments.tpl.php';

