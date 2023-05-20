<?php
// Include the database connection file
require_once 'config.php';

// Check if the course creation form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];

    // Insert the course data into the database
    $sql = "INSERT INTO courses (title, description, author) VALUES ('$title', '$description', '$author')";
    if (mysqli_query($connection, $sql)) {
        // Course creation successful
        header('Location: courses.php');
        exit;
    } else {
        // Error occurred during course creation
        echo "Course creation failed. Please try again.";
    }
}
?>

<!-- HTML form for creating a new course -->
<form method="POST" action="create_course.php">
    <label>Title:</label>
    <input type="text" name="title" required><br>

    <label>Description:</label>
    <textarea name="description" required></textarea><br>

    <label>Author:</label>
    <input type="text" name="author" required><br>

    <input type="submit" value="Create Course">
</form>
