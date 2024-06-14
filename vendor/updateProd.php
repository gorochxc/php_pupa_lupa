<?php

    require_once '../include/db.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    mysqli_query($connect, "UPDATE `products` SET
    `name` = '$name',
    `description` = '$description',
    `price` = '$price'
    WHERE `products`.`id` = '$id'");

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