<?php
// Include the necessary files and establish database connection

// Retrieve the user, assessment, and score from the form submission
$userId = $_SESSION['user_id'];
$assessmentId = $_POST['assessment_id'];
$score = $_POST['score'];

// Insert a record into the assessment_results table
$sql = "INSERT INTO assessment_results (user_id, assessment_id, score, completed_at) VALUES ('$userId', '$assessmentId', '$score', NOW())";
// Execute the SQL statement to insert the assessment result
?>
