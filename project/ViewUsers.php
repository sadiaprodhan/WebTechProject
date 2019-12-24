<?php
session_start();
require('db.php');
$val="";
$con= getConnection();
if(isset($_POST['delete']))
{
	$id= $_POST['delete'];
	$me = $_SESSION['id'];
	if($id== $me)
	{$val= "You cannot delete yourself";}
else{
	$sql= "delete from users where id='{$id}'";
	$sql1= "delete from login where id='{$id}'";
	if(mysqli_query($con,$sql))
	{if(mysqli_query($con,$sql1))
	{header('location: ViewUsers.php');
echo "deleted"; }}
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
function deleteuser(user)
{var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "ViewUsers.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('delete='+user);
				
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.location.reload();
					alert('deleted');
						
					 		}};

	}

</script>
<body>
<form action="POST">

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
$sql="select * from users";

$result= mysqli_query($con,$sql);
while($row= mysqli_fetch_assoc($result))
{ $id= $row['id']; 
$sql1= "select * from login where id= '{$id}'";
$result1= mysqli_query($con,$sql1);
$data= mysqli_fetch_assoc($result1);
?>
<tr>
<td> <?php echo $row['id'];?> </td>
<td> <?php echo $row['name'];?> </td>
<td> <?php echo $row['email'];?> </td>
<td> <?php echo $row['gender'];?> </td>

<td> <?php echo $data['type'];?> </td>
<td> 
<?php 
$id= $_SESSION['id'];
if($id != $row['id'] )
{
?>
<input type= "button" name="delete" value="delete" onclick="deleteuser('<?php echo $row['id'];?> ')"> </td>
</tr> 
<?php
}
 }?>
<tr>
<td colspan='6' align= "center"><a href="AdminHome.php" > Go Home  </a>  <?php echo $val;?></td>

</tr>
</table>
</form>
</body>
</html>
