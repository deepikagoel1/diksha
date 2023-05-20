<?php
// Include the database connection file
require_once 'config.php';

// Retrieve the list of courses from the database
$sql = "SELECT * FROM courses";
$result = mysqli_query($connection, $sql);

// Display the list of courses
while ($row = mysqli_fetch_assoc($result)) {
    echo '<h3>' . $row['title'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Author: ' . $row['author'] . '</p>';
    echo '<p>Date Created: ' . $row['created_at'] . '</p>';
    echo '<a href="edit_course.php?id=' . $row['id'] . '">Edit</a>';
    echo '<a href="delete_course.php?id=' . $row['id'] . '">Delete</a>';
    echo '<hr>';
}
?>
