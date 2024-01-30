<!-- Comment Form -->
<div class="comment-form">
    <h3>Add a Comment</h3>
    <form action="?action=commentCreate&id=<?= $blogPost['id'] ?>" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="content">Your Comment:</label>
        <textarea id="content" name="content" rows="4" required></textarea>

        <input type="hidden" name="postId" value="<?= $blogPost['id'] ?>">

        <button type="submit">Submit Comment</button>
    </form>
</div>


<a href="/" class="back-link">Back</a>