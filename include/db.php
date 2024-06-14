<?php 

    $connect = mysqli_connect('localhost', 'root', '', 'shop', 3306);

    if (!$connect) {
        die('DB NO WORK');
    }
