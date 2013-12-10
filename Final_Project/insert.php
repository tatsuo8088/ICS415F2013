<?php
$userid = $_COOKIE['userid'];

$mysqli = new mysqli("localhost","matt","kanda","final_project");
$URL="http://localhost/Final%20Project/caffeineUser.php";
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);}
$fname = $_POST['name'];
$fsize = $_POST['size'];
$famount = $_POST['amount'];
$fdateMonth = $_POST['dateMonth'];
$fdateDay = $_POST['dateDay'];

$mysqli -> query("INSERT INTO `tracker`(`id`, `name`, `size`, `amount`, `dateMonth`, `dateDay`) 
			   VALUES ('$userid', '$fname', '$fsize', '$famount', '$fdateMonth', '$fdateDay')");
			   
header ("Location: $URL"); 

mysqli_close($mysqli);
?>