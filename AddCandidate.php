<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:home.php");
}
?>
<?php
if(isset($_POST['C_submit'])){
  include 'ConnectionPage.php';
    if($_FILES["C_picture"]["name"]!==''){
                     $pic_name = $_FILES["C_picture"]["name"];
                     $target_file = "c_image/" . basename($pic_name);
                  
    // check if file exists
    if(file_exists($target_file)) {
      echo "<script type='text/javascript'> alert('File already exists. please rename and try again')</script>";

    } else{ 
      if(move_uploaded_file($_FILES["C_picture"]["tmp_name"], $target_file)) {
         echo "<script type='text/javascript'> alert('File uploaded')</script>";

          
        }
      } 
    }

  $C_name=$_POST['C_name'];
  $C_email=$_POST['C_email'];
  $C_phone=$_POST['C_phone'];
  $C_address=$_POST['C_address'];
  $C_description=$_POST['C_description'];
  $C_election=$_POST['C_election'];


                
    

 $sql1="Select * from candidate where candidateemail ='$C_email';";



    if ( $res=mysqli_query($conn,$sql1)){
        $count_res=mysqli_num_rows($res);
            //election new field
      if ( $count_res==0){
    
       
      $sql="insert into candidate (candidateemail, candidatename,candidatephn,candidateadd,description,image,election_name) values ('$C_email',' $C_name',' $C_phone',' $C_address',' $C_description','$pic_name','$C_election');";
      if ($success=mysqli_query($conn,$sql)){
       echo  "<script>alert('success')</script>";
      }
      else{
        echo "<script>alert('error:".mysqli_error($conn)."')</script>";
      }
    
    }
    else{
      echo  "<script>alert('email already exits')</script>";
      
    
    }
  }
   else{
      echo  "<script>alert('something went wrong')</script>";
      
    
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
      <li class="active"><a href="AddCandidate.php"><b>Add Candidate</b></a></li>
      <li><a href="AddElection.php"><b>New Election</b></a></li>
      <li><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  


  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" enctype="multipart/form-data" action="#" role="form" name="CandidateForm" onsubmit="return ValidateCandidateForm();">
            <div class="form-group">
              <h3><b>Add New Candidate</b></h3>
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">Candidate name</label>
              <input type="text" name="C_name" maxlength="50" class="form-control" required>
            </div>
          
            <div class="form-group">
              <label class="control-label" for="signupEmail">Candidate Email</label>
              <input id="signupEmail" type="email" name="C_email" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Candidate Phone</label>
              <input  type="number" name="C_phone" maxlength="50" class="form-control" required>
            </div>
            
             <div class="form-group">
              <label class="control-label">Candidate Address</label>
              <textarea rows="2" cols="56" name="C_address"> </textarea>
            </div>
             <div class="form-group">
              <label class="control-label">Candidate Description</label>
              <textarea rows="2" cols="56" name="C_description"> </textarea>
            </div>
            <div>

   <select name="C_election" id="election" onchange="fetch_select(this.value);">
 <option >Select Election</option>
 <?php
 include 'function.php';
election_list();

 ?>

 
 
 </select><br><br>
</div>   
             <div class="form-group">
              <input  type="file" name="C_picture">
            </div>
             
            
             
            <div class="form-group">
              <button id="signupSubmit" type="submit" class="btn btn-info btn-block" name="C_submit">Add Candidate Now</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>

