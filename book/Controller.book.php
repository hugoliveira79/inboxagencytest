<?php
	include('Class.book.php');
	function getAllBooks($con){
		$list =[];

		$sql= "select * from books";
		$res=$con->prepare($sql);
		$res->execute();

		while($row= $res->fetch(PDO::FETCH_ASSOC) ){
			$bookObj=new Book($row['id_book'], $row['title_book'],$row['cover_book'],$row['price_book'] );
			array_push($list, $bookObj);
				

		}
		return $list;

	}

	function getBooksById($con, $id){
		$list =[];

		$sql= "select * from books where id_book=".$id;
		$res=$con->prepare($sql);
		$res->execute();

		while($row= $res->fetch(PDO::FETCH_ASSOC) ){
			$bookObj=new Book($row['id_book'], $row['title_book'],$row['cover_book'],$row['price_book'] );
			array_push($list, $bookObj);
				

		}
		return $list;

	}
?>