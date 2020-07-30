<?php
session_start();
ob_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>CURRENCY EXCHANGE SYSTEM</title>
<link rel="stylesheet" href="css/bootstrap.css" />

<style type="text/css">
body{
	
	background-color: whitesmoke;

}
#img li{

list-style:none;

}
li{list-style:none;}
</style>

<script type="text/javascript" src="js/jqueryhamsol.js"></script>
<script type="text/javascript" src="js/jquery.innerfade.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#navbtn').click(function(){
		$('#navmenus').toggle(1300);
		
	});


});



</script>

</head>
<body>
<br /><br /><br />

<div class="container" style="background-color:#000;border:2px solid #000;padding:5px 5px 5px 5px;height:500px;"><!-- main container-->
	
	
	<div ><!-- header starts here-->
		<nav class="navbar navbar-inverse" style="padding:5px 5px 5px 5px;background-color:forestgreen;" >
		
			<h2 align="center" style="color:#fff;font-family:calibre;font-size:38px">CURRENCY EXCHANGE SYSTEM</h2>			
		</nav>
		
	<br /><br /><br /><br />
				<div class="jumbotron" style="width:100%">
			<center>
	
			<p> Launch Application </p>
			<div style="width:10%;padding:1px;"><marquee direction="right"><b style="font-size:20px;">......</b></marquee></div>
			</center>
			
			<center>
			<br />
			<p><a class="btn btn-success btn-lg" href="home.php" role="button">Continue</a></p>
			</center>
		</div>
			

	</div><!-- header ends here-->
		
		
		
</div>



</div><!--end of main container-->



</body>
</html>