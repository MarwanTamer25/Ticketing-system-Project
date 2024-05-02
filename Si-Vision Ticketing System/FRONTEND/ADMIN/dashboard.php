<?php 
// Starting PHP session and including necessary PHP files
session_start();
include("connection.php");
include("functions.php");

// Retrieving all problems from the database
$query = "SELECT * FROM problems";
$result = mysqli_query($con, $query);

// Redirecting to the login page if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_admin.php");
    exit();
}

// Handling POST request to update response text for a ticket
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

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="icon" href="" type="image/x-icon">   
</head>
<body>
    <header>
        <div class="logo">
            <img src="" alt="Logo">
        </div>

        <div class="profile-container">
            <img src="" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <!-- Link to log out the user -->
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>

        <nav>
            <ul>
                <!-- Navigation links to different sections -->
                <li><a href="dashboard.html" id="dashboard-link">Dashboard</a></li>
                <li><a href="tickets.html" id="tickets-link">Tickets</a></li>
                <li><a href="users.html" id="users-link">Users</a></li>
            </ul>
        </nav>
        
    </header>

    <div class="container">
        <aside>
            <h2>Quick Links</h2>
            <ul>
                <!-- Quick links to create, view, and assign tickets -->
                <li><a href="Create.html">Create Ticket<br></a></li>
                <li><a href="Tickets.html">View Tickets<br></a></li>
                <li><a href="Assign.html">Assign Tickets</a></li>
            </ul>
        </aside>

        <main>
            <section class="tickets">
                <h2>Open Tickets</h2>
                <table>
                    <thead>
                        <!-- Table headers for ticket details -->
                        <tr>
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
                    // Displaying ticket details in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['request_id'] . "</td>";
                        echo "<td>" . $row['summary'] . "</td>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['priority'] . "</td>";
                        echo "<td>" . $row['label'] . "</td>";
                        echo "<td>";
                        // Link to reply or ignore a ticket
                        echo "<a href='reply.php?request_id=" . $row['request_id'] . "'>Reply     </a>";
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
        <!-- Footer displaying the copyright information -->
        <p>&copy; 2023 Ticketing System</p>
    </footer>
</body>
</html>
