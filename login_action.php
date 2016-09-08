session_start();
<?php
require_once('connection.php');
	
if(isset($_POST['submit'])) { 
	$email = isset($_POST['email']) ? trim($_POST['email']) : "";
	$password = isset($_POST['password']) ? trim($_POST['password']) : "";
	$records = $conn->prepare("SELECT email, password FROM  users WHERE email = '$email' AND password = '$password' LIMIT 1");
			$records->execute();
			$records->bind_result($femail, $hash);
			
			$results = $records->fetch();
			if($result && password_verify($password, $hash)){
				$_SESSION['email'] = $femail;
				echo "You are Sucessfully Logged In";
			}
			$records->close();
}			
?>
