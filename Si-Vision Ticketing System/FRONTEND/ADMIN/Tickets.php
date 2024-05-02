<!DOCTYPE html>
<html>
<head>
    <title>Tickets</title>    
    <link rel="icon" href="add TABLOGO.png path here" type="image/x-icon">  
    <link rel="stylesheet" type="text/css" href="tickets.css">
</head>
<body>
    <header>
        <h1>Tickets</h1>

        <div class="profile-container">
            <img src="add Profile-PIC.jpg path here" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <!-- Links for user profile and logout -->
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="login_admin.php">Log Out</a></li>
                </ul>
            </div>
        </div>

        <nav>
            <ul>
                <!-- Navigation links for different sections -->
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="tickets.php">Tickets</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <main>
            <section class="tickets">
                <h2>Tickets</h2>
                <table>
                    <thead>
                        <tr>
                            <!-- Table headers for ticket details -->
                            <th>Ticket ID</th>
                            <th>Subject</th>
                            <th>Assigned to</th>
                            <th>Priority</th>
                            <th>Label</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Displaying ticket information in table rows
                            echo "<tr>";
                            echo "<td>" . $row['request_id'] . "</td>";
                            echo "<td>" . $row['summary'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['priority'] . "</td>";
                            echo "<td>" . $row['label'] . "</td>";
                            echo "<td>";
                            // Links for replying or ignoring a ticket
                            echo "<a href='reply.php?request_id=" . $row['request_id'] . "'>Reply</a>";
                            echo "<a href='ignore.php?request_id=" . $row['request_id'] . "'>Ignore</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <footer>
        <!-- Footer information -->
        <p>&copy; 2023 Ticket Management</p>
    </footer>
</body>
</html>

<?php 
// Starting PHP session and including necessary PHP files
session_start();
include("connection.php");
include("functions.php");

// Retrieving problems from the database
$query = "SELECT * FROM problems";
$result = mysqli_query($con, $query);

// Redirecting to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_admin.php");
    exit();
}

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response_text = $_POST['response_text'];

        // Update the database with the response text using the $request_id
        $query = "UPDATE tickets SET response_text = '$response_text' WHERE request_id = $request_id";
        if (mysqli_query($con, $query)) {
            header("Location: dashboard.php");
            exit();
        }
    }
}
?>
