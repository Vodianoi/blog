<?php

include '../app/persistances/sessionData.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $user['password'] = encryptPassword($user['password']);
    var_dump($user);
    var_dump(userLogin($pdo, $user['email'], $user['password']));



    if(userLogin($pdo, $user['email'], $user['password'])['found'] == 1){
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

if( isset($_COOKIE['autoconnection']) && is_string($_COOKIE['autoconnection']) ) {
    $delimiter = "//";
    $split = explode($delimiter, $_COOKIE['autoconnection']);
    $email = isset($split[0]) ? $split[0] : "";
    $password = isset($split[1]) ? decryptPassword($split[1]) : "";
    // ... Tenter de connecter l'utilisateur
    if( /* l'utilisateur est connecté */ ) {
        // Suite de votre script
    }
    else {
        // Suppression du cookie
        setcookie( 'autoconnection', null, time() - 3600 );
    }
}

include '../ressources/views/login.tpl.php';