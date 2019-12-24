
    <?php

    session_start();

    require('db.php');

    $id = $_SESSION['id'];
    $pass = $_SESSION['pass'];

    $new_id = $_REQUEST["id"];
    $new_name = $_REQUEST["name"];
    $new_email = $_REQUEST["email"];
    $new_gender = $_REQUEST["gender"];


    $conn = getConnection();
    $sql = "update users set email='{$new_email}',  name='{$new_name}' , gender='{$new_gender}' where id='{$id}'";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['name'] = $new_name;

        $_SESSION['email'] = $new_email;

        $_SESSION['Gender'] = $new_gender;

        header("Location:profile.php");
        exit();
    } else {
        header("Location:login.html");
        exit();
    }




    ?>
