<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuvagalleria</title>
</head>
<body>
    <a href="login.php">login</a>
    <a href="signup.php">signup</a>

    <?php
    if (isset($_SESSION['userId'])) {
        echo '<p class="login-status">You are logged in</p>';
    } else {
        echo '<p class="login-status">You are logged out</p>';
    }
    ?>
</body>
</html>