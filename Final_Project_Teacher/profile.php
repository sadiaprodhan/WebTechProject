<?php
session_start();
require('db');
if(isset($_POST['msg']))
{
	$id= $_SESSION['id'];
	$name= $_SESSION['name'];
	$email= $_SESSION['email'];
	$type= $_SESSION['type'];
	$gender= $_SESSION['gender'];

	$json = "{'id' : '{$id}', 'name':'{$name}', 'email':'{$email}' , 'type':'{$type}' , 'gender':'{$gender}'}";
	echo json_encode($json);
}
?>