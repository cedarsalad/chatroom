<head>
	<style>
		body{
			text-align: center;
			padding: 100px;
		}
	</style>
</head>
<?php 
include("dbConnect.php");
include("encode.php");
include("email.php");

include_once("encode.php");
include("DBManager.class.php");
$db = new DBManager();

if(isset($_GET['key'])){
	$username = decode($_GET['key']);
	//db function getUserByName($username)

	$userObj = $db->getUserByName($username);
	// $query = $db->prepare("SELECT * FROM `users` WHERE username = ?");
	// $result = $query->execute(array($username));
	// $user = $query->fetch(PDO::FETCH_ASSOC);
	if(!empty($userObj)){
		if($userObj -> getValid() == 0){
			echo "<h1>Your account has been validated!</h1>";
			echo "<h4>Redirecting you to homepage...</h4>";
			//db public function setValid($username)
			$db -> setValid($username);

			// $update = $db->query("UPDATE `users` 
			// 	SET valid = 1
			// 	WHERE username = '$username'");
			$userObj -> sendMail('Account Validated','Your account has been successfully validated!');
			// sendMail($user['email'],'Account Validated','Your account has been successfully validated!');
			header( "Refresh:3; url=index.php", true, 303);
		}
		else{
			echo "<h1>Your account has already been validated!</h1>";
			echo "<h4>Redirecting you to homepage...</h4>";
			header( "Refresh:3; url=index.php", true, 303);
		}
		
	}
	else{
		echo "<h1 style='color:tomato;'>ERROR!</h1>";
		echo "<h4>Validation is invalid.</h4>";
	}
}
else
	echo "<h1 style='color:tomato;'>ACCESS DENIED</h1>";
?>