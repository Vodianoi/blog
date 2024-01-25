<?php
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_URL);
if(blogPostDelete($pdo, $id))
{
    header('Location: /');
}else {
    header('Location: /?action=blogpost&id='.$id);
}