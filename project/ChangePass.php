<?php
session_start();
require('db.php');
$oldpass= $newpass= $confirmpass= "";
$val="";
if(isset($_POST['submit'])){
	$oldpass= $newpass= $confirmpass= "";
	$pass= $_SESSION['pass'];
$oldpass= $_POST['password'];
		if($oldpass== $pass)
			
		{$newpass=$_POST['newpassword'];	
		$confirmpass=$_POST['confirmpassword'];

			if($newpass== $confirmpass)
			{
				$id= $_SESSION['id'];
				$con= getConnection();
		$sql= "update login set password = '{$newpass}' where id='{$id}' ";
		if($result1= mysqli_query($con,$sql))
		{ $val= "updated";
	$_SESSION['pass']= $newpass;
				
			
			}	
		else {$val= "password doesnt match";}
		
		}}
		else {$val = "Old Password doesnt match";}
	
}
?>

<html>
<body>
<form method="POST">
<table align='center'  width=40%>
<tr>
<td align='center' colspan='2'> Change Password </td>
</tr>
<tr>
<td> Old Password </td>
<td width=50%> <input type="password" name="password" placeholder="Enter old password.. " required/> </td>
</tr>
<tr>
<td> New Password</td>
<td width=50% > <input type="password" name="newpassword" placeholder="Enter your new password.. " required/> </td>
</tr>
<tr>
<td> Confirm Password</td>
<td> <input type="password" name="confirmpassword" placeholder="Retype New password.. " required/> </td>
</tr>
<tr>
<td> <input type="submit" name="submit" value="Change"></td>
<td>  <a href= "AdminProfile.php"> Back  </a>
<div> <?php echo $val;?> </div> </td>
</tr>
</table>
</form>
</body>
</html>
