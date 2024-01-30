<body>
<div class="content">
    <h2>Blog Post by ID</h2>
    <div class="post">
        <h3><?= htmlspecialchars($blogPost['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars($blogPost['content'])) ?></p>
        <p><strong>Author:</strong> <?= htmlspecialchars($blogPost['author']) ?></p>
    </div>

    <div class="post-actions">
        <a href="/?action=blogpostmodify&id=<?= $blogPost['id'] ?>" class="action-link">Edit</a>
        <a href="/?action=blogPostDelete&id=<?= $blogPost['id'] ?>" class="action-link">Delete</a>
    </div>

    <a href="/" class="back-link">Back</a>
</div>

