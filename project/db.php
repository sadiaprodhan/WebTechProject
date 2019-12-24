<?php
function getConnection()
{
	$con= mysqli_connect('localhost','root','','education portal');
	return $con;
}
?>