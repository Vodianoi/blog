<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $newComment = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $success = commentCreate($pdo, $newComment, $id);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$blogPost = blogPostById($pdo, $id);
$comments = lastCommentsByBlogPost($pdo, $id);
include '../ressources/views/layouts/post.tpl.php';
include '../ressources/views/layouts/commentCreate.tpl.php';
include '../ressources/views/layouts/comment.tpl.php';

