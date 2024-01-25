<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    if (!blogPostCreate($pdo, $post)) {
        echo 'Post failed';
        exit();
    }
    header('Location: /');
} else {
    include '../ressources/views/layouts/postCreate.tpl.php';
}