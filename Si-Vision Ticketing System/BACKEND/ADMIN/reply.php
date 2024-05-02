<?php
session_start();
include("connection.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response_text = $_POST['response_text'];

        // Update the database with the response text using the $request_id
        $query = "UPDATE problems SET response_text = '$response_text' WHERE request_id = $request_id";
        if (mysqli_query($con, $query)) {
            header("Location: dashboard.php");
            exit();
        }
    }
}

// Fetch request details for the reply form
if (isset($request_id)) {
    $query = "SELECT * FROM problems WHERE request_id = $request_id";
    $result = mysqli_query($con, $query);
    $request = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reply to Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
            color: #555;
        }
        h2 {
            font-size: 1.5em;
            margin-top: 20px;
            color: #444;
        }
        p {
            margin-bottom: 10px;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #666;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: Arial, sans-serif;
        }
        button:hover {
            background-color: #45a049;
        }
        button:active {
            background-color: #3e8948;
        }
        button:focus {
            outline: none;
        }
        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        button:disabled:hover {
            background-color: #ccc;
        }
        button.secondary {
            background-color: #4285F4;
        }
        button.secondary:hover {
            background-color: #0B4D91;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container button {
            flex: 1;
            margin: 10px;
        }
        @media (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Reply to Request</h1>
    <h2>Request Details</h2>
    <p>Subject: <?php echo $request['summary']; ?></p>
    <p>Description: <?php echo $request['request_text']; ?></p>
    <p>User: <?php echo $request['user_id']; ?></p>
    <p>Priority: <?php echo $request['priority']; ?></p>
    <p>Label: <?php echo $request['label']; ?></p>
    <form method="POST">
        <label for="response_text">Response:</label>
        <textarea name="response_text" id="response_text" rows="8" cols="50"></textarea>
        <div class="button-container">
            <button type="submit">Submit Response</button>
            <button type="button" class="secondary">Cancel</button>
        </div>
    </form>
</body>
</html>
