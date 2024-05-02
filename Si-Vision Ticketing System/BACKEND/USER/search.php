<?php
include("connection.php");

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Retrieve the search query from the form
    $searchQuery = $_POST['search'];
    
    // SQL query to search for a ticket based on the summary
    $sql = "SELECT * FROM problems WHERE summary LIKE '%$searchQuery%'";
    
    // Execute the query
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Display search results
        while ($row = $result->fetch_assoc()) {
            // Display each ticket summary as a link to the ticket page
            echo "<a href='ticket.php?id=" . $row['request_id'] . "'>" . $row['summary'] . "</a><br>";
        }
    } else {
        echo "No tickets found.";
    }
    
    // Close the database connection
    $conn->close();
    ?>