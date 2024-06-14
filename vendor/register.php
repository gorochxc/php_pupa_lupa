<?php
    require_once '../include/db.php';
    session_start();
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm-pass'];
    $name = $_POST['name'];

    $query = mysqli_query($connect, "SELECT * FROM `users`");
    $users = mysqli_fetch_all($query);
    foreach($users as $user) {
        if ($user[2] == $login) {
            header('Location: /index.php');

            return;
        }
    }
    
    if ($pass && $confirm_pass && $login && $name)
    {
        if ($pass == $confirm_pass) {
            $enc_pass = md5($pass);
            mysqli_query($connect, "INSERT INTO 
            `users`(`id`, `name`, `login`, `pass`) 
            VALUES (NULL,'$name','$login','$enc_pass')");
    
            $_SESSION['user-name'] = $name;
            header('Location: /index.php');
        } else {
            header('Location: /index.php');
        }
    }
    else
    {
        header('Location: /index.php');
    }
    