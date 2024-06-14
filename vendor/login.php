<?php
    require_once '../include/db.php';
    session_start();
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $query = mysqli_query($connect, "SELECT * FROM `users`");
    $users = mysqli_fetch_all($query);
    foreach($users as $user) {
        if ($user[2] == $login && $user[3] == md5($pass)) {
            $_SESSION['user-name'] = $user[1];
            header('Location: /index.php');

            return;
        }
    }
    
    header('Location: /index.php');