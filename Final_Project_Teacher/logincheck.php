<?php
session_start();
require_once('db.php');
if(isset($_POST['uid']))
{
$id = $_POST['uid']; 
$pass = $_POST['pass'];
if(empty($id) || empty($pass))
{ echo "null"; }
else
{
	$con = getConnection();
	$sql= "select * from login where id='{$id}' and password='{$pass}'";
	$result= mysqli_query($con,$sql);
	$data= mysqli_fetch_array($result);
	if(count($data)>0)
	{ echo $data['type'];

$_SESSION['id']= $id;
$_SESSION['pass']= $pass;
$_SESSION['type']= $data['type'];
}
else
{echo false;}
	
	
}


}
?>