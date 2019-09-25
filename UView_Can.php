<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:home.php");
}
if ($_GET['id']==1){
  echo "<script>alert('You have successfully voted.');</script>";
}if ($_GET['id']==4){
 echo "<script>alert('sorry! You have already use your voting right.');</script>";
}if ($_GET['id']==3){
echo "<script>alert('sorry! try again.');</script>";}
if ($_GET['id']==5){
 echo "<script>alert('you have successfully voted $can_id');</script>";
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
    background-image: url("Image/bguser.png");
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

<!-- <script>
  $(document).ready(function () {

   $( "#test" ).click(function() {
    alert('you have successfully voted');
  }); 
 });
</script>
 -->
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



<p id="heading"><mark> View Candidate</mark></p>
<table  class="data-table">

  <thead>
    <tr>

      <th>Cadidate Name</th>

      <th>Candidate Address</th>
      <th>Description</th>
      <th>Logo</th>  
    </tr>
  </thead>
  <style type="text/css">
    .btn{
      color:black;
    }
  </style>
  <tbody>

    <?php
    require_once 'function.php';
    $name = $_GET['name'];
    $voter_name = $_SESSION['user'];
    $voter_id = getvoterid($voter_name);
    $election_id = getelectionid($name);
    include 'ConnectionPage.php';


    $sql= "select * from candidate where election_name='$name';";
    if ($result=mysqli_query($conn,$sql))
    {
        //count number of rows in query result
      $rowcount=mysqli_num_rows($result);
        //if no rows returned show no news alert
      if ($rowcount==0) {

      }
        //if there are rows available display all the results
      foreach ($result as $add ) {
        echo '<tr><td>'.$add['candidatename'].'</td>';
        echo '<td>'.$add['candidateadd'].'</td>';
        echo '<td>'.$add["description"].'</td>';
        echo '<td >

        <form action="vote.php?name='.$name.'" method="POST"> 
        <input type="hidden" name="can_id" value="'.$add['candidateid'].'">
        <input type="image"  src="c_image/'.$add['image'].'" height="100px" width="100px;"> 
        </form><br><p font-size="14px"> (click here to vote)</p></button>

        </td></tr>';
      }

      if(isset($_POST['vote'])){
         echo "<script>alert('clicked');</script>";
       $can_id=$_POST['can_id'];
       $sql_check="select * from vote where voterid ='$voter_id'";
       if ($result=mysqli_query($conn,$sql_check))
       {
        //count number of rows in query result
        $rowcount=mysqli_num_rows($result);
        //if no rows returned show no news alert
        if ($rowcount==0) {
          $sql_insert="INSERT INTO `vote` (`voterid`, `candidateid`, `electionid`,`election_name`) VALUES ( '$voter_id', '$can_id', '$election_id', '$name');";
          if ($result=mysqli_query($conn,$sql_insert)){

            echo "<script>alert('you have successfully voted $can_id');</script>";
          }
          else{
            echo "<script>alert('sorry! try again.');</script>";
          }

        }  
        else{
          echo "<script>alert('sorry! You have already use your voting right.');</script>";}

        }
        else{
          $error= mysqli_error($conn);
          echo "<script>alert('$error');</script>";
        }
      }




    }
  
  else{
    mysqli_close($conn);
  }


  ?>
  
</tbody>


</body>
</html>