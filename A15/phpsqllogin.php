<?php
	//$username =  $_POST["username"];
	
	require 'connect.php';
	
	if($mysqli -> query("SELECT * FROM commentdb LIMIT 1") == false){
		$mysqli -> query("CREATE TABLE commentdb (user_comment CHAR(200), user_id INT)");

	}
	
	if($mysqli -> query("SELECT * FROM userdb LIMIT 1") == false){
		$mysqli -> query("CREATE TABLE userdb (username CHAR(10), user_id INT UNIQUE)");
	}
	
	if(isset($_POST["username"])){
		$username = $_POST["username"];
		if($query_run = $mysqli -> query("SELECT COUNT(username)  
										  FROM userdb 
										  WHERE username = '$username'")){
			$query_num_rows = mysqli_fetch_array($query_run);
			if($query_num_rows[0] > 0){
				setcookie('username', $username, time() + 3600);
				header("Location: phpsqlcomment.php");
			}
			else{
				echo "user " . $username . " doesn't exist and was added to database";
				echo "<br>please re-login";
				
				$number_of_users = mysqli_fetch_array($mysqli -> query("SELECT COUNT(username) FROM userdb"));
				
				$mysqli -> query("INSERT INTO `userdb`(`username`, `user_id`) VALUES ('$username', $number_of_users[0] + 1)");
			}
		}
		
	}
		
	


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login to comments</title>
	</head>
	<body>
		<form action = "phpsqllogin.php" method = "POST">
		username: <input type = "text" name = "username">
		<input type = "submit" value = "submit">
		</form>
	</body>
</html>