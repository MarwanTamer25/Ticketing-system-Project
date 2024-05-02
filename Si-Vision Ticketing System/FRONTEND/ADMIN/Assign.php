<!DOCTYPE html>
<html>
<head>
    <title>Assign Ticket</title>
    <!-- Link to the website icon -->
    <link rel="icon" href="add TABLOGO.png path here" type="image/x-icon">
    <!-- Link to the external stylesheet for styling -->
    <link rel="stylesheet" type="text/css" href="Assign.css">
</head>
<body>
    <header>
        <!-- Title of the page -->
        <h1>Assign Ticket</h1>

        <div class="profile-container">
            <!-- Profile photo of the user -->
            <img src="add Profile-PIC.jpg path here" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <!-- Navigation links for user profile and logout -->
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="login_admin.php">Log Out</a></li>
                </ul>
            </div>
        </div>

        <nav>
            <ul>
                <!-- Navigation links for different sections/pages -->
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="tickets.php">Tickets</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <main>
            <section class="assign-ticket">
                <!-- Heading for assigning a ticket -->
                <h2>Assign a Ticket</h2>
                <form class="search-box" action="search.php" method="POST">
                    <label for="ticketId">Ticket ID:</label>
                    <!-- Input field for entering ticket ID -->
                    <input type="text" id="ticketId" name="ticketId" required>
                    <!-- Button to submit the form for ticket assignment -->
                    <button type="submit">Assign Ticket</button>
                </form>
            </section>
        </main>
    </div>

    <footer>
        <!-- Copyright information -->
        <p>&copy; 2023 Ticket Management</p>
    </footer>
</body>
</html>
<?php 
// Starting PHP session
session_start();

// Including necessary PHP files for connection and search functionality
include("connection.php");
include("search.php");
?>
