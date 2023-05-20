<?php
// Start or resume the session
session_start();

// Function to check if the user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to log out the user
function logout()
{
    session_destroy();
    header('Location: login.php');
    exit;
}
