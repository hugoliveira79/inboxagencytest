<?php
	include('../config.php');
	include('../mailer/PHPMailerAutoload.php');
	session_start();
	$id_user= $_SESSION['user_info']->getId();

	$purchase = new Purchase(null,null, $_SESSION['user_info']);
	$id_purchase = $purchase->save($conn);
	
	for($i=0;$i<count($_SESSION['shopping_cart']);$i++){
		$sc = new ShoppingCart(null,$_SESSION['shopping_cart'][$i], $id_purchase );
		$id_sc=$sc->save($conn);
	}

	/* EMAIL SUBMISSION */
	$mail = new PHPMailer();

	$mail->isSMTP();

	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = EMAIL_SENDER_SERVER;
	$mail->Port = EMAIL_SENDER_SERVER_PORT;
	$mail->SMTPSecure = EMAIL_SENDER_SERVER_SECURE;
	$mail->SMTPAuth = EMAIL_SENDER_SERVER_SMTPAuth;
	$mail->Username = EMAIL_SENDER_SERVER_USER;
	$mail->Password = EMAIL_SENDER_SERVER_PASS;
	$mail->setFrom(EMAIL_SENDER_SERVER_FROM_EMAIL, EMAIL_SENDER_SERVER_FROM_NAME);
	$mail->addReplyTo(EMAIL_SENDER_SERVER_FROM_EMAIL, EMAIL_SENDER_SERVER_FROM_NAME);
	$mail->addAddress(EMAIL_RECEIVER, EMAIL_RECEIVER_NAME);
	$mail->Subject = EMAIL_SUBJECT;
	$mail->msgHTML("Hello<br>There's a new purchase! ID: ".$id_purchase );
	$mail->AltBody = "Hello.There's a new purchase! ID: ".$id_purchase;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" href="../css/style.css">

</head>
<body>

	<div class='col-xs-10 col-xs-offset-1 wrapper'>
		<?php
		if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else { 
		unset($_SESSION['shopping_cart']);
	
		?>
		<div style="text-align: center;">Your purchase was submited with the ID Number <?php echo $id_purchase; ?> . Go to <a class="btn-primary " href="../index.php?area=list">Book list</a> for more shopping
	<?php 
	}

	/**/


?>
	</div>

	<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>		




	

	