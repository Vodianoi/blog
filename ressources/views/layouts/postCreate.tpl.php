<body>

<h2>Create New Article</h2>

<form id="articleForm" method="post" action="?action=blogpostcreate">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="8" required></textarea>

    <label for="deletedAt">Deleted At:</label>
    <input type="date" id="deletedAt" name="deletedAt" required>

    <label for="category">Category:</label>
<!--    <input type="text" id="category" name="category" required>-->
    <select name="category" id="category">
        <?php foreach($categories as $category): ?>
        <option value="<?= $category['name'] ?>"><?= ucfirst($category['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="priority">Priority:</label>
    <input type="range" id="priority" name="priority" min="0" max="5" value="0" oninput="this.nextElementSibling.value = this.value" required>
    <output>0</output><br>

    <button type="submit">Create Article</button>
</form>
<a class="back-link" href="/">back</a>
</body>
