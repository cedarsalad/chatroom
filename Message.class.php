<?php 
class Message{
	public $message;
	public $username;
	public $avatar;

	/**
	* [__construct magic function to build my object]
	* @param [type] $array [array of data of each property of my object]
	*/
	
	public function __construct($data){
		$this->message = $data['comment'];
		$this->username = $data['username'];
		$this->avatar = $data['avatar'];

	}

	public function getMessage(){
		return $this->message;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getAvatar(){
		return $this->avatar;
	}

	public function setMessage($message){
		$this->message = $message;
	}
	public function setUsername($username){
		$this->username = $username;
	}
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
}


