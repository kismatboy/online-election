
<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:home.php");
}
?><?php
require 'ConnectionPage.php';
 if (isset($_POST['reg'])){
  $votername=$_POST['votername'];
  $password=$_POST['password'];
  $permant_add=$_POST['permanent_add'];
  $phone=$_POST['phone'];
  $citizenshipnumber=$_POST['citizenshipnumber'];
  $dob=$_POST['dateofbirth'];
  $gender=$_POST['gender'];

   $sql= "INSERT into voter (votername,password,permanentadd,phone,citizenshipno,dob,gender) values (
   '$votername','$password','$permant_add','$phone','$citizenshipnumber','$dob','$gender')";
   if ($r=mysqli_query($conn,$sql)){
    header('location:UserAccount.php');

   }
   else{
    echo mysqli_error($conn);  
   }




 }



?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/uregistration.css">

<style>

 body {
  
font-family: Agency FB;
background-image: url("Image/bguser.png");
}

</style>
</head>
<body>
        
<form  method="POST" action="" enctype="multipart/form-data" name="VoterRegistration"  onsubmit="return ValidateRegistrationForm();">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
                
			
              <h3 class="panel-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Please sign up for Voting</b></h3>
        
            <div class="panel-body">
              <form role="form">
                  <div class="form-group">
                 <input type="text" name = "votername" class="form-control" placeholder="Voter Name..." required autofocus>
              </div>
                  <div class="form-group">
                  <input type="Password" name="password" class="form-control input-sm" placeholder="Password..."required autofocus>
                </div>

               
                <div class="form-group">
                <input type="text" name = "permanent_add" class="form-control" placeholder="Permanent Address..." required autofocus>
                </div>
                 <div class="form-group">
			   <input type="number" name = "phone" class="form-control" placeholder=" Phone..." required autofocus>
                </div>
              
				 <div class="form-group">	
				 <input type="number" name = "citizenshipnumber" class="form-control" placeholder="Citizenship Number..." required autofocus>
                </div>

                <div class="form-group">
                 <input type="date" name = "dateofbirth" class="form-control" placeholder="Date of Birth..." required autofocus>
                </div>

                <div class="form-group">
                  <input type="radio" name="gender" value="Male" style="border:5px solid green;"/>Male
                  <input type="radio" name="gender" value="Female"/>Female 
                </div>
               
                 <div class="form-group">
                 <input type="file" name="image"/>
               </div>
				<a href="Home.php">Home</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	            <a href="UserLogin.php">Back</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               <div>
                <input  name='reg' type="submit" value="Register" class="btn btn-info btn-block">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
</body>
</html>

