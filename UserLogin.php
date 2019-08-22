<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:home.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/userlogin.css">
  <style>

 body {
 	background-image: url(background/bguser.png);
    background-size: 1500px;
font-family: Agency FB;
}



</style>
</head>
<body>

<?php 

$uName="";
$Pass="";



$uNameERR="";
$UsereXIST="";
$PassERR1="";
$PassERR2="";



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

if(isset($_POST['signin'])){
	$name=$_POST['uName'];
	$password=$_POST['password'];

	 $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Election";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);

	$sql="SELECT * FROM voter";
	if ($result=mysqli_query($connection,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'No data';
		}
      	//if there are rows available display all the results
		foreach ($result as $row) {
      	# code...
			if ($row['votername']==$name & $row['password']==$password ){
				 session_start();
				 $_SESSION["user"]= $name;
				 $_SESSION["id"] = $row["id"];
				header ("Location:useraccount.php");
			
			}
			else{
								

			}
		}
		echo "<script>alert('not success');</script>";
		echo mysqli_error($connection);
	

	mysqli_close($connection);

}
}
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
	
     

	$error=0;
	if(empty($_POST['Voter']))
	{
		$error++;
		$uNameERR="Required";
	}
	else
	{
		$uName=Valid($_POST['Voter']);
	}
	
	
	if(empty($_POST['Pass']))
	{
		$error++;
		$PassERR1="Required, ";
	}
	else
	{
		$Pass=Valid($_POST['Pass']);
	}
	

	
	
	if($error==0)
	{
	
   

	     $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Election";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);
		 
		 
		
	     $query="select * from Voter where VoterUserName='$uName' and Password='$Pass'";
		
		
		 
	    $Complete=mysqli_query($connection,$query) or die("unable to connect");
			   
		
		$Rows=mysqli_fetch_array($Complete);

		$name=$Rows['VoterName'];
		$email=$Rows['Email'];
		$phone=$Rows['Mobile'];
		$address=$Rows['Address'];;
		
		if($Rows['VoterUserName']==$uName &&$Rows['Password']==$Pass)
		{

				session_start();
		        $_SESSION['uName'] = $uName;
				$_SESSION['Pass'] = $Pass;
				

			   header("Location:UserAccount.php");
		     exit();
		 
		}
		else
		{
		echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
		}
		
			mysqli_close($connection);  			 			 		   
	 }
   
}
	

?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b><mark>Sign in to continue</mark></b></h1><br>
            <div class="account-wall">
                <img class="profile-img" src="Image/user.png " alt="">
                <form class="form-signin" action="" method="POST">
                <input type="text" class="form-control" name="uName" placeholder="Voter User Name" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
               <label class="checkbox pull-left"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
                    <input type="checkbox" value="remember-me">Remember me
                </label>
                <a href="UForgot.php" class="pull-right need-help">Forgot Password?</a><span class="clearfix"></span>
                </form>
				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="Home.php">Home</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	            <a href="UserLogin.php">Back</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </div>
            <a href="URegistration.php" class="text-center new-account"><h3><b><span style="color: white">Create an account</span></b></h3> </a>
        </div>
    </div>
</div>


</body>
</html>

