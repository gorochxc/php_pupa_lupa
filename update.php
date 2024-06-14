<?php

    session_start();
    require_once 'include/db.php';
    $id = $_POST['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>CRUD - Read</h1>
    <?php
        $query = mysqli_query($connect, "SELECT * FROM `products`");
        $products = mysqli_fetch_all($query);
        foreach ($products as $el) {
            if ($el[0] == $id) {    
                ?>
                    <form action="vendor/updateProd.php" method="post">
                        <input style="display: none;" name="id" value="<?= $el[0] ?>" type="text">
                        <input value="<?= $el[1] ?>" name="name" type="text">
                        <input value="<?= $el[2] ?>" name="description" type="text">
                        <input value="<?= $el[3] ?>" name="price" type="text">
                        <button>Update</button>
                    </form>
                <?php
            }
        }
    ?>
</body>
</html>