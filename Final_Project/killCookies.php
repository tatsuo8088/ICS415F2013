<?php
	if(isset($_COOKIE['useridCookie'])){
		setcookie('useridCookie','',time-3600);
		header("Location: final_project_login.php");
	}
?>