<?php
	$mysqli = new mysqli("localhost","matt","kanda","comment_login");
	if($mysqli -> connect_errno){
		echo "Failed to connect to commentdb_login";
	}
?>