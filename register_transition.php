<?php include 'classes/connectToDB.php';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['reg_password'];
	$month = $_POST['DateOfBirth_Month'];
	$day = $_POST['DateOfBirth_Day'];
	$year = $_POST['DateOfBirth_Year'];
	$sex = $_POST['sex'];
	
	if($firstname != "" && $lastname != "" && $email != "" && $password != "" && $month != "" && $day != "" && $year != ""){
		$connect = new connectToDatabase();		
		$month_num =$connect->month_str_to_int($month);
		$b_day_pattern = $year . "/" . $month_num . "/" . $day;		
		$insertStatus = $connect->addUser($firstname,$lastname,$email,$password,$b_day_pattern,$sex[0]);
		if(!$insertStatus){ header("Location:temp.php"); }
		else{ echo "Ako c Diego! " .  $insertStatus;}
	}
	else{ header("Location:temp.php"); }
?>