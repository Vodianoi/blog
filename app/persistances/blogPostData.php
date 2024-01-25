<?php

function lastBlogPosts($pdo) : array
{
    $res = [];

    $sql = 'SELECT * FROM POSTS JOIN USERS ON USERS.id = POSTS.users_id ORDER BY POSTS.id DESC LIMIT 10';
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

    $sql = 'SELECT title, content, nickname FROM POSTS JOIN USERS ON POSTS.users_id = USERS.id WHERE POSTS.id = ? LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    return array(
        'title' => $row['title'],
        'content' => $row['content'],
        'author' => $row['nickname']
    );
}


function commentsByBlogPost($pdo, $id){
    $res = [];

    $sql = 'SELECT COMS.content, nickname FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ? ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    foreach ($stmt as $row) {
        $res[] = array(
            'content' => $row['content'],
            'author' => $row['nickname']
        );
    }

    return $res;
}