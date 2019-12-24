<?php

session_start();
require('db.php');
$con= getConnection();
	
$val="";
if(isset($_POST['ADD']))
{  

$type= $_SESSION['type'];
$name= $_SESSION['name'];
	$notice= $_POST['notice'];
	if(empty($notice))
	{$val= "Null Submission";}
else{
	$sql= "select count(*) from notice";
	$result= mysqli_query($con,$sql);
	$count= mysqli_fetch_assoc($result);
	$count['count(*)']++ ;
	
	$sql1="insert into notice values ('Notice{$count['count(*)']}','{$type}', '{$name}','{$notice}',1)";
	if(mysqli_query($con,$sql1))
	{ $val= "notice Added";}
else{$val= "Cannot Add Notice";}	
}

	
}
if(isset($_POST['verify']))
{
	$id= $_POST['verify'];
	
	$sqlv= "update notice set status=1 where notice_id='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ header('location: Notices.php');
echo "verified";
}
else
{echo "verification unccessful";}	
	
}
if(isset($_POST['delete']))
{
	$id= $_POST['delete'];
	
	$sqlv= "delete from notice where notice_id='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ header('location: Notices.php');
echo "Delted";}
else
{echo "Deletion unccessful";}	
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notices </title>
</head>

<script>

function verifynotice(id)
{ 
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Notices.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('verify='+id);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload();
						alert("verified");
						
						}};

	
}
function deletenotice(id)
{ 
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Notices.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('delete='+id);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload();
						alert("deleted");
					 		}};

	
}

</script>
<body>
<form method="POST">
<fieldset align="center" style="width:30"  >
			<legend> <h1>Add Notice </h1></legend>
			<table >
			<tr>
			<textarea name= "notice" style= "width:30" placeholder="type notice here..." > </textarea>	<input type= "submit" name= "ADD" value="ADD">	</table>
			</fieldset>
			
			<table width="100%">
<tr>
<td>			
			<table  border width= "100%"> 
			<tr> <td colspan="3"> View Notices </td>
			
			</tr>
			<tr>
			<td> Posted By </td>
			<td> Notice Text </td>
			<td> Poster Type</td>
			
			
			</tr>
			
			<?php
			$sqlview= "select * from notice where poster_type='Admin' and status=1";
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
			
			</td> 
			<td>
			
			 <table border width= "100%" height="100%" > 
			<tr> <td colspan="4"> Verify Notices </td>
			</tr>
			<tr>
			<td> Posted By </td>
			<td> Notice Text </td>
			<td> Poster Type</td>
			<td> Action </td>
			</tr>
			<?php
			$sqlverify="select * from notice where poster_type='Admin' and status=0";

$resultverify= mysqli_query($con,$sqlverify);
while($row= mysqli_fetch_assoc($resultverify))
{
		?>	<tr>
			<td> <?php echo $row['poster_name']; ?> </td>
			<td > <?php echo $row['notice_text']; ?> </td>
			<td> <?php echo $row['poster_type']; ?></td>
			 
			<td> <input type= "button" name="delete" value="delete" onclick=" deletenotice('<?php echo $row['notice_id'];?>')">  <input type= "button" name="verify" value="Verify" onclick="verifynotice('<?php echo $row['notice_id'];?>')"> </td>
			</tr>
<?php }?>
			</table>
			</td>
			</tr>
			</table>
		<table>	
		<tr>
		<td colspan="2" align = "right"> <a href="TeacherHome.php" > Go Home  </a <div id = "d"> <?php echo $val; ?> </div></td>
		</tr>
		 </table>
		 
</form>	
	
		</body>
			</html>