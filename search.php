<html>
<head>
<title>Search results</title>
<style>
@import url(style.css)
</style>
</head>
<body>
<div class="topnav">
	<a class="active" href="index.html">Home</a>
	<a href ="about.html">About</a>
	<a href ="contact.html">Contact</a>
	<div class="search-container">
		<form action="search.php?go" method="post" id="searchform">
			<input type="text" placeholder="Search..." name="search">
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
</div>
<div class="header">
<h1> Search results</h1>
</div>
<div class ="body">
<?php
if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/^[  a-zA-Z]+/", $_REQUEST['search'])){
$name = $_REQUEST['search'];
include 'connect.php';
$query ="SELECT * FROM recipe WHERE name LIKE'%".$name."%' OR ingredients LIKE '%".$name."%'";
$sql = mysqli_query($conn, $query);
if(mysqli_num_rows($sql)>0){
while($results = mysqli_fetch_array($sql)){
$recipe=$results['name']; 
$ID =$results['Id']; 
echo "<ul>\n"; 
echo "<li>" . "<a  href=\"recipe.php?id=$ID\">"   .$recipe . ""."</a></li>\n"; 					
echo "</ul>";
					
					}
			}
}

			else{
				echo "No recipes found";
			}

			}
}
?>
</div>
</body>
</html>