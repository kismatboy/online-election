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
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>

body {
  background-image: url("Background/admin.jpg");
      font-size: 15px;
      color: #343d44;
     font-family: Agency FB;
      padding: 0;
      margin: 0;
    }
    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
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
      color: #FFFFFF    ;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #00FF00  ;
    }
    .data-table tbody tr:hover  {
      background-color: green;
      border-color: #808080 ;
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
      background-color: #fff;
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
      <li class="active"><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">

      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<table  class="data-table">
<thead>
  <tr>
  <th>Election ID</th>
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
       echo '<td><a href="View_Can.php?id='.$add["electionid"].'"> <button class="btn"> view candiates</button></a></td>';
      echo '<td>'.$add['startdate'].'</td>';
      echo '<td>'.$add['enddate'].'</td></tr>';
      
          }
  }

  mysqli_close($conn);


   ?>
 
</tbody>
</table>
</body>
</html>

