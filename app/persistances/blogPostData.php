<?php

function lastBlogPosts($pdo) : array
{
    $res = [];

    $sql = file_get_contents('../database/lastBlogPosts.sql');
    foreach ($pdo->query($sql) as $row) {
        $res[] = array(
            'title' => $row['title'],
            'content' => $row['content'],
            'author' => $row['nickname']
        );
    }
    return $res;
}