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
   <title>Admin </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
background-image: url("Background/admin.jpg");
font-family: Agency FB;
}

form { margin: 0px 10px; }
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

#heading
{
 text-align:center;
 margin-top:10px;
 font-size:30px;
 color:#228B22;
}
#election
{
 width:400px;
 background-color:#C0C0C0;
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
      <li><a href="AddElection.php"><b>New Election</b></a></li>
      <li><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li class="active"><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  
<p id="heading">Select Election Title</p>
<center>
<form method="POST" name="ElectionForm">
<br><div align="center">

 <select name="election" id="election" onchange="fetch_select(this.value);">
 <option hidden>Select Election</option>
     <?php
 include 'function.php';
election_list();

 ?>
   
   
 </select><br>

</div>   
</center>
<p style=" margin: -2.7% 10% 10% 68%">
<button type="submit" class="btn btn-primary" name="end" onclick="return validform()">End Now</button>
</form>
</p>
<?php
if(isset($_POST['end'])){
   include 'ConnectionPage.php';
  $election_name= $_POST['election'];
 echo "Today is " . date("Y/m/d") . "<br>";

$id=getelectionid($election_name);
echo $id."<br>";

  $sql="select * from election where electionid='$id';";
  echo $sql;

if ($result=mysqli_query($conn,$sql))
  {
        //count number of rows in query result
    $rowcount=mysqli_num_rows($result);
        //if no rows returned show no news alert
    if ($rowcount==0) {
          # code...
      echo 'no date found';
    }
        //if there are rows available display all the results
    foreach ($result as $election) {
      //echo "<script> alert('".$election['electiontitle']."')</script>"
        # code...
      echo  date("Y/m/d") ;
      $sql_edit="update election set status = 'end', enddate='".date("Y/m/d") ."' where electionid='$id';";
      echo '<br>'.$sql_edit;
      if ($result=mysqli_query($conn,$sql_edit))
  {
      echo '<script>alert("success");</script>';
    }
    else{
      echo mysqli_error($conn);
    }
    }
  }
  else{
    echo mysqli_error($conn);
  }
}

?>
</body>
</html>

