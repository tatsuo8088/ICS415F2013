<?php
	require 'connect.php';
	$username = $_COOKIE['username'];
	echo "Welcome " . $username . "<br>";
	
	if(isset($_POST["commentIn"])){
		$comment = $_POST["commentIn"];
		if(!empty($comment)){
			$mysqli -> query("INSERT INTO `commentdb`(`user_comment`, `user_id`) 
							  VALUES ('$comment', (SELECT user_id 
							                       FROM userdb 
							                       WHERE username = '$username'))");
		}
	}
	
	
	$result = $mysqli -> query("SELECT commentdb.user_comment
								FROM commentdb, userdb
								WHERE userdb.user_id = commentdb.user_id
								AND username =  '$username'");
	while($row = mysqli_fetch_array($result)){
		echo $row['user_comment'];
		echo "<br>";
	}
	
	$number_of_comments = mysqli_fetch_array($mysqli -> query("SELECT COUNT(commentdb.user_comment)
															   FROM commentdb, userdb
															   WHERE userdb.user_id = commentdb.user_id
															   AND username =  '$username'"));
	echo "<br>Comment Count: " . $number_of_comments[0];
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Test PHP</title>
		<link href = "style.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<form action = "phpsqlcomment.php" method = "POST">
			<input id = "input" type = "text" name = "commentIn">
			<br><input type = "submit" value = "Submit">
		</form>
		<form action = "phpsqllogin.php">
			<input type = "submit" value = "Logout">
		</form>
	</body>
</html>