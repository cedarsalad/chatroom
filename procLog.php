<?php 
if(isset($_POST['lSubmit'])){
	session_start();
	include("DBManager.class.php");
	//db function getUserByNameAndPassword($username,$password)
	// $query = $db->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
	// $result = $query->execute(array($_POST['username'], md5($_POST['password'])));

	$db = new DBManager();

	//check if username and password correct - return user object
	$user = $db->verifyLogin($_POST['username'],$_POST['password']);
	if($user){
		if($user->getValid() == 1)
			$_SESSION['user'] = $user -> obj_to_array();
		else
			setcookie("message", 'Please check your email to validate account.',time()+36000);
	}
	else
		setcookie("message", 'Invalid username/password.',time()+36000);

	header("location: index.php");
}

?>