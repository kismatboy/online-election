
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<style type="text/css">
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 100;
  top: 100;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
#close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#close:hover,
#close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
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
  
     <p><button onclick="changeName()">Name Change</button></p>
    <p><button onclick="passChange()">Password Change</button></p>
    <p><button onclick="tempaddChange()">Temporary Address Change</button> </p>
  <p><button onclick="permanentChange()">Permanent Address Change</button></p>
    <p><button onclick="phoneChange()">Phone number Change</button></p>

   
</div>
    </div>
</div>

<!-- The name -->
<div id="nameChange" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span  class="close1" id="close">&times;</span>
    <form>
      <input type="text" name="name">
      <input type="submit" name="btnName">
    </form>
  </div>
</div>
<!-- The tempaddChange -->
<div id="tempaddChange" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span  class="close6" id="close">&times;</span>
    <form>
      <input type="text" name="name">
      <input type="submit" name="btnName">
    </form>
  </div>
</div>


<!-- The password -->
<div id="passChange" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2"  id="close">&times;</span>
    <form>
      <input type="text" name="name">
      <input type="submit" name="btnName">
    </form>
  </div>
</div>

<!-- The permanent address -->
<div id="permanentChange" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close3" id="close">&times;</span>
    <form>
      <input type="text" name="name">
      <input type="submit" name="btnName">
    </form>
  </div>
</div>

<!-- The phone -->
<div id="phoneChange" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close4"    id="close">&times;</span>
    <form>
      <input type="text" name="name">
      <input type="submit" name="btnName">
    </form>
  </div>
</div>

<script>

function changeName(){
var span = document.getElementsByClassName("close1")[0];

   document.getElementById("nameChange").style.display = "block";

   span.onclick= function(){
  document.getElementById("nameChange").style.display ="none";
}
  
}
function tempaddChange(){
var span = document.getElementsByClassName("close6")[0];

   document.getElementById("tempaddChange").style.display = "block";

   span.onclick= function(){
  document.getElementById("tempaddChange").style.display ="none";
}
  
}
function passChange(){
   document.getElementById("passChange").style.display = "block";

   var span = document.getElementsByClassName("close2")[0];

   span.onclick= function(){
  document.getElementById("passChange").style.display ="none";
}
}
function permanentChange(){
   document.getElementById("permanentChange").style.display = "block";

   var span = document.getElementsByClassName("close3")[0];

   span.onclick= function(){
  document.getElementById("permanentChange").style.display ="none";
}
}
function phoneChange(){
   document.getElementById("phoneChange").style.display = "block";

   var span = document.getElementsByClassName("close4")[0];

   span.onclick= function(){
   document.getElementById("phoneChange").style.display ="none";
}
}
</script>

</body>
</html>

