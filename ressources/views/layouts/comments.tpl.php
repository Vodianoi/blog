<h2>Comments</h2>
<?php foreach ($comments as $com): ?>
    <?php if ($com !== $updatingComment): ?>
        <div class="comment">
            <br>
            <hr style="margin-right: 50%;">
            <p><?= $com['content'] ?></p>
            <p><strong>Author:</strong> <?= htmlspecialchars($com['author']) ?></p>
            <div class="post-actions">
                <a href="/?action=commentUpdate&id=<?= $blogPost['id'] ?>&comid=<?= $com['id'] ?>" class="action-link">Edit</a>
                <a href="/?action=commentDelete&id=<?= $com['id'] ?>" class="action-link">Delete</a>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
<br><br>
<a href="?action=commentCreate&id=<?= $blogPost['id'] ?>" class="action-link">Add new comment...</a>
