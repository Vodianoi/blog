<?php


require __DIR__ . '/../autoload.php';

(new App\Controller\DotEnvEnvironment)->load(__DIR__ . '/../');


//$arg1 = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//$file = $arg1 . ".php";
$controllerFolder = '/../app/controllers/';
//$metaTitle = ucfirst($arg1);

ob_start();

if (empty($_GET))
    require(__DIR__ . $controllerFolder . 'homeController.php');

$render = ob_get_clean();
echo $render;
