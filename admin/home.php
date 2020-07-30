<?php
session_start();
ob_start();
if (!isset($_SESSION['admin'])) {
		echo "<script>alert('Login as an admin'); window.location = 'index.php'</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Currency Exchange System</title>
<meta charset="UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1" >
<link rel="stylesheet" href="../css/bootstrap.css" />
<link rel="stylesheet" href="../font4.7/css/font-awesome.css" />
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>

<style type="text/css">
body{
	background-color: ghostwhite;
	font-family: verdana;
}
#top{
	background-color: darkgreen;
	border-bottom:4px solid #00134d;
}

</style>


	
</head>
<body>
<nav class="navbar navbar-success navbar-static-top" id="top">
<h3 class="navbar-text" style="color: #fff; float: left;"><span class='fa fa-money'></span> CURRENCY EXCHANGE SYSTEM</h3>
<a href="logout.php" style="float:right; margin:1%;">
<button class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Logout</button></a>
<div style="clear:both;"></div>
</nav>

<div class="container">
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-1"></div>
		<div class="col-md-4 well" align="center">
			<a href="addexchangerate.php">
				<button class="btn btn-success btn-lg" style="padding: 3em;"><i class="fa fa-plus" style="font-size: 30px;"></i> <br/> ADD EXCHANGE RATE</button>
			</a>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-1"></div>
		<div class="col-md-4 well" align="center">
			<a href="viewexchangerate.php">
				<button class="btn btn-success btn-lg" style="padding: 3em;"> <i class="fa fa-eye" style="font-size: 30px;"></i> <br/>VIEW EXCHANGE RATE</button>
			</a>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	<div class="col-md-12" style="margin-top: 3%;">
		<div class="col-md-1"></div>
		<div class="col-md-4 well" align="center">
			<a href="editexchangerate.php">
				<button class="btn btn-success btn-lg" style="padding: 3em;"><i class="fa fa-edit" style="font-size: 30px;"></i> <br/> EDIT EXCHANGE RATE</button>
			</a>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-1"></div>
		<div class="col-md-4 well" align="center">
			<a href="delexchangerate.php">
				<button class="btn btn-success btn-lg" style="padding: 3em;"> <i class="fa fa-times-circle" style="font-size: 30px;"></i> <br/>DELETE EXCHANGE RATE</button>
			</a>
		</div>
		
	</div>
		
		
	</div>
</div>
</body>
</html>