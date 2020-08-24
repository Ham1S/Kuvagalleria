<?php

if (isset($_POST['gallery-edit'])) {
    if (empty('filetitle' || 'filedesc')) {
        echo 'empty';
        header("Refresh:0; url=gallery.php");
    }
}