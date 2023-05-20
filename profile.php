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

// Retrieve the user's profile information from the database
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $userID";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);

// Handle form submission for updating user profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    // Update the user's profile in the database
    $updateSQL = "UPDATE users SET name = '$name', bio = '$bio' WHERE id = $userID";
    mysqli_query($connection, $updateSQL);

    // Redirect back to the profile page
    header('Location: profile.php');
    exit;
}
?>

<!-- HTML form for displaying and updating user profile -->
<form method="POST" action="profile.php">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>

    <label>Bio:</label>
    <textarea name="bio"><?php echo $user['bio']; ?></textarea><br>

    <input type="submit" value="Update Profile">
</form>
