<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <title>Login Page</title>
    <!-- Link to the website's icon -->
    <link rel="icon" href="ADD_YOUR_PHOTO_PATH_HERE" type="image/x-icon">
    <!-- Link to external stylesheet for styling -->
    <link rel="stylesheet" href="YOUR FILE PATH\login.css">
</head>
<body>
    <header>
        <!-- Header section with the logo and site title -->
        <div class="logo">
            <img src="ADD_YOUR_PHOTO_PATH_HERE" alt="Logo">
            <h1>| CAD Ticketing System</h1>
        </div>
    </header>
    <div class="container">
        <form id="login-form" method="post">
            <!-- Login form -->
            <h2 class="fade-in">Login</h2>
            <!-- Username input field -->
            <div class="input-container">
                <label for="username">Username:</label>
                <input id="username" type="text" name="user_name" required>
            </div>
            <!-- Password input field -->
            <div class="input-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Button to submit the login form -->
            <button type="submit">Login</button>
        </form>
    </div>

    <footer>
        <!-- Footer section displaying the copyright information -->
        <p>&copy; 2023 Ticketing System</p>
    </footer>
</body>
</html>

<?php 
// Starting PHP session
session_start();

// Including necessary PHP files for user authentication
include("connection.php");
include("functions.php");
include("login_FN_Admin.php");
?>
