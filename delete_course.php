<?php
// Include the database connection file
require_once 'config.php';

// Check if the course ID is provided
if (!empty($_GET['id'])) {
    $courseId = $_GET['id'];

    // Delete the course from the database
    $sql = "DELETE FROM courses WHERE id='$courseId'";
    if (mysqli_query($connection, $sql)) {
        // Course deletion successful
        header('Location: courses.php');
        exit;
    } else {
        // Error occurred during course deletion
        echo "Course deletion failed. Please try again.";
    }
} else {
    echo "Course ID not provided.";
}
?>
