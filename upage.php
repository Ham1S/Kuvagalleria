<?php

session_start();

if (isset($_SESSION['userId'])) {
    echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD IMAGE</button>
    </form><br>
    <form action="index.php" method="post">
                <button type="submit" name="homepage">home</button>
    </form>';
} else {
    echo 'You do not have access to this page!
    header("refresh:3;url=index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>

</body>
</html>