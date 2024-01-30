<h2>Comments</h2>
<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p><?= htmlspecialchars($comment['content']) ?></p>
        <p><strong>Author:</strong> <?= htmlspecialchars($comment['author']) ?></p>
        <div class="post-actions">
            <a href="/?action=commentmodify&id=<?= $comment['id'] ?>" class="action-link">Edit</a>
            <a href="/?action=commentDelete&id=<?= $comment['id'] ?>" class="action-link">Delete</a>
        </div>
    </div>
<?php endforeach; ?>
<br><br>
<a href="?action=commentCreate&id=<?= $blogPost['id'] ?>" class="action-link">Add new comment...</a>
