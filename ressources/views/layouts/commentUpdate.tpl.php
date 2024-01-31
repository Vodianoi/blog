<!-- Comment Form -->
<div class="comment-form">
    <h3>Add a Comment</h3>
    <form action="?action=commentUpdate&id=<?= $blogPost['id'] ?>&comid=<?= $updatingComment['id'] ?>" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" value="<?= $updatingComment['author'] ?>" disabled>

        <label for="content">Your Comment:</label>
        <textarea id="content" name="content" rows="4" required><?= $updatingComment['content'] ?></textarea>

<!--        <input type="hidden" name="postId" value="--><?php //= $blogPost['id'] ?><!--">-->

        <button type="submit">Submit Comment</button>
    </form>
</div>


<a href="?action=blogpost&id=<?= $blogPost['id'] ?>" class="back-link">Back</a>