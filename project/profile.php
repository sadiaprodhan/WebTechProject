<!DOCTYPE html>
<html>

<head>
  <title>Profile</title>
</head>

<body>
  <?php
  session_start();
  require('db.php');
  $val = "";
  if (isset($_POST['Update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_SESSION['id'];
    if (empty($name) || empty($email)) {
      $val = "Null Submission";
    } else {
      $con = getConnection();
      $sql = "update users set name = '{$name}', email= '{$email}' where id='{$id}' ";
      if ($result1 = mysqli_query($con, $sql)) {
        $val = "updated";

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
      } else {
        $val = "not Updated";
      }
    }
  }
  ?>


  <h1>Welcome <?php echo ($_SESSION['name']); ?></h1>

  <a href="StudentHome.php" style="color:DarkMagenta;"><b>Back to Home</b></a>

  <p>ID : <?php echo ($_SESSION['id']); ?></p>
  <p>Name : <?php echo ($_SESSION['name']); ?></p>

  <p>Email : <?php echo ($_SESSION['email']); ?></p>
  <p>Account Type : <?php echo ($_SESSION['type']); ?></p>
  <p>Gender : <?php echo ($_SESSION['Gender']); ?></p>


  <a href="edit.php" style="color:DarkMagenta;"><b>Edit</b></a>
  <a href="ChangePass.php"> Change Password </a>
  <td  align='right' colspan='2'>  <div> <?php echo $val; ?>  </div>



</body>

</html>