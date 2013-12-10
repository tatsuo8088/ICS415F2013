<html>
	 <head>
        <title>Caffeine Log</title>
		<link href = "style.css" rel = "stylesheet" type = "text/css">
    </head>
	<body>
		<?php
			$con = mysql_connect("localhost","matt","kanda","final_project") or die(mysql_error());
			mysql_select_db("Caffeine",$con);
			$userid = $_COOKIE['useridCookie'];
		?>
	
		<h1>Caffeine Tracker for College Students</h1>
                <div id = "container">
                        <div id = "navbar">
                                <ul>
                                        <li><a href = "Final_Project.html">Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                        <li><a href = "login.html">Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                        <li><a href = "HowTo.html">How to use this site&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                        <li><a href = "#">About</a></li>
                                </ul>
                        </div>

						<div id = "main-column">
						
							<?php
								$sql = "SELECT * FROM tracker WHERE id = 12";
								$result = mysql_query($sql,$con);
							?>
							<table border="1">
							<tr>
							<th>Name</th>
							<th>Size</th>
							<th>Amount</th>
							<th>Date</th>
							</tr>
							
							<?php
							while($row = mysql_fetch_array($result)){
							
								$name = $row['name'];
								$size = $row['size'];
								$amount = $row['amount'];
								$date = $row['dateMonth'] . "/" . $row['dateDay'];
								?>
								<tr>
								<td><?php echo $name; ?></td>
								<td><?php echo $size; ?></td>
								<td><?php echo $amount . "mg"; ?></td>
								<td><?php echo $date; ?></td></tr><?php
							}	
							?>
							</table>
								
							
							<form action="insert.php" method="post">
							Name: <input type ="text" name="name"><br>
							Size: <input type ="text" name="size"><br>
							Amount(in mg): <input type ="text" name="amount"><br>
							Month: <input type ="text" name="dateMonth"><br>
							Day: <input type ="text" name="dateDay"><br>
							<input type="submit">
							</form>
						
						</div>
						
						<div id = "right-column">
							<h2>Caffeine Intake</h2>
							<?php
								$sql = "SELECT sum(amount) FROM `tracker` WHERE id = 12";
								$total = mysql_query($sql,$con);
								
								Echo "Total caffeine consumed: " . $total;?>
						</div>


	</body>
</html>