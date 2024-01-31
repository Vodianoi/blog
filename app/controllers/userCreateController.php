<?php
include '../app/persistances/sessionData.php';
echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $user['password'] = encryptPassword($user['password']);

    userCreate($pdo, $user);
    header('Location: /');
}

include '../ressources/views/signin.tpl.php';