
<?php
session_start();

require('db.php');
$con= getConnection();
if(isset($_POST['video']))
{
	$videoid= $_POST['video'];
	$comment= $_POST['comment'];
	$posterid= $_SESSION['id'];
	$postername= $_SESSION['name'];
	$sqlcount= "select count(*) from comments";
	$resultcount= mysqli_query($con,$sqlcount);
	$count= mysqli_fetch_assoc($resultcount);
	$id= $count['count(*)'];
	$id++;
	while(1)
	{$sql2= "select * from comments where commentid='C-{$id}'";
		$result1= mysqli_query($con, $sql2);
		$data= mysqli_fetch_assoc($result1);
		if(count($data)>0)
		{ $id++;
			continue;}
	else
	{break;}
	}
	$commentid= $count['count(*)']++ ;
	$sqladd= "insert into comments values('C-{$id}','{$videoid}','{$comment}','{$posterid}','{$postername}', 1)";
	if(mysqli_query($con, $sqladd))
	{
		header('location: OnlineClasses.php');
		
		
	}
	
}
if(isset($_POST['commentid']))
{
	$id= $_POST['commentid'];
	$myid= $_SESSION['id'];
	$sqlv= "delete from comments where commentid='{$id}'and posterid='{$myid}' ";
	if(mysqli_query($con,$sqlv))
	{ }
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Classes </title>
</head>
<script>
function addcomment(videoid)
{  var comment = document.getElementById('comment'+videoid).value;
if (comment== "")
{alert('cant write blank comment');}
else{
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "OnlineClasses.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('video='+videoid+'&comment='+comment);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						
						window.location.reload();
					
					
						
						
						}};

}
}



function deletecomment(commentid)
{
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "OnlineClasses.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('commentid='+commentid);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						alert('deleted');
						window.location.reload();
					
					
						
						
						}};

}

</script>
<body>

<?php
$sql ='select * from onlinevideo';
$result= mysqli_query($con, $sql);
while ($data= mysqli_fetch_assoc($result))
{
?>



	<table align="center" border="1" bgcolor="SeaShell">
		<h2 align="center" style="border:2px solid DarkMagenta;"> <?php echo $data['description'];?> </h2>
		
		<tr>
			<td><video width='530' height= '240' controls>
<source src='<?php echo $data['videolink'];?> ' type='video/mp4'>
</video>
</td>
<?php
$video = $data['videoid'];
$sqlcom= "select * from comments where videoid='{$video}'";
 $resultcom= mysqli_query($con, $sqlcom);
while ($row= mysqli_fetch_assoc($resultcom))
{
?>
<tr>

<td> <?php echo $row['postedby']?> wrote: <?php echo $row['comment']?> 
<?php 
$id= $_SESSION['id'];
if($row['posterid']== $id )
{
	?>
 <input type= button name= "delete" value= "delete" align="right" onclick ="deletecomment('<?php echo $row['commentid']?>')"> 
 <?php
}
 ?>
</td>
  </td>

</tr>

<?php
}
?>

<tr>
 <td><input type="text" name="comment" placeholder="Enter your comment.." id= "comment<?php echo  $video?>"> <input type="button" name="Comment" value="Comment" onclick="addcomment( '<?php echo $video; ?>')"> </td>
</tr>
 	</table>
	<?php
}
?>
<table>	
		<td colspan="2" align = "right"> <a href="StudentHome.php" > Go Home  </a></td>
		</tr>
		
 	</table>

</body>
</html>