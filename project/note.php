<?php
session_start();
require('db.php');
$con = getConnection();
?>
<html>

<head>
	<title>Notes</title>
</head>

<body>

	<fieldset align="center" style="width:50 border:2px solid DarkMagenta;">
		<legend>
			<h1> Notes </h1>
		</legend>
		<table width="100%">
			<tr>
				<td>
					<table border width="100%">
						<tr>
							<td><b> Notes Information</td>
							<td><b> Posted By </td>
							<td><b> Download</td>


						</tr>
						<?php
						$con = getConnection();
						$sqlview = "select * from notes where status=1";
						$result = mysqli_query($con, $sqlview);
						while ($data = mysqli_fetch_assoc($result)) {
						?>
							<tr height="100%">
								<td> <?php echo $data['Subject']; ?> </td>
								<td> <?php echo $data['poster_name']; ?> </td>
								<td> <a href="<?php echo $data['notes_path']; ?>" download> download </a> </td>
							</tr>

						<?php
						} ?>
					</table>
	</fieldset>
	<a href="subject.html" style="color:DarkMagenta;"><b> BACK</b></a>
</body>

</html>