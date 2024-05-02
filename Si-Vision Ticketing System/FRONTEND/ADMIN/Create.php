<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
    <!-- Link to the website icon -->
    <link rel="icon" href="add TABLOGO.png path here" type="image/x-icon">
    <!-- Link to the external stylesheet for styling -->
    <link rel="stylesheet" type="text/css" href="problem.css">
</head>
<body>
    <header>
        <!-- Title of the page -->
        <h1>Create Ticket</h1>

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
            <section class="create-ticket">
                <!-- Heading for creating a new ticket -->
                <h2>Submit a New Ticket</h2>
                <div class="ticket-form">
                    <form action="submit_ticket.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- Input for the problem summary -->
                            <label for="problem-summary">Problem Summary</label>
                            <input type="text" id="problem-summary" name="problem-summary" required>
                        </div>

                        <div class="form-group">
                            <!-- Text area for describing the problem -->
                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="form-group" id="attachment-group">
                            <!-- Input for attaching files -->
                            <label for="attachment">Attachment</label>
                            <input type="file" id="attachment" name="attachment">
                        </div>

                        <div class="form-group">
                            <!-- Dropdown for selecting priority -->
                            <label for="priority">Priority</label>
                            <select id="priority" name="priority">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <!-- Input for adding labels -->
                            <label for="labels">Labels</label>
                            <input type="text" id="labels" name="labels">
                        </div>
                        <div class="button-group">
                            <!-- Button to submit the form and create a ticket -->
                            <button type="submit">Create</button>
                        </div>
                    </form> <!-- Missing form closing tag -->
                </div>
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

// Including necessary PHP files for connection and problem submission
include("connection.php");
include("problem.php");
?>
