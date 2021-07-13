<?php
	session_start();
	include('config.php');
	if(!isset($_GET['area'])){
		$area='home';

	}else {
		$area=$_GET['area'];
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

	<div class='col-xs-10 col-xs-offset-1 wrapper'>
		
		
	
	<?php
		switch($area){
			case 'home': { include('views/home.php'); } break;
			case 'list': { include('views/list.php'); } break;
			case 'detail': { include('views/detail.php'); } break;
			case 'purchase': { include('views/purchase.php'); } break;
			case 'checkout': { include('views/checkout.php'); } break;
		}

	?>
	</div>
	
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>