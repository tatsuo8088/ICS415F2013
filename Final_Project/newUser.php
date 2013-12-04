<?php
	require 'connect.php';
	
	$number_of_users = mysqli_fetch_array($mysqli -> query("SELECT COUNT(username) FROM user_info"));
	
	if(isset($_POST["email"]) && 
	   isset($_POST["password"])){
	   
	   $email = $_POST["email"];
	   $password = $_POST["password"];
	   $street_address = $_POST["street_address"];
	   $city = $_POST["city"];
	   $state = $_POST["state"];
	   $zip = $_POST["zip"];
	   $country = $_POST["country"];
	   
	   	$mysqli -> query("INSERT INTO `user_info`(`username`, 
												  `password`, 
												  `userid`,
												  `street_address`,
												  `city`,
												  `state`,
												  `zip`,
												  `country`) 
						  VALUES ('$email',
								  '$password',
						           $number_of_users[0] + 1,
								  '$street_address',
								  '$city',
								  '$state',
								  '$zip',
								  '$country')");
	}
?>
<html>
	<head>
		<title>Login Page</title>
		<link href = "newUser.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<div id = "container">
			<div id = "title">
				<h2>Account Information<h2>
			</div>
			<div id = "newUserForm">
				<form name = "final_project_newUser" action = "newUser.php" onsubmit = "return validateForm()" method = "POST">
					<br>E-mail: <input id = "inputEmail" type = "email" name = "email">
					<br>Password: <input id = "inputPassword" type = "password" name = "password">
					<br> Confirm Password: <input id = "confirmPassword" type = "password" name = "confirm_password">
					<br> Street Address: <input id = "streetAddress" type = "text" name = "street_address">
					<br> City: <input id = "city" type = "text" name = "city">
					<br> State: <input id = "state" type = "text" name = "state">
					<br> Zip: <input id = "zip" type = "text" name = "zip">
					<br> Country: <input id = "country" type = "text" name = "country">
					<br><input type = "submit" value = "Submit">
				</form>
				
				<script src = "new_user_script.js"></script>
			</div>
		</div>
	</body>
</head>