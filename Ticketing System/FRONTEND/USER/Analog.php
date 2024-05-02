<?php 
session_start();

	include("connection.php");
    include("problem.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Si-Vision Ticketing System</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="">
    
</head>
<body>
    <header>
        <div class="profile-container">
            <img src="" alt="Profile Photo" id="profile-photo">
            <div id="profile-menu">
                <ul>
                    <li><a href="requests.php">Requests</a></li>
                    <li><a href="login.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="logo">
            <img src="download.png" alt="Logo">
            <h1>| CAD Ticketing System</h1>
    </header>

    <main>
        <div class="container">
            <h2>Get Analog help</h2>
            <div class="ticket-form">
                <form action="submit_ticket.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="problem-summary">Problem Summary</label>
                        <input type="text" id="problem-summary" name="summary" required>
                    </div>
    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="request_text" name="request_text" rows="4" required></textarea>
                    </div>
    
                    <div class="form-group" id="attachment-group">
                        <label for="attachment">Attachment</label>
                        <input type="file" id="attachment" name="attachment">
                    </div>
    
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select id="priority" name="priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="labels">Labels</label>
                        <select id="labels" name="label">
                            <option value="label 1">label 1</option>
                            <option value="label 2">label 2</option>
                            <option value="label 3">label 3</option>
                            <option value="label 4">label 4</option>
                        </select>
                    </div>
    
                    <div class="button-group">
                        <button type="submit">Create</button>
                        <a href="index.php" class="cancel-button">Cancel</a>
                    </div>

                </form>   
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2023 Ticketing System</p>
    </footer>
</body>
</html>
