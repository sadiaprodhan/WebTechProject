<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <h1>Edit</h1>

    <a href="profile.php" style="color:MediumSeaGreen;"><b>Back</b></a>

    <form action="replacedata.php" method="post">
        <p>ID :</p>
        <input type="text" name="id" value="<?php echo ($_SESSION['id']); ?>">
        <br><br>
        <p>Name :</p>
        <input type="text" name="name" value="<?php echo ($_SESSION['name']); ?>">
        <br><br>

        <p>Email :</p>
        <input type="text" name="email" value="<?php echo ($_SESSION['email']); ?>">
        <br><br>

        <p>Gender :</p>
        <?php
        if ($_SESSION['Gender'] == "Male" || $_SESSION['Gender'] == "male") {
            ?>
            <input type="radio" name="gender" value="Male" checked="checked"> Male<br>
            <input type="radio" name="gender" value="Female"> Female<br>

            <br><br>
        <?php
        } else {
            ?>
            <input type="radio" name="gender" value="Male"> Male<br>
            <input type="radio" name="gender" value="Female" checked="checked"> Female<br>

            <br><br>
        <?php
        }
        ?>

        <p>Account Type :</p>
        <?php
        if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "admin") {
            ?>
            <input type="radio" name="acctype" value="Admin" checked="checked"> Admin<br>
            <input type="radio" name="acctype" value="Teacher"> Teacher<br>
            <input type="radio" name="acctype" value="Student"> Student<br>

            <br><br>
        <?php
        } else if ($_SESSION['type'] == "Teacher" || $_SESSION['type'] == "teacher") {
            ?>
            <input type="radio" name="acctype" value="Admin"> Admin<br>
            <input type="radio" name="acctype" value="Teacher" checked="checked"> Teacher<br>
            <input type="radio" name="acctype" value="Student"> Student<br>

            <br><br>
        <?php
        } else {
            ?>
            <input type="radio" name="acctype" value="Admin"> Admin<br>
            <input type="radio" name="acctype" value="Teacher"> Teacher<br>
            <input type="radio" name="acctype" value="Student" checked="checked"> Student<br>

            <br><br>
        <?php
        }
        ?>


    
            <input type="submit" value="Change" name="register">
        

    </form>

</body>

</html>