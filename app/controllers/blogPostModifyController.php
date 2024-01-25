<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $blogPostUpdate = blogPostUpdate($pdo, $_GET['id'], $post);
    if (!$blogPostUpdate['success']) {
        echo 'Post failed';
        exit();
    }
    header('Location: /?action=blogpost&id=' . $_GET['id']);
} else {
    $post = blogPostById($pdo, $_GET['id']);
    include '../ressources/views/layouts/postUpdate.tpl.php';
}