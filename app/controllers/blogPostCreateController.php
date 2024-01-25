<?php


if(isset($_POST['submit']))
    header('Location: /');
else
{
    include '../ressources/views/layouts/postCreate.tpl.php';
}