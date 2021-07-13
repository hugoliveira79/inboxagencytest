<?php
	Class Purchase{
		private $id;
		private $date;
		private $user;
	
		public function __construct($id, $date, $user){
			$this->id=$id;
			$this->date=$date;
			$this->user=$user;

		}

		function getId(){ return $this->id; }
		function getDate(){ return $this->date; }
		function getUser(){ return $this->user; }

		function setTitle($value){ $this->date= $value; }
		function setUser($value){ $this->user= $value; }

		function save($conn){
			$sql= "insert into purchases(fk_id_user) values(".$this->user->getId().")";
			$res=$conn->prepare($sql);
			$res->execute();
			$id = $conn->lastInsertId();

			return $id;

		}

	}
?>