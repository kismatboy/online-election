
<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/UserUpdate.css">
  <style type="text/css">
    


 body {
  
font-family: Agency FB;
background-image: url("Image/bguser.png");
}



  </style>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
 <a class="navbar-brand" href="Home.php">Online Voting.Com</a>
 </div>
    <ul class="nav navbar-nav">
      <li><a href="UserAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li  class="active"><a href="UserUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="UViewElection.php"><b>View Election</b></a></li>
      <li><a href="UViewResult.php"><b>View Result</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>






<div class="container">
    <div class="row">
        <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Update Profile</h2>
  <form class="login-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <p><button onclick="nameChange()">Name Change</button></p>
    <p><button onclick="passChange()">Password Change</button></p>
    <p><button onclick="tempaddChange()">Temporary Address Change</button> </p>
  <p><button onclick="permaddChange()">Permanent Address Change</button></p>
    <p><button onclick="phoneChange()">Phone number Change</button></p>

   
  </form>
</div>
    </div>
</div>
<script>
function nameChange() {
  var txt;
  var person = prompt("Please enter your New Name:");
  if (person == null || person == "") {
    txt = "Failed to change";
  } else {
    txt = "Sucessfully changed";
  }
}
</script>

<script>
function passChange() {

  var txt;
  var person = prompt("Please enter your Old Password:");
  var person1 = prompt("Please enter your New Password:");
  if (person == null || person == null) {
    txt = "Failed to change";
  } else {
    txt = "Sucessfully changed";

  }
}
</script>
<script type="text/javascript"></script>
<script>

  function tempaddChange() {
  var txt;
  var person = prompt("Please enter your New Temporary Address:");
  if (person == null || person == "") {
    txt = "Failed to change";
  } else {
    txt = "Sucessfully changed";
  }  
}
 </script>
<script>
 function permaddChange() {
  var txt;
  var person = prompt("Please enter your New Permanent Address:");
  if (person == null || person == "") {
    txt = "Failed to change";
  } else {
    txt = "Sucessfully changed";
  }  
  }
 </script>
<script>
   function phoneChange() {
  var txt;
  var person = prompt("Please enter your New Phone number:");
  if (person == null || person == "") {
    txt = "Failed to change";
  } else {
    txt = "Sucessfully changed";
  }  
}
</script>

</body>
</html>

