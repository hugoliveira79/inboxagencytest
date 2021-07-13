<?php

	class User{
		private $id;
		private $login;
		private $pass;

		public function __construct($id, $login, $pass){
			$this->id=$id;
			$this->login=$login;
			$this->pass=$pass;

		}

		function getId(){  return $this->id; }
		function getUser(){ return $this->user; }
		function getPass(){ return $this->pass; }

		function setUser($value){ $this->user= $value; }
		function setPass($value){ $this->pass= $value; }

		function save($conn){
			$sql= "insert into users(login_user, pass_user) values('$this->login', '$this->pass')";
			$res=$conn->prepare($sql);
			$res->execute();

		}
	}
?>