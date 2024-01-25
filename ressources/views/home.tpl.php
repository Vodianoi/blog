<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>

<h1>Latest Blog Posts</h1>

<?php
$lastBlogPosts = lastBlogPosts($pdo);

foreach ($lastBlogPosts as $post) {
    ?>
    <div class="blog-post">
        <a href="?action=blogpost&id=<?= $post['id'] ?>"><h2><?php echo $post['title']; ?></h2></a>
        <p><strong>Author:</strong> <?php echo $post['author']; ?></p>
    </div>
    <?php
}
?>

</body>
</html>