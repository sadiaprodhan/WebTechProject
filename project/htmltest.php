<?php
if(isset($_POST['submit']))
{
	$marks=0;
	$a= $_POST['a'];
	if($a == "corr")
	{
		$marks++;
	}
	$b= $_POST['b'];
	if($b == "corr")
	{
		$marks++;
	}
	$c= $_POST['c'];
	if($c == "corr")
	{
		$marks++;
	}
	$d= $_POST['d'];
	if($d == "corr")
	{
		$marks++;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<html>
<head>
	<title>htmltest</title>
</head>
<body>
	<form method="POST" action="htmltest.php">
	<table border="0">
	<tr><h2>Mock test for HTML</h2></tr>
	<tr>
		<td><h4>1. What is the full form of HTML?</h4></td>
	<td><ul>
		<li><input type="radio" name="a" value="corr"/>Hyper text markup language</li>
        <li><input type="radio" name="a" value="incorr"/>Higher test mark language</li>
		<li><input type="radio" name="a" value="incorr"/> Hiper text marks lanuage</li>
	</ul></td>
</tr>

	<tr>
		<td><h4>2. HTML is represented by-</h4></td>
	<td><ul>
		<li><input type="radio" name="b" value="corr"/>Tag</li>
        <li><input type="radio" name="b" value="incorr"/>Sign</li>
		<li><input type="radio" name="b" value="incorr"/> Icon</li>
	</ul></td></tr>

	<tr>
		<td><h4>3. The 'p' element defines' -</h4></td>
	<td><ul>
		<li><input type="radio" name="c" value="incorr"/>Tag</li>
        <li><input type="radio" name="c" value="corr"/>Paragraph</li>
		<li><input type="radio" name="c" value="incorr"/> Icon</li>
	</ul></td></tr>

	<tr>
		<td><h4>4. the correct tag is--</h4></td>
	<td><ul>
		<li><input type="radio" name="d" value="corr"/>a href=""</li>
        <li><input type="radio" name="d" value="incorr"/>a rref=''</li>
		<li><input type="radio" name="d" value="incorr"/> a reff=<></li>
	</ul></td></tr><br>

<tr>
	
	<td>
		<hr>
<input type="submit" name="submit" value="Finish">

</td>
<td>
	<b>Your Total Marks: <?php echo $marks; ?></b>

   <a href="exam.php"> Back</a>
</td></tr>
</table>
</form>
</body>
</html>