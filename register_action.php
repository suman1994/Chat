<?php 
session_start();
require_once('connection.php');

	if(isset($_POST['submit']))
	{ 
		$fname = isset($_POST['first_name']) ? trim($_POST['first_name']) : ""; 
		$lname = isset($_POST['last_name']) ? trim($_POST['last_name']) : ""; 		$email = isset($_POST['email']) ? trim($_POST['email']) : "";
		$password = isset($_POST['password']) ? trim($_POST['password']) : ""; 
    
    $sql = "INSERT INTO users (first_name, last_name, email, password)
	VALUES ('$fname', '$lname', '$email', '$password')";
	$conn->exec($sql);
    echo "New record inserted sucessfully";
    }
?>	