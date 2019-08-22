<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:home.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/Forgot.css">

  <style>

 body {
font-family: Agency FB;
}



</style>




</script>
</head>
<body>



 


<div class="container">
    <div class="row">
        <div class="login">
		
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Change Password</h2>
<form class="login-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <p><input type="number" placeholder="Voter ID" name="voterid"></p>
    <p><input type="password" placeholder="New Password" name="Password1"></p>
    <p><input type="password" placeholder="Confirm Password" name="Password2"></p>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href="Home.php">Home</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href="UserLogin.php">Back</a>
    <p><input type="submit" value="Change"></p>
  </form>
</div>>
    </div>
</div>

</body>
</html>

