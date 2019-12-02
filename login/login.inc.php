<?php
if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $uname = $_POST['uname'];
    $password = $_POST['pwd'];

    if (empty($uname) || empty($password)) {
        header("Location: ../login/login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM admin WHERE uidAdmin=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login/login.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdAdmin']);
                if ($pwdCheck == false) {
                    header("Location: ../login/login.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idAdmin'];
                    $_SESSION['userUid'] = $row['uidAdmin'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            } else {
                header("Location: ../login/login.php?error=wrongpwd");
                exit();
            }
        }
    }
}

else {
    header("Location: ../login/login.php");
    exit();
}