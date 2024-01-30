<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);

$delete = commentDelete($pdo, $id);
$postID = $delete['postID'];
$success = $delete['success'];

if($success)
{
    header('Location: ?action=blogpost&id='.$postID);
}