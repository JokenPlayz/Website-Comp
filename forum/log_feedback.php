<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted data
    $name = htmlspecialchars($_POST['name']);
    $feedback = htmlspecialchars($_POST['feedback']);
    
    // Prepare the log entry
    $log_entry = "Name: $name\nFeedback: $feedback\nDate: " . date("Y-m-d H:i:s") . "\n\n";
    
    // Log the feedback to a file
    file_put_contents('feedback_log.txt', $log_entry, FILE_APPEND);
    
    // Redirect back to the feedback page (optional)
    header("Location: feedback.html");
    exit();
}
?>