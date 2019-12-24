<?php
session_start();
require('db.php');
$val="";
if(isset($_POST['Update']))
{
	$name= $_POST['name'];
	$email= $_POST['email'];
	$id= $_SESSION['id'];
	if(empty($name) || empty($email))
	{
		$val= "Null Submission";
		
		
	}
	else
	{ 
		$con= getConnection();
		$sql= "update users set name = '{$name}', email= '{$email}' where id='{$id}' ";
		if($result1= mysqli_query($con,$sql))
		{ $val= "updated";
	
	$_SESSION['name']= $name;
		$_SESSION['email']= $email;
	
	}
 
		else{$val= "not Updated";}
	
	}
	
}
?>


<html>
<body>
<form method="POST">
<table align='center' border='1' width=40%>
<tr>
<td align='center' colspan='2'>Your Profile </td>
</tr>
<tr>
<td> ID </td>
<td width=50%> <?php echo $_SESSION['id']; ?> </td>
</tr>
<tr>
<td> Name </td>
<td width=50%> <input type="text" name="name" value= "<?php echo $_SESSION['name'];?>"> </td>
</tr>
<tr>
<td> Email</td>
<td width=50%> <input type="text" name="email" value= "<?php echo $_SESSION['email'];?>"> </td>
</tr>
<tr>
<td> Gender </td>
<td width=50% > <?php echo $_SESSION['gender']; ?>  </td>
</tr>

<tr>
<td> User Type </td>
<td width=50%> <?php echo $_SESSION['type']; ?> </td>
</tr>
<tr>
<td> <input type= "submit" name= "Update" value= "Update"></td>
<td width=50%> <a href="ChangePass.php"> Change Password </a> 
</td>
</tr>

<tr>

<td  align='right' colspan='2'>  <div> <?php echo $val; ?>  </div>
<a href="TeacherHome.php"> Go Home </a> </td>
</tr>
</table>
</form>
</body>
</html>
<?php

?>