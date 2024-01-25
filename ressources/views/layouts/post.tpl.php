<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Template</title>
    <!-- Add your CSS styles or link to an external stylesheet here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .post {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .comment {
            margin-top: 10px;
            padding: 5px;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
<h2>Blog Post by ID</h2>
<div class="post">
    <h3><?= htmlspecialchars($blogPost['title']) ?></h3>
    <p><?= htmlspecialchars($blogPost['content']) ?></p>
    <p><strong>Author:</strong> <?= htmlspecialchars($blogPost['author']) ?></p>
</div>

<h2>Comments</h2>

<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p><?= htmlspecialchars($comment['content']) ?></p>
        <p><strong>Author:</strong> <?= htmlspecialchars($comment['author']) ?></p>
    </div>
<?php endforeach; ?>

<a href="/?action=blogpostmodify&id=<?= $blogPost['id'] ?>">edit</a><br>
<a href="/">Back</a>
