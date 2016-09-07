<?php
include "connection.php";
	
if(isset($_POST['submit'])) { 
	$email = $_POST['email']; 
	$password = $_POST['password'];
	$records = $conn->prepare("SELECT email, password FROM  users WHERE email = '$email' AND password = '$password'");
			$records->prepare(':email', $email);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			if(count($results) > 0 && password_verify($password, $results['password'])){
				$_SESSION['email'] = $results['email'];
				echo "You are Sucessfully Logged In";
			}
}			

?>
