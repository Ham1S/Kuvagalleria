<?php

var_dump($_POST);

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
        header("Location: ../login/signup.php?error=invalidusername");
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../login/signup.php?error=passwordcheck&uname=".$username);
        exit();
    }
    else {
        $sql = "SELECT uidAdmin FROM admin WHERE uidAdmin=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login/signup.php?error=sqlerror");
            exit();
        }
        else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../login/signup.php?error=usertaken");
                    exit();
                }
                else {
                    $sql = "INSERT INTO admin (uidAdmin, pwdAdmin) VALUES (?, ?)";    
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../login/signup.php?error=sqlerror");
                        exit();  
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
                        if (mysqli_stmt_execute($stmt) == FALSE){
                            header("Location: ../login/signup.php?error=sqlerror");
                            exit();
                        } else {
                            header("Location: ../index.php?signup=success");
                            exit();
                        }
                        
                    }
                }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

    else {
        header("Location: ../login/signup.php");
        exit();
    }
