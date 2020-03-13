<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" type="style/css" href="style.css">

</head>
<body>


    <header>
        <nav>
        <div class="header-login">
            <?php
            if (isset($_SESSION['userId'])) {
                echo '                
                <form action="login/logout.inc.php" method="post">
                <p class="login-status">You are logged in</p>
                <button type="submit" name="logout-submit">Logout</button>
                </form>';
            } else {
                echo '<form action="login/login.inc.php" method="post">
                <p class="login-status">You are logged out</p>
                <button type="submit" name="login-submit">Login</button>
                </form>

                <form action="login/signup.inc.php" method="post">
                <button type="submit" name="signup-submit">signup</button>
                </form>';
            }
            ?>
        </div>
        </nav>
    </header>    

</body>
</html>