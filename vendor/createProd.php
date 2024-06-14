<?php

    require_once '../include/db.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    mysqli_query($connect, "INSERT INTO `products` 
    (`id`, `name`, `description`, `price`) VALUES
    (NULL, '$name', '$description', '$price')");

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