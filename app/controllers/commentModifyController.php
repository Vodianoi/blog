<?php

$postID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
$comID = filter_input(INPUT_GET, 'comid', FILTER_SANITIZE_URL);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatedComment = array_map('htmlspecialchars', $_POST);
    $success = commentUpdate($pdo, $updatedComment, $comID);
    header('Location: ?action=blogpost&id=' . $postID);
}

$blogPost = blogPostById($pdo, $postID);
$comments = lastCommentsByBlogPost($pdo, $postID);
$updatingComment = commentByID($pdo, $comID);
include '../ressources/views/layouts/post.tpl.php';
include '../ressources/views/layouts/commentUpdate.tpl.php';
include '../ressources/views/layouts/comments.tpl.php';

