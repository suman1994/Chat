<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
		include('connection.php');
		$email = $_SESSION['email'];
	}
?>

<html>
	<head>
		<title>
			Online Chat
		</title>
		<script src="js/jquery.js"></script>
	</head>
	<body>
		<div class="holder">
			<label="welcomemsg">WELCOME: </label><label for="name"><?php echo $email; ?></label>
				<div class="style">	
				<div class="alpha">
					<b align="center">You can view your chats here:</b>
					<input name="user" type="hidden" id="texta" value="<?php echo $email ?>"/>
					<div class="refresh">
					</div>
					<br/>
					<form name="newMessage" class="newMessage" action="" onsubmit="return false">
						<select name="recipient" id="recipient" style="width:270px;">
							<option>--Send Chat To--</option>
								<?php 
									$sql = "SELECT * FROM users where email='$email' ORDER BY email";
									$qry = $con->prepare($sql);
									$qry->execute();
									$fetch = $qry->fetchAll();
									foreach ($fetch as $fe):
										$name = $fe['email'];
								?>
									<option title="<?php echo $name; ?>"><?php echo $fe['email']; ?> </option>
								<?php endforeach; ?>
						</select>
					<textarea name="textb" id="textb">Enter your message here</textarea>
					<input name="submit" type="submit" value="Send" id="johnlei" />
				</form>
			</div>
		</div>
		<script src="js/sendchat.js" type="text/javascript"></script>
		<script src="js/refresh.js" type="text/javascript"></script>
	</div>	
	</body>
</html>