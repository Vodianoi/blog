<?php

$id = $_GET['id'] ?? -1;
if ($id != -1) {
        $sqlPost = 'SELECT title, content, nickname FROM POSTS JOIN USERS ON POSTS.users_id = USERS.id WHERE POSTS.id =' . $id . ' LIMIT 1';
        $post = [];
    try {
        foreach ($pdo->query($sqlPost) as $row) {
            $post[] = array(
                'title' => $row['title'],
                'content' => $row['content'],
                'author' => $row['nickname']
            );
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $sqlComs = 'SELECT COMS.content, nickname FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ' . $id;
    $coms = [];
    foreach ($pdo->query($sqlComs) as $row) {
        $coms[] = array(
            'content' => $row['content'],
            'author' => $row['nickname']
        );
    }
    var_dump($post);

    var_dump($coms);
}

