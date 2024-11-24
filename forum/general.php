<?php
// Start the session
session_start();

// Initialize message variable
$message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the topic title and content from the form
    $topic_title = trim($_POST['topic_title']);
    $topic_content = trim($_POST['topic_content']);

    // Append the topic to the log file
    if (!empty($topic_title) && !empty($topic_content)) {
        $log_file = 'topics_log.txt';
        $timestamp = date("Y-m-d H:i:s");
        $log_entry = "$timestamp - Title: $topic_title | Content: $topic_content\n";
        file_put_contents($log_file, $log_entry, FILE_APPEND);
        $message = "Topic posted successfully!";
    } else {
        $message = "Please fill in all fields.";
    }
}

// Read existing topics
$topics = [];
if (file_exists('topics_log.txt')) {
    $topics = file('topics_log.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Discussion - Project Pancasila</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            background-color: #141414;
            color: #fff;
            font-family: 'Kumbh Sans', sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }
        button {
            background-color: #f77062;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .topic {
            background-color: #1e1e1e;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>General Discussion</h1>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="topic_title" placeholder="Topic Title" required>
        <textarea name="topic_content" placeholder="Write your topic here..." required></textarea>
        <button type="submit">Post Topic</button>
    </form>

    <h2>Existing Topics</h2>
    <?php if (empty($topics)): ?>
        <p>No topics have been posted yet.</p>
    <?php else: ?>
        <?php foreach ($topics as $topic): ?>
            <div class="topic"><?php echo nl2br(htmlspecialchars($topic)); ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>