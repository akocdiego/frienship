<?php
    class connectToDatabase{
		private $con;//create con variable
		private $url = "localhost";
		private $mysql_username = "root";
		private $mysql_password = "";
		private $db_name = "friendship";
		
		public function __construct(){
			/* Create a new mysqli object with database connection parameters */
			$this->con = new mysqli($this->url,$this->mysql_username,$this->mysql_password,$this->db_name);
			if(mysqli_connect_errno()){
				printf("Connection to Mysql Database Failed: %s",mysqli_connect_error());
				exit();
			}
		}
		
		/*
			What is so great about prepared statements and why are they more secure? 
			The simple answer is because prepared statements can help increase security by separating the SQL logic from the data being supplied.
			
			Instead of grabbing and building the query string using things like $_GET['username'], we have ?'s instead. 
			These ?'s separate the SQL logic from the data. 
			The ?'s are place holders until the next line where we bind our parameters to be the username and password. 
			The rest of the code is pretty much just calling methods which you can read about by following some of the links at the end of the article.
		*/
		public function addUser($firstname,$lastname,$email,$password,$b_day,$gender){
			$insertStatus = false;			
			$stmt = $this->con->stmt_init();
			/* Create a prepared statement */
			if($stmt = $this->con->prepare("insert into user_info(firstname,lastname,email,password,b_day,sex) values(?,?,?,?,?,?)")){
				/* Bind parameters s - string, b - blob, i - int, etc */
				$stmt->bind_param("ssssss",$Firstname,$Lastname,$Email,$Password,$B_day,$Gender);
				$Firstname = $firstname;
				$Lastname = $lastname;
				$Email = $email;
				$Password = $password;
				$B_day = $b_day;
				$Gender = $gender;
				/* Execute it */
				$stmt->execute();
				$insertStatus = true;
				$stmt->close();
			}
			else{ $insertStatus = false; }			
			return $insertStatus;
		}	
		
		private function getUser($email,$index){
			$stmt = $this->con->stmt_init();
			$stmt = $this->con->prepare("Select email,password from user_info where email = ?") or die("Query Failed: ".mysqli_error());
			$stmt->bind_param("s",$email);
			$stmt->execute();
			/* Bind results */
			$stmt->bind_result($Email,$Password);
			$User = "";
			$Pass = "";
			/* Fetch the value */
			while($stmt->fetch()){
				$User = $Email;
				$Pass = $Password;
			}
			/* Close statement */
			$stmt->close();
			$user_info = array("Email"=>$User,"Password"=>$Pass);
			return $user_info[$index];
		}	
		
		public function getEmail($email){
			return $this->getUser($email,"Email");
		}
		
		public function getPassword($email){
			return $this->getUser($email,"Password");
		}
		
		
		function month_str_to_int($month){
			$month_num = 0;
			if($month == "January")
				$month_num = 1;
			else if($month == "Febuary")
				$month_num = 2;
			else if($month == "March")
				$month_num = 3;
			else if($month == "April")
				$month_num = 4;
			else if($month == "May")
				$month_num = 5;
			else if($month == "June")
				$month_num = 6;
			else if($month == "July")
				$month_num = 7;
			else if($month == "August")
				$month_num = 8;
			else if($month == "September")
				$month_num = 9;
			else if($month == "October")
				$month_num = 10;
			else if($month == "November")
				$month_num = 11;
			else if($month == "December")
				$month_num = 12;
			return $month_num;
		}
	}
?>