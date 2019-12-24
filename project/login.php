 

<?php
session_start();
require_once('db.php');
$con = getConnection();
$query = "select * from login";
$result = mysqli_query($con, $query);
$found  = '';
while ($data = mysqli_fetch_array($result)) {
	if ($_POST['uid'] == $data["id"] && $_POST['pass'] == $data["password"]) {
		$_SESSION['id'] = $data['id'];
		$_SESSION['pass'] = $data['password'];
		$_SESSION['type'] = $data['type'];
		$found = 'yes';
	}
}
if ($found == 'yes') {

	header("Location:StudentHome.php");
	exit();
}
else{
	echo "Login Failed";
}

?>