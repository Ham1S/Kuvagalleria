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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<main>
    <section class="gallery-links">
        <div class="wrapper">
            <h2>Gallery</h2>

            <form action="index.php" method="post">
                <button type="submit" name="homepage">home</button>
            </form>

            <div class="gallery-container">
            <?php
            include_once 'kuvagalleriadbh.php';

            $sql = "SELECT * FROM imggallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)): ?>
                    <img src="img/gallery/<?php echo $row["imgFullNameGallery"]; ?>" />
                    <form action="gallery-delete.php" method="POST">
                        <h3><?php echo $row["titleGallery"]; ?></h3>
                        <input type="hidden" name="fileName" value="<?php echo $row["imgFullNameGallery"]; ?>">
                        <input type="hidden" name="fileId" value="<?php echo $row["idGallery"]; ?>">
                        <p><?php echo $row["descGallery"]; ?></p>
                        <?php if (isset($_SESSION['userId'])) {
                        echo '<button type="submit" name="delet">delet</button>';
                        } ?>
                    </form>
                    <form action="gallery-edit.php" method="POST">
                    <?php if (isset($_SESSION['userId'])) {
                        echo '<input type="text" name="filetitle" placeholder="Image title...">
                        <input type="text" name="filedesc" placeholder="Image description...">
                        <button type="submit" name="edit">edit</button>';
                    } ?>

                    </form>
                <?php endwhile; ?>


<?php   
                // while ($row = mysqli_fetch_assoc($result)) {
                //     echo '<form action="gallery-delete.php" method="POST"><a>
                //     <h3>'.$row["titleGallery"].'</h3>
                //     <input type="hidden" name="fileName" value="'.$row["imgFullNameGallery"].'">
                //     <input type="hidden" name="fileId" value="'.$row["idGallery"].'">
                //     <p>'.$row["descGallery"].'</p>
                //     <button type="submit" name="delet">delet</button>
                // </a></form>';
                // }
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
                    <button type="submit" name="submit-image">UPLOAD</button>
                </form>';

}
?>
    </div>
    </section>

</main>
</body>
</html>