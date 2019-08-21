<?php

function election_list(){
  include 'ConnectionPage.php';

  	$sql="SELECT * FROM election;";
	if ($result=mysqli_query($conn,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'no election';
		}
      	//if there are rows available display all the results
		foreach ($result as $election) {
			//echo "<script> alert('".$election['electiontitle']."')</script>"
      	# code...

			echo '<option >'.$election['electiontitle'].'</option >';
		}
	}
	else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}
function election_result(){
  include 'ConnectionPage.php';

  	$sql="SELECT * FROM election where status='end';";
	if ($result=mysqli_query($conn,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'no election';
		}
      	//if there are rows available display all the results
		foreach ($result as $election) {
      	# code...

			echo '<option >'.$election['electiontitle'].'</option >';
		}
	}
	else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}

function getelectionid($name){
  include 'ConnectionPage.php';

  	$sql="SELECT * FROM election;";
	if ($result=mysqli_query($conn,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
			echo 'no election';
		}
      	//if there are rows available display all the results
      	
		foreach ($result as $election) {
			//echo "<script> alert('".$election['electiontitle']."')</script>"
      	# code...
			$name1= $election['electiontitle'];
			// if( $election['electiontitle']==$name){
			if( $name1==$name){

				
				// echo "<br>success";
				 return $election['electionid'];
			}
		}
	}
	else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}



function getvoterid($name){
  include 'ConnectionPage.php';

  	$sql="SELECT * FROM voter where votername='$name';";
	if ($result=mysqli_query($conn,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no news alert
		if ($rowcount==0) {
      		# code...
      		return 0;
		}
      	//if there are rows available display all the results
		foreach ($result as $election) {
			//echo "<script> alert('".$election['electiontitle']."')</script>"
      	# code...
			return $election['voterid'];
		}
	}
	else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}

?>