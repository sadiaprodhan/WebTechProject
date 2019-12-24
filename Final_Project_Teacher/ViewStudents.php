<?php
session_start();
require('db.php');
$val="";
if(isset($_POST['delete']))
{$con= getConnection();
	$id= $_POST['userid'];
	$me = $_SESSION['id'];
	if($id== $me)
	{$val= "You cannot delete yourself";}
else{
	$sql= "delete from users where type='Student' and id='{$id}'";
	$sql1= "delete from login where type='Student' and id='{$id}'";
	if(mysqli_query($con,$sql))
	{if(mysqli_query($con,$sql1))
	{ $val = "Deleted";}}
else
{$val="Deletion unccessful";}	}
	
}

?>
<html>
<script> 
function f1(val){
	
	var input, filter, table, tr, td, i, a ,  txtValue;
  input = val;
  filter = input.toUpperCase();
  table = document.getElementById("usertable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 2; i < tr.length; i++) {
	
	td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    
  }
	}
  
}

</script>
<body>
<form method="POST">

<table  id="usertable" align='center' border='1' width=40%>
<tr>
<td align='center' colspan='6'>View Users  <br>
<input type="text" id= "search" onkeyup="f1(this.value)"> Search by name 

</td>

</tr>
<tr>
<td> ID </td>
<td> Name </td>
<td> Email </td>
<td> Gender </td>
<td> Type </td>
<td> Delete User </td>
</tr>
<?php
$con= getConnection();
$sql="select * from users where id LIKE 'S%'";

$result= mysqli_query($con,$sql);
while($row= mysqli_fetch_assoc($result))
{ $id= $row['id']; 
$sql1= "select * from login where type='Student' and id= '{$id}'";
$result1= mysqli_query($con,$sql1);
$data= mysqli_fetch_assoc($result1);
?>
<tr>
<td> <?php echo $row['id'];?> </td>
<td> <?php echo $row['name'];?> </td>
<td> <?php echo $row['email'];?> </td>
<td> <?php echo $row['gender'];?> </td>

<td> <?php echo $data['type'];?> </td>
<td> <input type="hidden" name="userid" value="<?php echo $row['id']; ?>">
<input type= "submit" name="delete" value="delete">  </td>
</tr> 
<?php
 }?>
<tr>
<td colspan='6' align= "center"><a href="TeacherHome.php" > Go Home  </a>  <?php echo $val;?></td>

</tr>
</table>
</form>
</body>
</html>
