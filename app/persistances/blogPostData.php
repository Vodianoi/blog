<?php

function lastBlogPosts($pdo) : array
{
    $sql = 'SELECT POSTS.id, title, content, nickname AS author FROM POSTS JOIN USERS ON USERS.id = POSTS.users_id ORDER BY POSTS.id DESC LIMIT 10';
    PDOStatement : $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}


function blogPostById(PDO $pdo, $id){

    $sql = 'SELECT title, content, nickname as author FROM POSTS JOIN USERS ON POSTS.users_id = USERS.id WHERE POSTS.id = ? LIMIT 1';
    PDOStatement : $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}


function commentsByBlogPost($pdo, $id){
    $res = [];

    $sql = 'SELECT COMS.content, nickname AS author FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ? ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}