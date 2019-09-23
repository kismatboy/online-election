 <?php

$seconds = 5;
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:home.php");
}


include_once 'function.php';
include_once 'ConnectionPage.php';
  echo "<script>alert('clicked1111');</script>";
   $name = $_GET['name'];
       $can_id=$_POST['can_id'];
        $voter_name = $_SESSION['user'];
    $voter_id = getvoterid($voter_name);
    $election_id = getelectionid($name);
    echo 'candidate '.$can_id .'<br>';
    echo 'election '.$election_id .''.$name.'<br>';
    echo 'voter '.$voter_id .''.$voter_name.'<br>';

       $sql_check="select * from vote where candidateid ='$can_id' and electionid = '$election_id' and voterid= '$voter_id'";
       if ($result=mysqli_query($conn,$sql_check))
       {
        //count number of rows in query result
        $rowcount=mysqli_num_rows($result);
        //if no rows returned show no news alert
        if ($rowcount==0) {
          $sql_insert="INSERT INTO `vote` (`voterid`, `candidateid`, `electionid`,`election_name`) VALUES ( '$voter_id', '$can_id', '$election_id', '$name');";
          if ($result=mysqli_query($conn,$sql_insert)){

           
              header("location:uview_can.php?id=5&name=$name");
            
          }
          else{
            

           
              header("location:uview_can.php?id=3&name=$name");
            
          }

        }  
        else{
          echo $rowcount;
          
              header("location:uview_can.php?id=4&name=$name");
            
          }
        }
        else{
          $error= mysqli_error($conn);
          echo "$error";
          echo "<script>alert('error');</script>";
          mysqli_close($conn);
        }
  ?>