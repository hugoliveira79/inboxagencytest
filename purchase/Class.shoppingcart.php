<?php
	Class ShoppingCart{
		private $id;
		private $book;
		private $purchase;
	

		public function __construct($id, $book, $purchase){
			$this->id=$id;
			$this->book=$book;
			$this->purchase=$purchase;

		}

		function getId(){ return $this->id; }
		function getBook(){ return $this->book; }
		function getPurchase(){ return $this->purchase; }

		function setBook($value){ $this->book=$value; }
		function setPurchase($value){ $this->purchase=$value; }

		function save($con){
			$sql = "insert into book_is_in_purchase(fk_id_book, fk_id_purchase) values(".$this->book.", ". $this->purchase.")";
			$res=$con->prepare($sql);
			$res->execute();

			$id = $con->lastInsertId();

			return $id;

		}

	}


?>