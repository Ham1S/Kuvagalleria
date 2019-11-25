<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../login/signup.php?error=emptyfields&uname=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login/signup.php?error=invalidpwd=".$username);
        exit();
    }
}
