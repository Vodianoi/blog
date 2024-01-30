<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>

<?php foreach ($categories as $cat): ?>

    <div class="blog-post">
        <a href="?action=blogPostCategory&name=<?= $cat['name'] ?>"><?= $cat['name'] ?></a>
    </div>
<?php endforeach ?>

<h1>Blog Posts in <?= $category ?></h1>
<?php foreach ($posts as $post): ?>

    <div class="blog-post">
        <a href="?action=blogpost&id=<?= $post['id'] ?>"><h2><?= $post['title']; ?></h2></a>
        <p><strong>Author:</strong> <?= $post['author']; ?></p>
    </div>
<?php endforeach ?>

<a href="?action=blogpostcreate">
    Create new Post
</a>

</body>
</html>