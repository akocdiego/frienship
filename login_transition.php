<?php include 'classes/connectToDB.php';
	$email = $_POST['username'];
	$password = $_POST['password'];
	
	$connect = new connectToDatabase();
	$User_from_db = $connect->getEmail($email);
	$pass_from_db = $connect->getPassword($email);
	
	if($email == $User_from_db && $password == $pass_from_db){
		echo "Darna!" . "<br />";
	}
	else{ header("Location:temp.php"); }
?>