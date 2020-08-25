<?php
require 'kuvagalleriadbh.php';
$imageTitle = $_POST['filetitle'];
$imageDesc = $_POST['filedesc'];

if (isset($_POST['gallery-edit'])) {
    if (empty('filetitle' || 'filedesc')) {
        echo 'empty';
        header("Refresh:0; url=gallery.php");
    }
}