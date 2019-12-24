<?php
session_start();
require('db.php');
$con= getConnection();

?>
<html>
<head>
	<title>teacher</title>
</head>
<body>
	<h2 align="center" style="border:2px solid DarkMagenta;"> Online Teachers </h2>
	<fieldset align="center" style="width:50 border:2px solid DarkMagenta;" >
		<legend ><h1> Teacher's Information </h1></legend>
	<table align="center" border width="90%" bgcolor="SeaShell">
		
		
		<tr>
			<td><b> Teacher Name</td>
			<td><b> Designation </td>
			<td><b> Assistance</td>
			<td><b> Email</td>
		 <td><b> Courses</td>
			
			</tr>
<?php
				$con= getConnection();
			$sqlview= "select * from teacher";
			$result= mysqli_query($con,$sqlview);
			while($data= mysqli_fetch_assoc($result))
			{
			?>

		<tr height="100%">
			<td> <?php echo $data['name'];?> </td>
			<td> <?php echo $data['designation'];?>  </td>
			<td> <?php echo $data['assistance'];?>  </td>
			<td> <?php echo $data['email'];?>  </td>
			<td> <?php echo $data['courses'];?>  </td>
			
			</tr>
			
			<?php
			}?>
	
	</table>
	<a href = "StudentHome.php" style="color:DarkMagenta;" ><b> back to Home</b></a>
</fieldset>


</body>
</html>