	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "election";
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		if(!$conn){
			die("Connection Failed".mysqli_error());
		}
	?>