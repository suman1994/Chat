<?php require_once dirname(__FILE__).'/connection.php';
# If the form is submitted
if(isset($_POST['submit'])) { 
    $fname    = isset($_POST['first_name']) ? trim($_POST['first_name']) : ""; 
    $lname    = isset($_POST['last_name'])  ? trim($_POST['last_name'])  : "";      
    $email    = isset($_POST['email'])      ? trim($_POST['email'])      : "";
    $password = isset($_POST['password'])   ? trim($_POST['password'])   : ""; 
    $password_hash	= md5($password);	
    
    if($fname == '') {
		echo 'You Must Enter your First Name';
		exit();	
	}	
	
	if($lname == '') {
		echo 'You Must Enter your Last Name';
		exit();	
	}	
    
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
    $sql = "INSERT INTO users (first_name, last_name, email, password)
    VALUES ('$fname', '$lname', '$email', '$password')";
    $conn->exec($sql);
    echo "New record inserted sucessfully";
}
?>  