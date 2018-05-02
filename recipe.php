<?php
	$id = $_GET["id"];
	include 'connect.php';
	$select = "SELECT * FROM recipe WHERE Id='".$id."'";
	$query = mysqli_query($conn, $select);
	if($result=mysqli_fetch_array($query)){
	
	$name= $result['name'];
	$ing = $result['ingredients'];
	$ad = $result['amazonAd'];
	$dir = $result['directions'];
	$pt = $result['prepTime'];
	$ct= $result['cookTime'];
	$tt= $result['totalTime'];
	$pic = $result['image'];
	}	
	
?>
<html>
<head>
<title><?php echo "$name"; ?></title>
<style type="text/css">
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
<h1><?php echo"$name"?> <?php echo'<image src="'.$pic.'" style="height:150px;width:200px;">';?></h1>
</div>
<div class="body">
<pre>Prep Time:<?php echo "$pt"?>               Cook Time:<?php echo "$ct"?>                   Total Time:<?php echo "$tt"?></pre>

<h5>Ingredients</h5>
	<ol>
		<?php
			$list = explode(".",$ing);
			foreach($list as $value){
				echo"<li>" .$value."</li>";
				}
		?>
	</ol>
	<h5>Directions</h5>
	<ol>
		<?php
			$list = explode(".",$dir);
			foreach($list as $value){
				echo"<li>" .$value."</li>";
				}
		?>
	</ol>
	</div>
	<?php echo"$ad";?>
	<style>
	.product-box {
	top: 200px;
	border: 1px solid #eee;
	float: left;
	margin: 4px 4px 4px 4px;
	position: relative;
	width: 132px;
	padding: 4px;
	font-family: Helvetica;

}
.product-title h3{
	margin: 2px 3px 0 2px;
	min-width: 40px;
	font-size: 12px;
	line-height: 15px;
	color: #000;
	position: relative;
	text-align: center;
	display: block;
	overflow: hidden;
	height: 45px;
	top:50px;
}

.product-price {
	text-align: center;
	color: #900;
	font-weight: bold;
	top:-50px;
}

.a-icon-cart {
	left: 2px;
	top: 2px;
	position: absolute;
	height: 25px;
	width: 25px;
	background-position: -35px -5px;
	background-image: url(../images/amzn-sprite.png);
	background-repeat: no-repeat;
	background-size: 400px 600px;
	-webkit-background-size: 400px 600px;
	display: inline-block;
	vertical-align: top;
}

.a-icon-shop-now {
	left: 2px;
	top: 2px;
	position: absolute;
	height: 25px;
	width: 25px;
	background: 0 0;
	display: inline-block;
	vertical-align: top;
}

.a-button {
	background: #d8dde6;
	display: block;
	padding: 0;
	vertical-align: middle;
	height: 31px;
	*height: 29px;
	border: 1px solid;
	border-color: #bcc1c8 #bababa #adb2bb;
	text-align: center;
	overflow: hidden;
	text-decoration: none!important;
	cursor: pointer;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	width: 100%;
	max-width: 130px;
	box-sizing: border-box;
	margin-top: 11px;
}


.a-button-text {
	position: relative;
	z-index: 10;
	color: #111;
	font-size: 12px;
	text-align: center;
	line-height: 29px;
	display: block;
	font-family: Arial,sans-serif;
	white-space: nowrap;
	background-color: transparent;
	margin: 0;
	border: 0;
	outline: 0;
	padding: 0 2px 0 29px;
}


.a-button-text.centered {
	padding: 0 2px;
}

.a-button-input {
	position: absolute;
	z-index: 20;
	height: 100%;
	width: 100%;
	left: 0;
	top: 0;
	background-color: #fff;
	outline: 0;
	border: 0;
	overflow: visible;
	cursor: pointer;
	opacity: .01;
	filter: alpha(opacity=1);
}


.a-button-primary {
	border-color: #cba957 #bf942a #aa8326;
	background: #f0c14b;
}

.a-button-primary:active {
	border-color: #aa8326 #bf942a #bf942a;
}

.a-button-primary:hover {
	border-color: #c59f43 #aa8326 #957321;
}

.a-button-primary:focus {
	outline: 0;
	border-color: #e47911;
	-webkit-box-shadow: 0 0 3px rgba(228,121,17,.5);
	-moz-box-shadow: 0 0 3px rgba(228,121,17,.5);
	box-shadow: 0 0 3px rgba(228,121,17,.5);
}

.a-button-inner {
	position: relative;
	height: 100%;
	overflow: hidden;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	text-align: center;
	cursor: pointer;
	display: block;
}

.a-button-primary .a-button-inner {
	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,.4) inset;
	-moz-box-shadow: 0 1px 0 rgba(255,255,255,.4) inset;
	box-shadow: 0 1px 0 rgba(255,255,255,.4) inset;
	background-color: #f7dfa5;
	background: -webkit-gradient(linear,left top,left bottom,from(#f7dfa5),to(#f0c14b));
	background: -webkit-linear-gradient(top,#f7dfa5,#f0c14b);
	background: -moz-linear-gradient(top,#f7dfa5,#f0c14b);
	background: -ms-linear-gradient(top,#f7dfa5,#f0c14b);
	background: -o-linear-gradient(top,#f7dfa5,#f0c14b);
	background: #f3d078;
}

.lt-ie9 .a-button-primary .a-button-inner {
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff7dfa5', endColorstr='#fff0c14b', GradientType=0);
}

.a-button-primary:active .a-button-inner {
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.2) inset;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,.2) inset;
	box-shadow: 0 1px 3px rgba(0,0,0,.2) inset;
	background-color: #f0c14b;
	background-image: none;
}

.lt-ie9 .a-button-primary:active .a-button-inner {
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

.a-button-primary:hover .a-button-inner {
	background-color: #f5d78e;
	background: -webkit-gradient(linear,left top,left bottom,from(#f5d78e),to(#eeb933));
	background: -webkit-linear-gradient(top,#f5d78e,#eeb933);
	background: -moz-linear-gradient(top,#f5d78e,#eeb933);
	background: -ms-linear-gradient(top,#f5d78e,#eeb933);
	background: -o-linear-gradient(top,#f5d78e,#eeb933);
	background: #f1c860;
}

.lt-ie9 .a-button-primary:hover .a-button-inner {
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5d78e', endColorstr='#ffeeb933', GradientType=0);
}
</style>
	
</body>
</html>