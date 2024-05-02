<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link rel="icon" href="add TABLOGO.png path here" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="users.css">
</head>
<body>
    <header>
        <h1>User Management</h1>

        <div class="profile-container">
            <img src="C:\Users\marwa\OneDrive\Desktop\Si-Vision Ticketing System\Frontend\Photos/Profile-PIC.jpg" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <!-- Links for user profile and log out -->
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
                <h2>Users</h2>
                <table>
                    <thead>
                        <tr>
                            <!-- Table headers for user details -->
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through user data fetched from the database
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['user_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td>";
                            // Links for editing and deleting users
                            echo "<a href='edit.php?request_id=" . $row['edit'] . "'>edit</a>";
                            echo "<a href='delete.php?request_id=" . $row['delete'] . "'>delete</a>";
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
        <p>&copy; 2023 User Management</p>
    </footer>
</body>
</html>

<?php 
// Starting PHP session and including necessary PHP files
session_start();
include("connection.php");
include("functions.php");

// Query to retrieve users' data from the database
$sql = "SELECT * FROM users"; 
$result = $conn->query($sql);
?>
