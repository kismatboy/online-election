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
<p id="heading"><mark> View Candidate</mark></p>
<table  class="data-table">

<thead>
  <tr>
 
  <th>Cadidate Name</th>
  <th>Candidate email</th>
<th>Candidate phone</th>
<th>Candidate Address</th>
<th>Description</th>
<th>Logo</th>  
  </tr>
  </thead>
<tbody>
 


 
</tbody>

  </body>
  </html>