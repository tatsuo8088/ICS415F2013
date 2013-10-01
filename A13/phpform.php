<?php
	$handle = fopen("commentFile.txt","a");
	if(isset($_GET["commentIn"])){
		$comment = $_GET["commentIn"];
		if(!empty($comment)){
			fwrite($handle, $_GET["commentIn"] . "\n");
			fclose($handle);
		}
		else{
			echo '<script type="text/javascript"> alert("Comment box is empty") </script>';
		}
	}
	
	$readin = file("commentFile.txt");
	foreach($readin as $comments){
		//echo $comments."<br>";
		echo "<div id = commentFormat>".$comments."</div>";
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Test PHP</title>
		<link href = "style.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<form action = "phpform.php" method = "GET">
			<input id = "input" type = "text" name = "commentIn">
			<br><input type = "submit" value = "submit">
		</form>
	</body>
</html>