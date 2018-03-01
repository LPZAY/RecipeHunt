<?php
	mysql_connect("localhost","root","") or die("Error connecting to database: ".mysql_error());
	mysql_select_db("") or die(mysql_error());
	?>
	<html>
	<head>
		<title>Search results</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">
		@import url(home.css)
		</style>
	</head>
	<body>
<?php
		$query= $_POST['search'];
		$min_length =3;
		
		if(strlen($query) >= $min_length){
		$query = htmlspeialchars($query);
		$query = mysql_real_escape_string($query);
		$raw_results = mysql_query("SELECT * FROM recipe WHERE (`name` LIKE '%".$query."%') or (`ingredients` LIKE '%".$query."%')") or die (mysql_error());
			if(mysql_num_rows($raw_results)>0){
				while($resuts = mysql_fetch_array($raw_results)){
					echo "<p><h3>".$results['name']."</h3>".$results['ingredients']."</p>";
					}
				
			}
			else{
				echo "No recipes found";
				}
			}
			else{
				echo "Search does not match anything in database"
			}
			?>
			</body>
			</html>