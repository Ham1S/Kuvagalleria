<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<form action="signup.inc.php" method="post">
        <div class="container">
            <input type="text" placeholder="Username" name="uname" autofocus><br>
            <input type="password" placeholder="Password" name="pwd"><br>
            <input type="password" placeholder="Repeat Password" name="pwd-repeat"><br>
            <button type="submit" name="signup-submit">Signup</button>
          </div>
    </form>
    <br>
    <form action="../index.php" method="post">
                <button type="submit" name="homepage">home</button>
    </form>
</body>
</html>