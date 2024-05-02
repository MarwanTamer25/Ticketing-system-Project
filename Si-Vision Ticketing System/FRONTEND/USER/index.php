<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <title>Si-Vision Ticketing System</title>  
    <link rel="icon" href="ADD_YOUR_PHOTO_PATH_HERE" type="image/x-icon">   
    <link rel="stylesheet" href="YOUR_FILE_PATH_HERE"> <!-- Link to your stylesheet -->
</head>
<body>
    <header>
        <!-- Profile section -->
        <div class="profile-container">
            <img src="ADD_YOUR_PHOTO_PATH_HERE" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <li><a href="request.php">Requests</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>

        <!-- Logo and search box -->
        <div class="logo">
            <img src="ADD_YOUR_PHOTO_PATH_HERE" alt="Logo">
            <h1>| CAD Ticketing System</h1>
        </div>
        <form class="search-box" action="search.php" method="POST">
            <input type="text" id="search" name="search" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </form>
    </header>

    <div class="container">
        <!-- Sections for common requests -->
        <div class="section">
            <span class="problem-emoji">📑</span>
            <h2>Common Requests</h2><br>
            <a href="Problem1.php">Problem 1</a><br><br>
            <a href="Problem2.php">Problem 2</a><br><br>
            <a href="Problem3.php">Problem 3</a><br><br>
        </div>

        <!-- Sections for specific problem categories -->
        <div class="section">
            <span class="problem-emoji">📻</span>
            <h2>Analog</h2>
            <p>Having issues with analog devices or systems? We're here to assist you.</p>
            <a href="Analog.php">Learn More</a>
        </div>

        <div class="section">
            <span class="problem-emoji">💻</span>
            <h2>Digital</h2>
            <p>Experiencing issues with digital devices or systems? We're here to help!</p>
            <a href="Digital.php">Learn More</a>
        </div>

        <div class="section">
            <span class="problem-emoji">🛠️</span>
            <h2>Others</h2>
            <p>Facing an issue? Reach out to us for expert assistance.</p>
            <a href="Other.php">Learn More</a>
        </div>
    </div>

    <footer>
        <!-- Footer information -->
        &copy; 2023 Ticketing System, All Right Reserved.<br>
        Developed By <a href="https://www.linkedin.com/in/marwan-tamer-244457244/" target="_blank" style="color: white;">Marwan Tamer</a>
    </footer>
</body>
</html>

<?php 
// Starting PHP session
session_start();

// Including necessary PHP files
include("connection.php");
include("index.php");  
include("search.php");  

	$user_data = check_login($con);
?>
