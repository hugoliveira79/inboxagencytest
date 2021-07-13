<?php

	session_start();
	include('../config.php');
	$id=$_POST['book_id'];

	$book_detail= getBooksById($conn, $id);

	if(!isset($_SESSION['shopping_cart'])){
		$_SESSION['shopping_cart']=[$book_detail[0]->getId()];
	} else {
		array_push($_SESSION['shopping_cart'], $book_detail[0]->getId());
	}

	//print_r($_SESSION['shopping_cart']);
?>