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


function blogPostById($pdo, $id){
    $res = [];

    $sql = 'SELECT title, content, nickname FROM POSTS JOIN USERS ON POSTS.users_id = USERS.id WHERE POSTS.id =' . $id . ' LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    $res = array(
        'title' => $row['title'],
        'content' => $row['content'],
        'author' => $row['nickname']
    );

    return $res;
}


function commentsByBlogPost($pdo, $id){
    $res = [];

    $sql = 'SELECT COMS.content, nickname FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ' . $id;
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    foreach ($stmt as $row) {
        $res[] = array(
            'content' => $row['content'],
            'author' => $row['nickname']
        );
    }

    return $res;
}