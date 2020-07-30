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
		
		<div class="col-md-6 well">
			<h3 align="center" style="margin-top: 0px;">EDIT CURRENCY EXCHANGE RATE</h3><hr/>
			
			<?php
			include '../conn.php';
			
				$querycheck = mysqli_query($curr, "SELECT * FROM exchangerate");
				if ($querycheck->num_rows > 0) {
					$sn = 0;
					echo "<table class='table alert-success table-bordered table-hover'>";
					echo "<tr><th>S/N</th><th>Currency Name</th><th>Currency Abbr.</th><th>Value to Naira (&#8358;)</th><th>#</th></tr>";
					while ($loop = $querycheck->fetch_array()) {
						$currname = $loop['currname'];
						$currabbr = $loop['currabbr'];
						$currval = $loop['currvalue'];
						$sn += 1;
						$id = $loop['id'];
						echo "<tr><td>$sn</td><td>$currname</td><td>$currabbr</td><td>$currval</td><td>
						<a href='?edit&currname=$currname&currabbr=$currabbr&currval=$currval&id=$id'>
						<button class='btn btn-success'><i class='fa fa-pencil'></i> Edit </button>
						</a>
							</td></tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "<div class='alert-danger' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>No Exchange Rate Information Found!</b></div>";
				}
			

			?>
		</div>
		<div class="col-md-6">
			<?php
			if (isset($_GET['edit'])) {
			?>
			<form method="POST" action="#">
				<input type="hidden" name="currid" value="<?php echo $_GET['id']; ?>">
				<div class="form-group">
					<label>Currency Name: </label>
					<input type="text" name="currname" value="<?php echo $_GET['currname']; ?>" class="form-control" required="true" />
				</div>
				<div class="form-group">
					<label>Currency Abbreviation: </label>
					<input type="text" name="currabbr" value="<?php echo $_GET['currabbr']; ?>" class="form-control" required="true" />
				</div>
				<div class="form-group">
					<label>Currency Value To Naira: </label>
					<input type="text" value="<?php echo $_GET['currval']; ?>" name="currval" class="form-control" required="true" />
				</div>
				<button type="submit" class="btn btn-success" name="sub" style="width:100%"><i class="fa fa-money"></i> Update</button>
			</form>

			<?php	
				if (isset($_REQUEST['sub'])) {
						$querycheck = mysqli_query($curr, "UPDATE exchangerate SET currname='".$_POST['currname']."', currabbr='".$_POST['currabbr']."', currvalue='".$_POST['currval']."' WHERE id='".$_POST['currid']."'");
						
							echo "<div class='alert-success' align='center' style='padding:1em; margin-top:2%; font-size:20px;'><b style=''>Exchange Rate Information Updated Successfully!</b></div>";
						header("refresh:1; url = editexchangerate.php");
							
					}
			}
			else
			{
				echo "<center><i class='fa fa-money' style='font-size:300px; color:forestgreen'></i></center>";
			}

			?>
		</div>
	</div>
</div>
</body>
</html>