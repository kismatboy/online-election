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
   <title>Election </title>
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
 table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }
.data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: green;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
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
      <li class="active"><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
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
<button type="submit" class="btn btn-primary" name="view" onclick="return validform()">View</button>
</form>
</p>
<p id="heading"><mark> Election Result</mark></p>
<table  class="data-table">

<thead>
  <tr>
 
  <th>Cadidates</th>
  <th>Vote Count</th>
  </tr>
  </thead>
  


  <?php
  if(isset($_POST['view'])){
     $election_name= $_POST['election'];
     include 'ConnectionPage.php';
     require_once 'function.php';
     $e_id=getelectionid($election_name);
     $can_name=can_name($e_id);


    $sql="SELECT * FROM candidate where election_name='$election_name';";
  if ($result=mysqli_query($conn,$sql))
  {
        //if there are rows available display all the results
    echo "<tbody>" ;
    foreach ($result as $election) {
      $can_name=$election['candidatename'];
      $can_id=$election['candidateid'];

       $total_vote = vote_count($can_id,$e_id);

      echo "<tr><td>$can_name</td>
     <td>$total_vote</td></tr>
            ";
      //echo "<script> alert('".$election['electiontitle']."')</script>"
        # code...
    }
        echo "</tbody>" ;

  }
  else{
    echo mysqli_error($conn);
  }

    



  }
   ?>

  

</body>
</html>

