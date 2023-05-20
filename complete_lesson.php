<?php
// Include the necessary files and establish database connection

// Retrieve the user and lesson/course IDs from the URL or form submission
$userId = $_SESSION['user_id'];
$lessonId = $_GET['lesson_id'];
// or $courseId = $_GET['course_id'];

// Insert a record into the user_progress table
$sql = "INSERT INTO user_progress (user_id, lesson_id, completed_at) VALUES ('$userId', '$lessonId', NOW())";
// Execute the SQL statement to insert the progress record
?>
