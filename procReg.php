<?php 
include_once("dbConnect.php");
include_once("email.php");

include_once("encode.php");
include("DBManager.class.php");
$db = new DBManager();

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$fileName = $_FILES['avatar']['name'];
$tempName 	= $_FILES['avatar']['tmp_name'];
//keeping the name of the file and simply remove all spaces and lowercaps (and add username as id)
$newname = 	strtolower($_POST["username"])."_". str_replace(" ", "_", strtolower($fileName)); 
$uploadfolder = "images/uploads/";
$path = $uploadfolder.$newname;

// $query = $db->prepare("SELECT * FROM `users` WHERE email = ?");
// $result = $query->execute(array($email));
// $email_results = $query->fetch(PDO::FETCH_ASSOC);

$email_exists = $db -> verifyExistence('email', $email);
//if email already exists
if($email_exists){
	$message = 'Registration failed. Email already exists.';
}

// $query = $db->prepare("SELECT * FROM `users` WHERE username = ?");
// $result = $query->execute(array($username));
// $user = $query->fetch(PDO::FETCH_ASSOC);

$username_exists = $db -> verifyExistence('username', $username);
//if username already exists
if($username_exists){
	$message = 'Registration failed. Username already exists.';
}

//if email and username are okay
if(!isset($message)){
	//db function addUser($username,$password)
	// $query = $db->prepare("INSERT INTO `users` VALUES(NULL, ?, ?, ?, ?, ?)");
	// $result = $query->execute(array($username, $password, $newname, $email, 0));
	$userArray = array(
		'username' => $username, 
		'email' => $email, 
		'avatar' => $path, 
		'password' => $password 
		);
	$user = new User($userArray);
	var_dump($user);
	$db->addUser($user);
	$message = 'User created! Please login.';
	move_uploaded_file($tempName, $path);


	//$subject = 'User Validation';
	$path = "http://$_SERVER[HTTP_HOST]" . "/Workspace/Labs%20Advanced/Lab3/Validation.php";
	$key = "?key=" . encode($username);
	$link = $path.$key;
	$eMessage = "$username, please follow the link below to validate your account!\n";
	$eMessage .= $link;
	// sendMail($email,$subject,$eMessage);
	$user->sendMail($subject,$eMessage);
	$message = 'Validation email sent. Please check your email.';


}

setcookie('message', $message, time()+3600);
//header('location: index.php');

?>