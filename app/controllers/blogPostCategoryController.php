<?php

$category = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_URL);

$posts = blogPostsByCategory($pdo, $category);
$categories = categories($pdo);

include '../ressources/views/layouts/category.tpl.php';