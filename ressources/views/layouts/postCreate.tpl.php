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

<h2>Create New Article</h2>

<form id="articleForm" method="post" action="../app/controllers/blogPostCreateController.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="8" required></textarea>

    <label for="createdAt">Created At:</label>
    <input type="date" id="createdAt" name="createdAt" value="<?= date('Y-m-d')?>" required>
    <label for="deletedAt">Deleted At:</label>
    <input type="date" id="deletedAt" name="deletedAt" required>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required>

    <button type="submit">Create Article</button>
</form>

</body>
</html>
