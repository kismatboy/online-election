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

  <style>

body {
  
background-image: url("Image/bguser.png");
     font-family: Agency FB;
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

#heading
{
 text-align:center;
 margin-top:10px;
 font-size:30px;
 color:#228B22;
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
      <li><a href="UserAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="UserUpdate.php"><b>Update Profile</b></a></li>
      <li class="active"><a href="UViewElection.php"><b>View Election</b></a></li>
      <li><a href="UViewResult.php"><b>View Result</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>    
    </ul>
  </div>
</nav>




<table  class="data-table">
<thead>
  <tr>
  
  <th>Election Title</th>
  <th>Cadidates</th>
  <th>Start Date</th>
  <th>End Date</th>
  </tr>
  </thead>


<tbody>

   <style type="text/css">
    .btn{
      color:black;
    }
  </style>
     <?php
  include 'ConnectionPage.php';
  $sql= 'select * from election;';
  if ($result=mysqli_query($conn,$sql))
  {
        //count number of rows in query result
    $rowcount=mysqli_num_rows($result);
        //if no rows returned show no news alert
    if ($rowcount==0) {
       
    }


        //if there are rows available display all the results
    foreach ($result as $add ) {
      echo '<tr><td>'.$add['electionid'].'</td>';
      echo '<td>'.$add['electiontitle'].'</td>';
       echo '<td><a href="uView_Can.php?id=2&name='.$add["electiontitle"].'"> <button class="btn"> view candiates</button></a></td>';
      echo '<td>'.$add['startdate'].'</td>';
      echo '<td>'.$add['enddate'].'</td></tr>';
      
          }
  }

  mysqli_close($conn);


   ?>
 
 </tbody>
  <style type="text/css">
    .btn{
      color:black;
    }
  </style>
</body>
</html>

