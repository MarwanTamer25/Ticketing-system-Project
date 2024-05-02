<?php

session_start();

	include("connection.php");
     
    
    // Check if the user is logged in (you should have a proper authentication mechanism)
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page or handle unauthorized access
        header("Location: login.php");
        exit();
    }
    
    // Connect to the database
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    
    // Check for a successful connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Retrieve user's requests
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM problems WHERE user_id = $user_id";
    $result = $conn->query($sql);
    
    // Close the database connection
    $conn->close();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requests Page</title>
    <link rel="stylesheet" href="styles.css">
<style>
    body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 8px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
</head>
<body>
    <h1>User Requests</h1>
    <table>
        <thead>
            <tr>
                <th>Request</th>
                <th>Response</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['request_text'] . "</td>";
                echo "<td>" . $row['response_text'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

