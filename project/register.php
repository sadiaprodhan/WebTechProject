<?php

  session_start();
  require('db.php');
if(isset($_POST['auto']))
{ $con= getConnection();
	
	$sql= "select count(*) from users";
	$result= mysqli_query($con,$sql);
	$count= mysqli_fetch_assoc($result);
	$id= $count['count(*)'];
	$id++;
	while(1)
	{$sql1= "select * from users where id='U-{$id}'";
		$result1= mysqli_query($con, $sql1);
		$data= mysqli_fetch_assoc($result1);
		if(count($data)>0)
		{ $id++;
			continue;}
	else
	{break;}


}
	echo $id;
	
}
if(isset($_POST['uid']))
{$id= $_POST['uid'];
$pass= $_POST['pass'];
$name= $_POST['name'];
$email= $_POST['email'];
$type= $_POST['type'];
$gender= $_POST['gender'];
if( empty($id)||empty($pass)||empty($name)||empty($email)||empty($type)||empty($gender))
{echo "Any field cannot be empty";}
else
{
$con= getConnection();
$sql= "insert into users values ('{$id}', '{$name}','{$email}','{$gender}')";
$sql1 = "insert into login values ('{$id}', '{$pass}','{$type}')";
 
 if($result1= mysqli_query($con,$sql1))
 {
 if($result= mysqli_query($con,$sql))
 {
	$_SESSION['id']=$id;
	$_SESSION['pass']=$pass;
	$_SESSION['type']= $type;
	
	echo $type;
 }}
else
{echo "Registration not done ";} 
}
}
?>
