<?php 
require "User.class.php";
require "Message.class.php";
	/**
	* This is my DBManager to manipulate my database
	*/
	class DBManager{
		public $db;

		function __construct(){
			//Database credentials
			$host	= "localhost";
			$user	= "root";
			$pass 	= "";
			$dbName = "herzing";

			//Try to connect to database using said credentials
			//If connection successful, we will save the persistance in a variable called $db
			try {
				$this->db = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
			} catch (Exception $e) {
				die("Database connection Error <br>" . $e->getMessage());
			}
		}

		public function verifyExistence($column,$value){
			$query = $this->db->prepare("SELECT * FROM `users` WHERE $column = ?");
			$query->execute(array($value));
			$result= $query->fetch(PDO::FETCH_ASSOC);

			if (empty($result)) 
				return false;
			else
				return true;
		}

		/**
	 	* [getUserByName() function to return the user from db as object]
	 	* @return [$object]  [object of selected user]
	 	*/
	 	public function getUserByName($username){
	 		$query = $this->db->prepare("SELECT * FROM `users` WHERE username = ?");
	 		$query->execute(array($username));
	 		$user = $query->fetch(PDO::FETCH_ASSOC);
	 		$userObj = new User($user);

	 		return $userObj;

	 	}

	 	public function getUserByEmail($email){
	 		$query = $this->db->prepare("SELECT * FROM `users` WHERE email = ?");
	 		$query->execute(array($email));
	 		$user = $query->fetch(PDO::FETCH_ASSOC);
	 		$userObj = new User($user);

	 		return $userObj;
	 	}

	 	/**
	 	* [verifyLogin() function to return the user from db with matching username/password]
	 	* @return [$array]  [array of selected user with matching set of user/pass]
	 	*/
	 	public function verifyLogin($username,$password){
	 		$query = $this->db->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
	 		$query->execute(array($username, md5($password)));
	 		$user = $query->fetch(PDO::FETCH_ASSOC);
	 		$userObj = new User($user);
	 		
	 		return $userObj;
	 	}

	 	public function setValid($username){
	 		$this->db->query("UPDATE `users` SET valid = 1 WHERE username = '$username'");
	 		//$update = $db->query("UPDATE `users` SET valid = 1 WHERE username = '$username'");
	 	}

	 	public function addUser($user){
	 		$query = $this->db->prepare("INSERT INTO `users` VALUES(NULL, ?, ?, ?, ?, ?)");
	 		$query->execute(array($user->getUsername(), $user->getPassword(), $user->getAvatar(), $user->getEmail(), 0));
	 	}

	 	/**
	 	* [getMessages() function to return all messages from database
	 	* @return [$array]  [array of message objects]
	 	*/
	 	public function getMessages(){
	 		$query = $this->db->query("SELECT * FROM `posts`");	
	 		$posts = $query->fetchAll(PDO::FETCH_ASSOC);
	 		$messages = array();
	 		foreach ($posts as $post) {
	 			array_push($messages, new Message($post));
	 		}
	 		return $messages;
	 	}
	 	/**
	 	* [setMessage() function to create message and insert it into database
	 	* @param [$object]  [Message object]
	 	*/
	 	public function setMessage($message){
	 		$query = $this->db->prepare("INSERT INTO `posts` VALUES (NULL, ?, ?, ?)");
	 		$query->execute(array($message->getUsername(), $message->getAvatar(), $message->getMessage()));
	 	}
	 }

	 ?>