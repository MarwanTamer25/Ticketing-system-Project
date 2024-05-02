<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "25062003";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
