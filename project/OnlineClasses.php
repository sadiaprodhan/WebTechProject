
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
	
	$sqlv= "delete from comments where commentid='{$id}'";
	if(mysqli_query($con,$sqlv))
	{ }
	
}
if(isset($_POST['data']))
{ $data= $_POST['data'];
$json = json_decode($data);
$posterid= $json->id;
$email= $_SESSION['email'];
$comment = $json->comment;
$sql= "select email from users where id= '{$posterid}'";
$result1= mysqli_query($con,$sql);
$data= mysqli_fetch_assoc($result1);
$posteremail= $data['email'];
 $sql1= "select count(*) from mail";
	$result1= mysqli_query($con,$sql1);
	$count= mysqli_fetch_assoc($result1);
	$body= "you have been warned";
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
	
	$sqlm= "insert into mail values ('M-{$id}','{$email}','{$posteremail}','{$body}')";
	if($result= mysqli_query($con,$sqlm))
	{ echo "done";}
 else
 {echo "no";}
	
	
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
function warning(posterid,comment)
{
	var json ={
			'id': ''+posterid ,
			'comment': ''+comment
		
		};
		var data  = JSON.stringify(json);
	var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "OnlineClasses.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('data='+data);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						alert("warned");
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
		<h2 align="center" style="border:2px solid GreenYellow;"> <?php echo $data['description'];?> </h2>
		
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

<td> <?php echo $row['postedby']?> wrote: <?php echo $row['comment']?>  <input type= button name= "delete" value= "delete" align="right" onclick ="deletecomment('<?php echo $row['commentid']?>')"> <input type= button name= "Warning" value= "Send Warning" align= "right" onclick= "warning('<?php echo $row['posterid']?>','<?php echo $row['comment']?>')"> </td>

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
		<td colspan="2" align = "right"> <a href="AdminHome.php" > Go Home  </a></td>
		</tr>
		
 	</table>

</body>
</html>