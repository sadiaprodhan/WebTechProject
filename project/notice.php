<?php

session_start();
require('db.php');
$con= getConnection();
$sql= "select * from notice";
	$result= mysqli_query($con,$sql);
	$count= mysqli_fetch_assoc($result);

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Notices</title>
</head>
<body>
<h2 align="center" style="border:2px solid DarkMagenta;"> Notice Board</h2><br>
<fieldset align="center" style="width:50 border:2px solid DarkMagenta;" >
		<legend ><h1> View Notice </h1></legend>
<table border width="90%" align="center"> 
			<tr> <td colspan="3" align="center" style="border:2px solid DarkMagenta;"> ALL Notices </td>
			
			</tr>
			<tr>
			<td> Posted By </td>
			<td> Notice Text </td>
			<td> Poster Type</td>
			
			
			</tr>
			
			<?php
			$sqlview= "select * from notice where status=1";
			$result= mysqli_query($con,$sqlview);
			while($data= mysqli_fetch_assoc($result))
			{
			?>
			<tr height="100%">
			<td> <?php echo $data['poster_name'];?> </td>
			<td> <?php echo $data['notice_text'];?>  </td>
			<td> <?php echo $data['poster_type'];?>  </td> 
			</tr>
			
			<?php
			}?>
			</table>
			

<a href = "StudentHome.php" style="color:DarkMagenta;" ><b> back to Home</b></a></fieldset>
</body>
</html>>