<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>friendship</title>
		<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
		<script type="text/javascript">
			function validateRegister(){
				var firstname = document.register_form.firstname.value;
				var lastname = document.register_form.lastname.value;
				var email = document.register_form.email.value;
				var verify_email = document.register_form.verify_email.value;
				var reg_password = document.register_form.reg_password.value;
				var month = document.register_form.DateOfBirth_Month.value;
				var day = document.register_form.DateOfBirth_Day.value;
				var year = document.register_form.DateOfBirth_Year.value;
				var sex = document.register_form.sex.value;
				
				if(firstname == "" || firstname == null || firstname.length == 0){
					alert("Please enter firstname!");
					return false;
				}
				else if(lastname == "" lastname == null || lastname.length == 0){
					alert("Please enter lastname!");
					return false;
				}
				else if(email == "" || email == null || email.length == 0){
					alert("Please enter email!");
					return false;
				}
				else if(verify_email == "" || verify_email == null || verify_email.length == 0){
					alert("Please enter email!");
					return false;
				}
				else if(email != verify_email){
					alert("Email did not match!");
					return false;
				}
				else if(reg_password == "" || reg_password == null || reg_password.length == 0){
					alert("Please enter a password!");
					return false;
				}
				else if(month == "" && day == "" && year == ""){
					alert("Please enter your birthday!");
					return false;
				}	
				else if(sex == ""){
					alert("Please enter your gender!");
					return false;
				}	
				else{ 
					document.register_form.submit();
					return true; 
				}												
			}
			
			function validateEmail(){
				var email = document.register_form.email.value;
				var atpos = email.indexOf("@");
				var dotpos = email.lastIndexOf(".");
				if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 > email.length){
					alert("Not a valid email Address!");
					return false;	
				}
			}			
		</script>
	</head>
	<body>
		<div id="head"> 
			<div id="headWrapper">
				<div class="login">
					<form action="login_transition.php" method="post">
						<table class="loginMatrix">
							<tr>
								<td><label for="username">Email</label></td>
								<td><label for="password">Password</label></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><input type="text" name="username" id="username" /></td>
								<td><input type="password" name="password" id="password" /></td>
								<td><input type="submit" value="Log In" class="loginButton" /></td>
							</tr>
						</table>
					</form>
				</div>
				<h2 class="logo">friendship</h2>				
			</div>						
		</div>
		<div id="registerWrapper">
			<div id="registerContainer">
				<h1 class="signUpText">Sign Up</h1>
				<h3>Register now cuz it's free!</h3>
				<form action="register_transition.php" method="post" name="register_form" onsubmit="return validateRegister()">
					<table>
						<tr>
							<td><input type="text" name="firstname" id="firstname" placeholder="Firstname" /><span></span><input type="text" name="lastname" id="lastname" placeholder="Lastname" /></td>							
						</tr>
						<tr>
							<td><input type="text" name="email" id="email" placeholder="Email" onblur="return validateEmail();" /></td>
						</tr>
						<tr>
							<td><input type="text" name="verify_email" id="verify_email" placeholder="Re-enter email" /></td>
						</tr>
						<tr>
							<td><input type="password" name="reg_password" id="reg_password" placeholder="New Password" /></td>
						</tr>
						<tr>
							<td class="birthday"><label for="birthday">Birthday:</label></td>
						</tr>
						<tr>
							<td class="left-align">
								<select name="DateOfBirth_Month"> 
									<option> - Month - </option>
									<?php
										$month_names = array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
										foreach($month_names as $month){
											echo "<option value=\"" .$month. "\">" .$month. "</option>";
										}
									?>
								</select>
								<select name="DateOfBirth_Day"> 
									<option> - Day - </option> 
									<?php
										for($i = 1; $i <= 31; $i++){
											echo "<option value=\"" .$i. "\">" .$i. "</option>";
										}										
									?>
								</select>
								<select name="DateOfBirth_Year"> 
									<option> - Year - </option> 
									<?php
										$current_date = date("Y");
										for($year = ($current_date - 18); $year >= 1900; $year--){
											echo "<option value=\"" .$year. "\">" .$year. "</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="left-align">
								<input type="radio" name="sex" value="male" /><label for="male">Male</label><span></span>
								<input type="radio" name="sex" value="female" /><label for="female">Female</label>
							</td>
						</tr>
						<tr>
							<td class="left-align"><input type="submit" value="Register" class="reg_button" />
								<a href="delete.php" title="delete">Delete</a>
							</td>
						</tr>
					</table>					
				</form>
			</div>
		</div>
	</body>
</html>