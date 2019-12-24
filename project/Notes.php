<?php
session_start();
require('db.php');
	$con= getConnection();
		
$val="";
if(isset($_POST['verify']))
{
	$id= $_POST['verify'];
	
	$sqlv= "update notes set status=1 where notes_ID='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ $val = "Verified";}
else
{$val="verification unccessful";}	
	
}
if(isset($_POST['delete']))
{
	$id= $_POST['delete'];
	
	$sqlv= "delete from notes where notes_ID='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ $val = "Deleted";}
else
{$val="Deletion unccessful";}	
	
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Notes  </title>
</head>

<script>

function verifynotes(id)
{ 
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Notes.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('verify='+id);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload();
					
						alert("verified");
						
						}};

	
}
function deletenotes(id)
{ 
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "Notes.php", true);
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
<fieldset align="center" style="width:50" >
			<legend><h1> Notes </h1></legend>
		<table width="100%">
<tr>
<td>			
			<table  border width= "100%"> 
			<tr> <td colspan="3"> View Notes </td>
			
			</tr>
			<tr>
			<td> Notes Information</td>
			<td> Posted By </td>
			<td> Download</td>
			
			
			</tr>
				<?php
				$con= getConnection();
			$sqlview= "select * from notes where status=1";
			$result= mysqli_query($con,$sqlview);
			while($data= mysqli_fetch_assoc($result))
			{
			?>
			<tr height="100%">
			<td> <?php echo $data['Subject'];?> </td>
			<td> <?php echo $data['poster_name'];?>  </td>
			<td>  <a href = "<?php echo $data['notes_path'];?>" download> download </a> </td> 
			</tr>
			
			<?php
			}?>
		</table>
			</td>
			<td>
			<table border width= "100%" height="100%" > 
			<tr> <td colspan="4"> Verify Notes </td>
			</tr>
			<tr>
			<td> Notice Information </td>
			<td> Posted By </td>
			<td> Download</td>
			<td> Action </td>
			</tr>
			<?php
			
			$sqlverify="select * from notes where status=0";

$resultverify= mysqli_query($con,$sqlverify);
while($row= mysqli_fetch_assoc($resultverify))
{
		?>	<tr>
			<td> <?php echo $row['Subject'];?> </td>
			<td> <?php echo $row['poster_name'];?>  </td>
			<td>  <a href = "<?php echo $row['notes_path'];?>" download> download </a> </td> 
			
	<td>					 <input type= "button" name="delete" value="delete" onclick=" deletenotes('<?php echo $row['notes_ID']; ?>')"> <input type= "button" name="verify" value="Verify" onclick="verifynotes('<?php echo $row['notes_ID']; ?>')"> </td>
			</tr>
<?php }?>
			</table>
			</td>
			</tr>
			<tr>
			<td colspan="2">
			<a href="AdminHome.php" > Go Home  </a> </td>
			
			</table>
			
			
			
		
		</fieldset>
		</form>
		</body>
		</html>
	