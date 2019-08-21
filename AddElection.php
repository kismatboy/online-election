<?php
if(isset($_POST['set_election'])){
  include 'ConnectionPage.php';

  $title=$_POST['E_Title'];
  $startDate=$_POST['startDate'];
  $EndDate=$_POST['EndDate'];
  
  $sql="insert into election (electiontitle,startdate,enddate) values (' $title',' $startDate',' $EndDate')";
  if ($success=mysqli_query($conn,$sql)){
   echo  "<script>alert('success')</script>";
  }
  else{
    echo "<script>alert('error:".mysqli_error($conn)."')</script>";
  }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Election </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>

 body {
   background-image: url("Background/admin.jpg");
font-family: Agency FB;
}

form 
{ margin: 0px 10px; 

}

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { max-width: 360px; }

.divider {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 5px;
}

.divider hr {
  margin: 7px 0px;
  width: 35%;
}

.left { float: left; }

.right { float: right; }

#can1
{
 width:400px;
 background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
#can2
{
 width:400px;
background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
#can3
{
 width:400px;
background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
select
{
 width:400px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;

}

input
{
  width:400px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;
 background-color:#FFF5EE;
}
#heading
{
 text-align:center;
 margin-top:10px;
 font-size:50px;
 color:#228B22;
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
      <li><a href="AdminWork.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="AddCandidate.php"><b>Add Candidate</b></a></li>
      <li class="active"><a href="AddElection.php"><b>New Election</b></a></li>
      <li><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
    </form>
      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  
 

<p id="heading"><mark>Add New Election</mark></p>
<center>
 <form  action="" method="POST" name="ElectionForm" onsubmit="return validform();">
     <input type="text" name="E_Title" placeholder="Election Title"><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                                                        <input type="date" name="startDate"><span style="color: blue"><mark>START DATE</mark></span><br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                                                                  <input type="date" name="EndDate"><span style="color: blue"><mark>END DATE</mark></span>

<br>
</center>
<br>
<br>
<br>
                                        <div align="center"><input type="submit" name="set_election" value="Set Election"></div>
</form>
</body>
</html>

