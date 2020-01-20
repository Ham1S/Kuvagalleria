<?php
$path  = "img/gallery/";

if (!unlink($path)) {
    echo "You have an error!";
} else {
    header("Location: gallery.php?deletesuccess");
}