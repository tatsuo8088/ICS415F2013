<?php
	require 'connect.php';
	
	$exists = true;
	
	
	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		if($query_run = $mysqli -> query("SELECT COUNT(username)  
										  FROM user_info 
										  WHERE username = '$email'")){
			$query_num_rows = mysqli_fetch_array($query_run);
			if($query_num_rows[0] > 0){
				echo "It exists";
			}
			else{
			$exists = false;	
				/*
				$number_of_users = mysqli_fetch_array($mysqli -> query("SELECT COUNT(username) FROM userdb"));
				
				$mysqli -> query("INSERT INTO `userdb`(`username`, `user_id`) VALUES ('$username', $number_of_users[0] + 1)");
				*/
			}
		}
	}
?>

<html>
	<head>
		<title>Login Page</title>
		<link href = "loginStyle.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<div id = "container">
			<div id = "title">
				<h1>Caffine Facts<h1>
			</div>
			<div id = "loginbox">
				<form name = "final_project" action = "final_project_login.php" onsubmit = "return validateForm()" method = "POST">
					<br>E-mail: <input id = "inputEmail" type = "email" name = "email">
					<br>Password: <input id = "inputPassword" type = "password" name = "password">
					<br><input type = "submit" value = "Submit"><a href = "newUser.php">New User?</a>
				</form>
				
				<script src = "script.js"></script>
			</div>
		</div>
		<?php
			if($exists == false){
				echo '<script type="text/javascript"> alert("Sorry! Your username does not exist") </script>';
			}
		?>
	</body>
</head>
