<?php
$lastBlogPosts = lastBlogPosts($pdo);
if(!empty($lastBlogPosts))
    var_dump($lastBlogPosts);
else echo 'Pas d\'articles';