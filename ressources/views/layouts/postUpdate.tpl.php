<h2>Update Article</h2>

<form id="articleForm" method="post" action="?action=blogpostmodify&id=<?= $blogPost['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $blogPost['title'] ?>" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="8" required><?= $blogPost['content'] ?></textarea>

    <label for="deletedAt">Deleted At:</label>
    <input type="date" id="deletedAt" name="deletedAt" value="<?= $blogPost['deletedAt'] ?>" required>

    <label for="category">Category:</label>
    <select name="category" id="category">
        <?php foreach($categories as $category): ?>
            <option value="<?= $category['name'] ?> <?php if($blogPost['category']) ?>"><?= ucfirst($category['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="priority">Priority:</label>
    <input type="range" id="priority" name="priority" min="0" max="5" value="<?= $blogPost['priority'] ?>" oninput="this.nextElementSibling.value = this.value" required>
    <output><?= $blogPost['priority'] ?? 0 ?></output><br>

    <button type="submit">Update Article</button>
</form>

<a class="back-link" href="?action=blogpost&id=<?= $blogPost['id'] ?>">back</a>
