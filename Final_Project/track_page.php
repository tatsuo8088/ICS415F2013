<!doctype html>  
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  
  <title>Caffine Tracker</title>

  <link rel="shortcut icon" href="/favicon.ico">
 	<link rel="stylesheet" href="style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js"></script>

</head>

<body class="cf">

  <header class="span12">
  	<div class="inner cf">
  		<h1 id = "title" class="alt span8">Caffeine Tracker</h1>
  	<nav class="span4 col">
			<ul class="cf">
				<li><a class="alt" href="track_page.php">Home</a></li>
				<li><a class="alt" href="how.html">How to</a></li>
				<li><a class="alt" href="about.html">About</a></li>
				<li><a class="alt" href="killCookies.php">Log Out</a></li>
			</ul>
		</nav>
	</div>
  </header>

  <div id="container" class="cf">  
	<?php
			$con = mysql_connect("localhost","matt","kanda") or die(mysql_error());
			mysql_select_db("final_project",$con);
			$userid = $_COOKIE['useridCookie'];
	?>
  	<article class="span8">
				<section>
				<?php
					$sql = "SELECT * FROM tracker WHERE id = $userid";
					$result = mysql_query($sql,$con);
				?>
				<table border="1">
				<tr id = "colName">
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
					<tr id = "dataFormat">
					<td><?php echo $name; ?></td>
					<td><?php echo $size; ?></td>
					<td><?php echo $amount . "mg"; ?></td>
					<td><?php echo $date; ?></td></tr><?php
				}	
				?>
				</table>
					
			</article>

			<aside class="span4 col">
				<form action="insert.php" method="post">
				Name: <input id = "fname" type ="text" name="name"><br>
				Size: <input id = "fsize" type ="text" name="size"><br>
				Amount(in mg): <input id = "famount" type ="text" name="amount"><br>
				Month: <input id = "fmonth" type ="text" name="dateMonth"><br>
				Day: <input id = "fday" type ="text" name="dateDay"><br>
				<input type="submit">
				</form>

				<table border="1">
					<caption>Caffeine Consumed by Month<caption>
					<tr>
						<td>Month</td><td>Amount</td>
					</tr>
					<?php
						//$con = mysql_connect("localhost","matt","kanda") or die(mysql_error());
						//mysql_select_db("final_project",$con);
						$num = 1;
						$total = 0;
						while($num!=13)
						{
						$result = mysql_query("SELECT sum(amount) as total FROM tracker where dateMonth = $num AND id = $userid",$con);
						$row = mysql_fetch_assoc($result);
						if($row['total'] == 0){
							$amount = 0;
						}
						else{
							$amount = $row['total'];
						}
						$monthNum = $num;
						$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));?>
						<tr><td><?php echo $monthName; ?></td><td><?php echo $amount; ?></td></tr>
						<?php
						$total = $total + $amount;
						$num++;
						}
						
						
					?>
				</table>
				<?php echo "Total Caffeine ingested this year: " .$total ." mg.";?>
			</aside>

  </div> <!--! end of #container -->

  <footer>
    
  </footer>

</body>
</html>

