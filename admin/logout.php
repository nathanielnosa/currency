<?php
session_start();
ob_start();
session_destroy();
header('refresh:1; url=login.php');
?>
<html>
<head>
	<title>Currency Exchange System:: Signing Out...</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/css.css"/>
	<link rel="stylesheet" href="css/font4.7/css/font-awesome.css"/>
	<link rel="shortcut icon"  href="img/favicon.ico" />
		
	<style type="text/css">
	.loader {
    border: 5px solid #fff; /* Light grey */
    border-top: 5px solid darkgreen;
    border-right: 5px solid darkgreen;
    border-left: 5px solid darkgreen; /* Blue */
    border-radius: 50%;
    width: 90px;
    height: 90px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
</head>
<body style="color:#777777;font-family:verdana;">
<?php
echo "<center><div class=\"loader\" style='margin-top:20%;'></div>Signing Out...</center>";
?>

</body>
</html>