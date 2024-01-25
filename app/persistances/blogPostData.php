<?php

function lastBlogPosts(PDO $pdo): array
{
    $sql = 'SELECT POSTS.id, title, content, nickname AS author FROM POSTS JOIN USERS ON USERS.id = POSTS.users_id ORDER BY POSTS.id DESC LIMIT 10';
    PDOStatement :
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}


function blogPostById(PDO $pdo, $id)
{

    $sql = 'SELECT title, content, nickname AS author FROM POSTS JOIN USERS ON POSTS.users_id = USERS.id WHERE POSTS.id = ? LIMIT 1';
    PDOStatement :
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}


function commentsByBlogPost(PDO $pdo, $id)
{
    $sql = 'SELECT COMS.content, nickname AS author FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ? ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function blogPostCreate(PDO $pdo, $newPost): bool
{
    $id = createAnonymousUser($pdo)['id'];
    echo $id;
    $sql = 'INSERT INTO POSTS (title, content, createdAt, deletedAt, priority, users_id) VALUES (:title, :content, :createdAt, :deletedAt, :priority, :users_id)';
    $stmt = $pdo->prepare($sql);
    try {
        return $stmt->execute([
            'title' => $newPost['title'],
            'content' => $newPost['content'],
            'createdAt' => $newPost['createdAt'],
            'deletedAt' => $newPost['deletedAt'],
            'priority' => $newPost['priority'],
            'users_id' => $id
        ]);

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

function createAnonymousUser(PDO $pdo): array
{
    $sql = 'INSERT INTO USERS (nickname) VALUES("Anonymous")';
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute();
    if (!$success) {
        $stmt = $pdo->query('SELECT id FROM USERS WHERE nickname="Anonymous"');
        $id = $stmt->fetchColumn();
    }
    return [
        'success' => $success,
        'id' => $success ? $pdo->lastInsertId() : $id
    ];
}