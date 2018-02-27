<?php 
include("DBManager.class.php");
session_start();
$db = new DBManager();

$msgArray = array(
	'comment' => $_POST['msgBox'], 
	'username' => $_SESSION['user']['username'],
	'avatar' => $_SESSION['user']['avatar'],
	);

$message = new Message($msgArray);
$db -> setMessage($message);

header("location: index.php");
?>