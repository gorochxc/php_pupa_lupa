<?php

    require_once '../include/db.php';

    $id = $_POST['id'];

    mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`id` = '$id'");
    header('Location: /index.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Load</h1>
</body>
</html>