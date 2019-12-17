<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
    <link rel="stylesheet" type="style/css" href="style.css">
</head>
<body>
<main>
    <section class="gallery-links">
        <div class="wrapper">
            <h2>Gallery</h2>

            <div class="gallery-container">
            <?php
            include_once 'kuvagalleriadbh.php';

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="#">
                    <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                    <h3>'.$row["titleGallery"].'</h3>
                    <p>'.$row["descGallery"].'</p>
                </a>';
                }
            }
            ?>
            </div>
<?php

if (isset($_SESSION['userId'])) {
    echo '<div class="gallery-upload">
                <form action="gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="filename" placeholder="File name...">
                    <input type="text" name="filetitle" placeholder="Image title...">
                    <input type="text" name="filedesc" placeholder="Image description...">
                    <input type="file" name="file">
                    <button type="submit" name="submit">UPLOAD</button>
                </form>';

}
?>
    <form action="index.php" method="post">
                <button type="submit" name="homepage">home</button>
    </form>
    </div>
    </section>

</main>
</body>
</html>