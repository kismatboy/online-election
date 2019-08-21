<?php
session_start();
				$_SESSION['user']='';
				 $_SESSION['id'] ='';
	session_destroy();
header("Location:Home.php");

?>