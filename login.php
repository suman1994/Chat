<?php require_once dirname(__FILE__).'/connection.php'; ?>

<!DOCTYPE html>
<html>
	<body>
		<h3 class="text-center">Login to Chat</h3> 
		<form action="login_action.php"  method="post" role="form">
			<input type="text" name="email" value="" placeholder="Email"><br><br>
			<input type="password" name="password" value="" placeholder="Password"><br><br>
			<input type="submit" name="submit" value="Login">
			
		</form> 
	</body>
</html>