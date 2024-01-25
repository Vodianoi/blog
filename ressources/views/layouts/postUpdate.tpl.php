<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
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

<a href="/">back</a>

</body>
</html>
