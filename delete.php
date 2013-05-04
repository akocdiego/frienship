<?php include 'classes/connectToDB.php';
	$connect = new connectToDatabase();
	mysqli_query($connect->getCon(),"Delete from user_info where firstname = 'bruce'");  
?>