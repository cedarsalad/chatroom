<?php 
	/**
	* This is a User Class
	*/
	class User{
		private $id;
		private $username;
		private $password;
		private $avatar;
		private $email;
		private $valid;

		/**
	 	* [__construct magic function to build my object]
	 	* @param [type] $array [array of data of each property of my object]
	 	*/
	 	public function __construct($data){
	 		if(isset($data['id']))
	 			$this->id = $data['id'];
	 		if(isset($data['valid']))
	 			$this->valid = $data['valid'];
	 		$this->username = $data['username'];
	 		$this->password = $data['password'];
	 		$this->avatar = $data['avatar'];
	 		$this->email = $data['email'];


	 	}

	 	public function __toString(){
	 		$desc = "id: " . $this->id . "<br>";
	 		$desc .= "username: " . $this->username . "<br>";
	 		$desc .= "password: " . $this->password . "<br>";
	 		$desc .= "avatar: " . $this->avatar . "<br>";
	 		$desc .= "email: " . $this->email . "<br>";

	 		return $desc;
	 	}

	 	/**
	 	* [obj_to_array function to return the object as an array]
	 	* @return [$array]  [array of data of each property of my object]
	 	*/
	 	public function obj_to_array(){
	 		$array = array();

	 		$array['id'] = $this->id;
	 		$array['username'] = $this->username;
	 		$array['password'] = $this->password;
	 		$array['avatar'] = $this->avatar;
	 		$array['email'] = $this->email;
	 		$array['valid'] = $this->valid;

	 		return $array;
	 	}

	 	function sendMail($subj,$msg){
	 		$to = $this->email;
	 		$subject = $subj;
	 		$message = date("l jS \of F Y h:i:s A")."\n\n";
	 		$message .= $msg;	

	 		$headers = "From: Herzing College <me@herzing.com> \r\n";
	 		$headers .= "Reply-to Chad <sarroufchad@gmail.com> \r\n";
	 		$headers .= "MIME-Version: 1.0 \r\n";
	 		$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	 		$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

	 		mail($to, $subject, $message, $headers);	
	 	}



	 	public function getId(){
	 		return $this->id;
	 	}
	 	public function getUsername(){
	 		return $this->username;
	 	}
	 	public function getPassword(){
	 		return $this->password;
	 	}
	 	public function getAvatar(){
	 		return $this->avatar;
	 	}
	 	public function getEmail(){
	 		return $this->email;
	 	}
	 	public function getValid(){
	 		return $this->valid;
	 	}

	 	public function setId($id){
	 		$this->id=$id;
	 	}
	 	public function setUsername($username){
	 		$this->username=$username;
	 	}
	 	public function setPassword($password){
	 		$this->password=$password;
	 	}
	 	public function setAvatar($avatar){
	 		$this->avatar=$avatar;
	 	}
	 	public function setEmail($email){
	 		$this->email=$email;
	 	}
	 }


