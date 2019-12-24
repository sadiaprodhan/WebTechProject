<?php

session_start();
session_destroy();


setcookie("uname", $uname, time() - 3, "/");
header('location: login.html');
?>