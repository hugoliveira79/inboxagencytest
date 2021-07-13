<?php

	include('user/Controller.user.php');
	include('book/Controller.book.php');
	include('purchase/Controller.purchase.php');
	include('purchase/Controller.shoppingcart.php');

	define('PRODUCTION',false);



	if(PRODUCTION==false){
		/* SETUP FOR DEV */
		define('EMAIL_SENDER_SERVER','smtp.gmail.com');
		define('EMAIL_SENDER_SERVER_PORT',587);
		define('EMAIL_SENDER_SERVER_SECURE','tls');
		define('EMAIL_SENDER_SERVER_SMTPAuth',true);
		define('EMAIL_SENDER_SERVER_USER','inboxagencytest@gmail.com');
		define('EMAIL_SENDER_SERVER_PASS','In.Ag#2017');
		define('EMAIL_SENDER_SERVER_FROM_EMAIL','inboxagencytest@gmail.com');
		define('EMAIL_SENDER_SERVER_FROM_NAME','INBOXANGENCY SHOP');
		define('EMAIL_RECEIVER','inboxagencytest@gmail.com');
		define('EMAIL_RECEIVER_NAME','INBOXANGENCY SHOP');
		define('EMAIL_SUBJECT','NEW PURCHASE!!');

		$conn = new PDO('mysql:host=192.168.1.122;dbname=inboxagency', 'root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} else {
		/* SETUP FOR PRODUCTION */
		define('EMAIL_SENDER_SERVER','smtp.gmail.com');
		define('EMAIL_SENDER_SERVER_PORT',587);
		define('EMAIL_SENDER_SERVER_SECURE','tls');
		define('EMAIL_SENDER_SERVER_SMTPAuth',true);
		define('EMAIL_SENDER_SERVER_USER','inboxagencytest@gmail.com');
		define('EMAIL_SENDER_SERVER_PASS','In.Ag#2017');
		define('EMAIL_SENDER_SERVER_FROM_EMAIL','inboxagencytest@gmail.com');
		define('EMAIL_SENDER_SERVER_FROM_NAME','INBOXANGENCY SHOP');
		define('EMAIL_RECEIVER','inboxagencytest@gmail.com');
		define('EMAIL_RECEIVER_NAME','INBOXANGENCY SHOP');
		define('EMAIL_SUBJECT','NEW PURCHASE!!');
		$conn = new PDO('mysql:host=192.168.1.122;dbname=inboxagency', 'root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	

?>