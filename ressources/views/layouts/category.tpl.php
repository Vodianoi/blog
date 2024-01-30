<body>

<?php foreach ($categories as $cat): ?>

    <div class="category">
        <a href="?action=blogPostCategory&name=<?= $cat['name'] ?>"><?= $cat['name'] ?></a>
    </div>
<?php endforeach ?>
<div class="category">
    <a href="?action=blogPostCategory&name=all"> All </a>
</div>

<?php if($_GET['name'] != 'all'): ?>
<h1>Blog Posts in <?= $category ?></h1>
<?php endif ?>
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