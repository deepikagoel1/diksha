<?php
// Include the database connection file
require_once 'config.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit;
}

// Retrieve the user's course information from the database
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM courses WHERE user_id = $userID";
$result = mysqli_query($connection, $sql);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- HTML code for the user's dashboard -->
<h1>Welcome to Your Dashboard</h1>

<h2>My Courses</h2>
<ul>
    <?php foreach ($courses as $course): ?>
        <li><?php echo $course['title']; ?></li>
    <?php endforeach; ?>
</ul>

<!-- Additional code for displaying user progress, settings, etc. -->
