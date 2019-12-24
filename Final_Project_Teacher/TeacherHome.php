<?php
session_start();
require('db.php');
$id= $_SESSION['id'];
$con= getConnection();
$sql= "select * from users where id= '{$id}'";
$result= mysqli_query($con,$sql);
$data= mysqli_fetch_assoc($result);
$_SESSION['name']= $data['name'];
$_SESSION['email']= $data['email'];
$_SESSION['gender']= $data['gender'];




?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>

<body>
<table cellspacing="50" align="center" >
	<h1 align="center" style="background-color:GreenYellow;" >Education Portal </h1><br><br><br>
	<h1 align="center" " >Welcome, <?=$_SESSION['name']?> </h1><br><br><br>
    <tr>
    	<td><img src="3.png"></td>
    	<td><img src="1.png"></td>
    	<td><img src="2.png"></td>
    	<td><img src="4.png"></td>
    	<td><img src="6.png"></td>
    	<td><img src="5.png"></td>
    
    
    </tr>
    
	<tr align="center">
			
	<td ><a href="TeacherProfile.php" style="color:MediumSeaGreen;" align="center"><b>Profile </b></a></td>
	<td ><a href="OnlineClasses.php" style="color:Tomato;" align="center"><b>Upload Online Classes</b></a></td>
	<td ><a href="ViewStudents.php" style="color:MediumSeaGreen;" align="center"><b>View Students</b> </a></td>
	<td><a href="Notices.php" style="color:Tomato;" align="center"><b>Upload Notices</b></a></td>
	
	<td ><a href="Notes.php" style="color:MediumSeaGreen;" align="center"><b>Upload Notes</b> </a></td>
	<td><a href="logout.php" style="color:Tomato;" align="center"><b>Logout</b></a></td>
				
	</tr>
</table><br><br><br><br><br><br>
<h3 align="center" style="border:2px solid GreenYellow;"> Knowledge is Power</h3>
</body>
</html>


