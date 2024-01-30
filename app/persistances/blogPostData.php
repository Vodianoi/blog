<?php

function lastBlogPosts(PDO $pdo): array
{
    $sql = 'SELECT POSTS.id, title, content, nickname AS author 
    FROM POSTS 
    JOIN USERS ON USERS.id = POSTS.users_id 
    ORDER BY POSTS.id DESC LIMIT 10';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}


function blogPostById(PDO $pdo, $id)
{

    $sql = 'SELECT POSTS.id, title, content, deletedAt, nickname AS author, CATEGORIES.name as category FROM POSTS 
    JOIN USERS ON POSTS.users_id = USERS.id 
    JOIN `POST-CATEGORY` AS PC ON PC.posts_id = POSTS.id
    JOIN CATEGORIES ON CATEGORIES.id = PC.categories_id
    WHERE POSTS.id = ? LIMIT 1';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}


function commentsByBlogPost(PDO $pdo, $id): false|array
{
    $sql = 'SELECT COMS.content, nickname AS author FROM COMS JOIN POSTS ON POSTS.id = COMS.posts_id JOIN USERS ON COMS.users_id = USERS.id WHERE POSTS.id = ? ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function blogPostCreate(PDO $pdo, $newPost): bool
{
    $id = getAnonymousUser($pdo);
    echo $id;
    $sql = 'INSERT INTO POSTS (title, content, createdAt, deletedAt, priority, users_id) VALUES (:title, :content, :createdAt, :deletedAt, :priority, :users_id)';
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        'title' => $newPost['title'],
        'content' => $newPost['content'],
        'createdAt' => date('Y-m-d'),
        'deletedAt' => $newPost['deletedAt'],
        'priority' => $newPost['priority'],
        'users_id' => $id
    ]);

    $category = $newPost['category'];

    $sql = 'INSERT INTO `POST-CATEGORY` (posts_id, categories_id) VALUES (LAST_INSERT_ID(), (SELECT id FROM CATEGORIES WHERE name = ? ))';
    $categoryStatement = $pdo->prepare($sql);
    return $success && $categoryStatement->execute([$category]);
}

function getAnonymousUser(PDO $pdo): int
{
    $stmt = $pdo->query('SELECT id FROM USERS WHERE nickname="Anonymous"');
    return $stmt->fetchColumn();
}


function blogPostUpdate(PDO $pdo, $id, $newPost): array
{
    $sql = 'UPDATE POSTS SET title = :title, content = :content, deletedAt = :deletedAt WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    var_dump($stmt);
    $success = $stmt->execute([
        'title' => $newPost['title'],
        'deletedAt' => $newPost['deletedAt'],
        'content' => $newPost['content'],
        'id' => $id
    ]);
    return [
        'success' => $success,
        'id' => $pdo->lastInsertId()
    ];
}

function blogPostDelete(PDO $pdo, $id): bool
{
    $sql = 'DELETE FROM POSTS WHERE id=?';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

function blogPostsByCategory($pdo, $category)
{
    $sql = 'SELECT POSTS.id, title, content, deletedAt, nickname AS author, C.name as category
FROM POSTS 
    JOIN `POST-CATEGORY` as PC ON PC.posts_id = POSTS.id 
    JOIN blog.CATEGORIES C on PC.categories_id = C.id
    JOIN USERS ON USERS.id = POSTS.users_id 
    WHERE C.name = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category]);
    return $stmt->fetchAll();
}

function categories($pdo)
{
    $sql = 'SELECT * FROM CATEGORIES';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}