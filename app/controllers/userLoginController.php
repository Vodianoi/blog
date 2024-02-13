<?php

include '../app/persistances/sessionData.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $user['password'] = encryptPassword($user['password']);
    var_dump($user);
    var_dump(checkUserLogin($pdo, $user['email'], $user['password']));



    if(checkUserLogin($pdo, $user['email'], $user['password'])['found'] == 1){
        if( $_POST['remember'] ) {
            $delimiter = "//";
            $cookieString = $_POST['email'] . $delimiter . $user['password'];
            $cookieDuration = 60 * 60 * 24 * 60; // 60 jours
            setcookie( 'autoconnection', $cookieString, time() + $cookieDuration );
        }
        header('Location: ?action=sessionCheck');
    }
    else {
        echo 'Error on password/email';
    }
}

if (isset($_COOKIE['autoconnection']) && is_string($_COOKIE['autoconnection'])) {
    $delimiter = "//";
    $split = explode($delimiter, $_COOKIE['autoconnection']);
    $email = $split[0] ?? "";
    $password = isset($split[1]) ?? "";
    if ($user = checkLogin($pdo, $email, $password)) {
        $_SESSION["logged"] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['admin'] = $user['admin'];
        header('Location: /');
    } else {
        setcookie('autoconnection', null, time() - 3600);
    }
}

include '../ressources/views/login.tpl.php';