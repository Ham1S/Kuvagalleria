<?php
    require 'kuvagalleriadbh.php';
    $fileNames = $_POST['fileName'];
    $imgId = $_POST['fileId'];

    $root_dir = realpath($_SERVER['DOCUMENT_ROOT']);
    //echo "Root dir " . $root_dir . "<br>";

    $path = dirname($_SERVER['PHP_SELF'],1);
    //echo "Path " .$path . "<br>";

    $real_path = $root_dir . $path;
    //echo "Real path " .$real_path . "<br>";

    $final_path = $real_path."\\img\\gallery\\". $fileNames;
    //echo "Final path " .$final_path . "<br>";

    $sql = "DELETE FROM imgggallery WHERE idGallery=$imgId";

    unlink($final_path);

    if (mysqli_query($conn, $sql)) {
        header("Refresh:0; url=gallery.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

