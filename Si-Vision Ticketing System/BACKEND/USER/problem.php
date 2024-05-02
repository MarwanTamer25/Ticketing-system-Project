<?php
	include("connection.php");
	include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $user_name = $_POST['username'];
		$summary = $_POST['summary'];
		$request_text = $_POST['request_text'];
        $priority  = $_POST['priority '];
        $label = $_POST['label'];

		if(!empty($summary) && !empty($request_text) && !empty($priority) && !empty($label) && !is_numeric($summary))
		{

			//save to database
			$problem_id = random_num(5);
			$query = "insert into users (problem_id,summary,request_text,priority,label) values ('$problem_id','$summary','$request_text','$priority','$label')";

			mysqli_query($con, $query);

			header("Location: dashboard.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
    ?>