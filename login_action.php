<?php require_once dirname(__FILE__).'/connection.php';
	
if(isset($_POST['submit'])) { 
	$email 		= isset($_POST['email']) 	? trim($_POST['email']) : "";
	$password 	= isset($_POST['password']) ? trim($_POST['password']) : "";
	$password_hash	= md5($password);
	
	// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email is not a valid email address");
    exit();
} 
	
	if($email == '') {
		echo 'You Must Enter your Email';
		exit();	
	}	
		
	if($password == '') {
		echo 'You Must Enter your Password';
		exit();	
	}

//Query	
	$sql = "SELECT email, password FROM  `users` WHERE email = ? AND password=? ";
	$stmt = $conn->prepare($sql);
	$stmt = $conn->prepare($sql);
	$stmt->execute([$email,$password]);
	$result = $stmt->fetch(PDO::FETCH_NUM);
	if (isset($result[0])) {
    if($result > 0){
		header('Location: chat.php');
	}
   	else {
        echo "Wrong Password";
    }
} else {
    echo "Wrong email id";
}
}
?>
