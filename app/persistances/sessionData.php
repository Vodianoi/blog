<?php

function encryptPassword($password){
    return sha1($password);
}

function userCreate(PDO $pdo, $user) : bool
{
    $sql = '
INSERT INTO USERS 
(nickname, name, surname, email, password)
VALUES
    (:nickname, :name, :surname, :email, :password)';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
       'nickname' => $user['nickname'],
        'name' => $user['name'],
        'surname' => $user['surname'],
        'email' => $user['email'],
        'password' => $user['password']
    ]);
}

function checkUserLogin(PDO $pdo, $email, $sha1)
{
    $sql = 'SELECT 1 as found FROM USERS WHERE password = :password AND email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
       'password' => $sha1,
       'email' => $email
    ]);
    return $stmt->fetch();
}
