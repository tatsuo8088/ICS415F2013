<?php
	$mysqli = new mysqli("localhost","matt","kanda","final_project");
	if($mysqli -> connect_errno){
		echo "Failed to connect to commentdb_login";
	}
?>