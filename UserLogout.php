<?php
session_start();
if(session_destroy())
{
	
				$_SESSION['user']='';
				 $_SESSION['id'] ='';
	session_destroy();
header("Location: UserLogin.php");
}
?>