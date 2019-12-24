<?php
session_start();
require('db.php');
$id = $_SESSION['id'];
$con = getConnection();
$sql = "select * from users where id= '{$id}'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$_SESSION['name'] = $data['name'];
$_SESSION['email'] = $data['email'];
$_SESSION['Gender'] = $data['gender'];



?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
</head>
<style type="text/css">
	#wrapper {

		/* Needed to position the navbar */
		position: center;
	}

	/* Position the navbar container inside the image */
	.container {
		position: absolute;
		margin: 20px;
		width: auto;
	}

	/* The navbar */
	.topnav {
		overflow: hidden;
		background-color: #660066;
	}

	/* Navbar links */
	.topnav a {
		float: left;
		color: #f2f2f2;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}

	.topnav a:hover {
		background-color: #ddd;
		color: black;
	}

	div {

		width: 98%;
		margin: auto;
	}


	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #FFF;


	}

	li {
		float: left;
	}

	li a {
		display: block;
		color: black;
		font-size: 20px;
		text-align: center;
		padding: 16px 18px;
		align-self: auto;
		text-decoration: none;
	}

	li a:hover {
		background-color: #F5F5F5;
	}

	.button {
		background: rgb(178, 34, 34);
		border: solid;
		border-color: rgb(128, 0, 0);
		color: white;
		padding: 16px 18px;
		text-align: center;
		text-decoration: none;
		display: inline-block;

		cursor: pointer;
	}


	#boxshadow {
		position: relative;
		-moz-box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
		-webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
		box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
		padding: 15px;
		background: white;
	}

	/* Make the image fit the box */
	#boxshadow img {
		width: 100%;
		border: 0px solid #8a4419;
		border-style: inset;
	}

	#boxshadow::after {
		content: '';
		position: absolute;
		z-index: -1;
		/* hide shadow behind image */
		-webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
		box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
		width: 80%;
		right: 15%;
		/* one half of the remaining 30% */
		height: 100px;
		bottom: 0;
	}
</style>

<body>

	<div id="boxshadow;" style="margin: auto;">

		<ul style="background: rgb(77, 0, 77); font-size: 19px ;border:2px solid DarKMagenta;">
			<p style="color: white;text-align: left; vertical-align: middle;">&nbsp;&nbsp;&nbsp;
				<li style="color: DarkBlue; background: white; font-style: italic;">&nbsp;&nbsp; <img src="logo.png" style="width:80px;height:80px; align-items: left"><br>&nbsp;&nbsp;ONLINE EDUCATION PORTAL &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome, <?= $_SESSION['name'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</p>
		</ul>
	</div>
	<div class="wrapper">


		<div class="topnav">
			<a href="profile.php">Profile</a>
			<a href="subject.html">Courses & Classes</a>
			<a href="teacher.php">Teacher</a>
			<a href="notice.php">Notices</a>
			<a href="exam.php">Exam</a>
			<a href="logout.php">Logout</a>

		</div>
		<div id="boxshadow;">

			<img src="11.png" align="center" width="100%" height="550px">
		</div>


		<h3 align="center" style="border:2px solid DarKMagenta;"> Never Stop Learning</h3>
	</div>s
</body>

</html>