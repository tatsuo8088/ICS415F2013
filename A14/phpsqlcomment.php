<?php
	$mysqli = new mysqli("localhost", "matt", "kanda", "commentDB");
	if($mysqli -> connect_errno){
		echo "Failed to connect to mySQL";
	}
	
	$checkTableExist = $mysqli -> query("SELECT * FROM comment LIMIT 1");
	
	if($checkTableExist == false){
		$addTable = $mysqli -> query("CREATE TABLE comment(id CHAR(200))");
	}
	
	if(isset($_GET["commentIn"])){
		$comment = $_GET["commentIn"];
		if(!empty($comment)){
				$insert = $mysqli -> query("INSERT INTO `commentdb`.`comment` (`id`) VALUES ('$_GET[commentIn]')");
		}
		else{
			echo '<script type="text/javascript"> alert("Comment box is empty") </script>';
		}
	}
	

	
	$result = $mysqli -> query("SELECT id FROM comment");
	while($row = mysqli_fetch_array($result)){
		echo $row['id'];
		echo "<br>";
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Test PHP</title>
		<link href = "style.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<form action = "phpsqlcomment.php" method = "GET">
			<input id = "input" type = "text" name = "commentIn">
			<br><input type = "submit" value = "submit">
		</form>
	</body>
</html>