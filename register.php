<?php
// Include the database connection file
require_once 'config.php';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation on the form data (e.g., check for empty fields, valid email format)

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if (mysqli_query($connection, $sql)) {
        // User registration successful
        echo "Registration successful. Please log in.";
    } else {
        // Error occurred during user registration
        echo "Registration failed. Please try again.";
    }
}
?>

<!-- HTML form for user registration -->
<form method="POST" action="register.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Register">
</form>
