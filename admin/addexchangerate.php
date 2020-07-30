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
<h3 class="navbar-text" style="color: #fff; float: left"><span class='fa fa-money'></span> CURRENCY EXCHANGE SYSTEM</h3>


<a href="home.php" style="float:right; margin:1%;">
<button class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Back</button></a>

<div style="clear:both;"></div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-3">

		</div>
		<div class="col-md-6 well">
			<h3 align="center" style="margin-top: 0px;">ADD CURRENCY EXCHANGE RATE</h3><hr/>
			<form method="POST" action="#">
				<div class="form-group">
					<label>Currency Name: </label>
					<input type="text" name="currname" class="form-control" required="true" />
				</div>
				<div class="form-group">
					<label>Currency Abbreviation: </label>
					<input type="text" name="currabbr" class="form-control" required="true" />
				</div>
				<div class="form-group">
					<label>Currency Value To Naira: </label>
					<input type="text" name="currval" class="form-control" required="true" />
				</div>
				<button type="submit" class="btn btn-success" name="sub" style="width:100%"><i class="fa fa-money"></i> Save</button>
			</form>
			<?php
			include '../conn.php';
			if (isset($_REQUEST['sub'])) {
				$querycheck = mysqli_query($curr, "SELECT * FROM exchangerate WHERE currname='".$_POST['currname']."' || currabbr='".$_POST['currabbr']."'");
				if ($querycheck->num_rows < 1) {
					mysqli_query($curr, "INSERT INTO exchangerate (currname, currabbr, currvalue) VALUES ('".$_POST['currname']."', '".$_POST['currabbr']."', '".$_POST['currval']."')");
					echo "<div class='alert-success' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>Exchange Rate Information Added Successfully!</b></div>";
				}
				else
				{
					echo "<div class='alert-danger' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>Exchange Rate Information Already Exists!</b></div>";
				}
			}

			?>
		</div>
		<div class="col-md-3">

		</div>
	</div>
</div>
</body>
</html>