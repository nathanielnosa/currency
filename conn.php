<?php

$curr = mysqli_connect('localhost','root','');

if ($curr == true) {
	mysqli_select_db($curr, 'currency');
}
else
{
	die(mysqli_error());
}

?>