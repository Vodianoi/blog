<?php


require __DIR__ . '/../autoload.php';

(new App\Controller\DotEnvEnvironment)->load(__DIR__ . '/../');

session_start();
date_default_timezone_set('Europe/Paris');
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}

if (!isset($_SESSION['dateFirstVisit'])) {
    $_SESSION['dateFirstVisit'] = date("Y-m-d-H:i:s");
}

$id_session = session_id();


$arg1 = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$file = $arg1 . ".php";
$metaTitle = ucfirst($arg1);

include('../config/database.php');

$routes = array(
    "home" => __DIR__.$file,
);


ob_start();

if(isset($routes[$arg1]))
    require($routes[$arg1]);

$render = ob_get_clean();
echo $render;
