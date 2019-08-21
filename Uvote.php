
<?php session_start(); 
 


 $election=$_GET['election'];
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
 
font-family: Agency FB;
background-image: url("Image/bguser.png")
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
      background-color: lightgray;
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
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="UserAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="UserUpdate.php"><b>Update Profile</b></a></li>
      <li  class="active"><a href="UViewElection.php"><b>View Election</b></a></li>
      <li><a href="UViewResult.php"><b>View Result</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

 
<form action="" method="POST">
<table class="data-table">
 <thead>
     <tr>
       <th>Election Title </th>      
       <th>Candidate Name</th>
       <th>Candidate Photo</th>
       <th>Candidate Details</th>
       <th>Give Vote</th>
       <th><?php $_get['election']?></th>
    </tr>
  </thead>

<tbody>

  <?php 
    include 'ConnectionPage.php';
  $sql= 'select * from  candidate where ;';
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
       echo '<td><button class="btn"> view candiates</button></td>';
      echo '<td>'.$add['startdate'].'</td>';
      echo '<td>'.$add['enddate'].'</td></tr>';
      
          }
  }

  mysqli_close($conn);

  ?>
</tbody>
</table>
<p style=" margin: 1% 0% 0% 75%">
<button type="submit" class="btn btn-primary"  onclick="return validform(this.form)" >Vote Now</button>
</p>
</form>

</body>
</html>

