<?php


require __DIR__ . '/../autoload.php';

(new App\Controller\DotEnvEnvironment)->load(__DIR__ . '/../');


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//$file = $arg1 . ".php";
$controllerFolder = '/../app/controllers/';
//$metaTitle = ucfirst($arg1);

$routes = array(
    'blogpost' => 'blogPostController.php',
    'blogpostcreate' =>'blogPostCreateController.php',
    'blogpostmodify' => 'blogPostModifyController.php',
    'blogPostDelete' => 'blogPostDeleteController.php'
);

include '../config/database.php';
include('../app/persistances/blogPostData.php');

if (empty($_GET)) {
    require(__DIR__ . $controllerFolder . 'homeController.php');
}
else if(isset($routes[$action])){
    require(__DIR__ . $controllerFolder .$routes[$action]);
}

