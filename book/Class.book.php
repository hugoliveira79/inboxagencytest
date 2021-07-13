<?php
	Class Book {
		private $id;
		private $title;
		private $cover;
		private $price;

		public function __construct($id, $title, $cover ,$price){
			$this->id=$id;
			$this->title=$title;
			$this->cover=$cover;
			$this->price=$price;
		}

		function getId(){ return $this->id; }
		function getTitle(){ return $this->title; }
		function getCover(){ return $this->cover; }
		function getPrice(){ return $this->price; }

		function setTitle($value){ $this->title= $value; }
		function setCover($value){ $this->cover= $value; }
		function setPrice($value){ $this->price= $value; }

		function save($conn){
			$sql= "insert into books(title_book, cover_book, price_book) values('".$this->title."','".$this->cover."' ,'".$this->price."')";
			$res=$conn->prepare($sql);
			$res->execute();

		}
	}
?>