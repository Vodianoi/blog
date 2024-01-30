<body>

<?php foreach ($categories as $cat): ?>
    <div class="category">
        <a href="?action=blogPostCategory&name=<?= $cat['name'] ?>"><?= $cat['name'] ?></a>
    </div>
<?php endforeach ?>

<h1>Latest Blog Posts</h1>
<?php foreach ($lastBlogPosts as $post): ?>
    <div class="blog-post">
        <a href="?action=blogpost&id=<?= $post['id'] ?>"><h2><?= $post['title']; ?></h2></a>
        <p><strong>Author:</strong> <?= $post['author']; ?></p>
    </div>
<?php endforeach ?>

<a href="?action=blogpostcreate" class="create-post-link">
    Create new Post
</a>

</body>
</html>