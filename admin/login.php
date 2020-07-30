<?php
session_start();
ob_start();
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

</nav>

<div class="container">
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-4"></div>
		<div class="col-md-4 well" align="center" style="margin-top: 5%; ">
			<h3 align="center" style="margin-top: 0px;">Admin Login Form</h3>
			<form method="POST" action="#">
				<div class="form-group">
					<input type="text" name="uname" class="form-control" required="true" style="" placeholder="Username: " />
				</div>
				<div class="form-group">
					<input type="password" name="psw" class="form-control" required="true" placeholder="Password: " />
				</div>
				<button class="btn btn-success" name="sub" style="width:100%;">Login</button>
			</form>
			<?php
			include '../conn.php';
			if (isset($_REQUEST['sub'])) {
				$querylogin = mysqli_query($curr, "SELECT * FROM admin WHERE uname='".$_POST['uname']."' && psw='".$_POST['psw']."'");

				if ($querylogin->num_rows < 1) {
					echo "<div class='alert-danger' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>Invalid login!</b></div>";
				}
				else
				{
					$_SESSION['admin'] = $_POST['uname'];
					echo "<div class='alert-success' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>Login correct!</b></div>";
					header("refresh:1; url = home.php");
				}
			}
			?>
		</div>
		<div class="col-md-4"></div>
	</div>
	
		
		
	</div>
</div>
</body>
</html>