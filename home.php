<?php
// Include the session management file
require_once 'session.php';

// Check if the user is logged in
if (!isLoggedIn()) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit;
}
?>

<!-- HTML content for the authenticated user's home page -->
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<p>This is your home page.</p>
<p><a href="logout.php">Log out</a></p>
