<?php
// Include the database connection file
require_once 'config.php';

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    // Verify the password
    if ($row && password_verify($password, $row['password'])) {
        // User login successful
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        // Redirect to the home page or any other authenticated page
        header('Location: home.php');
        exit;
    } else {
        // Invalid username or password
        echo "Invalid username or password. Please try again.";
    }
}
?>

<!-- HTML form for user login -->
<form method="POST" action="login.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Log in">
</form>
