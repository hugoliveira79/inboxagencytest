<?php
	include('config.php');
	session_start();

	$user=$_POST['login'];
	$pass=$_POST['password'];

	$sql="select * from users where login_user='".$user."' and pass_user=MD5('".$pass."')";
	echo $sql;

	$res=$conn->prepare($sql);
	$res->execute();

	$found = $res->rowCount(); 



	if($found==1){
		
			$row= $res->fetch(PDO::FETCH_ASSOC) ;
			//echo "USER".$row['id_user'];
			$userObj=new User($row['id_user'], $row['login_user'],$row['pass_user']);

			$_SESSION['user_info']=$userObj;
				

		//die();

	
		header('Location:index.php?area=list');
	} else{
		header('Location:index.php?area=home&login=-1');
	}
	

	
?>