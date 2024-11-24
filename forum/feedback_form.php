<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the feedback from the form
    $feedback = trim($_POST['feedback']);

    // Append feedback to the log file
    if (!empty($feedback)) {
        $log_file = 'feedback_log.txt';
        $timestamp = date("Y-m-d H:i:s");
        $log_entry = "$timestamp - $feedback\n";
        file_put_contents($log_file, $log_entry, FILE_APPEND);
        $message = "Feedback submitted successfully!";
    } else {
        $message = "Please enter your feedback.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form - Project Pancasila</title>
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
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        textarea {
            width: 100%;
            height: 100px;
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
            border-radius:
        }