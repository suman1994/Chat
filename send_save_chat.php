<?php
session_start();
require_once 'connection.php';

$from $_POST['from'];
$to = $_POST['to'];
$message = $_POST['message'];

$sql = "INSERT INTO chat_log
	(from,
	to,
	message,
	time)
	VALUES
	(:a,:b,:c,:d)";
$qry = $con->prepare($sql);
$qry->execute(array(':a'=>$from,':b'=>$to,':c'=>$message,':d'=>now()));
?>