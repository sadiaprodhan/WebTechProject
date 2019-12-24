<?php
session_start();
require('db.php');
$val="";
$con= getConnection();
$email= $_SESSION['email'];
if(isset($_POST['send']))
{
	$receiver= $_POST['To'];
	$body= $_POST['body'];
	if(empty($body))
	{$val= "cannot send empty mail";}
else
{ $sql1= "select count(*) from mail";
	$result1= mysqli_query($con,$sql1);
	$count= mysqli_fetch_assoc($result1);
	$id= $count['count(*)'];
	$id++;
	while(1)
	{$sql2= "select * from mail where mailid='M-{$id}'";
		$result1= mysqli_query($con, $sql2);
		$data= mysqli_fetch_assoc($result1);
		if(count($data)>0)
		{ $id++;
			continue;}
	else
	{break;}
	}
	
	$sql= "insert into mail values ('M-{$id}','{$email}', '{$receiver}','{$body}')";
	if($result= mysqli_query($con,$sql))
	{$val= "Mail sent";}
else{$val= "mail not sent";}
	
	
}
}

if(isset($_POST['deletemail']))
{
	$id= $_POST['deletemail'];
	
	$sqlv= "delete from mail where mailid='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ }
	
}

?>

<html>

<head> <title> Mail </title>  </head>
<script>

function deletemail(id)
{ 
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Mail.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('deletemail='+id);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload();
						alert("deleted");
						
						}};

	
}

</script
<body>
<form method="POST">
<table   border="1" width="100%"> 
<tr> <td >  <p align ="center">COMPOSE MAIL </p>
<tr> 
<td> 
To <select name="To">
<?php
$sql= "select * from users";
$result= mysqli_query($con, $sql);
while($data= mysqli_fetch_assoc($result))
{

?>
 <option value="<?php echo $data['email']?>">  <?php echo $data['email']?>  </option>
 <?php
}
?>
</select>
</td>
</tr>
<tr>
<td width="100%" height= "60%"> <textarea name= "body" style= "width:100%; height:60%" placeholder="type Mail here..." > </textarea> 
<input type="submit" name="send" value="send" > <?php echo $val ?></td>
</tr>
</table>
<table width="100%">
<tr>
<td>
<table width="100%" border>
<tr>
<td colspan="3"> Inbox </td>
</tr>
<tr> <td> From </td>
	<td> Message Body </td>
	<td> Action </td>
	</tr>
	<?php
	$sqlto= "select * from mail where receiver='{$email}' ";
	$resultto= mysqli_query($con,$sqlto);
while($row= mysqli_fetch_assoc($resultto))
{
	
?>
<tr>
			<td> <?php echo $row['sender']; ?> </td>
			<td > <?php echo $row['body']; ?> </td>
			<td> <input type= "button" name= "delete" value="delete" onclick=" deletemail('<?php echo $row['mailid']; ?>')"> </td>
			
			</tr>
			
			<?php 
}?>
</table>
</td>

<td>
<table width="100%" border> 
<tr>
<td colspan="3"> Sent Mail </td>
</tr>
<tr> <td> From </td>
	<td> Message Body </td>
	<td> Action </td>
	</tr>
	<?php
	$sqlfrom= "select * from mail where sender='{$email}' ";
	$resultfrom= mysqli_query($con,$sqlfrom);
while($row1= mysqli_fetch_assoc($resultfrom))
{
	
?>
<tr>
			<td> <?php echo $row1['receiver']; ?> </td>
			<td > <?php echo $row1['body']; ?> </td>
			<td> <input type= "button" name="delete" value="delete" onclick=" deletemail('<?php echo $row1['mailid']; ?>')"> </td>
			
			</tr>
			
			<?php 
}?>
</table>

</td> 
<tr>
<td> </td>
<td>  <a href="AdminHome.php" > Go Home  </a> </td>
</tr>
</table>
			
		
	


	
	
