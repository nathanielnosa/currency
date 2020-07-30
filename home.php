<!DOCTYPE html>
<html lang="en">
<head>
	<title>Currency Exchange System</title>
<meta charset="UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1" >
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="font4.7/css/font-awesome.css" />
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>

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
<script>  
	/*function generate_qrcode(curr){
		$.ajax({
			type: 'post',
			url: 'exchange.php',
			data: {curr:curr},
			success: function(code){
				$('#result').html(code);
			}
		});
		}
		function generate_qrcodee(currr){
		$.ajax({
			type: 'post',
			url: 'exchange.php',
			data: {currr:currr},
			success: function(code){
				$('#resultt').html(code);
			}
		});
		}*/
	</script>
</head>
<body>
<nav class="navbar navbar-success navbar-static-top" id="top">
<h3 class="navbar-text" style="color: #fff;"><span class='fa fa-money'></span> CURRENCY EXCHANGE SYSTEM</h3>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-6 well">
			<form method="POST" action="#">
				
					<label>CHOOSE CURRENCY</label>
				<select class="form-control" name="currname" required="true"  >
					
					<?php
					include 'conn.php';
					$query = mysqli_query($curr, "SELECT * FROM exchangerate");
					if ($query->num_rows < 1) {
						echo '<option class="form-control" value="" selected="selected">-- No currency information uploaded</option>';
					}
					else
					{
						echo '<option class="form-control" value="" selected="selected"> - - Choose Currency - -</option>';
						while ($loop = $query->fetch_array()) {
							$currname = $loop['currname'];
							echo '<option class="form-control" value="'.$currname.'">'.$currname.'</option>';
						}
					}
					?>
				</select>
				<br/>
				<label>CHOOSE CURRENCY AMOUNT TO BE CONVERTED</label>
				<input type="text"  name="amt" class="form-control" required="true" />
				<button class="btn btn-success" name="sub" style="width: 100%; margin-top: 2%;"><i class="fa fa-money"></i> Get Currency Exchange Rate</button>
			</form>
			<!-- <div id="result"></div>
			<div id="resultt"></div> -->
			<?php
			if (isset($_POST['sub'])) {
				$amt = $_POST['amt'];
				$cur = $_POST['currname'];
				echo "<h3 align='center'>Are you sure you want to convert <br/> $amt $cur to Naira</h3>";
				echo "<form method='POST' action='#'>";
				echo "<input type='hidden' name='currname' value='$cur'/>";
				echo "<br/>";
				echo "<input type='hidden' name='amt' value='$amt'/>";
				echo "<center><button class='btn btn-success' name='subyes'><i class='fa fa-check'></i> YES</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='home.php'><button class='btn btn-default'><i class='fa fa-times'></i> NO</button></center></a>";
				echo "</form>";
			}
			?>
		</div>
		<div class="col-md-6">
			<?php 
			if (isset($_POST['subyes'])){
				$querygetval = mysqli_query($curr, "SELECT * FROM exchangerate WHERE currname='".$_POST['currname']."'");
				$loopval = $querygetval->fetch_array();
				 $name = $_POST['currname'];
				 $amt = $_POST['amt'];
				 $abbr = $loopval['currabbr'];
				 $val = $loopval['currvalue'];
				echo "<h4>CURRENCY NAME: ".$name."</h4>";
				echo "<h4>CURRENCY ABBR.: ".$abbr."</h4>";
				echo "<h4>CURRENCY VALUE TO NAIRA: ".$val." Naira to 1 $name</h4>";
				echo "<h4>AMOUNT TO BE CONVERTED TO NAIRA: ".$amt." $name</h4><hr/>";
				 $price = $val * $amt;
            
           
				echo "<h2 style='background-color: darkgreen; padding:1%; color:white; border-radius:10px;' align='center'>$val X $amt = &#8358;";
				 $priceLen = strlen($price);
            if ($priceLen == 4) {
                echo substr($price, 0,1).",". substr($price, 1,3);
            }elseif ($priceLen == 5) {
                echo substr($price, 0,2).",". substr($price, 2,3);
            }elseif ($priceLen == 6) {
                echo substr($price, 0,3).",". substr($price, 3,3);
            }elseif ($priceLen == 7) {
                echo substr($price, 0,1).",". substr($price, 1,3).",". substr($price, 4,3);
            }elseif ($priceLen == 8) {
                echo substr($price, 0,2).",". substr($price, 2,3).",". substr($price, 5,3);
            }elseif ($priceLen == 9) {
                echo substr($price, 0,3).",". substr($price, 3,3).",". substr($price, 6,3);
            }else{
                //echo " ".$price;
            }	
				echo"</h2>";
			}
			 ?>

		</div>
	</div>
</div>
</body>
</html>