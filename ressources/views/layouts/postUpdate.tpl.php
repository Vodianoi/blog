<body>

<h2>Update Article</h2>

<form id="articleForm" method="post" action="?action=blogpostmodify&id=<?= $post['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $post['title'] ?>" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="8" required><?= $post['content'] ?></textarea>

    <label for="deletedAt">Deleted At:</label>
    <input type="date" id="deletedAt" name="deletedAt" value="<?= $post['deletedAt'] ?>" required>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" value="<?= $post['category'] ?>" required>

    <label for="priority">Priority:</label>
    <input type="range" id="priority" name="priority" min="0" max="5" value="<?= $post['priority'] ?>" oninput="this.nextElementSibling.value = this.value" required>
    <output><?= $post['priority'] ?? 0 ?></output><br>

    <button type="submit">Update Article</button>
</form>

<a class="back-link" href="?action=blogpost&id=<?= $post['id'] ?>">back</a>

</body>
