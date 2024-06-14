<?php

    session_start();
    $_SESSION['start'] = 'session start';
    require_once 'include/db.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css" />
    <title>CRUD MySQL</title>
</head>
<?php include('./header.php') ?>
<body>
    <div class="mainPage">
        <section>
            <?php
                $query = mysqli_query($connect, "SELECT * FROM `products`");
                $products = mysqli_fetch_all($query);
                foreach ($products as $el) {
                    ?>
                        <div class="productInfo sectionContainer">
                            <h1 class="textCenter">CRUD - Read</h1>
                            <form action="vendor/deleteProd.php" method="post">
                                <input style="display: none;" name="id" value="<?= $el[0] ?>" type="text">
                                <p>name - <?= $el[1] ?></p>
                                <p>description - <?= $el[2] ?></p>
                                <p>price - <?= $el[3] ?> rub.</p>
                                <button class="deleteProductButton">Delete</button>
                            </form>
                            <form action="update.php" method="post">
                                <input style="display: none;" name="id" value="<?= $el[0] ?>" type="text">
                                <button>Update</button>
                            </form>
                        </div>        
                    <?php
                }
            ?>
        </section>
        
        <section>
            
            <div class="addProduct sectionContainer">
                <h1 class="textCenter">CRUD - Create</h1>
                <form action="vendor/createProd.php" method="post" >
                    <input name="name" type="text" placeholder="name">
                    <input name="description" type="text" placeholder="description">
                    <input name="price" type="text" placeholder="price">
                    <button>Add</button>
                </form>
            </div>
        </section>

        <section>
            <h1>current user - <?= key_exists('user-name', $_SESSION) ? $_SESSION['user-name'] : 'not authorized' ?></h1>
        </section>
        
        <!-- AUTH - SESSION -->
        <section>
            <div class="login sectionContainer">
                <form action="vendor/login.php" method="post">
                    <h1 class="textCenter">LOGIN</h1>
                    <input name="login" type="text" placeholder="login">
                    <input name="pass" type="text" placeholder="pass">
                    <button>login</button>
                </form>
            </div>
            
            <div class="register sectionContainer">
                <form action="vendor/register.php" method="post">
                    <h1 class="textCenter">REGISTER</h1>
                    <input name="name" type="text" placeholder="name">
                    <input name="login" type="text" placeholder="login">
                    <input name="pass" type="text" placeholder="pass">
                    <input name="confirm-pass" type="text" placeholder="confirm pass">
                    <button>register</button>
                </form>
            </div>   
        </section>
        
    </div>
</body>

<?php 
    include('./footer.php')
?>
</html>