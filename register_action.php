<?php 
include "connection.php";

	if(isset($_POST['submit']))
	{ 
		$fname = $_POST['first_name']; 
		$lname = $_POST['last_name']; 
		$email = $_POST['email']; 
		$password = $_POST['password']; 
    
    $sql = "INSERT INTO users (first_name, last_name, email, password)
	VALUES ('$fname', '$lname', '$email', '$password')";
	$conn->exec($sql);
    echo "New record inserted sucessfully";
    }
?>