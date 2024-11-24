<?php
// Check if the user is accessing the page via a direct link
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "Access denied. Please use the direct link to view the logs.";
    exit();
}

// Read the feedback log
$log_file = 'feedback_log.txt';
if (file_exists($log_file)) {
    $logs = file_get_contents($log_file);
} else {
    $logs = "No feedback has been logged yet.";
}

// Convert logs to HTML format
$logs_html = nl2br(htmlspecialchars($logs)); // Convert newlines to <br> and escape HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Logs - Project Pancasila</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #141414;
            color: #fff;
            font-family: 'Kumbh Sans', sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        pre {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>Feedback Logs</h1>
    <pre><?php echo $logs_html; ?></pre>
</body>
</html> 