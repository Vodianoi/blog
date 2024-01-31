<?php

function commentsByBlogPost(PDO $pdo, $id): false|array
{
    $sql = '
SELECT COMS.content, nickname AS author 
FROM COMS 
    JOIN POSTS ON POSTS.id = COMS.posts_id 
    JOIN USERS ON COMS.users_id = USERS.id 
WHERE POSTS.id = ? ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function lastCommentsByBlogPost(PDO $pdo, $id, $show = 10): false|array
{
    $sql = '
SELECT COMS.id, COMS.content, nickname AS author 
FROM COMS 
    JOIN POSTS ON POSTS.id = COMS.posts_id 
    JOIN USERS ON COMS.users_id = USERS.id 
WHERE POSTS.id = :id 
ORDER BY POSTS.createdAt DESC
LIMIT :show
';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('show', $show, PDO::PARAM_INT);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function commentDelete(PDO $pdo, $id): array
{
    $postID = postIDForCom($pdo, $id);

    // DELETE COM
    $sql = '
   DELETE FROM COMS WHERE id=?
    ';
    $stmt = $pdo->prepare($sql);
    return array(
        'success' => $stmt->execute([$id]),
        'postID' => $postID
    );
}

/**
 * @param PDO $pdo
 * @param $comment array New comment created
 * @param $postID
 * @return bool
 */
function commentCreate(PDO $pdo, array $comment, $postID) : bool
{
    $sql = '
INSERT INTO COMS 
(content, createdAt, users_id, posts_id) 
VALUES (:content, 
        CURDATE(),
        :user_id, 
        :post_id
        )
    ';
    $anoUser = getAnonymousUser($pdo);
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'content' => $comment['content'],
        'user_id' => $anoUser,
        'post_id' => $postID,
    ]);

}

/**
 * @param PDO $pdo
 * @param $id
 * @return ID
 */
function postIDForCom(PDO $pdo, $id): int
{
    $sql = '
    SELECT POSTS.id 
    FROM COMS
    JOIN POSTS ON COMS.posts_id = POSTS.id
    WHERE COMS.id = ?
    ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch()['id'];
}